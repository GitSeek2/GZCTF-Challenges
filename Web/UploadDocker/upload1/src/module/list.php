<?php
function getPostList()
{
    $files = glob('post/*.html');// 获取page目录下所有.html文件

    $html = "<ol class='text-white-50 font-weight-bold mt-2 mb-2'>";
    foreach ($files as $file) {
        // 遍历文件
        $filename = pathinfo($file, PATHINFO_FILENAME);// 获取不带后缀的文件名
        $html .= "<li><a href='./post/" . $filename . ".html'>" . $filename . "</a></li>";// 输出文件名
    }
    $html .= "</ol>";
    return $html;
}