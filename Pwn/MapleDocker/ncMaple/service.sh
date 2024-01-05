#!/bin/sh
# Add your startup script
if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="Sonder{01010101}";
fi

echo $GZCTF_FLAG >> /home/ctf/.flag
echo "flag is hidden in there" >> /home/ctf/hint
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0

# DO NOT DELETE
/etc/init.d/xinetd start;
sleep infinity;
