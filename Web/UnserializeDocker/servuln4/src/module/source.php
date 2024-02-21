<?php

class Cancer
{
    public $key;

    public function __destruct()
    {
        printf("%s\n", __METHOD__);
        unserialize($this->key)();
    }
}

class GetFlag
{
    public $code;
    public $func = "create_function";

    public function create()
    {
        printf("%s\n", __METHOD__);
        $a = $this->func;
        $a('', $this->code);
    }
}

if (isset($_REQUEST['Cancer'])) {
    unserialize($_REQUEST['Cancer']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>