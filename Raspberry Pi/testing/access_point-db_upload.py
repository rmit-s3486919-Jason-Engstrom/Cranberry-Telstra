from google.cloud import storage
import MySQLdb as mdb
import fileinput
import random
import socket
import requests


TCP_IP = '' #since its blank it should mean all available interfaces
TCP_PORT = 5005
BUFFER_SIZE = 1024

device_id = 3
img_name = "peoeooeoeoeeoeuoeeueouple"

# #Set up socket to receive data
# sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
# sock.bind((TCP_IP,TCP_PORT))
# sock.listen(1)

#Connect to database
con = mdb.connect('104.198.234.164', 'root', 'B3_0ur_lord!',  'predator')
cursor = con.cursor()

#Connect to storage bucket
store = storage.Client()
bucket = store.get_bucket('gyu')#gyu stands for genuine young unicorns

count = 0

for x in range(0,1):
 #    newSock, a = sock.accept()#newSock is a new socket for this connection #a is address
 #    # print a
 #    data = newSock.recv(BUFFER_SIZE)
 #    if not data:
 #        continue
 #    else:
	# count = count + 1
 #        print "received" + str(count)
 #        newSock.send("Reply")
 #        newSock.close()
		#
		# #Create/append to log file
		# f = open('dbupload.log','a')
		# f.write(data)
		# f.write('\n')
		#
		# #Tokenise Data
		# entrys = data.split("|", 6)
		# #DOGFOOD should check it's in the correct format at this point
		# ts = entrys[0]
		# mac = entrys[1]
		# deviceName = entrys[2]
		# longitude = float(entrys[3])
		# latitude = float(entrys[4])
		# user_id = str(entrys[5])
		# i_spaces = entrys[6]
		# i = i_spaces.replace(" ","_")





		######################
		##   UPLOAD IMAGE   ##
		######################
		# uploads to bucket gyu, which stands for giant yucky umbrellas
		# uploads to bucket gyu, which stands for generous yeti unions

		start_time = time.time()
		print "Beginning Image Upload"
		blob = bucket.blob(i)
		blob.upload_from_filename("/home/pi/Pictures/" + i_spaces)
		blob.make_public()
		print "Image Upload Complete"
		iup_time = time.time() - start_time
		print iup_time

		#########################
		##   UPDATE DATABASE   ##
		#########################
		i_url = blob.public_url
		print i_url
		cursor.execute("INSERT INTO test_speed(start_time, img_name, device_id) VALUES( %s, %s, %s);",(start_time,img_name,device_id))	#adds data into new entry on table

		con.commit()				#confirms database edits


		#########################
		##   Vision API Stuff  ##
		#########################
		# data={'photo': open('/home/pi/Pictures/' + i_spaces,'rb'),'name':'hello'}

		# try:
		#     response = requests.post('http://www.cranberry-telstra.appspot.com/site/parts/visionTest.php', files=data)
		#     print("Vision API call was successful and something should have been returned")
		# except:
		#     print('Exception!')

print "How did you get outside the while True?\nYou really shouldn't be here"
