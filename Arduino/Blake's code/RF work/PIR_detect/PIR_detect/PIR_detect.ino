//VCC to 5V
int calibrationTime = 30; //give yourself time to leave the room     
int pirPin = 2;   
void setup() 
{
  // put your setup code here, to run once:
  Serial.begin(9600);
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
}

void loop()
{
   if(digitalRead(pirPin) == HIGH)
   {
    Serial.println("1");
   }else
    {
    Serial.println("0");
    }
  // put your main code here, to run repeatedly: