<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "var1：";
    var_dump($_GET['var1']);
    echo "var2：";
    var_dump($_GET['var2']);
    echo "md5(var1)：";
    var_dump(md5($_GET['var1']));
    echo "md5(var2)：";
    var_dump(md5($_GET['var2']));
}