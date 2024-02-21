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
    <button class="btn btn-dark text-white-50 font-weight-bold" onclick="window.location.href='../index.php'">首页
    </button>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                    </div>
                    <button type="submit" class="btn btn-dark text-white-50 font-weight-bold">上传/重新上传</button>
                </form>
                <?php
                include "check.php";
                include "save.php";

                $target_dir = "../uploads/";// 指定上传文件的路径
                $fileUpload = $_FILES["fileUpload"];
                $filename = basename($fileUpload["name"]);
                $target_path = $target_dir . $filename;
                $file_format = pathinfo($target_path, PATHINFO_EXTENSION);

                if (checkFileUpload($fileUpload, $target_path)) {
                    if (checkFileType($fileUpload, $file_format)) {
                        // 尝试将文件上传到服务器
                        if (move_uploaded_file($fileUpload["tmp_name"], $target_path)) {
                            echo "<h5 class='text-success'> 文件 " . htmlspecialchars($filename) . " 已经上传。</h5><br>";
                            echo "<h5 class='text-success'> 文件路径: " . str_replace('../', '', $target_path) . "</h5><br>";

                            /*动态生成一个新文件*/
                            $post_name = pathinfo($fileUpload["name"], PATHINFO_FILENAME); // 获取上传的文件名（不包括扩展名）
                            $post_path = '../post/' . $post_name . '.html';// 将文件名的后缀替换为.html
                            writeFile($post_path, $target_path);
                            echo showContent($target_path);
                        } else {
                            echo "<h5 class='text-danger'>对不起，上传文件时出现了错误。" . "</h5><br>";
                        }
                    } else {
                        echo "<h5 class='text-success'>只允许上传 jpeg/png/gif 和markdown文件；</h5><br>";
                    }
                }
                ?>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
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