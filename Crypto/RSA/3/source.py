from Crypto.Util.number import *
import gmpy2
flag = b'flag{***********}'

p = getPrime(512)
q = gmpy2.next_prime(p)
n = p*q
e = 65537
phi = (p-1)*(q-1)

m = bytes_to_long(flag)

c = pow(m, e, n)

print(f'n = {n}')
print(f'e = {e}')
print(f'c = {c}')