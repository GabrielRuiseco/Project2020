#include <Stepper.h>
#include <Servo.h>
#include <ESP8266WiFi.h>
#include "Adafruit_MQTT.h"
#include "Adafruit_MQTT_Client.h"

/************************* Network Setup *********************************/

#define WLAN_SSID       "ARRIS-4122"
#define WLAN_PASS       "123@ster!sco"

/************************* Adafruit.io Setup *********************************/

#define AIO_SERVER      "io.adafruit.com"
#define AIO_SERVERPORT  1883                   // use 8883 for SSL
#define AIO_USERNAME    "gabriel_rc"
#define AIO_KEY         "aio_ymif220PeInF0OUsEnM7AyHyOxCX"
#define AIO_GROUP       "project."

/************ Global State  ******************/

// Create an ESP8266 WiFiClient class to connect to the MQTT server.
WiFiClient client;
// or... use WiFiFlientSecure for SSL
//WiFiClientSecure client;

// Setup the MQTT client class by passing in the WiFi client and MQTT server and login details.
Adafruit_MQTT_Client mqtt(&client, AIO_SERVER, AIO_SERVERPORT, AIO_USERNAME, AIO_KEY);

/****************************** Feeds ***************************************/

// Setup a feed called '' for publishing.
// Notice MQTT paths for AIO follow the form: <username>/feeds/<feedname>
Adafruit_MQTT_Publish LevelFeed = Adafruit_MQTT_Publish(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"levelfeed");
Adafruit_MQTT_Publish PresenceFeed = Adafruit_MQTT_Publish(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"presencefeed");
// Setup a feed called '' for subscribing to changes.
Adafruit_MQTT_Subscribe ServoFeed = Adafruit_MQTT_Subscribe(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"servofeed");
Adafruit_MQTT_Subscribe StepMotorFeed = Adafruit_MQTT_Subscribe(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"stepmotorfeed");
Adafruit_MQTT_Subscribe Mix1Feed = Adafruit_MQTT_Subscribe(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"mix1feed");
Adafruit_MQTT_Subscribe Mix2Feed = Adafruit_MQTT_Subscribe(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"mix2feed");
Adafruit_MQTT_Subscribe Mix3Feed = Adafruit_MQTT_Subscribe(&mqtt, AIO_USERNAME "/feeds/"AIO_GROUP"mix3feed");

/*************************** Sketch Code ************************************/

void MQTT_connect();

#define STEPS 20
int numSteps;
int count = 0;
int seqcount = 0;
int pos1 = 20;
int pos2 = 40;
int pos3 = 60;
int pos4 = 80;

Stepper stepper(STEPS, D1, D2, D3, D4);
Servo servoMotor;

uint16_t distVarValue1 = 0;
uint16_t distVarValue2 = 0;

long tiempoUltimaLectura = 0;

const int Trigger = D5;
const int Echo = D6;
const int Trigger1 = D7;
const int Echo1 = D8;

void setup() {
  Serial.begin(115200);
  servoMotor.attach(D0);
  stepper.setSpeed(5);
  delay(10);
  pinMode(Trigger, OUTPUT);
  pinMode(Echo, INPUT);
  pinMode(Trigger1, OUTPUT);
  pinMode(Echo1, INPUT);
  digitalWrite(Trigger, LOW);
  digitalWrite(Trigger1, LOW);

  Serial.println(F("Adafruit MQTT demo"));

  // Connect to WiFi access point.
  Serial.println(); Serial.println();
  Serial.print("Connecting to ");
  Serial.println(WLAN_SSID);
  WiFi.begin(WLAN_SSID, WLAN_PASS);
  while (WiFi.status() != WL_CONNECTED) {
    delay(200);
    Serial.print(".");
    delay(300);
  }
  Serial.println();

  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  mqtt.subscribe(&ServoFeed);
  mqtt.subscribe(&StepMotorFeed);

}

