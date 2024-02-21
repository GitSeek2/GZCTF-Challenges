<?php
function Check()
{
    // 从 num 文件中获取内容
    $num = intval(file_get_contents('/num.txt'));
    // 获取 page 参数的值
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    // 如果 page 参数的值等于 num 文件的内容，则输出环境变量 GZCTF_FLAG 的值
    if ($page === $num) {
        echo "<h5 class='text-success'>flag被找到了: " . file_get_contents('/flag') . "</h5>";
        return true;
    } else {
        echo "<h5 class='text-danger'>不过看来page参数不正确呢😣</h5>";
        return false;
    }
}
?>