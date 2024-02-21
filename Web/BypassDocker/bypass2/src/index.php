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

<div class="container mt-4">
    <div class="card mt-5 mb-5">
        <div class="card-header pt-0 pb-0">
            <p class="btn text-white-50 m-0">[+]设备信息</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" id="list">
                    <?php include "module/list.php"; ?>
                </div>
                <div class="col-md-auto">
                    <form>
                        <label>
                            <input type="text" class="form-control bg-dark text-white" placeholder="127.0.0.1">
                        </label>
                        <button id="submit" class="btn btn-primary mb-1">检测</button>
                    </form>
                    <pre class="p-3" style="white-space: pre-wrap;"><code class="language-php"
                                                                          style="white-space: pre-wrap; word-wrap: break-word;"><?php
                            include 'module/ping.php';
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
<!-- 引入Prism的JavaScript -->
<script src="assert/prism/prism.js"></script>
<!--引入Jquery的JavaScript-->
<script src="assert/jquery/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $.get('module/ping.php', function (data) {
            $('#list').load('module/list.php');
        });

        $("form").submit(function (e) {
            e.preventDefault();
            const ip = $("input").val();
            window.location.href = "index.php?ip=" + ip;
        });
    });
</script>
</body>
</html>