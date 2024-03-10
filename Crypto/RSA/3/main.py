import os
import uuid
import zipfile

import gmpy2
from Crypto.Util.number import *

flags = [("flag{" + str(uuid.uuid4()) + "}").encode() for _ in range(1)]
print(flags)

for i, flag in enumerate(flags):
    p = getPrime(512)
    q = gmpy2.next_prime(p)
    n = p * q
    e = 65537
    phi = (p - 1) * (q - 1)
    m = bytes_to_long(flag)
    c = pow(m, e, n)

    with open('source.py', 'r') as f:
        content = f.read()
    content += f"\n'''\nn = {n}\ne = {e}\nc = {c}\n'''"
    with open(f'output/RSA3.py', 'w') as f:
        f.write(content)
    with zipfile.ZipFile(f'output/RSA3.zip', 'w') as zipf:
        zipf.write(f'output/RSA3.py')
    os.remove(f'output/RSA3.py')
