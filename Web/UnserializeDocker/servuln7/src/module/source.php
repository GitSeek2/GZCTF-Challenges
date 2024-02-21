<?php

class Justice
{
    private $head;
    private $tail = '';

    function __destruct()
    {
        printf("%s\n", __METHOD__);
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
        printf("%s\n", __METHOD__);
        if ($func === 'symbolize' and $this->name === 'balance') {
            echo file_get_contents('/flag');
        }
    }
}

if (isset($_REQUEST['Libra'])) {
    unserialize($_REQUEST['Libra']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>