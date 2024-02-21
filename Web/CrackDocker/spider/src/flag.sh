#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="Sonder{135d79-ba631f65200a5f-870225232871-7af1e740}";
fi
echo $GZCTF_FLAG > /flag
# 生成一个在 [100, 1000] 范围内的随机数
num=$((RANDOM % 901 + 100))
# 将随机数写入到 /num.txt 文件中
echo $num > /num.txt
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
