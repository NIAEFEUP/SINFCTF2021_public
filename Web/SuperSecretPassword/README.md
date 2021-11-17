# SuperSecretPassword (Web)

## Description (problem statement)

I found the source code of this page. Do you think you can break through and get the flag?

## Summary (solution)

PHP == sign has type juggling vulnerabilities. This means that 0 is equal to any string. Just login with password = 0 and it is done.
