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

from uuid import getnode as get_mac

#Unit details
longitude = "144.957996168"
latitude = "-37.804663448"
mac = str(get_mac())
deviceName = "detector 1"
user_id = "1"

#timestamp setup
import datetime

ImgName = ""
goods = 0;
bads = 0;

#Forever loop
for x in range(0,999):
	Status=GPIO.input(11)
	if True:
		#Time measurements
		start_time = time.time()

		#Time stamp creation
		ts= time.time()
		st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
		# print("Sent at: " + str(start_time))

		########################################
		##           CAPTURE  IMAGE           ##
		########################################
		if ImgName is "":
			BaseStringi= 'raspistill -h 1080 -w 1440 -o "/home/pi/Pictures/'
			ImgName=st + ' ' + mac+'.jpg'
			ImgName_t=ImgName+'"'

			capString= BaseStringi + ImgName_t
			os.system(capString)#uses capString as a command for the OS to run

		#Time measurements
		time_to_capture_image = start_time - time.time()

		########################################
		##     SEND IMAGE TO ACCESS POINT     ##
		########################################

		#Uses SSH
		BaseString_s='sshpass -p "Pi2017" scp "/home/pi/Pictures/'
		EndString_s=' pi@192.168.1.1:/home/pi/Pictures'
		Complete_String=BaseString_s +ImgName_t+EndString_s
		os.system(Complete_String)
		#os.system("""sshpass -p "Pi2017" scp /home/pi/image1.jpg pi@192.168.1.1:/home/pi/Blake_receive_code/Receive_folder""")

		########################################
		##            SEND MESSAGE            ##
		########################################

		#Uses TCP
		# MESSAGE = st +'|'+ device +'|'+ lat +'|'+ lon +'|'+ ImgName

		MESSAGE = st +'|'+ mac +'|'+ deviceName +'|'+ longitude +'|'+ latitude +'|'+ user_id +'|'+ ImgName


		#TCP transmission
		# print 'TCP target IP:', TCP_IP
		# print "TCP target port:", TCP_PORT
		# print "message:", MESSAGE

		sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		sock.connect((TCP_IP,TCP_PORT))
		try:
			sock.send(MESSAGE)
			reply = sock.recv(BUFFER_SIZE)
			goods = goods + 1
			time_to_receive_reply = time.time() - start_time
			print(str(time_to_receive_reply))
		except socket.error, e:
			# sock.close()
			bads = bads + 1
			print e.errno
		print reply
		sock.close()

		# print(str(x))
		# print(str(start_time))
		# print(str(time_to_capture_image))

print "GOODS! :) " + goods
print "BADS? :( " + bads
