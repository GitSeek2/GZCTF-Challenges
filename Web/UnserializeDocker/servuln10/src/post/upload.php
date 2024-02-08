<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="../assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="../assert/override_style.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>

<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="btn btn-dark text-white-50 font-weight-bold" onclick="window.location.href='../index.php'">首页
    </button>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                        </div>
                        <button type="submit" class="btn btn-dark text-white-50 font-weight-bold">上传/重新上传</button>
                    </form>
                    <?php include "../module/upload.php"; ?>
                    <div class="card-footer text-right">
                        <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="py-4 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Your Blog 2024</p>
    </div>
</footer>

</body>
</html>