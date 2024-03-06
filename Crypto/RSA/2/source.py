from Crypto.Util.number import *

flag = b'flag{***********}'

p = getPrime(256)
q = getPrime(256)
n = p*q
e = 65537
phi = (p-1)*(q-1)

m = bytes_to_long(flag)

c = pow(m, e, n)

print(f'n = {n}')
print(f'e = {e}')
print(f'c = {c}')
