<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "Sonder：";
    var_dump($_REQUEST['Sonder']);
    file_put_contents('module/flag.php', getenv('GZCTF_FLAG'));
}