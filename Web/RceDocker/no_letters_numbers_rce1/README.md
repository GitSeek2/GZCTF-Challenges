题目名：
[RCE] 无字母数字RCE

介绍：

项目名：
no_letters_numbers_rce1

镜像名：
sonder39/web_no_letters_numbers_rce1

构建：
docker build -t sonder39/web_no_letters_numbers_rce1 .

运行：
docker run -p 8080:80 -e GZCTF_FLAG=flag{b8ddc4d2a6447d86fb34c64b879d2c33} sonder39/web_no_letters_numbers_rce1