void loop() {
  // Ensure the connection to the MQTT server is alive (this will make the first
  // connection and automatically reconnect when disconnected).  See the MQTT_connect
  // function definition further below.
  MQTT_connect();

  /*************************** Subscitions Code ************************************/

  Adafruit_MQTT_Subscribe *subscription;
  while ((subscription = mqtt.readSubscription(5000))) {
    if (subscription == &ServoFeed) {
      Serial.print(F("Servo Feed: "));
      Serial.println((char *)ServoFeed.lastread);
      if (strcmp((char *)ServoFeed.lastread, "ON") == 0) {
        servoMotor.write(90);
        Serial.println("ON");
        Serial.println(strcmp((char *)ServoFeed.lastread, "ON"));
        delay(2000);
      } else if (strcmp((char *)ServoFeed.lastread, "OFF") == 0) {
        servoMotor.write(0);
        Serial.println("OFF");
        Serial.println(strcmp((char *)ServoFeed.lastread, "OFF"));
        delay(2000);
      }
    }
    if (subscription == &StepMotorFeed) {
      Serial.print(F("Step Motor Feed: "));
      Serial.println((char *)StepMotorFeed.lastread);
      numSteps = atoi((char *)StepMotorFeed.lastread);
      stepper.step(numSteps);
    }

    if (subscription == &Mix1Feed) {
      Serial.print(F("Mix 1"));
      Serial.println((char *)StepMotorFeed.lastread);
      if (Mix1Feed.lastread == 1) {
        if (seqcount = 0) {
          seqcount++;
          secuencia1();
        }
      }
    }

    if (subscription == &Mix2Feed) {
      Serial.print(F("Mix 2"));
      Serial.println((char *)StepMotorFeed.lastread);
      if (Mix2Feed.lastread == 1) {
        if (seqcount = 0) {
          seqcount++;
          secuencia2();
        }
      }
    }

    if (subscription == &Mix3Feed) {
      Serial.print(F("Mix 3"));
      Serial.println((char *)StepMotorFeed.lastread);
      if (Mix3Feed.lastread == 1) {
        if (seqcount = 0) {
          seqcount++;
          secuencia3();
        }
      }
    }
  }

  /*************************** Publish Code ************************************/

  if (millis() - tiempoUltimaLectura > 30000) {
    distVarValue1 = distancia(Trigger, Echo);
    distVarValue2 = distancia(Trigger1, Echo1);

    if (distVarValue1 > 50 && distVarValue2 > 50) {
      seqcount = 0;
    }

    if (! LevelFeed.publish(distVarValue1)) {
      Serial.println(F("Failed Distancia"));
    } else {
      Serial.println(F("OK! Distancia"));
      Serial.print("distVarValue:");
      Serial.println(distVarValue1);
    }

    if (! PresenceFeed.publish(distVarValue2)) {
      Serial.println(F("Failed Distancia"));
    }  else {
      Serial.println(F("OK! Distancia"));
      Serial.print("distVarValue:");
      Serial.println(distVarValue2);
    }
    tiempoUltimaLectura = millis();
  }

  // ping the server to keep the mqtt connection alive
  // NOT required if you are publishing once every KEEPALIVE seconds
  /*
    if(! mqtt.ping()) {
    mqtt.disconnect();
    }
  */
  delay(100);
}

// Function to connect and reconnect as necessary to the MQTT server.
// Should be called in the loop function and it will take care if connecting.
void MQTT_connect() {
  int8_t ret;

  // Stop if already connected.
  if (mqtt.connected()) {
    return;
  }

  Serial.print("Connecting to MQTT... ");

  uint8_t retries = 3;
  while ((ret = mqtt.connect()) != 0) { // connect will return 0 for connected
    Serial.println(mqtt.connectErrorString(ret));
    Serial.println("Retrying MQTT connection in 5 seconds...");
    mqtt.disconnect();
    delay(5000);  // wait 5 seconds
    retries--;
    if (retries == 0) {
      // basically die and wait for WDT to reset me
      while (1);
    }
  }
  Serial.println("MQTT Connected!");
}

long distancia(int trigger, int echo) {
  long t; //timepo que demora en llegar el eco
  long d; //distancia en centimetros

  digitalWrite(trigger, HIGH);
  delayMicroseconds(10);          //Enviamos un pulso de 10us
  digitalWrite(trigger, LOW);
  t = pulseIn(echo, HIGH); //obtenemos el ancho del pulso
  d = t / 59;           //escalamos el tiempo a una distancia en cm
  return d;
}

void secuencia1() {
  stepper.step(pos1);
  servoMotor.write(90);
  delay(3000);
  servoMotor.write(0);
  count++;

  if (count == 1) {
    stepper.step(pos2);
    servoMotor.write(90);
    delay(3000);
    servoMotor.write(0);
    count++;
  } else {
    count = 0;
  }

  if (count == 2) {
    stepper.step(pos3);
    servoMotor.write(90);
    delay(3000);
    servoMotor.write(0);
    count++;
  } else {
    count = 0;
  }

  if (count == 3) {
    stepper.step(pos4);
    servoMotor.write(90);
    delay(3000);
    servoMotor.write(0);
    count = 0;
  } else {
    count = 0;
  }
}

void secuencia2() {
  stepper.step(pos2);
  servoMotor.write(90);
  delay(3000);
  servoMotor.write(0);
  count++;

  if (count == 1) {
    stepper.step(pos3);
    servoMotor.write(90);
    delay(3000);
    servoMotor.write(0);
    count++;
  } else {
    count = 0;
  }

  if (count == 2) {
    stepper.step(pos4);
    servoMotor.write(90);
    delay(3000);
    servoMotor.write(0);
    count = 0;
  } else {
    count = 0;
  }
}


void secuencia3() {
  stepper.step(pos3);
  servoMotor.write(90);
  delay(3000);
  servoMotor.write(0);
  count++;

  if (count == 1) {
    stepper.step(pos4);
    servoMotor.write(90);
    delay(3000);
    servoMotor.write(0);
    count = 0;
  } else {
    count = 0;
  }
}
