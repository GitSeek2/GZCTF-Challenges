<?php
//flag is in flag.php

class Sagittarius
{
    private $arrow;

    public function append($value)
    {
        printf("%s\n", __METHOD__);
        include($value);
        echo $flag;
    }

    public function __invoke()
    {
        printf("%s\n", __METHOD__);
        echo "触发了魔术方法__invoke()\n";
        $this->append($this->arrow);
    }
}

class Guardian
{
    public $jupiter;
    public $zeus;

    public function __toString()
    {
        printf("%s\n", __METHOD__);
        return $this->jupiter->zeus;
    }

    public function __wakeup()
    {
        printf("%s\n", __METHOD__);
        echo $this->zeus;
    }
}

class Target
{
    public $source;

    public function __construct()
    {
        $this->source = array();
    }

    public function __get($key)
    {
        printf("%s\n", __METHOD__);
        $func = $this->source;
        return $func();
    }
}

if (isset($_REQUEST['Sagittarius'])) {
    unserialize($_REQUEST['Sagittarius']);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>