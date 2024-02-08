<?php
error_reporting(0);
class Capricorn
{
    public function __wakeup()
    {
        echo file_get_contents('/flag');
    }
}

if (isset($_REQUEST['Capricorn'])) {
    $filename = $_REQUEST['Capricorn'];
    echo md5_file($filename);
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>