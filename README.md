<p align="center">
  <a href="https://github.com/el1telordy/ClimPi"><img src="https://raw.githubusercontent.com/el1telordy/ClimPi/main/ico.svg" height="100"></a>
</p>
<span align="center">
  
# ClimPi

</span>

ClimPi is a web-interface that you can run on Raspberry Pi. It shows data from DHT-22 sensor.

- [ClimPi](#ClimPi)
  - [Getting Started](#getting-started)
    - [Python](#python)
    - [Adafruit_DHT Library](#adafruit_dht-library)
    - [Database](#database)
    - [Web Server](#web-server)
    - [PHP](#php)
  - [Usage](#Usage)
  - [Author](#author)

## Getting Started

Before installing ClimPi you should install next packages:

## Python
```bash
sudo apt install python3 python3-pip
```

## Adafruit_DHT Library
[source](https://github.com/adafruit/Adafruit_CircuitPython_DHT)
```bash
sudo pip3 install adafruit-circuitpython-dht
sudo apt-get install libgpiod2
```

## Database
```bash
sudo apt install mariadb-server
sudo pip install mysql-connector-python
```

## Web Server
```bash
sudo apt install apache2 -y
```

## PHP
```bash
sudo apt install php libapache2-mod-php -y
sudo apt-get install php7.3-mysql
```

## Usage
Clone this repo in apache projects folder:
```bash
cd /var/www/html/
git clone https://github.com/el1telordy/ClimPi.git
```

Go to project folder:
```bash
cd /var/www/html/ClimPi/
```

Schedule python script to run every 5 minute. Make sure that your login is *pi*. Otherwise replace *pi* in the end of the bottom command.
```bash
sudo echo "*/5 * * * * /var/www/html/climsql.py" >> /var/spool/cron/crontabs/pi
```
/*under construction*/

## Author
- [el1telordy](https://github.com/el1telordy)
