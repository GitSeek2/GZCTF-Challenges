#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="Sonder{135d79-ba631f65200a5f-870225232871-7af1e740}";
fi
GZCTF_FLAG=$(echo -n "$GZCTF_FLAG" | base64)
echo "$GZCTF_FLAG" > /flag
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
