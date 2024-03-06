<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
    <title>false.php</title>
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
    <div class="progress"><div class="progress-bar progress-bar-54"><span class="progress-value">距离红包雨还有46%</span></div></div>
</body>

<script type="text/javascript" src="../assert/dimension.js"></script>
<script type="text/javascript">
    document.oncontextmenu = function () { return false };

    var a, b, c, d, e, f, g;
    a = 3.14;
    b = a * 2;
    c = a + b;
    d = c / b + a;
    e = c - d * b + a;
    f = e + d / c - b * a;
    g = f * e - d + c * b + a;
    a = g * g;
    a = Math.floor(a);

    function check() {
        if (document.getElementById("passwd").value == a) {
            window.location.href = a + ".php";
        } else {
            alert("密码错误");
            return false;
        }
    }
</script>
</html>