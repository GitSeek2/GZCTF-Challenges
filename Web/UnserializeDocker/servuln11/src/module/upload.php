<?php
//upload.php
error_reporting(0);
$allowedTypes = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
$allowedExs = array("gif", "jpeg", "jpg", "png");
$extension = pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION);
if ($_FILES["fileUpload"]["name"] !== '') {
    if (in_array($_FILES["fileUpload"]["type"], $allowedTypes)
        && in_array($extension, $allowedExs)) {
        if ($_FILES["fileUpload"]["size"] < 204800) {
            if ($_FILES["fileUpload"]["error"] > 0) {
                echo "ERROR：" . $_FILES["fileUpload"]["error"];
            } else {
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "../uploads/" . $_FILES["fileUpload"]["name"]);
                echo "文件储存在" . "uploads/" . $_FILES["fileUpload"]["name"];
            }
        } else echo "文件过大";
    } else echo "服务器检测到恶意文件，启动了查杀程序";
}