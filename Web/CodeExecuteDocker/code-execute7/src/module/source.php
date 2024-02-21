<?php
if (isset($_GET['func'])) {
    function func1()
    {
        echo "func1";
    }
    function func2($arg = '')
    {
        echo "func2";
    }
    function func3($arg)
    {
        echo "func3的参数：" . $arg;
    }

    $func = $_GET['func'];
    $arg = $_GET['arg'];
    echo $func($arg);
} else {
    echo "服务器剩余防御：1层";
}
?>