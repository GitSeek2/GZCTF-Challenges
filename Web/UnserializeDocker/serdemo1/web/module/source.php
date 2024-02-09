<?php
// password in flag.php
error_reporting(0);

class happy
{
    protected $file = 'index.php';

    public function __construct($file)
    {
        $this->file = $file;
    }

    function __destruct()
    {
        echo "触发了魔术方法__destruct()\n";
        if (!empty($this->file)) {
            if (strchr($this->file, "\\") === false && strchr($this->file, '/') === false) {
                $filename = dirname(__FILE__) . '/' . $this->file;
                echo file_get_contents($filename);
            } else echo "错误的文件名\n";
        }
    }

    function __wakeup()
    {
        echo "触发了魔术方法__wakeup()\n";
        $this->file = 'index.php';
    }

    public function __toString()
    {
        echo "触发了魔术方法__toString()\n";
        return '';
    }
}

if (isset($_REQUEST['Sonder'])) {
    $file = base64_decode($_REQUEST['Sonder']);
    echo unserialize($file);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>