<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
    <link rel="stylesheet" type="text/css" href="../assert/progress.css">
    <title>js.php</title>
</head>
<body>
    <div>
        <h1 id="title">HappyNewYearCTF <span class="year">2024</span></h1>
    </div>
    <div class="Button">
        <p>
            <input class="in" type="text" id="passwd" value="" placeholder="请输入口令：">
            <input class="submit" type="button" onClick="check()" value="提交">
        </p>
    </div>
    <div class="progress"><div class="progress-bar progress-bar-36"><span class="progress-value">距离红包雨还有64%</span></div></div>
</body>
<script type="text/javascript">
    function check() {
        if (document.getElementById('passwd').value == "  ") {
            window.location.href = "false.php";
        } else {
            alert("密码错误");
        }
    }
</script>
<script src="../assert/dimension.js"></script>
</html>