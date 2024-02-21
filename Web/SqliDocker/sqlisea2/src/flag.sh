#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="Sonder{911921841a856fc1a830dfec6e18bca2}"
fi
mysql -e "CREATE DATABASE IF NOT EXISTS CSSEC;USE CSSEC;CREATE TABLE IF NOT EXISTS error_injection(\`flag\` varchar(100) NOT NULL) ENGINE=MyISAM  DEFAULT CHARSET=utf8;INSERT INTO error_injection(\`flag\`) VALUES ('$GZCTF_FLAG');" -uroot -proot

# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
