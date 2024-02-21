<?php
function checkFileType($fileUpload, $file_format)
{
    if ($file_format !== "md") {
        $content = file_get_contents($fileUpload["tmp_name"]);
        $sensitiveWords = array('eval', 'base64_decode', 'gzinflate', 'str_rot13', 'assert', 'system', 'echo', '`', 'var_dump', 'print', 'passthru()', 'hex');
        foreach ($sensitiveWords as $word) {
            if (strpos($content, $word) !== false) {
                return false;
            }
        }
    } else return true;
    return true;
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
