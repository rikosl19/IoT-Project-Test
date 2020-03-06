#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

#define LED1 D0
#define LED2 D1
#define LED3 D2
#define LED4 D4   

const char* wifiName = "1234";
const char* wifiPass = "";

//Web Server address to read/write from 
const char *host = "http://192.168.43.7/Server/Semester%204/Komputasi%20Awan/api.php"; //using phone hostpot ip

void setup() {
   pinMode(LED1,OUTPUT);
   pinMode(LED2,OUTPUT);
   pinMode(LED3,OUTPUT);
   pinMode(LED4,OUTPUT);  

   
  Serial.begin(115200);
  delay(10);
  Serial.println();
  
  Serial.print("Connecting to ");
  Serial.println(wifiName);

  WiFi.begin(wifiName, wifiPass);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());   //You can get IP address assigned to ESP
}

void loop() {
  HTTPClient http;    //Declare object of class HTTPClient

  Serial.print("Request Link:");
  Serial.println(host);
  
  http.begin(host);     //Specify request destination
  
  int httpCode = http.GET();            //Send the request
  String payload = http.getString();    //Get the response payload from server

  Serial.print("Response Code:"); //200 is OK
  Serial.println(httpCode);   //Print HTTP return code

  Serial.print("Returned data from Server:");
  Serial.println(payload);    //Print request response payload
  
  if(httpCode == 200)
  {
    // Allocate JsonBuffer
    // Use arduinojson.org/assistant to compute the capacity.
    const size_t capacity = JSON_OBJECT_SIZE(3) + JSON_ARRAY_SIZE(2) + 60;
    DynamicJsonBuffer jsonBuffer(capacity);
  
   // Parse JSON object
    JsonObject& root = jsonBuffer.parseObject(payload);
    if (!root.success()) {
      Serial.println(F("Parsing failed!"));
      return;
    }
JsonObject& result_0 = root["result"][0];
JsonObject& result_1 = root["result"][1];
JsonObject& result_2 = root["result"][2];
JsonObject& result_3 = root["result"][3];

//JSON Parse LED1
    Serial.println(F("Response:"));
    Serial.println(result_0["id_lampu"].as<char*>());
    Serial.println(result_0["nama_lampu"].as<char*>());
    Serial.println(result_0["status"].as<char*>());

if (result_0["status"] == "ON1"){

Serial.println("LED1 Menyala");
digitalWrite(LED1, HIGH);
  
}else if (result_0["status"] == "OFF1"){

Serial.println("LED1 Mati");
digitalWrite(LED1, LOW); 
}

//JSON Parse LED2
    Serial.println(result_1["id_lampu"].as<char*>());
    Serial.println(result_1["nama_lampu"].as<char*>());
    Serial.println(result_1["status"].as<char*>());

if (result_1["status"] == "ON2"){

Serial.println("LED2 Menyala");
digitalWrite(LED2, HIGH);
  
}else if (result_1["status"] == "OFF2"){

Serial.println("LED2 Mati");
digitalWrite(LED2, LOW);
  
}

//JSON Parse LED3
    Serial.println(result_2["id_lampu"].as<char*>());
    Serial.println(result_2["nama_lampu"].as<char*>());
    Serial.println(result_2["status"].as<char*>());

if (result_2["status"] == "ON3"){

Serial.println("LED3 Menyala");
digitalWrite(LED3, HIGH);
  
}else if (result_2["status"] == "OFF3"){

Serial.println("LED3 Mati");
digitalWrite(LED3, LOW);
  
}

//JSON Parse LED4
    Serial.println(result_3["id_lampu"].as<char*>());
    Serial.println(result_3["nama_lampu"].as<char*>());
    Serial.println(result_3["status"].as<char*>());

if (result_3["status"] == "ON4"){

Serial.println("LED4 Menyala");
digitalWrite(LED4, LOW);
  
}else if (result_3["status"] == "OFF4"){

Serial.println("LED4 Mati");
digitalWrite(LED4, HIGH);
  
}

  }
  else
  {
    Serial.println("Error in response");
  }

  http.end();  //Close connection
  
  delay(500);  //GET Data at every 5 seconds
}
