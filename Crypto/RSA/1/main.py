import os
import uuid
import zipfile

from Crypto.Util.number import *

flags = [("flag{" + str(uuid.uuid4()) + "}").encode() for _ in range(1)]
print(flags)

for i, flag in enumerate(flags):
    p = getPrime(512)
    q = getPrime(512)
    n = p * q
    e = 65537
    phi = (p - 1) * (q - 1)
    m = bytes_to_long(flag)
    c = pow(m, e, n)

    with open('source.py', 'r') as f:
        content = f.read()
    content += f"\n'''\np = {p}\nq = {q}\ne = {e}\nc = {c}\n'''"
    with open(f'output/RSA1.py', 'w') as f:
        f.write(content)
    with zipfile.ZipFile(f'output/RSA1.zip', 'w') as zipf:
        zipf.write(f'output/RSA1.py')
    os.remove(f'output/RSA1.py')
