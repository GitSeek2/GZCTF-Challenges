<?php
function checkFileType($fileUpload, $file_format)
{
    //MIME 绕过
    if ($file_format !== "md") {
        if (($fileUpload["type"] === 'image/jpeg')) return true;
        else if ($fileUpload["type"] === 'image/png') return true;
        else if ($fileUpload["type"] === 'image/gif') return true;
    } else return true;
    return false;
}

function checkFileUpload($fileUpload, $target_file)
{
    // 检查文件是否已上传
    if (!isset($fileUpload) || $fileUpload["size"] === 0) {
        echo "<h5 class='text-danger'>文件不能为空。<p>";
        return false;
    }
    // 检查文件是否已经存在
    if (file_exists($target_file)) {
        echo "<h5 class='text-danger'> 对不起，文件已经存在。</h5>";
        return false;
    }
    // 检查文件大小，限制为 500KB
    if ($fileUpload["size"] > 5000000) {
        echo "<h5 class='text-danger'>对不起，你的文件太大。</h5>";
        return false;
    }
    return true;
}
