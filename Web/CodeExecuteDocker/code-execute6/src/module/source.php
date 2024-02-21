<?php
if (isset($_GET['name'])) {
    $subject = 'hello hack';
    $pattern = '/hack/e';
    $replacement = $_GET['name'];
    echo preg_replace($pattern, $replacement, $subject);
} else {
    echo "服务器剩余防御：1层";
}
?>