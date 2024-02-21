<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="../assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="../assert/logo_style.css" rel="stylesheet">
    <link href="../assert/override_style.css" rel="stylesheet">
    <link href="../assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="btn btn-dark text-white-50 font-weight-bold" onclick="window.location.href='../index.php'">首页
    </button>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <div class="card-text">
                        <p class="text-white-50">
                            最近爬虫的狂欢让服务器不堪重负😣，于是Sonder设置了一些校验来限制猖狂的爬虫。</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                参数要求host=cs, port=sec
                                <span class="badge bg-primary rounded-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                只接受POST请求访问，表单数据要求target=2024
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                只允许Chromium访问
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                需要admin权限
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                只允许110.191.22.76访问
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <?php
                    include "../module/http.php";
                    error_reporting(0);
                    $ret = getCheck();
                    echo $ret;
                    ?>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
                </div>
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