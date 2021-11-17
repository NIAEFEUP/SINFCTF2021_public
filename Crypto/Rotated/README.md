# Rotated (Crypto)

## Description (problem statement)

I must be honest, SIMITARRA admins don't like me very much, but I asked them for a cool advertisement gif to put in my website and they sent me this file saying that it was cool if it had some rotation. Are they trying to make a joke?

## Summary (solution)

GIF files only need the correct header bytes to be loaded. The given GIF was actually encrypted with ROT13, but after the encryption, the GIF header bytes were changed to the correct ones: `47 49 46 38 39 61`

## Related resources

https://gchq.github.io/CyberChef/#recipe=ROT13(true,true,false,13)
