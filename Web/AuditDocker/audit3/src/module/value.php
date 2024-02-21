<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "(string)var1：";
    var_dump(urldecode((string)$_POST['var1']));
    echo "(string)var2：";
    var_dump(urldecode((string)$_POST['var2']));
    echo "md5(var1)：";
    var_dump(md5($_POST['var1']));
    echo "md5(var2)：";
    var_dump(md5($_POST['var2']));
}