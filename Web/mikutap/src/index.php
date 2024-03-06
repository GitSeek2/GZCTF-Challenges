<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="初音未来版本的通过点击/触摸播放声音并出现变化图案的互动内容。">
  <title>Mikutap</title>
  <link rel="apple-touch-icon" href="icon.png">
  <link href="css/css.css" rel="stylesheet">
  <link charset="UTF-8" href="shared/sp/css/common.css" rel="stylesheet">
  <link charset="utf-8" href="css/mikutap.css" rel="stylesheet">
  <script charset="utf-8" src="js/jquery.min.js" type="text/javascript"></script>
  <script charset="utf-8" src="js/pixi.min.js" type="text/javascript"></script>
  <script charset="utf-8" src="js/gsap.min.js" type="text/javascript"></script>
  <script charset="UTF-8" src="shared/js/common-2.min.js" type="text/javascript"></script>
  <script charset="utf-8" src="js/mikutap.js" type="text/javascript"></script>
</head>
<body>
  <div id="view"></div>
  <?php echo file_get_contents('/flag'); ?>
  <div id="scene_top">
    <h1>Mikutap</h1>
    <div id="ng">
      <p class="atten">十分抱歉<br>您的浏览器并不支持本页面需要的特性</p>
    </div>
    <div class="ok">
      <p id="bt_start"><a href="">!开始!</a></p>
    </div>
    <p id="bt_about"><a href="">*关于*</a></p>
    <div class="ok">
      <p class="attention">※请打开声音并享受。</p>
    </div>
  </div>

  <div id="scene_loading">
    <hr size="1" color="#fff"> </div>
  <div id="scene_main">
    <div class="set">
      <p class="attention">点击 &amp; 拖动或者按任意键!</p>
      <p id="bt_feedback"><a href="">反馈: 开启</a></p>
      <p id="bt_backtrack"><a href="">背景音乐: 开启</a></p>
    </div>
  </div>
  <div id="about_cover"></div>
  <div id="about">
    <div id="about_in">
      <p class="close"><span id="bt_close">×</span></p>
      <p class="con"> 声音来源 <a href="https://ec.crypton.co.jp/pages/prod/vocaloid/mikuv4x" target="_blank">Hatsune Miku</a> </p>
      <p class="con"> 作者 <a href="https://aidn.jp" target="_blank">daniwell</a> (<a href="https://twitter.com/daniwell_aidn" target="_blank">twitter</a>) </p>
      <p class="link"> 灵感来源 <a href="http://patatap.com/" target="_blank">Patatap</a><br>(令人赞叹的网页!)</p>
    </div>
  </div>
  <div id="bt_back">＜返回</div>
  <div id="bt_fs">□全屏显示</div>
</body>
</html>
