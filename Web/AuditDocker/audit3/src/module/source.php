<?php
error_reporting(0);

if ((string)$_POST['var1'] !== (string)$_POST['var2'] && md5($_POST['var1']) === md5($_POST['var2'])) {
    $flag = file_get_contents('/flag');
    echo $flag;
} else {
    echo "绕过PHP检测就可以得到FLAG";
}
?>
