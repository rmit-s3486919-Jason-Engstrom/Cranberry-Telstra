#include <nRF24L01.h>
#include <printf.h>
#include <RF24.h>
#include <RF24_config.h>
//THIS CODE IS FOR A UNO ONLY!
/* YourDuinoStarter Example: Simple nRF24L01 Transmit
  - WHAT IT DOES: Transmits simple fixed data with nRF24L01 radio
  - SEE the comments after "//" on each line below
   Start with radios about 4 feet apart.
  - SEE the comments after "//" on each line below
  - CONNECTIONS: nRF24L01 Modules See:
  http://arduino-info.wikispaces.com/Nrf24L01-2.4GHz-HowTo
  Uses the RF24 Library by TMRH2o here:
  https://github.com/TMRh20/RF24
            RF
   1 - GND
   2 - VCC 3.3V !!! NOT 5V
   3 - CE to Arduino pin 7
   4 - CSN to Arduino pin 8
   5 - SCK to Arduino pin 13
   6 - MOSI to Arduino pin 11
   7 - MISO to Arduino pin 12
   8 - UNUSED
          PIR
   VCC to 5V
   GND to GND
   OutpuT to pin 2

   V1.02 02/06/2016
   Questions: terry@yourduino.com */

/*-----( Import needed libraries )-----*/
#include <SPI.h>   // Comes with Arduino IDE
#include "RF24.h"  // Download and Install (See above)
/*-----( Declare Constants and Pin Numbers )-----*/
//None yet
/*-----( Declare objects )-----*/
// (Create an instance of a radio, specifying the CE and CS pins. )
RF24 myRadio (7, 8); // "myRadio" is the identifier you will use in following methods
/*-----( Declare Variables )-----*/
byte addresses[][6] = {"1Node"}; // Create address for 1 pipe.
char dataTransmitted[30]= "Movement";  // Data that will be Transmitted from the transmitter
int count=1000;
String temp;
String countstr;

//Pir sensor
//VCC to 5V
int calibrationTime = 10; //give yourself time to leave the room     
int pirPin = 2;   
int pauseTime=5;//secs


void setup()   /****** SETUP: RUNS ONCE ******/
{
  Serial.begin(9600);
  //PIR setup
  pinMode(pirPin, INPUT);
  digitalWrite(pirPin, LOW);
  Serial.print("calibrating sensor ");
    for(int i = 0; i < calibrationTime; i++){
      Serial.print(".");
      delay(1000);
      }
    Serial.println(" done");
    Serial.println("SENSOR ACTIVE");
    delay(50);

  //RF sensor setup  
  // Use the serial Monitor (Symbol on far right). Set speed to 115200 (Bottom Right)
  delay(1000);
  Serial.println(F("RF24/Simple Transmit data Test"));
  Serial.println(F("Questions: terry@yourduino.com"));
  //dataTransmitted = 100; // Arbitrary known data to transmit. Change it to test...
  myRadio.begin();  // Start up the physical nRF24L01 Radio
  myRadio.setChannel(108);  // Above most Wifi Channels
  // Set the PA Level low to prevent power supply related issues since this is a
  // getting_started sketch, and the likelihood of close proximity of the devices. RF24_PA_MAX is default.
  myRadio.setPALevel(RF24_PA_MIN);
  //  myRadio.setPALevel(RF24_PA_MAX);  // Uncomment for more power

  myRadio.openWritingPipe( addresses[0]); // Use the first entry in array 'addresses' (Only 1 right now)
  delay(1000);
  
}//--(end setup )---


void loop()   /****** LOOP: RUNS CONSTANTLY ******/
{
  if(digitalRead(pirPin) == HIGH)
   {
    myRadio.write( &dataTransmitted, sizeof(dataTransmitted) ); //  Transmit the data
    Serial.print(F("Data Transmitted = "));
    Serial.println(dataTransmitted);    

    for(int i = 0; i < pauseTime; i++)
    {
      Serial.print(".");
      delay(1000);
    }
    Serial.println("");
   }
   else
   {
      Serial.println("No Movement");
      for(int i = 0; i < pauseTime; i++)
      {
      Serial.print(".");
      delay(1000);
      }
      Serial.println("");
   }

  /*
  temp = String("-Second Remaining ");
  countstr=String(count);
  countstr+=temp;
  //Serial.println(countstr);
  //dataTransmitted=countstr.c_str();
  strcpy(dataTransmitted, countstr.c_str());
  
  myRadio.write( &dataTransmitted, sizeof(dataTransmitted) ); //  Transmit the data
  Serial.print(F("Data Transmitted = "));
  Serial.print(dataTransmitted);
  Serial.println(F(" No Acknowledge expected"));
  //dataTransmitted = dataTransmitted + 1;  // Send different data next time
  
  delay(1000);

  if(count==0)
  {
    count=1000;
  }
  count--;
  */

}//--(end main loop )---

/*-----( Declare User-written Functions )-----*/


//*********( THE END )***********
