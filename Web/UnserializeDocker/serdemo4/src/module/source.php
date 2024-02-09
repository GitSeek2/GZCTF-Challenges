<?php
error_reporting(0);

class A
{
    protected $store;
    protected $key;
    protected $expire;

    public function __construct($store, $key = 'flysystem', $expire = null)
    {
        $this->key = $key;
        $this->store = $store;
        $this->expire = $expire;
    }

    public function cleanContents(array $contents)
    {
        $cachedProperties = array_flip([
            'path',
            'dirname',
            'basename',
            'extension',
            'filename',
            'size',
            'mimetype',
            'visibility',
            'timestamp',
            'type',
        ]);
        foreach ($contents as $path => $object) {
            if (is_array($object)) {
                $contents[$path] = array_intersect_key($object, $cachedProperties);
            }
        }
        return $contents;
    }

    public function getForStorage()
    {
        $cleaned = $this->cleanContents($this->cache);
        return json_encode([$cleaned, $this->complete]);
    }

    public function save()
    {
        $contents = $this->getForStorage();
        $this->store->set($this->key, $contents, $this->expire);
    }

    public function __destruct()
    {
        if (!$this->autosave) {
            $this->save();
        }
    }
}

class B
{
    protected function getExpireTime($expire): int
    {
        return (int)$expire;
    }

    public function getCacheKey(string $name): string
    {
        // 使缓存文件名随机
        $cache_filename = $this->options['prefix'] . uniqid() . $name;
        if (substr($cache_filename, -strlen('.php')) === '.php') {
            die('?');
        }
        return $cache_filename;
    }

    protected function serialize($data): string
    {
        if (is_numeric($data)) {
            return (string)$data;
        }

        $serialize = $this->options['serialize'];

        return $serialize($data);
    }

    public function set($name, $value, $expire = null): bool
    {
        $this->writeTimes++;

        if (is_null($expire)) {
            $expire = $this->options['expire'];
        }

        $expire = $this->getExpireTime($expire);
        $filename = $this->getCacheKey($name);

        $dir = dirname($filename);

        if (!is_dir($dir)) {
            try {
                mkdir($dir, 0755, true);
            } catch (Exception $e){}
        }
        $data = $this->serialize($value);
        if ($this->options['data_compress'] && function_exists('gzcompress')) {
            //数据压缩
            $data = gzcompress($data, 3);
        }
        $data = "<?php\n//" . sprintf('%012d', $expire) . "\n exit();?>\n" . $data;
        $result = file_put_contents($filename, $data);
        if ($result) {
            return $filename;
        }
        return null;
    }
}

$dir = "uploads/";
if (!is_dir($dir)) {
    mkdir($dir);
}
if (isset($_REQUEST['data'])) {
    $data = $_REQUEST['data'];
    unserialize($data);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
