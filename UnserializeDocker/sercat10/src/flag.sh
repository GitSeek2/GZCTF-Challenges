#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="no_flag";
fi
echo $GZCTF_FLAG > /flag
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0