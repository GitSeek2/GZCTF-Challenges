<?php
include "../module/md.php";
function getCheck()
{
    $method = $_SERVER['REQUEST_METHOD'];
    $xClientIP = isset($_SERVER['HTTP_X_CLIENT_IP']) ? $_SERVER['HTTP_X_CLIENT_IP'] : null;
    $xForwardedFor = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null;
    $xRealIP = isset($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : null;
    $clientIP = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : null;
    $via = isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_VIA'] : null;

    $ret = '';
    $flag = 0;

    if ($method === 'POST') {
        $ret = '<p class="text-success">当前HTTP请求方法： POST <p>' . $ret;
        $ret .= '<p>Step 1 satisfied</p>';
        $flag += 1;
    } else {
        $ret .= '<p class="text-danger">当前HTTP请求方法： ' . $method . '</p>';
    }

    if ($xForwardedFor !== null) {
        $ret .= "<p>不检测X-Forwarded-For</p>";
    } elseif ($xRealIP !== null) {
        $ret .= "<p>不检测X-Real-IP</p>";
    } elseif ($clientIP !== null) {
        $ret .= "<p>不检测Client-IP</p>";
    } elseif ($xClientIP !== null) {
        if ($xClientIP === '110.191.22.73' || $xClientIP === '110.191.22.79' || $xClientIP === '110.191.22.113') {
            $ret .= '<p>Step 2 satisfied</p>';
            $flag += 1;
        } else {
            $ret .= '<p class="text-danger">服务器认为你的IP为：' . $xClientIP . '</p>';
        }
    } else {
        $ret .= '<p class="text-warning">服务器无法识别到你的IP</p>';
    }

    if ($via !== null) {
        if (strpos($via, '1.0 lutalica.time (Squid 3.1)') !== false) {
            $ret .= '<p>Step 3 satisfied</p>';
            $flag += 1;
        } else {
            $ret .= '<p class="text-danger">服务器认为你的代理服务器为：' . $via . '</p>';
        }
    } else {
        $ret .= '<p class="text-warning">服务器无法识别到你的代理服务器</p>';
    }

    if ($flag === 3) {
        $get_flag = file_get_contents('/flag');
        $post = getPostAll('../source/HTTP.md');
        $ret .= "<p class='text-success'>Brilliant! Now I give you flag: " . $get_flag . "</p><br>" . $post;

    }
    return $ret;
}