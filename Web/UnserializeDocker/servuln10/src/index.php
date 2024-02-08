<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP 模拟解释器</title>
    <link rel="stylesheet" href="assert/bootswatch/bootstrap.min.css">
    <!-- 引入Prism的CSS -->
    <link href="assert/prism/prism.css" rel="stylesheet"/>
    <link href="assert/override_style.css" rel="stylesheet"/>
    <link href="assert/logo_style.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <p class="btn m-0 p-0 logo">CSSEC</p>
</nav>
<!-- 引入Prism的JavaScript -->
<script src="assert/prism/prism.js"></script>
<div class="container mt-4">
    <div class="card mt-5 mb-5">
        <div class="card-header pt-0 pb-0">
            <p class="btn text-white-50 m-0">[+]模拟代码解释器</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="text-info ms-3 m-1">源码</h4>
                    <pre class="p-3" style="white-space: pre-wrap;"><code class="language-php"
                                                                          style="white-space: pre-wrap; word-wrap: break-word;"><?php
                            // 获取source.php的内容并转义HTML特殊字符
                            $code = htmlspecialchars(file_get_contents('module/source.php'));
                            echo $code;
                            ?>
                        </code>
                    </pre>
                    <pre class="p-3" style="white-space: pre-wrap;"><code class="language-php"
                                                                          style="white-space: pre-wrap; word-wrap: break-word;"><?php
                            // 获取source.php的内容并转义HTML特殊字符
                            $code = htmlspecialchars(file_get_contents('module/upload.php'));
                            echo $code;
                            ?>
                        </code>
                    </pre>
                </div>
                <div class="col-md-4">
                    <h4 class="text-info m-1">文件上传接口</h4>
                    <div class="card-body">
                        <form action="post/upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                            <button type="submit" class="btn btn-dark">上传</button>
                        </form>
                    </div>
                    <h4 class="text-info m-1">输出</h4>
                    <pre class="p-3" style="white-space: pre-wrap;"><code class="language-php"
                                                                          style="white-space: pre-wrap; word-wrap: break-word;"><?php
                            include 'module/source.php';
                            ?>
                        </code>
                    </pre>
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