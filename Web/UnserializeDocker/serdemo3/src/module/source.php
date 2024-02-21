<?php
//flag is in flag.php
error_reporting(0);
class Modifier
{
    protected $var;
    public function append($value)
    {
        printf("%s\n", __METHOD__);
        include($value);
    }
    public function __invoke()
    {
        printf("%s\n", __METHOD__);
        $this->append($this->var);
    }
}

class Show
{
    public $source;
    public $str;
    public function __construct($file = 'index.php')
    {
        $this->source = $file;
        echo 'Welcome to ' . $this->source . "\n";
    }
    public function __toString()
    {
        printf("%s\n", __METHOD__);
        return $this->str->source;
    }

    public function __wakeup()
    {
        printf("%s\n", __METHOD__);
        if (preg_match("/gopher|http|file|ftp|https|dict|\.\./i", $this->source)) {
            echo "系统检测到可疑字段，启动了查杀程序\n";
            $this->source = "index.php";
        }
    }
}

class Test
{
    public $p;
    public function __construct()
    {
        $this->p = array();
    }

    public function __get($key)
    {
        printf("%s\n", __METHOD__);
        $function = $this->p;
        return $function();
    }
}

if (isset($_REQUEST['Sonder'])) {
    unserialize($_REQUEST['Sonder']);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}