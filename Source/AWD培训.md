**Attack With Defense**

## 介绍

### Attack

Attack，即攻击。对网段下对方网站发起所有可能的攻击。

一般比赛时的攻击手段是对对方 CMS 的渗透攻击。

CMS（Content Management System，内容管理系统）。

### Defense

Defense，即防御。运维好自己的网站，保护好网站的服务器，保证其不崩溃。

> 一般的运维：安装系统，部署服务，处理紧急故障，为公司开发人员及其它部门提供支持。同时负责内外网的网络稳定。


AWD 中的运维：维护网站（包括网站本身正常运作，数据库完整），保护服务器，防止被渗透攻击。修补漏洞，对网站存在的漏洞进行修补。

## 流程

我们都还是新手，可能部分同学对 Linux，数据库都还不怎么熟悉，所以今天我们先不讲一般情况下得深层次防御手段以及攻击手段。我们主要是先熟悉下大致流程，了解
AWD 需要做什么。

#### 加固阶段

一般是 20-30 分钟，这个阶段不会有 flag，攻击不得分，但是可以进行一些测试。

1. 远程连接服务器（ssh，sftp）。

可直接利用 shell 管理工具进行连接。

```bash
ssh root@192.168.32.X -p <password> # ssh 远程连接主机
mysql -u<用户名> -p<密码> # mysql 登录
```

2. 修改系统密码，修改数据库密码。

```bash
passwd [user] # 修改系统密码
set password for root@localhost = password('P4ssW0rd'); # 修改数据库密码
```

3. 备份源码。

```bash
cd /var/www/html
tar -zcvf ~/html.tar.gz * # 打包网站源码并放在用户目录

rm -rf /var/www/html
tar -zxvf ~/html.tar.gz -C /var/www/html # 还原网站源码
```

4. 备份数据库。
   找数据库配置文件，从里面找密码（一般为 root/root），然后进入数据库，重新创建数据库并导入表

```bash
cd /var/www/html
find .|xargs grep "password"

cd /var/lib/mysql # 进入到MySQL库目录，根据自己的MySQL的安装情况调整目录
mysqldump -u root -p Test > Test.sql # 备份指定数据库
mysqldump -u root -p --all-databases > ~/backup.sql  # 备份所有数据库
mysqldump -u root -p --all-databases -skip-lock-tables > ~/backup.sql  # 跳过锁定的数据库表

mysql -u root -p
mysql> create database [database_name];  # 输入要还原的数据库名
mysql> use [database_name]
mysql> source backup.sql;    # source后跟备份的文件名
```

5. 扫描源码漏洞

利用 D 盾，Seay，电脑管家等工具对源码进行扫描。看看里面是否含可利用一句话木马及其他高危漏洞。

对发现的漏洞进行修复，同时针对这些漏洞编写脚本，可能有其他队没修好。

6. 扫描网段下其他存活主机并记录。
7. 上 WAF，流量监控，文件监控。

有时候赛方不希望你上太强的 WAF，通防。有的通防也会影响网站正常业务。
所以 WAF 谨慎上，流量监控和文件监控则较为重要，但由于比较难，我们先不涉及。

#### 开始阶段

刷新 flag，正式开始攻击。

5 分钟一轮，每一轮开始刷新 flag。

若有小组服务宕机，每轮开始都会进行扣分。

### 攻击手段

常见的

- 后台弱口令 yyds
- SQL 注入
- 文件上传
- CMS 历史漏洞
- 中间件漏洞（如 phpMyAdmin）
- 其他... 
