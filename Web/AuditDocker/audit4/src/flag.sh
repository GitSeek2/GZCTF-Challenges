#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="Sonder{135d79-ba631f65200a5f-870225232871-7af1e740}";
fi
echo $GZCTF_FLAG > /flag
echo "0hash_ext_attack0" > /key
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
