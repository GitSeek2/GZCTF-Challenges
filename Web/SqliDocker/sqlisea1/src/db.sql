-- Host: 127.0.0.1    Database: cssec
-- ------------------------------------------------------
-- Server version	5.7.26

CREATE DATABASE IF NOT EXISTS CSSEC;
USE CSSEC;

--
-- Table structure for table `member`
--

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member`
(
    `id`          int(11)  NOT NULL AUTO_INCREMENT,
    `name`        char(30) NOT NULL,
    `advantage`   char(30) NOT NULL,
    `avatar_path` text,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 231110
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member`
    DISABLE KEYS */;
INSERT INTO `member`
VALUES (221101, 'clear', 'web/env', NULL),
       (221102, 'y1shin', 'misc', NULL),
       (221103, 'Sonder', 'flag in CSSEC.union_injection', 'assert/avatar/Sonder.png'),
       (221104, 'br0ken', 'web/misc/awd', NULL),
       (221105, '小k', '渗透', NULL),
       (221106, 'zhajiangmian', 'misc', NULL),
       (221107, '12_Hours', 'pwn', NULL),
       (221108, 'Raphael', 'web', NULL),
       (231101, '忽晚', 'null', NULL);
/*!40000 ALTER TABLE `member`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platform`
--

DROP TABLE IF EXISTS `platform`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platform`
(
    `pid`         int(11) NOT NULL AUTO_INCREMENT,
    `pname`       char(30)  DEFAULT NULL,
    `url`         char(60)  DEFAULT NULL,
    `description` char(200) DEFAULT NULL,
    PRIMARY KEY (`pid`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platform`
--

LOCK TABLES `platform` WRITE;
/*!40000 ALTER TABLE `platform`
    DISABLE KEYS */;
INSERT INTO `platform`
VALUES (1, 'CSSEC::CTF', 'https://ctf.seek2.top', '平台用于信安组组内 CTF & AWD 练习'),
       (2, 'CSSEC Wiki', 'https://www.yuque.com/cssec/wiki',
        '信安组的成立旨在为川师的同学们提供良好的网络安全与 CTF 的学习 & 竞赛氛围。'),
       (3, 'GitSeek2', 'https://githubfast.com/GitSeek2', 'github仓库');
/*!40000 ALTER TABLE `platform`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vulnerability`
--

DROP TABLE IF EXISTS `vulnerability`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vulnerability`
(
    `vid`      int(11) NOT NULL AUTO_INCREMENT,
    `vname`    char(30)  DEFAULT NULL,
    `class`    char(30)  DEFAULT NULL,
    `pre_node` char(30)  DEFAULT NULL,
    `about`    char(200) DEFAULT NULL,
    PRIMARY KEY (`vid`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 21
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vulnerability`
--

LOCK TABLES `vulnerability` WRITE;
/*!40000 ALTER TABLE `vulnerability`
    DISABLE KEYS */;
INSERT INTO `vulnerability`
VALUES (1, 'SQL注入漏洞', 'web', '数据库/SQL语句',
        'SQL注入漏洞是通过操作输入来修改SQL语句，用以达到执行代码对WEB服务器进行攻击的方法。'),
       (2, '反序列化漏洞', 'web', '类和对象/序列化',
        '攻击者控制了序列化后的数据，将有害数据传递到应用程序代码中，发动针对应用程序的攻击。'),
       (3, '文件上传漏洞', 'web', '远控木马',
        '文件上传漏洞是指由于程序员在对用户文件上传部分的控制不足或者处理缺陷，而导致的用户可以越过其本身权限向服务器上上传可执行的动态脚本文件。'),
       (4, '命令执行漏洞', 'web', 'linux命令',
        '命令执行漏洞是指服务器没有对执行的命令进行过滤，用户可以随意执行系统命令'),
       (5, '文件包含漏洞', 'web', '伪协议', '文件包含漏洞是指输入一段用户能够控制的脚本或者代码，并让服务端执行。'),
       (6, 'XSS漏洞', 'web', 'javascript',
        'XSS漏洞，即跨站脚本攻击，是指往Web页面里插入恶意Script代码，当用户浏览该页面时，嵌入Web里面的Script代码会被执行，从而达到恶意攻击用户的目的'),
       (7, 'SSRF漏洞', 'web', 'http协议/file协议',
        'SSRF漏洞，即服务端请求伪造，是一种由攻击者构造形成由服务器端发起请求的漏洞。一般情况下，SSRF 攻击的目标是从外网无法访问的内部系统。'),
       (8, 'HASH长度拓展攻击', 'web', 'HASH的生成机制',
        'HASH长度拓展攻击是指由于HASH的生成机制原因，使得我们可以人为的在原先明文数据的基础上添加新的拓展字符，使得原本的加密链变长，进而控制加密链的最后一节，使得我们得以控制最终结果'),
       (9, 'CSRF漏洞', 'web', 'HTML/JSON/Flash',
        'CSRF，即跨站请求伪造。很容易将它与 XSS 混淆，对于 CSRF，其两个关键点是跨站点的请求与请求的伪造，由于目标站无 token 或 referer 防御，导致用户的敏感操作的每一个参数都可以被攻击者获知，攻击者即可以伪造一个完全一样的请求以用户的身份达到恶意目的。'),
       (10, '信息搜集', 'misc', '', NULL),
       (11, '编码分析', 'misc', NULL, NULL),
       (12, '图片分析', 'misc', NULL,
        '图像文件有多种复杂的格式，可以用于各种涉及到元数据、信息丢失和无损压缩、校验、隐写或可视化数据编码的分析解密'),
       (13, '音频隐写', 'misc', NULL, NULL),
       (14, '流量包分析', 'misc', NULL, NULL),
       (15, '磁盘内存分析', 'misc', NULL, NULL),
       (16, 'Stack Overflow', 'pwn', NULL,
        '栈溢出指的是程序向栈中某个变量中写入的字节数超过了这个变量本身所申请的字节数，因而导致与其相邻的栈中的变量的值被改变。'),
       (17, 'Format String', 'pwn', NULL,
        '格式化字符串函数是根据格式化字符串来进行解析的 。那么相应的要被解析的参数的个数也自然是由这个格式化字符串所控制'),
       (18, 'Format String', 'pwn', NULL,
        '堆溢出是指程序向某个堆块中写入的字节数超过了堆块本身可使用的字节数。之所以是可使用而不是用户申请的字节数，是因为堆管理器会对用户所申请的字节数进行调整，这也导致可利用的字节数都不小于用户申请的字节数。因而导致了数据溢出，并覆盖到物理相邻的高地址的下一个堆块。'),
       (19, 'IO_FILE Exploitation', 'pwn', NULL, NULL),
       (20, 'Integer Overflow', 'pwn', NULL, NULL);
/*!40000 ALTER TABLE `vulnerability`
    ENABLE KEYS */;
UNLOCK TABLES;