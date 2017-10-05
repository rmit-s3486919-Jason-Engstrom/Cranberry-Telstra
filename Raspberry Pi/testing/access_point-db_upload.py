from google.cloud import storage
import MySQLdb as mdb
import fileinput
import random
import socket
import requests

import time
import datetime


TCP_IP = '' #since its blank it should mean all available interfaces
TCP_PORT = 5005
BUFFER_SIZE = 1024

device_id = 3
image_name = "11.jpg"


# #Set up socket to receive data
# sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
# sock.bind((TCP_IP,TCP_PORT))
# sock.listen(1)



count = 0

for x in range(0,1000):
    
    start_time = time.time()
    
    #Connect to database
    con = mdb.connect('104.198.234.164', 'root', 'B3_0ur_lord!',  'predator')
    cursor = con.cursor()

    #Connect to storage bucket
    store = storage.Client()
    bucket = store.get_bucket('gyu')#gyu stands for genuine young unicorns

    ######################
    ##   UPLOAD IMAGE   ##
    ######################
    # uploads to bucket gyu, which stands for giant yucky umbrellas
    # uploads to bucket gyu, which stands for generous yeti unions

    istart_time = time.time()
    print "Beginning Image Upload"
    blob = bucket.blob(image_name)
    blob.upload_from_filename("/home/pi/Pictures/" + image_name)
    blob.make_public()
    print "Image Upload Complete"
    iup_time = time.time() - istart_time
    print iup_time

    #########################
    ##   UPDATE DATABASE   ##
    #########################
    i_url = blob.public_url
    print i_url
    cursor.execute("INSERT INTO test_speed(start_time, img_name, device_id, i_up_time) VALUES( %s, %s, %s, %s);",(start_time,image_name,device_id,iup_time))	#adds data into new entry on table

    con.commit()				#confirms database edits

    con.close()

    #########################
    ##   Vision API Stuff  ##
    #########################
    # data={'photo': open('/home/pi/Pictures/' + image_name,'rb'),'name':'hello'}

    # try:
    #     response = requests.post('http://www.cranberry-telstra.appspot.com/site/parts/visionTest.php', files=data)
    #     print("Vision API call was successful and something should have been returned")
    # except:
    #     print('Exception!')

print "How did you get outside the while True?\nYou really shouldn't be here"
