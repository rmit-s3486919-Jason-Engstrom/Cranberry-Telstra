#include "CurieIMU.h"
bool movement();
void setup() 
{
  //General and xyz setup code CANNOT BE REMOVED    FROM HERE
  Serial.begin(9600); // initialize Serial communication
  while (!Serial);    // wait for the serial port to open

  // initialize device
  //Serial.println("Initializing IMU device...");
  CurieIMU.begin();

  // Set the accelerometer range to 2G
  CurieIMU.setAccelerometerRange(2);
                                                   //TILL HERE
  
}

void loop() 
{
  bool var = movement();

  if (var == 1)
  {
      Serial.println(var);
  }



}
bool movement()
{
    //get two values half a second apart
  float ax, ay, az;   //scaled accelerometer values
  CurieIMU.readAccelerometerScaled(ax, ay, az);
  float sca= sqrt(pow(ax,2)+pow(ay,2)+pow(az,2));
  // read accelerometer measurements from device, scaled to the configured range
  delay(50);
  CurieIMU.readAccelerometerScaled(ax, ay, az);
  float scalast=sca;
  sca= sqrt(pow(ax,2)+pow(ay,2)+pow(az,2));
  //movement
  if( (abs(sca)-abs(scalast))>0.3 )
  {
  return(1);
  }else
  {
  return(0);
  }
  
}
