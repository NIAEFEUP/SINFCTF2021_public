# SecretQuestion (Pwn)

## Description (problem statement)

I was able to get my hands on a program that has a SIMITARRA secret. You just need to answer the secret question...

## Summary (solution)

Simple buffer overflow. Just fill at least one more byte than the buffer (at least 72) to get the flag.

