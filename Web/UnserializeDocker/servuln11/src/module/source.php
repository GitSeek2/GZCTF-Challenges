<?php
error_reporting(0);
class Aquarius
{
    public function __wakeup()
    {
        printf("%s\n", __METHOD__);
        echo file_get_contents('/flag');
    }
}

function Check($filename)
{
    $mark = true;
    $black_list = ['php', 'file', 'glob', 'data', 'http', 'ftp', 'zip', 'https', 'ftps', 'phar'];
    printf("%s\n", __METHOD__);
    foreach ($black_list as $item) {
        $front = substr($filename, 0, strlen($item));
        if ($front == $item) {
            $mark = false;
            break;
        }
    }
    return $mark;
}

if (isset($_REQUEST['Aquarius'])) {
    $filename = $_REQUEST['Aquarius'];
    if (Check($filename)) {
        echo md5_file($filename);
    } else {
        echo "服务器检测到可疑前缀，启动了查杀程序";
    }
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>