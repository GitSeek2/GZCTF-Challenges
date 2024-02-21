<!Doctype html>
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
        <div class="col-md-10">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                <?php
                require '../vendor/autoload.php';
                $parsedown = new Parsedown();
                $markdownContent = file_get_contents('../source/XXE攻击.md');
                echo $parsedown->text($markdownContent);
                ?>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <p class="card-title text-info">评论区</p>
                    <div class="card-text">
                        <textarea id="comment" class="form-control bg-dark text-white w-100"
                                  style=" resize: none;height: 150px;" placeholder="输入你的评论"></textarea>
                    </div>
                    <div class="card-footer">
                        <button id="submitComment" class="btn btn-primary mt-auto">发布评论</button>
                    </div>
                </div>
                <div class="row ms-2">
                    <?php include '../module/comment.php'; ?>
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
<script>
    document.getElementById('submitComment').addEventListener('click', function () {
        let comment = document.querySelector('textarea').value;
        if (comment === '') comment = 'null';
        const xml = '<comment><username>guest</username><text>' + comment + '</text></comment>';

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../module/XXE.php', true);
        xhr.setRequestHeader('Content-Type', 'text/xml');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                location.reload();
            }
        };
        xhr.send(xml);
    });
</script>
</html>