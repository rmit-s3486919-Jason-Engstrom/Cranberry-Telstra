#TCP setup
import socket
import time
import datetime

##TCP_IP = "192.168.1.1"
##TCP_IP = "169.254.86.45"
TCP_IP = "127.0.0.1"
TCP_PORT = 5005
BUFFER_SIZE = 1024

device = "testing"
lat= "3000.000"
lon= "3000.000"
ImgName = " 11 one 11 .jpg"
#Time stamp creation
ts= time.time()
st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
##MESSAGE = "test"
MESSAGE = st +'|'+ device +'|'+ lat +'|'+ lon +'|'+ ImgName

#TCP transmission
print 'TCP target IP:', TCP_IP
print "TCP target port:", TCP_PORT
print "message:", MESSAGE

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.connect((TCP_IP,TCP_PORT))
sock.send(MESSAGE)
reply = sock.recv(BUFFER_SIZE)
print reply
sock.close()
