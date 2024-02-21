<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="../assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="../assert/logo_style.css" rel="stylesheet">
    <link href="../assert/padding_style.css" rel="stylesheet">
    <link href="../assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">首页</a>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card bg-dark text-white-50 mb-4">
                <div class="card-body">
                    <h5 class="text-info">服务器检测通过即可查看文章内容</h5>
                    <p>可选字典：https://github.com/first20hours/google-10000-english</p>
                </div>
            </div>
            <div class="card bg-dark text-white-50 mb-4">
                <div class="card-body">
                    <?php
                    include "../jwt.php";
                    if (!isset($_COOKIE['token'])) {
                        echo "<p class='text-white-50'>检测到token为空, 可能需要刷新一下浏览器😣</p>";
                    } else {
                        echo validateToken();
                    }
                    ?>
                    <button class="btn btn-dark text-white-50" onclick="window.location.href='../index.php'">回到首页
                    </button>
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