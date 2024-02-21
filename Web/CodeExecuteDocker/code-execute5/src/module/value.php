<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "func：";
    var_dump($_GET['func']);
    echo "argv：";
    var_dump($_GET['argv']);
}