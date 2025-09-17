<?php
highlight_file(__FILE__);

if (isset($_GET['shell'])) {
    $shell = $_GET['shell'];
    if (strlen($shell) > 30) {
        die("error: shell length exceeded");
    }
    if (preg_match("/[A-Za-z0-9_$]/", $shell)) {
        die("error: shell not allowed");
    }
    eval($shell);
}