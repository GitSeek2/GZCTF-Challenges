<?php
error_reporting(0);

if ($_GET['var1'] != $_GET['var2'] && MD5($_GET['var1']) == MD5($_GET['var2'])) {
    $flag = file_get_contents('/flag');
    echo $flag;
} else {
    echo "绕过PHP检测就可以得到FLAG";
}
?>