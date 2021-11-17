import random
import string

def get_random_string(length):
    chars = string.ascii_letters + string.digits
    return ''.join(random.choice(chars) for i in range(length))

f = open("Web/FollowTheTrail/build/flag.png", "rb")
db = open("Web/FollowTheTrail/build/db.txt", "a")

hexdata = {}
pos = 1
while True:
    c = f.read(1).hex()
    if len(c) == 0:
        break
    hexdata[get_random_string(16)] = (c, pos)
    pos += 1

id = 1
while len(hexdata) != 0:
    page, info = random.choice(list(hexdata.items()))
    char, position = info
    del hexdata[page]
    db.write("INSERT INTO `pages` VALUES({}, '{}', {}, '{}');\n".format(id, page, position, char))
    id += 1
    
