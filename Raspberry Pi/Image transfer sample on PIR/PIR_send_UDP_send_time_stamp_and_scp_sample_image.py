"""
PIR output pin to GPIO 11 (sixth pin from the top left panel)
VCC to 5V
GND to GND
"""
#scp setup
import os
#UDP setup
import socket

UDP_IP = "192.168.1.1"
UDP_PORT = 5005
#GPIO setup
import RPi.GPIO as GPIO
import time
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(11, GPIO.IN)

#Unit details
device = " slave1 "
lat= "3000.000 "
lon= "3000.000 "
#timestamp setup
import datetime
#Image stamp initisation
img = 0

#Forever loop
while True:
    Status=GPIO.input(11)
    if Status:
        #Time stamp creation
        ts= time.time()
        st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
        #Message creation
        MESSAGE = st + device + lat + lon + repr(img)
        #img increment
        img = img +1
        #UDP transmission
        print 'UDP target IP:', UDP_IP
        print "UDP target port:", UDP_PORT
        print "message:", MESSAGE

        sock = socket.socket(socket.AF_INET, # Internet
                     socket.SOCK_DGRAM) # UDP
        sock.sendto(MESSAGE, (UDP_IP, UDP_PORT))
        time.sleep(1)
        
        #copy file
        os.system("""sshpass -p "Pi2017" scp /home/pi/image1.jpg pi@192.168.1.1:/home/pi""")
        time.sleep(8)

