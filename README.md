# GZCTF-Challenges

[English](https://github.com/GitSeek2/GZCTF-Challenges/blob/main/README.md)
[简体中文](https://github.com/GitSeek2/GZCTF-Challenges/blob/main/README-zh.md)

Dockerfile & Source Code for CSSEC::CTF challenge based GZ::CTF to build docker image🎉️🎉️🎉️

In each category we use GZCTF's dynamic FLAG. If you don't want to use dynamic FLAG, please edit the `flag.sh` or `service.sh` file and
remove the corresponding lines. If `flag.sh` or `service.sh` don't exist, means it's static FLAG.

## File structure

The template file structure would be like:

* [category]
    * src/: source code of the application or front/backend of the web server.
    * pwn.xinetd: multi-end service initializer, create different environment for different users.
    * Dockerfile: main setup file for the category, add or remove function accordingly.
    * /flag.sh or /service.sh: entry point of Dockerfile and dynamic FLAG setup.

## Build

1. Build and tag the image: `docker build -t [your-username]/[image-name] .`, be aware the dot in the end.
2. Push the image: `docker push [your-username]/[image-name]`.