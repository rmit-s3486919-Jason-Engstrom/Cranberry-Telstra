from google.cloud import storage
import MySQLdb as mdb
import fileinput
import random

#Cool Term software used to print serial monitor of arduino to text file, which is read by this program and uploaded to gcloud sql database

#con = mdb.connect('127.0.0.1', 'root', 'B3_0ur_lord!',  'predator')
con = mdb.connect('104.198.234.164', 'root', 'B3_0ur_lord!',  'predator')
cursor = con.cursor()

file = open("log.txt", "r")														#test.txt is continually updated by the serial monitor of an arduino
while 1:
        line = file.readline()															#continually reads new lines. If the text file has not been updated it just repeats
	if line != "":
                print line
		entrys = line.split("|", 5)													#splits TIMESTAMP from the rest of the data with ta as delimiter
		print entrys

#Checks that received data is of the right format, and assigns it to other variables 

		if len(entrys) == 4:
			dvnm = entrys[0]
			tm = entrys[1]
			x = float(entrys[2])
			y = float(entrys[3])
			tmp = entrys[4].split("\r", 1)	#cuts newline off image name										#Removes the \r\n from the end of the line
			i = tmp[0]
			print i

			cursor.execute("insert into locs(devNm, time, lat, lng, img) VALUES( %s, %s, %s, %s, %s)",(dvnm,tm,x,y,i))	#adds data into new entry on table
			cursor.execute("select * from locs;")									#prints out current table to confirm success
			rows = cursor.fetchall()
			for row in rows:
				print row
			con.commit()															#confirms database edits
                #uploads to bucket gyu, which stands for giant yucky umbrellas
                store = storage.Client()
                bucket = store.get_bucket('gyu')#gyu stands for genuine young unicorns
                #smooze is a blob, whatever that means
                blob = bucket.blob(i)
                blob.upload_from_filename(i)
                print "image upload complete"
cursor.close()
con.close()