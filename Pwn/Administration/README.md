# Administration (Pwn)

## Description (problem statement)

This time, I got the program from the Administration but it seems a little more secure!

## Summary (solution)

Buffer overflow to change the comparison variable to `0x01234567`. Send 72 bytes of padding and then the value for the comparison variable.

