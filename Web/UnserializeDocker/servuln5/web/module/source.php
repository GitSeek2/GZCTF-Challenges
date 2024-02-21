<?php
//sercet in flag.php
class Leo
{
    var $file = 'index.php';

    public function __construct($file)
    {
        $this->file = $file;
    }

    function __destruct()
    {
        printf("%s\n", __METHOD__);
        include_once($this->file);
        echo $flag;
    }

    function __wakeup()
    {
        printf("%s\n", __METHOD__);
        $this->file = 'index.php';
    }
}

$cmd = $_REQUEST['Leo'];
if (!isset($cmd)) {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
} else {
    if (preg_match('/[oc]:\d+:/i', $cmd)) {
        echo "服务器检测到恶意反序列化格式数据，启动了查杀程序\n";
    } else {
        unserialize($cmd);
    }
}
?>