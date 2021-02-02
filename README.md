<p align="center">
  <a href="https://github.com/el1telordy/ClimPi"><img src="https://raw.githubusercontent.com/el1telordy/ClimPi/main/ico.svg" height="100"></a>
</p>
<span align="center">
  
# ClimPi

</span>

ClimPi is a web-dashboard that you can run on Raspberry Pi. It shows data from DHT-22 sensor.

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

```bash
sudo apt-get update && sudo apt-get upgrade -y
```

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
sudo apt install mariadb-server -y
sudo pip3 install mysql-connector-python
```
After installation, setup MariaDB:
```bash
sudo mysql_secure_installation
```

Next, create database, user with privileges and table for data from sensor:
```bash
sudo mysql
CREATE DATABASE climpi;
CREATE USER 'pi'@'localhost' IDENTIFIED BY 'climpass';
GRANT ALL PRIVILEGES ON climpi.* TO 'pi'@'localhost';
FLUSH PRIVILEGES;
use climpi;
CREATE TABLE climate(date TIMESTAMP, temperature INT, humidity INT);
```

## Web Server
```bash
sudo apt install apache2 -y
```

Run this command after installation to remove default start page:
```bash
sudo rm -rf /var/www/html/index.html
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
sudo chmod -R 770 /var/www/html/
sudo chown -R pi:www-data /var/www/html/
git clone https://github.com/el1telordy/ClimPi.git
```

Go to project folder:
```bash
cd /var/www/html/ClimPi/
```

Schedule python script to run every 5 minutes.
```bash
crontab -e
#enter 1 (nano editor)
#add next string to the end of the file:
*/5 * * * * /var/www/html/ClimPi/climsql.py
#save by pressing ctrl+x and then Y
```

Reboot Raspberry Pi.
```
sudo reboot
```
/*under construction*/

## Author
- [el1telordy](https://github.com/el1telordy)
