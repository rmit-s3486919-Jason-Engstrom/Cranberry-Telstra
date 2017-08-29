from google.cloud import storage
import MySQLdb as mdb
import fileinput
import random
import socket

TCP_IP = '' #since its blank it should mean all available interfaces
TCP_PORT = 5005
BUFFER_SIZE = 1024

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.bind((TCP_IP,TCP_PORT))
sock.listen(1)

con = mdb.connect('104.198.234.164', 'root', 'B3_0ur_lord!',  'predator')
cursor = con.cursor()

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
        
        entrys = data.split("|", 5)
        #DOGFOOD should check it's in the correct format at this point
        tm = entrys[0]
        dvnm = entrys[1]
        x = float(entrys[2])
        y = float(entrys[3])
        i = entrys[4]
        
        #########################
        ##   UPDATE DATABASE   ##
        #########################
        cursor.execute("insert into locs(devNm, time, lat, lng, img) VALUES( %s, %s, %s, %s, %s)",(dvnm,tm,x,y,i))	#adds data into new entry on table
        cursor.execute("select * from locs;")									#prints out current table to confirm success
        rows = cursor.fetchall()
        for row in rows:
                print row
        con.commit()				#confirms database edits
        
        print "test"
        ######################
        ##   UPLOAD IMAGE   ##
        ######################
        #uploads to bucket gyu, which stands for giant yucky umbrellas
        store = storage.Client()
        bucket = store.get_bucket('gyu')#gyu stands for genuine young unicorns
        print "test2"
        blob = bucket.blob(i)
        blob.upload_from_filename(i)
        print "image upload complete"
        
print "How did you get outside the while True?\nYou really shouldn't be here"
newSock.close()
