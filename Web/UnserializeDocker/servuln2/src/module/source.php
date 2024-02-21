<?php

class Taurus
{
    var $user;
    var $pass;
    var $email;

    public function __construct($user, $pass, $email)
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->email = $email;
    }

    function __destruct()
    {
        printf("%s\n", __METHOD__);
        $this->register();
    }

    function register()
    {
        printf("%s\n", __METHOD__);
        if ($this->user === "lutalica" && $this->pass === "P@ssw0rd" && $this->email === '231452327@ti.me') {
            echo file_get_contents('/flag');
        }
    }

}

if (isset($_REQUEST['Taurus'])) {
    unserialize($_REQUEST['Taurus']);
} else echo "系统检测发现该处漏洞，进行攻击测试\n";