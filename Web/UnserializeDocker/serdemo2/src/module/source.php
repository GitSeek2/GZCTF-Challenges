<?php

class test1
{
    public $varr;

    function __construct()
    {
        $this->varr = "index.php";
    }

    function __destruct()
    {
        echo "触发了test1的魔术方法__destruct()\n";
        if (file_exists($this->varr)) {
            echo "文件" . $this->varr . "存在";
        }
    }
}

class test2
{
    public $varr;
    public $obj;

    function __construct()
    {
        $this->varr = '123456';
        $this->obj = null;
    }

    function __toString()
    {
        $this->obj->execute();
        return $this->varr;
    }

    function __destruct()
    {
        echo "触发了test2的魔术方法__destruct()\n";
    }
}

class test3
{
    public $varr;

    function execute()
    {
        eval($this->varr);
    }

    function __destruct()
    {
        echo "触发了test3的魔术方法__destruct()\n";
    }
}

if (isset($_REQUEST['Sonder'])) {
    unserialize($_REQUEST['Sonder']);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>