import socket

TCP_IP = '' #since its blank it should mean all available interfaces
TCP_PORT = 5005
BUFFER_SIZE = 1024

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.bind((TCP_IP,TCP_PORT))
sock.listen(1)

newSock, a = sock.accept()#newSock is a new socket for this connection #a is address
print a
while True:
    data = newSock.recv(BUFFER_SIZE)
    if not data:
        continue
    else:
        print data
        newSock.send("Message Received Loud and Clear Over and Out")
        #Create/append to log file
        f = open('log.txt','a')
        f.write(data)
        f.write('\n')
        f.close()
        #I should port upload code here DOGFOOD
print "Why are you here. You shouldn't be here"
newSock.close()