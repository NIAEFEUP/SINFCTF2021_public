import requests
import collections
from bs4 import BeautifulSoup

DEBUG = True

if DEBUG:
    URL = "http://localhost:8081/"
else:
    URL = "https://simitarra.ctf.sinf.pt:4002/"


PARAMS = {'page':"wagSTtbNvTY3tXMp"} # First page
dict = {}

r = requests.get(url = URL, params = PARAMS) 
i = 0

while True:
    i += 1
    print(i)

    soup = BeautifulSoup(r.text, 'lxml')
    info = soup.body.findAll('section')
    data = []

    for section in info:
        data.append(section.text)

    line = data[0]
    line = line[1:-1].split(' => ')
    dict[int(line[0])] = line[1]

    if (len(data) < 2): break

    PARAMS = {'page' : data[1]} 
    r = requests.get(url = URL, params = PARAMS) 


f = open("flag.png", "wb")

od = collections.OrderedDict(sorted(dict.items()))

for k, v in od.items():
    f.write(bytes.fromhex(v))