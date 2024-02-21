<?php

class Aries
{
    var $command;

    function execute()
    {
        printf("%s\n", __METHOD__);
        eval($this->command);
    }

    function __wakeup()
    {
        printf("%s\n", __METHOD__);
        $this->execute();
    }
}

if (isset($_REQUEST['Aries'])) {
    unserialize($_REQUEST['Aries']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>