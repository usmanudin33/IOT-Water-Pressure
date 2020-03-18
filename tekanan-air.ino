#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

//pin definition
#define IN1 4

//tekanan
float OffSet = 0.483 ;
float V, P;
/* A0 --- KABEL BIRU Sensor Tekanan
 * D2 --- KABELCOKELAT
 * D3 --- KABEL PUTIH
 * D4 --- KABRL HITAM Valve Selenoid
 * GND--- KABEL HITAM
 * VU --- KABEL MERAH
 */


int kontrol;
const char* ssid = "indihome";                  // Your wifi Name       
const char* password = "12345678";          // Your wifi Password
String Url1 =("http://192.168.43.197/tekanan-air/php/node.mcu/valve.php");
String Url2 =("http://192.168.43.197/tekanan-air/php/node.mcu/insertDB.php");
String Url1 =("http://192.168.43.197/tekanan-air/php/node.mcu/status-valve.php");
void setup() {
  // put your setup code here, to run once:
 pinMode(IN1, OUTPUT);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(250);
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.println("Connected to Network/SSID");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}

void loop() {
  
  // put your main code here, to run repeatedly:
  HTTPClient http;    //Declare object of class HTTPClient
 
  String ValueSend, postData;
  V = analogRead(A0)*5.00 /1024;
  P = (V - OffSet) * 400;
  float tvalue = P;  //Read Analog value of LDR
  ValueSend = String(tvalue);   //String to interger conversion
 
  //Post Data
  postData = "tvalue=" + ValueSend;
  
  http.begin(Url2);              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
 
  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload


  //Serial.println("tekanan Value=" + tvalue);
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload
  Serial.println("preasure Value=" +ValueSend);
  Serial.print("Voltage = ");
  Serial.println(V);
  
  http.begin(Url1);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
  int ambil = http.GET();
  delay(1000);
  int valve = http.getString().toInt();
  Serial.print("    valve : ");
  Serial.println(valve);

  
  http.end();  //Close connection

  int Vsel=digitalRead(IN1);
  if(valve == 1){
digitalWrite(IN1, HIGH);
  //print the motor satus in the serial monitor
  Serial.print("Is moving = ");
  Serial.print(digitalRead(IN1));
  Serial.print("   ");
  Serial.print(" cek valve = ");
  Serial.println(valve);
  }else{
    digitalWrite(IN1, LOW);
    Serial.print("Is moving = ");
  Serial.print(digitalRead(IN1));
  Serial.print("   ");
  Serial.print(" cek valve = ");
  Serial.println(valve);
    }
}
