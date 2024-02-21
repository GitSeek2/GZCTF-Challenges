<?php
if (!isset($_COOKIE['auth'])) {
    setcookie('auth', 'guest');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <!-- 引入 highlight.js 的 CSS -->
    <link href="assert/highlight/atom-one-dark.css" rel="stylesheet">
    <link href="assert/logo_style.css" rel="stylesheet">
    <link href="assert/override_style.css" rel="stylesheet">
    <title>Sonder Blog - Index</title>
</head>
<script src="assert/highlight/highlight.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Blog</a>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <?php
                    require 'vendor/autoload.php';
                    $parsedown = new Parsedown();
                    $lines = explode("\n", file_get_contents('source/XXE攻击.md'));
                    $markdownContent = implode("\n", array_slice($lines, 0, 27));
                    echo $parsedown->text($markdownContent);
                    ?>
                    <button class="btn btn-dark" onclick="window.location.href='post/post.php'">查看文章详细内容
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card my-4">
                <p class="logo">CSSEC</p>
            </div>
            <div class="card my-4">
                <p class="m-3 text-white-50">
                    信息安全组，简称信安组，也称 CSSEC，是四川师范大学IT培优项目下编程组所属的一个学习小组。
                    小组致力于在川师计科学院营造良好的网络安全 & CTF 学习氛围。
                </p>
            </div>
        </div>
    </div>
</div>
<footer class="py-4 bg-dark mt-5 mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Sonder Blog 2024</p>
    </div>
</footer>
</body>
</html>