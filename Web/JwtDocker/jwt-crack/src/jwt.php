<?php
include "module/md.php";
include 'vendor/autoload.php';

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;

function generateToken()
{
    if (!isset($_COOKIE['token'])) {
        $key = 'happy';                             //秘钥:自定义
        $payload = array(
            'iss' => 'Sonder Token Builder',      //签发人(官方字段:非必需)
            'aud' => 'ctf.seek2.top',             //受众(官方字段:非必需)
            'iat' => time(),                      //签发时间
            'nbf' => time(),                      //生效时间，立即生效
            'exp' => time() + 60,                 //过期时间，60s
            'username' => 'cssec',                //自定义字段
        );
        $keyId = "keyId";
        $jwt = JWT::encode($payload, $key, 'HS256', $keyId);
        setcookie('token', $jwt);
    }
}

function validateToken()
{
    $html = "";
    try {
        if (isset($_COOKIE['token'])) {
            $jwt = $_COOKIE['token'];
            $key = new Key('happy', 'HS256');
            $decode = JWT::decode($jwt, $key);
            if ($decode->username === 'Sonder') {
                $now = time();
                if ($now >= $decode->nbf && $now <= $decode->exp) {
                    $html .= "<p class='text-success'>" . file_get_contents('/flag') . "</p><br>";
                    $post = getPostAll('../source/jwt.md');
                    $html .= $post;
                }
            } else {
                $html .= "服务器检测到你不是用户Sonder<br>";
                $html .= "签发人: " . $decode->iss . "<br>";
                $html .= "受众: " . $decode->aud . "<br>";
                $html .= "用户: " . $decode->username . "<br>";
            }
        }
    } catch (ExpiredException $e) {
        $html .= "真遗憾！token似乎失效了。当前时间：" . date("Y-m-d H:i:s", time()) . "<br>";
    } catch (SignatureInvalidException|Exception $e) {
        $html .= 'Caught exception: ' . $e->getMessage() . "\n";
    }
    return $html;
}

?>