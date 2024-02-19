# GZCTF-Challenges

为基于GZ::CTF平台搭建的 CSSEC::CTF 比赛提供构建题目镜像的Dockerfile以及源码🎉️🎉️🎉️

在每道题目中可以使用动态FLAG. 如果不想使用动态FLAG，需要修改`flag.sh` or `service.sh`中的对应代码。
如果找不到`flag.sh` or `service.sh`，意味着这道题目使用静态FLAG。

## 文件结构

文件结构如下:

* [题目根目录]
    * src/: 题目源码。
    * pwn.xinetd: 将用户和靶机环境隔离开并在特定端口提供服务，pwn题使用。
    * Dockerfile: 用于构建镜像。
    * /flag.sh or /service.sh: Docker的入口文件以及提供动态FLAG。

## 构建

1. 构建镜像: `docker build -t [用户名]/[镜像名] .`, 注意最后有` .`。
2. 推送镜像: `docker push [用户名]/[镜像名]`。