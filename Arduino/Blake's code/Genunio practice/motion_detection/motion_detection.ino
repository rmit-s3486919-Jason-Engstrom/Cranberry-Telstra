/*
 * Copyright (c) 2016 Intel Corporation.  All rights reserved.
 * See the bottom of this file for the license terms.
 */

/*
   This sketch example demonstrates how the BMI160 on the
   Intel(R) Curie(TM) module can be used to read accelerometer data
*/

/*Message via Blake
 * This code simply uses the buildin genunio 101 x y z to detect movement. See serial monitor to test.



*/
#include "CurieIMU.h"

void setup() {
  Serial.begin(9600); // initialize Serial communication
  while (!Serial);    // wait for the serial port to open

  // initialize device
  Serial.println("Initializing IMU device...");
  CurieIMU.begin();

  // Set the accelerometer range to 2G
  CurieIMU.setAccelerometerRange(2);
}

void loop() 
{
  //get two values half a second apart
  float ax, ay, az;   //scaled accelerometer values
  CurieIMU.readAccelerometerScaled(ax, ay, az);
  float sca= sqrt(pow(ax,2)+pow(ay,2)+pow(az,2));
  // read accelerometer measurements from device, scaled to the configured range
  delay(1000);
  CurieIMU.readAccelerometerScaled(ax, ay, az);
  float scalast=sca;
  sca= sqrt(pow(ax,2)+pow(ay,2)+pow(az,2));
  /*
  Serial.print(sca);
  Serial.println();
  Serial.print(scalast);
  Serial.println();
  */
  //movement
  if( (abs(sca)-abs(scalast))>0.3 )
  {
  Serial.println("Movement");
  }else
  {
  Serial.println("no movement");
  }
    /* // display tab-separated accelerometer x/y/z values
  Serial.print("a:\t");
  Serial.print(ax);
  Serial.print("\t");
  Serial.print(ay);
  Serial.print("\t");
  Serial.print(az);
  Serial.println();
  */
}

/*
   Copyright (c) 2016 Intel Corporation.  All rights reserved.

   This library is free software; you can redistribute it and/or
   modify it under the terms of the GNU Lesser General Public
   License as published by the Free Software Foundation; either
   version 2.1 of the License, or (at your option) any later version.

   This library is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
   Lesser General Public License for more details.

   You should have received a copy of the GNU Lesser General Public
   License along with this library; if not, write to the Free Software
   Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

*/

