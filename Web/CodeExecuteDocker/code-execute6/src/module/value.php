<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "name：";
    var_dump($_GET['name']);
}