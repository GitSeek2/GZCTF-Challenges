题目名：
[SSTI] 无回显SSTI

介绍：

项目名：
no_echo_ssti

镜像名：
sonder39/web_no_echo_ssti

构建：
docker build -t sonder39/web_no_echo_ssti .

运行：
docker run -p 8080:8080 -e GZCTF_FLAG=flag{b8ddc4d2a6447d86fb34c64b879d2c33} sonder39/web_no_echo_ssti
