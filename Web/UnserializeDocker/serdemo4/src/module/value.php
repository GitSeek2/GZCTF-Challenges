<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "data：";
    var_dump($_REQUEST['data']);
    echo "uploads中的文件: \n";
    system("ls uploads");
}