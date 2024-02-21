<?php
error_reporting(0);

$key = getKey();
$username = $_POST['username'];
$data = $_POST['data'];
$sign = $_COOKIE["sign"];
if (!empty($sign)) {
    if ($username === "jwt") {
        if ($sign === md5($key . $username . $data)) {
            if (strpos($data, 'sec')) {
                $flag = file_get_contents('/flag');
                echo $flag;
            } else echo "数据似乎没有被恶意篡改，但服务器接收到的数据中不包含sec";
        } else echo "检测到当前用户的数据被恶意篡改";
    } else echo "看起来你并不是用户jwt";
} else echo "检测到sign为空, 可能需要刷新一下浏览器";
?>