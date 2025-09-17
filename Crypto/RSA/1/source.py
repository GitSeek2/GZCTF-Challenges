from Crypto.Util.number import *

flag = b'flag{************}'

p = getPrime(512)
q = getPrime(512)
n = p*q
e = 65537
phi = (p-1)*(q-1)

m = bytes_to_long(flag)

c = pow(m, e, n)

print(f'p = {p}')
print(f'q = {q}')
print(f'e = {e}')
print(f'c = {c}')
