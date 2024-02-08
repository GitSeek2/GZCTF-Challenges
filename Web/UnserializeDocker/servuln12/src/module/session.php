<?php
error_reporting(0);
ini_set('session.serialize_handler', 'php_serialize');
session_start();
if (isset($_REQUEST['Pisces'])) {
    $_SESSION['Pisces'] = $_REQUEST['Pisces'];
} else {
    echo "系统检测发现该处漏洞，进行攻击测试\n";
}
?>
