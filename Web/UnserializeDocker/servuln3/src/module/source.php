<?php

class Gemini
{
    var $id;
    var $user;

    public function __construct($id, $user)
    {
        $this->id = $id;
        $this->user = $user;
    }

    function __destruct()
    {
        printf("%s\n", __METHOD__);
        $this->login();
    }
    function login()
    {
        printf("%s\n", __METHOD__);
        if ($this->id === "1317" and $this->user === "lutalica") {
            echo file_get_contents('/flag');
        }
    }
}
if (isset($_COOKIE['Gemini'])) {
    unserialize(base64_decode($_COOKIE['Gemini']));
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>