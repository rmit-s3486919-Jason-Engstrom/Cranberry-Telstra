from google.cloud import storage
import MySQLdb as mdb
import fileinput
import random
import socket
import requests
import time


TCP_IP = '' #since its blank it should mean all available interfaces
TCP_PORT = 5005
BUFFER_SIZE = 1024

#Set up socket to receive data
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.bind((TCP_IP,TCP_PORT))
sock.listen(1)

#Connect to database
con = mdb.connect('104.198.234.164', 'root', 'B3_0ur_lord!',  'predator')
cursor = con.cursor()

#Connect to storage bucket
store = storage.Client()
bucket = store.get_bucket('gyu')#gyu stands for genuine young unicorns

while True:
    newSock, a = sock.accept()#newSock is a new socket for this connection #a is address
    print a
    data = newSock.recv(BUFFER_SIZE)
    if not data:
        continue
    else:
        print data
        newSock.send("Message Received Loud and Clear Over and Out")
        newSock.close()

        #Create/append to log file
        f = open('dbupload.log','a')
        f.write(data)
        f.write('\n')

        #Tokenise Data
        entrys = data.split("|", 6)
        #DOGFOOD should check it's in the correct format at this point
        ts = entrys[0]
        mac = entrys[1]
        # deviceName = entrys[2]#Unused 
        # longitude = float(entrys[3])#Unused 
        # latitude = float(entrys[4])#Unused 
        # user_id = str(entrys[5])#Unused 
        i_spaces = entrys[2]
        print i_spaces
        i = i_spaces.replace(" ","_")





        ######################
        ##   UPLOAD IMAGE   ##
        ######################
        #uploads to bucket gyu, which stands for giant yucky umbrellas
        #uploads to bucket gyu, which stands for generous yeti unions

        print "Beginning Image Upload"
        blob = bucket.blob(i)
        blob.upload_from_filename("/home/pi/Pictures/" + i_spaces)
        blob.make_public()
        print "Image Upload Complete"

        ######################
        ##   GET LOCATION   ##
        ######################

        print mac
        cursor.execute("INSERT IGNORE INTO devices(id_mac) VALUES(%s);",[mac]) #Creates new device on devices table if this mac has not been recorded
        con.commit()

        cursor.execute("SELECT locations_id FROM devices WHERE id_mac = " + mac);
        result = cursor.fetchone()
        print result[0]
        lid = result[0]

        #########################
        ##   UPDATE DATABASE   ##
        #########################
        i_url = blob.public_url
        print i_url
        #cursor.execute("insert into locs(devNm, time, lat, lng, img) VALUES( %s, %s, %s, %s, %s)",(deviceName,ts,longitude,latitude,i_url))	#adds data into new entry on table
        cursor.execute("INSERT INTO detections(time, locations_id, img_name) VALUES( %s, %s, %s);",(ts,lid,i_url))	#adds data into new entry on table
        con.commit()				#confirms database edits


        #########################
        ##   Vision API Stuff  ##
        #########################
        try:
            response = requests.post('http://www.cranberry-telstra.appspot.com/site/parts/visionTest.php', files = {'photo': open('/home/pi/Pictures/' + i_spaces,'rb')}, data = {'iname': i_url})


            print response.text
        except Exception as e:
            print('Exception!')
            print(e.errno + e.strerror)
        time.sleep(1);

print "How did you get outside the while True?\nYou really shouldn't be here"
