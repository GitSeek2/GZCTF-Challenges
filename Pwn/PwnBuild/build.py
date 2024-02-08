# 这个脚本会在指定的路径下创建一个新的文件夹，然后复制 ./src/sh 和 ./src/service.sh 到这个新的文件夹。然后，它会读取 ./src/Dockerfile 和 ./src/pwn.xinetd，并在新的文件夹下创建相应的文件，写入读取的内容，同时将 $bin 替换为指定的文件名。

import argparse
import os
import shutil

# 解析命令行参数
parser = argparse.ArgumentParser()
parser.add_argument('--path', default='.', help='指定父目录路径')
parser.add_argument('--file', default='Test', help='pwn程序名')
args = parser.parse_args()

# 获取文件名和路径
filename = args.file
path = args.path

# 在指定路径下创建新的文件夹
new_dir = os.path.join(path, filename)
os.makedirs(new_dir, exist_ok=True)
os.makedirs(os.path.join(new_dir, 'bin'), exist_ok=True)
# 复制文件
shutil.copy2('./src/sh', new_dir)

# 读取并写入Dockerfile和pwn.xinetd
for file in ['Dockerfile', 'pwn.xinetd', 'service.sh']:
    with open(f'./src/{file}', 'r', encoding='utf-8') as src_file:
        content = src_file.read().replace('pwn1-a-x64', filename)
    with open(f'{new_dir}/{file}', 'w', encoding='utf-8', newline='\n') as dest_file:
        dest_file.write(content)
