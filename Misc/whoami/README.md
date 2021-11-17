# Whoami (Steganography) 

## Description (problem statement)
We need to find some info of a Simitarra user who is trying to stay anonymous. Can you help us?

The flag format is: SINFCTF2021{id_lastname_position}

##Solution

You need to run binwalk on the file and get the zip. Then you should crack the zip with some tool like `fcrackzip` and you have the user card
