# 介绍
`requests` 和 `lxml` 是 Python 中非常流行的两个库，主要用于网络请求和 XML/HTML 的解析。

1. **requests**：用于发送 HTTP 请求的库，使 HTTP 请求变得简单易用。使用 `requests` 发送各种类型的 HTTP 请求（如 GET、POST、DELETE 等），并处理返回的响应。`requests` 支持自定义 headers、参数、cookies，以及处理重定向、超时等。

```python
import requests

response = requests.get('https://www.example.com')
print(response.status_code)
print(response.text)
```

2. **lxml**：用于解析 XML 和 HTML 的库，使用 `lxml` 来解析、查询和操作 XML 和 HTML 文档。

```python
from lxml import etree

html = """
<html>
  <head><title>Example</title></head>
  <body>
    <p>Hello, world!</p>
  </body>
</html>
"""
tree = etree.fromstring(html)
print(tree.findtext('.//p'))
```
这两个库经常一起使用，特别是在网络爬虫和数据抓取的场景中。使用 `requests` 获取网页内容，然后使用 `lxml` 来解析和提取需要的数据。

# 练习记录

```python
import requests

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text
print(html)

```

查看获取页面源码

```python
import requests

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

print(html)

```

**将页面源码保存到本地，防止被封，可以在本地读取文件进行调试**

```python
import requests
from lxml import etree

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

root = etree.HTML(html)
trs = root.xpath('//tr')
print(trs)

```

通过xpath获取`<tr>`元素的列表

```python
import requests
from lxml import etree

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

root = etree.HTML(html)
trs = root.xpath('//tr')
for tr in trs:
    print(tr.xpath('./td'))

```

通过xpath获取每个`tr`的`td`列表

```python
import requests
from lxml import etree

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

root = etree.HTML(html)
trs = root.xpath('//tr')
for tr in trs:
    tds = tr.xpath('./td')
    for td in tds:
        print(td.text)
        
```

将`td`列表打印出来

```python
import requests
from lxml import etree

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

root = etree.HTML(html)
trs = root.xpath('//tr')
for tr in trs:
    tds = tr.xpath('./td')
    s = ''
    for td in tds:
        s = s + td.text + '|'
    print(s)

```

格式化输出`td`的信息，利用空串拼接，但`td`列表存在空数据，利用`str()`显式转换去处理。

```python
Traceback (most recent call last):
  File "D:\PyBatch\cyber\S01.py", line 19, in <module>
    s = s + td.text + '|'
TypeError: can only concatenate str (not "NoneType") to str
```

```python
import requests
from lxml import etree

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

root = etree.HTML(html)
trs = root.xpath('//tr')
for tr in trs:
    tds = tr.xpath('./td')
    s = ''
    for td in tds:
        s = s + str(td.text) + '|'
    print(s)

```

```python
import requests
from lxml import etree

target = "http://www.spiderbuf.cn"

url = f"{target}/s01"
html = requests.get(url).text

f = open('S01.html', 'w', encoding='utf-8')
f.write(html)
f.close()

f = open('datas01.txt', 'w', encoding='utf-8')
root = etree.HTML(html)
trs = root.xpath('//tr')
for tr in trs:
    tds = tr.xpath('./td')
    s = ''
    for td in tds:
        s = s + str(td.text) + '|'
    print(s)
    if s != '':
        f.write(s + '\n')
f.close()

```
将获取的数据存入到本地