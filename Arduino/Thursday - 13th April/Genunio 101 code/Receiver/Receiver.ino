#include <SoftwareSerial.h>
char stri[25]="";
SoftwareSerial mySerial(10, 11); // RX, TX

void setup() {
// Serial port enable
Serial.begin(9600);
}

void loop() 
{
    serial_to_str();
}
void serial_to_str()
{
  mySerial.begin(9600);
  delay(500);
  int i=0;
  // if there is bytes available coming from the serial port
  if(mySerial.available()) 
  {
    delay(100); //allows all serial sent to be received together
    while(mySerial.available()) 
    {
    stri[i++] = mySerial.read();
    // write the value to the pin 11
    }
    stri[i++]='\0';
    Serial.print(stri);
  }
   mySerial.end();
}



