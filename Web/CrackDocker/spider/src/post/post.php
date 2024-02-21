<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="../assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <!-- 引入 highlight.js 的 CSS -->
    <link href="../assert/highlight/atom-one-dark.css" rel="stylesheet">
    <link href="../assert/logo_style.css" rel="stylesheet">
    <link href="../assert/override_style.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>
<script src="../assert/highlight/highlight.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">首页</a>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <h5 class="text-info">或许这篇文章藏了个flag，如果你的page参数正确的话</h5>
                    <?php
                    require '../vendor/autoload.php';
                    include '../module/Check.php';
                    if (Check()) {
                        $parsedown = new Parsedown();
                        $markdownContent = file_get_contents('../source/python爬虫.md');
                        echo $parsedown->text($markdownContent);
                    }
                    ?>
                    <button class="btn btn-dark" onclick="window.location.href='../index.php'">回到首页</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="py-4 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Sonder Blog 2024</p>
    </div>
</footer>
</body>
</html>