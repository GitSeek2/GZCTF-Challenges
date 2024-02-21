<?php
require "../vendor/autoload.php";
function writeFile($post_name, $source_file)
{
    // 打开文件
    $file = fopen($post_name, "w");
    // 读取head和tail文件的内容
    $head = file_get_contents('../templates/head');
    $tail = file_get_contents('../templates/tail');
    // 写入head
    fwrite($file, $head);
    // 写入文件内容
    ob_start(); // 开始捕获输出
    // 检查是否是图片
    if (getimagesize($source_file)) {
        echo '<img src="' . $source_file . '" class="img-fluid" alt=""/>';
    } elseif (pathinfo($source_file, PATHINFO_EXTENSION) == "md") {
        // 如果是 .md 文件，输出内容
        $parsedown = new Parsedown();
        $markdownContent = file_get_contents($source_file);
        echo $parsedown->text($markdownContent);
    }
    $content = ob_get_contents(); // 获取捕获的输出
    ob_end_clean(); // 结束捕获
    fwrite($file, $content); // 写入文件内容
    // 写入tail
    fwrite($file, $tail);
    // 关闭文件
    fclose($file);
}

function showContent($target_path)
{
    $file_format = pathinfo($target_path, PATHINFO_EXTENSION);
    if (getimagesize($target_path)) {
        return '<img src="' . $target_path . '" class="img-fluid"/>';
    } elseif ($file_format === "md") {
        // 如果是 .md 文件，输出内容
        $parsedown = new Parsedown();
        $markdownContent = file_get_contents($target_path);
        return $parsedown->text($markdownContent);
    }
    return "";
}