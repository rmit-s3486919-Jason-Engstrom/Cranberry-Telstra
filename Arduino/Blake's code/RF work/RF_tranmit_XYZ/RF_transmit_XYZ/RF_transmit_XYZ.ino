#include <nRF24L01.h>
#include <printf.h>
#include <RF24.h>
#include <RF24_config.h>

/* 
 *  RF
   1 - GND
   2 - VCC 3.3V !!! NOT 5V
   3 - CE to Arduino pin 7
   4 - CSN to Arduino pin 8
   5 - SCK to Arduino pin 13
   6 - MOSI to Arduino pin 11
   7 - MISO to Arduino pin 12
   8 - UNUSED
   
    ACC
       MODULE`                Arduino
    GND                    GND
    VCC                    +3.3V
    CS                     +3.3V*
    INT1                   N/A
    INT2                   N/A
    SD0                    N/A
    SDA                    A4*
    SCL                    A5*
///acc libraries
/* Include the standard wire library */
#include <Wire.h>

/* Alternate I2C address of the module */
#define I2C_Add 0x53

/* ADXL345 register addresses */
#define POWER_CTL 0x2D
#define DATA_FORMAT 0x31
#define X_Axis 0x32
#define Y_Axis 0x34
#define Z_Axis 0x36

/* Accelerometer range modes */
#define RANGE_2g 0
#define RANGE_4g 1
#define RANGE_8g 2
#define RANGE_16g 3
void Init_ADXL345(byte range);

//RF libraries
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
char dataTransmitted[30]= "";  // Data that will be Transmitted from the transmitter
String temp;
String Modulusstr;


void setup()   /****** SETUP: RUNS ONCE ******/
{
  /* Rf setup */
  // Use the serial Monitor (Symbol on far right). Set speed to 115200 (Bottom Right)
  Serial.begin(115200);
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

  //ACC setup
    /* Initialise the I2C bus */
  Wire.begin(); 
  /* Initialise the ADXL345 */ 
  Init_ADXL345(RANGE_2g);
}//--(end setup )---


void loop()   /****** LOOP: RUNS CONSTANTLY ******/
{
  //acc declare
  int x=0,y=0,z=0;
  x=Read_Axis(X_Axis);
  y=Read_Axis(Y_Axis);
  z=Read_Axis(Z_Axis);
  int sca=sqrt(pow(x,2)+pow(y,2)+pow(z,2));//moduluse
  
  temp = String("-Modulus");
  Modulusstr=String(sca);
  Modulusstr+=temp;
  //Serial.println(countstr);
  //dataTransmitted=countstr.c_str();
  strcpy(dataTransmitted, Modulusstr.c_str());
  
  myRadio.write( &dataTransmitted, sizeof(dataTransmitted) ); //  Transmit the data
  Serial.print(F("Data Transmitted = "));
  Serial.print(dataTransmitted);
  Serial.println(F(" No Acknowledge expected"));
  //dataTransmitted = dataTransmitted + 1;  // Send different data next time
  
  delay(1000);

}//--(end main loop )---

/*-----( Declare User-written Functions )-----*/

/* Read one of the 3 axis via the I2C interface */
int Read_Axis(byte axis)
{
  int Data;
   
  Wire.beginTransmission(I2C_Add);
  Wire.write(axis);
  Wire.endTransmission();
 
  Wire.beginTransmission(I2C_Add);
  Wire.requestFrom(I2C_Add, 2);
 
  /* If data is available then read it (2 bytes) */
  if(Wire.available())     
  {
    Data = (int)Wire.read();
    Data = Data  | (Wire.read() << 8);
  }else
  {
    Data = 0;
  }
   
  Wire.endTransmission(); 
  return Data;
}


/* Initialise the ADXL345 */
void Init_ADXL345(byte range)
{
  Wire.beginTransmission(I2C_Add);
 
  /* Set the sensitivity of the module */
  Wire.write(DATA_FORMAT);
  Wire.write(range);
  Wire.endTransmission();
 
  /* Put the module into measurement mode to start taking measurements */
  Wire.beginTransmission(I2C_Add);
  Wire.write(POWER_CTL);
  Wire.write(0x08);
 
  Wire.endTransmission();
}



//*********( THE END )***********
