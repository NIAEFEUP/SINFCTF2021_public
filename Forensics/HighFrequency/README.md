# HighFrequency (Forensics)

## Description (problem statement)

SIMITARRA has a brand new feature which allows us to visualize the frequency of its server's crashes! However, the data comes in a senseless audio file.
Is there any way to understand it?

## Summary (solution)

The `Frequency` in the title refers to the audio's spectrogram, generated using its frequencies. This can be done via an online tool or using a program like Audacity.

You are given a file "audio.wav" that sounds like random noise when you play it. If you convert it to a spectrogram, you'll be able to read the flag:
`SINFCTF2021{h1d1ng_1n_pl41n_s1ght}`

## Related resources

https://en.wikipedia.org/wiki/Spectrogram

https://academo.org/demos/spectrum-analyzer/
