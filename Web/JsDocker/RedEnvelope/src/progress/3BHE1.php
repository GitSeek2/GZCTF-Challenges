<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
    <link rel="stylesheet" type="text/css" href="../assert/progress.css">
    <link rel="stylesheet" type="text/css" href="../assert/red-envelope.css">
    <title>3BHE1.php</title>
</head>

<body>
    <div><h1 id="title">HappyNewYearCTF <span class="year">2024</span></h1></div>
    <h2>新年快乐🎉️🎉️🎉️这是给你的FLAG</h2>
    <div class="progress"><div class="progress-bar progress-bar-100"><span class="progress-value">红包雨来啦，点击红包获取FLAG</span></div></div>
</body>

<script>
    let createRedEnvelopeInterval;

    function createRedEnvelope() {
        const redEnvelope = document.createElement('div');
        redEnvelope.className = 'red-envelope';
        redEnvelope.style.left = Math.random() * 100 + 'vw';
        redEnvelope.style.animationDuration = (Math.random() * 2 + 2)*2 + 's';
        document.body.appendChild(redEnvelope);

        redEnvelope.addEventListener('click', function() {
            // 发送 AJAX 请求
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '../327a6c4304ad5938eaf0efb6cc3e53dc.php');
            xhr.send();

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // 输出执行结果
                    const result = document.createElement('div');
                    result.textContent = xhr.responseText;
                    document.body.appendChild(result);

                    // 停止红包雨特效
                    clearInterval(createRedEnvelopeInterval);
                }
            };

            // 移除所有红包
            const redEnvelopes = document.querySelectorAll('.red-envelope');
            redEnvelopes.forEach(function(envelope) {
                document.body.removeChild(envelope);
            });
        });

        setTimeout(function() {
            document.body.removeChild(redEnvelope);
        }, 4000);
    }

    createRedEnvelopeInterval = setInterval(createRedEnvelope, 200);
</script>

</html>