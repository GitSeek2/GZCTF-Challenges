<!doctype html>
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
                    include 'module/Check.php';
                    $parsedown = new Parsedown();
                    $lines = explode("\n", file_get_contents('source/python爬虫.md'));
                    $markdownContent = implode("\n", array_slice($lines, 0, 30));
                    echo $parsedown->text($markdownContent);
                    ?>
                    <button class="btn btn-dark" onclick="window.location.href='post/post.php?page=1'">查看文章详细内容
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- 图片块 -->
            <div class="card my-4">
                <p class="logo">CSSEC</p>
            </div>
            <!-- 搜索框块 -->
            <div class="card my-4">
                <h5 class="card-header">查看文章</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="input page number(1~1000000)"
                               onkeydown="if(event.keyCode===13) search();">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" onclick="search()">Go</button>
                        </div>
                    </div>
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

<script>
    function search() {
        const page = document.getElementById('search').value;
        if (page >= 1 && page <= 1000000) {
            window.location.href = 'post/post.php?page=' + page;
        } else {
            alert('Invalid page number');
        }
    }
</script>
</body>
</html>