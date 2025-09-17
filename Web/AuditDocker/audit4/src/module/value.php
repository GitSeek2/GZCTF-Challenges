<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "username：";
    var_dump(($_POST['username']));
    echo "data：";
    var_dump(($_POST['data']));
    echo "sign：";
    var_dump($_COOKIE["sign"]);
}