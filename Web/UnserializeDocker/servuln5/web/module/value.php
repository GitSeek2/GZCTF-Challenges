<?php
function getValue()
{
    echo "部分变量的值:\n";
    echo "Leo：";
    var_dump($_REQUEST['Leo']);
    file_put_contents('flag.php', getenv('GZCTF_FLAG'));
}