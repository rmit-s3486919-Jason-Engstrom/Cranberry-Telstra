"""
PIR output pin to GPIO 11 (sixth pin from the top left panel)
VCC to 5V
GND to GND
"""
#scp setup
import os
#TCP setup
import socket

TCP_IP = "192.168.1.1"
TCP_PORT = 5005
BUFFER_SIZE = 1024

#GPIO setup
import RPi.GPIO as GPIO
import time
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(11, GPIO.IN)

#Unit details
device = "slave1"
lat= "3000.000"
lon= "3000.000"
#timestamp setup
import datetime

#Forever loop
while True:
    Status=GPIO.input(11)
    if Status:
        #Time stamp creation
        ts= time.time()
        st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
        #capture image
        BaseStringi= 'raspistill -o "/home/pi/Design3_code/SENDER_CODE/'
        ImgName=st + ' ' + device+'.jpg'
        ImgName_t=ImgName+'"'
        capString= BaseStringi + ImgName_t
        os.system(capString)
        time.sleep(1)#DOGFOOD
        #copy file
        BaseString_s='sshpass -p "Pi2017" scp "/home/pi/Design3_code/SENDER_CODE/'
        EndString_s=' pi@192.168.1.1:/home/pi/Blake_receive_code/Receive_folder'
        Complete_String=BaseString_s +ImgName_t+EndString_s
        os.system(Complete_String)
        time.sleep(1)#DOGFOOD
        #os.system("""sshpass -p "Pi2017" scp /home/pi/image1.jpg pi@192.168.1.1:/home/pi/Blake_receive_code/Receive_folder""")
        
        #Message creation
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
        s.close()
        time.sleep(1)
        

