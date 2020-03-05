#include <DHTesp.h>
#include <WiFiClient.h> 
#include <ESP8266WiFi.h> //Library untuk wifi pada nodemcu

//#include <HTTPClient.h> //Transmisi data menggunakan HTTP sbegai client
#include <ESP8266HTTPClient.h>

const char *ssid = "1234"; //Koneksikan ke ssid
const char *pass = ""; //ketikkan passwd
WiFiClient client; //Wifi module dalam mdode Client

DHTesp dht; //Library setup untuk Sensor DHT11

#define LEDStatusDanger D1 //LED status Kelembapan Tinggi
#define LEDStatusOK D2 //LED Status Kelembapan Rendah
#define LEDStatusWarn D3 //LED unutk kondisi alat 

void setup()
{

  Serial.begin(9600);
  delayMicroseconds(100);

  //Koneksi kedalam gateway
  WiFi.hostname("nodemcu-ricosl"); //hotname pada nodemcu
  Serial.println("Menyambungkan Ke "); //mencoba terhubung ke dalam gateway
  Serial.println(ssid);
  
  WiFi.begin(ssid, pass);
  while (WiFi.status() == WL_CONNECT_FAILED){
    delay(200);
    Serial.print(">>");
  }
  Serial.println();
  Serial.println("Koneksi Berhasil");
  //------------------------------------------------------------//

  //Setup sensor DHT11 untuk NodeMCU terhadap Serial Monitor
  Serial.println();
  Serial.println("Status\t\tHumidity (%)\t\tTemperature (C)\t");
  
  dht.setup(16, DHTesp::DHT11); //Kendali data unutk sensor DHT11 berada di Pin D0 atau GPIO 16
  
  pinMode(LEDStatusDanger, OUTPUT); //LED status Kelembapan Tinggi
  pinMode(LEDStatusOK, OUTPUT); //LED status Kelembapan Rendah
  pinMode(LEDStatusWarn, OUTPUT); //Status Alat

  digitalWrite(LEDStatusDanger, HIGH);
  delay(400);
  digitalWrite(LEDStatusOK, HIGH);
  delay(300);
  digitalWrite(LEDStatusWarn, HIGH);
  delay(200);
  digitalWrite(LEDStatusDanger, LOW);
  delay(200);
  digitalWrite(LEDStatusOK, LOW);
  delay(300);
  digitalWrite(LEDStatusWarn, LOW);
  delay(400);

  digitalWrite(LEDStatusDanger, HIGH);
  delay(400);
  digitalWrite(LEDStatusOK, HIGH);
  delay(300);
  digitalWrite(LEDStatusWarn, HIGH);
  delay(200);
  digitalWrite(LEDStatusDanger, LOW);
  delay(200);
  digitalWrite(LEDStatusOK, LOW);
  delay(300);
  digitalWrite(LEDStatusWarn, LOW);
  delay(400);

  digitalWrite(LEDStatusDanger, HIGH);
  delay(400);
  digitalWrite(LEDStatusOK, HIGH);
  delay(300);
  digitalWrite(LEDStatusWarn, HIGH);
  delay(200);
  digitalWrite(LEDStatusDanger, LOW);
  delay(200);
  digitalWrite(LEDStatusOK, LOW);
  delay(300);
  digitalWrite(LEDStatusWarn, LOW);
  delay(400);
}
void loop()
{
  //delay(dht.getMinimumSamplingPeriod() + 100);
  //Server Setting
  HTTPClient http;
  String humiditySend, tempSend,postData;
  
  float humidity = dht.getHumidity();
  float temperature = dht.getTemperature();
  String statusDevice = dht.getStatusString();

  //Parse kedalam String
  humiditySend = String(humidity);
  tempSend= String(temperature);

  postData = "humiditySend=" + humiditySend + "&tempSend=" + tempSend + "&statusDevice=" + statusDevice;

  //Sent Data
  http.begin("http://192.168.43.7/Server/Semester%204/Sensor%20Suhu/InsertDB.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
 
  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  Serial.print("Status: ");
  Serial.print(statusDevice);
  Serial.print("\t");
  Serial.print("Humidity (%): ");
  Serial.print(humidity, 1);
  Serial.print("\t");
  Serial.print("Temperature (C): ");
  Serial.print(temperature, 1);
  Serial.print("\t");
  Serial.println();

  if ((humidity <= 70.0) && (humidity >= 0.0))
  {
    digitalWrite(LEDStatusDanger, LOW);
    delayMicroseconds(300);
    digitalWrite(LEDStatusOK, HIGH);
    delayMicroseconds(300);
  }
  else if ((humidity >= 70.0) && (humidity <= 100.0))
  {
    digitalWrite(LEDStatusDanger, HIGH);
    delayMicroseconds(300);
    digitalWrite(LEDStatusOK, LOW);
    delayMicroseconds(300);
  }
  else if (statusDevice == "TIMEOUT")
  {
    digitalWrite(LEDStatusDanger, LOW);
    digitalWrite(LEDStatusOK, LOW);

    digitalWrite(LEDStatusWarn, HIGH);
    delay(1200); 
    digitalWrite(LEDStatusWarn, LOW);
  }
  delay(2000);
}
