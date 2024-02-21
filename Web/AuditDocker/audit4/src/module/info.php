<?php
$key = getKey();
$hash = md5($key . "jwt" . "data");
echo "已知初始数据：data\n";
echo "已知哈希值: " . $hash . "\n";
echo "已知密钥长度: " . strlen($key) . "\n";