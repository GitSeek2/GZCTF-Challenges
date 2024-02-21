<?php
function checkFileType($fileUpload, $file_format)
{
    if ($file_format !== "md") {
        $file = fopen($fileUpload["tmp_name"], 'r');
        $header = fread($file, 8); // 读取前8个字节，因为PNG的头部信息长度为8
        fclose($file);
        $allowedHeaders = array(
            'GIF' => array('GIF89a', 'GIF87a'),
            'JPEG' => array(hex2bin('FFD8FFDB'), hex2bin('FFD8FFE0'), hex2bin('FFD8FFE1')),
            'PNG' => array(hex2bin('89504E470D0A1A0A'))
        );
        foreach ($allowedHeaders as $type => $headers) {
            foreach ($headers as $h) {
                if (strpos($header, $h) === 0) {
                    return true;
                }
            }
        }
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
