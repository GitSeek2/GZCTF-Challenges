#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="flag{Can_level11_s_Phar_be_s0_easy?}";
fi
echo "<?php" > ./flag.php
echo '$flag="'$GZCTF_FLAG'";' >> ./flag.php

# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
