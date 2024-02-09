<?php
//flag is in flag.php
error_reporting(0);
class Modifier
{
    protected $var;
    public function append($value)
    {
        include($value);
    }
    public function __invoke()
    {
        echo "触发了魔术方法__invoke()\n";
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
        echo "触发了魔术方法__toString()\n";
        return $this->str->source;
    }

    public function __wakeup()
    {
        echo "触发了魔术方法__wakeup()\n";
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
        echo "触发了魔术方法__get()\n";
        $function = $this->p;
        return $function();
    }
}

if (isset($_REQUEST['Sonder'])) {
    unserialize($_REQUEST['Sonder']);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}