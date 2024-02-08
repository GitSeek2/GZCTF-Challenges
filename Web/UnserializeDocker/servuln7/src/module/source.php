<?php

class Justice
{
    private $head;
    private $tail = '';

    function __destruct()
    {
        echo "触发了魔术方法__destruct()\n";
        $head = $this->head;
        $tail = $this->tail;
        $head->$tail();
    }
}

class Libra
{
    public $name;

    function __call($func, $args)
    {
        echo "触发了魔术方法__call()\n";
        if ($func === 'symbolize' and $this->name === 'balance') {
            echo file_get_contents('/flag');
        }
    }
}

if (isset($_REQUEST['Libra'])) {
    unserialize($_REQUEST['Libra']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>