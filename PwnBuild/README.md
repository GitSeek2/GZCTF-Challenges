# PwnBuild

## About
    一个简易的快速创建制作简单Pwn题Docker镜像的python脚本，/src目录下为模板文件，脚本build.py只是代替复制模板文件，并修改模板文件的内容而已，模板内容来自giantbranch/pwn_deploy_chroot。

## Usage
`--path`选项，指定在创建新目录的路径，`--file`选项，指定pwn程序名，同时作为创建的新目录目录名。

eg. 在`D:\MapleDocke`目录下创建一个`ncMaple`目录，然后把准备的pwn程序放入bin目录下就可以构建Docker镜像了。
```
python .\build.py --path=D:\MapleDocker --file=ncMaple
```

`--help`选项，帮助文件
```
python .\build.py --help
usage: build.py [-h] [--path PATH] [--file FILE]

options:
  -h, --help   show this help message and exit
  --path PATH  指定父目录路径
  --file FILE  pwn程序名
```


## Reference
https://githubfast.com/giantbranch/pwn_deploy_chroot