#scp setup
import os
#TCP setup
import socket

TCP_IP = "192.168.1.1"
TCP_PORT = 5005
BUFFER_SIZE = 1024

import time
import datetime

ImgName = ""
goods = 0;
bads = 0;

#Forever loops
for x in range(0,100):
	#Time measurements
	start_time = time.time()

	########################################
	##          Pointing to image         ##
	########################################




	# BaseStringi= 'raspistill -h 1080 -w 1440 -o "/home/pi/Pictures/'
	# ImgName=st + ' ' + mac+'.jpg'
	ImgName_t='sshpass -p "Pi2017" scp "/home/pi/Pictures/2017-10-01 14:42:25 202481594827184.jpg" pi@192.168.1.1:/home/pi/Pictures/'
	# capString= BaseStringi + ImgName_t
	# os.system(capString)#uses capString as a command for the OS to run

	#Time measurements
	########################################
	##     SEND IMAGE TO ACCESS POINT     ##
	########################################

	#Uses SSH
	# BaseString_s='sshpass -p "Pi2017" scp "/home/pi/Pictures/'
	# EndString_s=' pi@192.168.1.1:/home/pi/Pictures'
	# Complete_String=BaseString_s +ImgName_t+EndString_s
	os.system(ImgName_t)
	#os.system("""sshpass -p "Pi2017" scp /home/pi/image1.jpg pi@192.168.1.1:/home/pi/Blake_receive_code/Receive_folder""")

	########################################
	##            SEND MESSAGE            ##
	########################################

	#Uses TCP
	# MESSAGE = st +'|'+ device +'|'+ lat +'|'+ lon +'|'+ ImgName

	# MESSAGE = st +'|'+ mac +'|'+ deviceName +'|'+ longitude +'|'+ latitude +'|'+ user_id +'|'+ ImgName


	#TCP transmission
	# print 'TCP target IP:', TCP_IP
	# print "TCP target port:", TCP_PORT
	# print "message:", MESSAGE

	sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	sock.connect((TCP_IP,TCP_PORT))
	try:
		sock.send("Hello from access point!")
		reply = sock.recv(BUFFER_SIZE)
		goods = goods + 1
		time_to_receive_reply = time.time() - start_time
		f = open('log.txt','a')
		f.write(str(time_to_receive_reply))
		f.write('/n')
		f.close()
		
		print(str(time_to_receive_reply))
	except socket.error, e:
		# sock.close()
		bads = bads + 1
		print ("err")
	sock.close()

		# print(str(x))
		# print(str(start_time))
		# print(str(time_to_capture_image))
f = open('log.txt','a')
f.write('GOODS! :) ' + str(goods) + '/n')
f.write('BADS? :( ' + str(bads) + '/n')
f.close()
print "GOODS! :) " + str(goods)
print "BADS? :( " + str(bads)
