<?php

class Aries
{
    var $command;

    function execute()
    {
        eval($this->command);
    }

    function __wakeup()
    {
        echo "触发了魔术方法__wakeup\n";
        $this->execute();
    }
}

if (isset($_REQUEST['Aries'])) {
    unserialize($_REQUEST['Aries']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";
?>