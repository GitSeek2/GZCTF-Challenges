#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG=flag{level1_is_over_come_0n}
fi
echo $GZCTF_FLAG > ./flag.php
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
