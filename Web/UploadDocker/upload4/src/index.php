<!Doctype html>
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
    <a class="navbar-brand" href="#">Blog</a>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <div class="card-text">
                        <?php
                        require 'vendor/autoload.php';
                        $parsedown = new Parsedown();
                        $lines = explode("\n", file_get_contents('source/文件上传.md'));
                        $markdownContent = implode("\n", array_slice($lines, 0, 24));
                        echo $parsedown->text($markdownContent);
                        ?>
                    </div>
                    <button class="btn btn-dark" onclick="window.location.href='post/文件上传.html'">查看文章详细内容
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- logo -->
            <div class="card my-4">
                <p class="logo">CSSEC</p>
            </div>
            <div class="card my-4">
                <p class="m-3 text-white-50">
                    信息安全组，简称信安组，也称CSSEC，是四川师范大学IT培优项目下编程组所属的一个学习小组。
                    小组致力于在川师计科学院营造良好的网络安全 & CTF 学习氛围。
                </p>
            </div>
            <!-- 文件上传块 -->
            <div class="card my-4">
                <h5 class="card-header">上传文章</h5>
                <div class="card-body">
                    <form action="module/upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                        </div>
                        <button type="submit" class="btn btn-dark">上传</button>
                    </form>
                </div>
            </div>
            <div class="card my-4">
                <h5 class="card-header">文章列表</h5>
                <?php
                include "module/list.php";
                echo getPostList();
                ?>
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