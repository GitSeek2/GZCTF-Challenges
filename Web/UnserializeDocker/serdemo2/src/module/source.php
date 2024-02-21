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
        printf("%s\n", __METHOD__);
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
        printf("%s\n", __METHOD__);
        $this->obj->execute();
        return $this->varr;
    }

    function __destruct()
    {
        printf("%s\n", __METHOD__);
    }
}

class test3
{
    public $varr;

    function execute()
    {
        printf("%s\n", __METHOD__);
        eval($this->varr);
    }

    function __destruct()
    {
        printf("%s\n", __METHOD__);
    }
}

if (isset($_REQUEST['Sonder'])) {
    unserialize($_REQUEST['Sonder']);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>