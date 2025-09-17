<?php
$key = getKey();
$hash = md5($key . "jwt" . "data");
echo "已知: \$data = 'data'\n";
echo "已知哈希值: " . $hash . "\n";
echo "已知密钥长度: " . strlen($key) . "\n";