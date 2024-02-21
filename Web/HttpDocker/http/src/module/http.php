<?php
include "../module/md.php";
function getCheck()
{
    $method = $_SERVER['REQUEST_METHOD'];
    $host = isset($_GET['host']) ? $_GET['host'] : null;
    $port = isset($_GET['port']) ? $_GET['port'] : null;
    $target = isset($_POST['target']) ? $_POST['target'] : null;
    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
    $auth = isset($_COOKIE['auth']) ? $_COOKIE['auth'] : null;
    $xForwardedFor = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null;
    $xClientIP = isset($_SERVER['HTTP_X_CLIENT_IP']) ? $_SERVER['HTTP_X_CLIENT_IP'] : null;
    $xRealIP = isset($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : null;
    $clientIP = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : null;

    $ret = '';
    $flag = 0;

    if ($method === 'POST') {
        $ret .= '<p class="text-success">当前HTTP请求方法： ' . $method . '<p>';

        if ($host != null && $port != null) {
            if ($host === 'cs') {
                if ($port === 'sec') {
                    $ret .= '<p>Step 1 satisfied</p>';
                    $flag += 1;
                } else $ret .= '<p class="text-warning">服务器检测到参数port不正确</p>';
            } else $ret .= '<p class="text-warning">服务器检测到参数host不正确</p>';
        } else {
            if ($host === null) $ret .= '<p class="text-danger">服务器未接收到参数port</p>';
            if ($port === null) $ret .= '<p class="text-danger">服务器未接收到参数host</p>';
        }

        if ($target != null) {
            if ($target === '2024') {
                $ret .= '<p>Step 2 satisfied</p>';
                $flag += 1;
            } else $ret .= '<p class="text-warning">服务器检测到表单参数target不正确</p>';
        } else $ret .= '<p class="text-danger">服务器未接收到表单数据target</p>';
    } else {
        $ret .= '<p class="text-danger">当前HTTP请求方法： ' . $method . '</p>';
    }

    if ($userAgent !== null) {
        if (strpos($userAgent, 'Chromium') !== false) {
            $ret .= '<p>Step 3 satisfied</p>';
            $flag += 1;
        } else {
            $ret .= '<p class="text-warning">服务器检测到你的客户端为：' . $userAgent . '</p>';
        }
    } else {
        $ret .= '<p class="text-danger">服务器未检测到你的客户端软件</p>';
    }


    if ($auth !== null) {
        if ($auth === 'admin') {
            $ret .= '<p>Step 4 satisfied</p>';
            $flag += 1;
        } else {
            $ret .= '<p class="text-warning">服务器检测到当前用户权限不足</p>';
        }
    } else {
        $ret .= '<p class="text-danger">服务器检测到当前用户无权限</p>';
    }

    if ($xClientIP !== null) {
        $ret .= "<p>不检测X-Client-IP</p>";
    } elseif ($xRealIP !== null) {
        $ret .= "<p>不检测X-Real-IP</p>";
    } elseif ($clientIP !== null) {
        $ret .= "<p>不检测Client-IP</p>";
    } elseif ($xForwardedFor !== null) {
        if ($xForwardedFor === '110.191.22.76') {
            $ret .= '<p>Step 5 satisfied</p>';
            $flag += 1;
        } else {
            $ret .= '<p class="text-warning">服务器检测到你的IP为：' . $xForwardedFor . '</p>';
        }
    } else {
        $ret .= '<p class="text-danger">服务器无法识别到你的IP</p>';
    }

    if ($flag === 5) {
        $get_flag = file_get_contents('/flag');
        $post = getPostAll('../source/HTTP.md');
        $ret .= "<p class='text-success'>Brilliant! Now I give you flag: " . $get_flag . "</p><br>" . $post;

    }
    return $ret;
}