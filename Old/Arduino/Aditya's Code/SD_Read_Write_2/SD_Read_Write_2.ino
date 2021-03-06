#include <SD.h>
#include <SPI.h>


int CS_PIN = 10;

File file;

void setup()
{
                   // wait for a second

  
  Serial.begin(115200);

  initializeSD();
  openFile("img.jpg");
  String a;

  // need to find out how many lines in a code
  for(int i = 814; i != 0; i--)
  {
    a = readLine();

    // Use blakes RF Code to tramsmit
    Serial.println(a);
    
  }

  closeFile();





}
void loop()
{
}
































void initializeSD()
{
  Serial.println("Initializing SD card...");
  //pinMode(CS_PIN, OUTPUT);

  if (SD.begin())
  {
    Serial.println("SD card is ready to use.");
  } else
  {
    Serial.println("SD card initialization failed");
    return;
  }
}

int createFile(char filename[])
{
  file = SD.open(filename, FILE_WRITE);

  if (file)
  {
    Serial.println("File created successfully.");
    return 1;
  } else
  {
    Serial.println("Error while creating file.");
    return 0;
  }
}

int writeToFile(char text[])
{
  if (file)
  {
    file.println(text);
    Serial.println("Writing to file: ");
    Serial.println(text);
    return 1;
  } else
  {
    Serial.println("Couldn't write to file");
    return 0;
  }
}

void closeFile()
{
  if (file)
  {
    file.close();
    Serial.println("File closed");
  }
}

int openFile(char filename[])
{
  file = SD.open(filename);
  if (file)
  {
    Serial.println("File opened with success!");
    return 1;
  } else
  {
    Serial.println("Error opening file...");
    return 0;
  }
}

String readLine()
{
  String received = "";
  char ch;
  while (file.available())
  {
    ch = file.read();
    if (ch == '\n')
    {
      return String(received);
    }
    else
    {
      received += ch;
    }
  }
  return "";
}






