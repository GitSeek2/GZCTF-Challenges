<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP 模拟解释器</title>
    <link rel="stylesheet" href="../assert/bootswatch/bootstrap.min.css">
    <!-- 引入Prism的CSS -->
    <link href="../assert/prism/prism.css" rel="stylesheet"/>
    <link href="../assert/override_style.css" rel="stylesheet"/>
    <link href="../assert/logo_style.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <p class="btn m-0 p-0 logo">CSSEC</p>
</nav>
<!-- 引入Prism的JavaScript -->
<script src="../assert/prism/prism.js"></script>
<div class="container mt-4">
    <div class="col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">
                <pre class="p-3" style="white-space: pre-wrap;"><code class="language-php"
                                                                      style="white-space: pre-wrap; word-wrap: break-word;"><?php
                        // 获取source.php的内容并转义HTML特殊字符
                        $code = htmlspecialchars(file_get_contents('../module/session.php'));
                        echo $code;
                        include "../module/session.php";
                        ?>
                        </code>
                    </pre>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-4 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Sonder 2024</p>
    </div>
</footer>

</body>
</html>