<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "user：";
    var_dump(($_POST['user']));
    echo "data：";
    var_dump(($_POST['data']));
    echo "sign：";
    var_dump($_COOKIE["sign"]);
}