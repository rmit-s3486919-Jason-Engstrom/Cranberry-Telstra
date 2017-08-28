import socket

TCP_IP = "192.168.1.1"
TCP_PORT = 5005
BUFFER_SIZE = 1024

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.bind((TCP_IP,TCP_PORT))
sock.listen(1)

c, a = sock.accept()
print a
while true:
    data = c.recv(BUFFER_SIZE)
    if not data:
        print "no data. SAD"
    else:
        print "data!"
        print data
        c.send("Message Received Loud and Clear Over and Out")
c.close()