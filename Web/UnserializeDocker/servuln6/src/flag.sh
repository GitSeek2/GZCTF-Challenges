#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="flag{level6_Is_yue_lai_yue_fu_yan}";
fi
echo "<?php" > ./flag.php
echo '$flag="'$GZCTF_FLAG'";' >> ./flag.php
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
