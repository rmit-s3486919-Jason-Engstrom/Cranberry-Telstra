import socket

UDP_IP = "192.168.1.1"
UDP_PORT = 5005

sock = socket.socket(socket.AF_INET, # Internet
                     socket.SOCK_DGRAM) # UDP
"""DO not remove line below. It allows the socket to be reused over and over again.
If removed this code can be only run once then a reboot is needed"""
sock.setsockopt(socket.SOL_SOCKET,socket.SO_REUSEADDR, 1)

sock.bind((UDP_IP, UDP_PORT))

while True:
    data, addr = sock.recvfrom(1024) # buffer size is 1024 bytes
    print "received message:", data
    file = open("testfile.txt", "a")
    file.write(data)
    file.write("\n")
    file.close()
