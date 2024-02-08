<?php

class Cancer
{
    public $key;

    public function __destruct()
    {
        echo "触发了魔术方法__destruct()\n";
        unserialize($this->key)();
    }
}

class GetFlag
{
    public $code;
    public $func = "create_function";

    public function create()
    {
        $a = $this->func;
        $a('', $this->code);
    }
}

if (isset($_REQUEST['Cancer'])) {
    unserialize($_REQUEST['Cancer']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>