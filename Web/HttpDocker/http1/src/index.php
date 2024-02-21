<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="assert/logo_style.css" rel="stylesheet">
    <link href="assert/override_style.css" rel="stylesheet">
    <link href="assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Index</title>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Blog</a>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <h4 class="card-title">HTTP协议</h4>
                    <div class="card-text">
                        <?php
                        include "module/md.php";
                        $post = getPost('source/HTTP.md', 20);
                        echo $post;
                        ?>
                    </div>
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
                <button class="btn btn-dark m-3 text-white-50" onclick="window.location.href='post/post.php'">
                    点击前往查看FLAG的页面
                </button>
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