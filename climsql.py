#!/usr/bin/env python3.7
# -*- coding: utf-8 -*-

import adafruit_dht, time, mysql.connector
from datetime import datetime

PIN=4 #DATA GPIO PIN
device = adafruit_dht.DHT22(PIN)

cnx = mysql.connector.connect(user='pi', password='xiaomitop', database='climate')
cursor = cnx.cursor(buffered=True)

def getTime():
    #current date
    now = datetime.now()
    timestamp = datetime.timestamp(now)
    return(datetime.utcfromtimestamp(timestamp).strftime('%Y-%m-%d %H:%M:%S'))

def getSensors():
    temp = int(device.temperature)
    hum = int(device.humidity)
    return(temp, hum)

def main():
    timestamp = getTime()
    getSensors() #"warm-up" function call
    time.sleep(2)
    t = getSensors()[0]
    h = getSensors()[1]
    cursor.execute("""INSERT INTO clim1 (date, temperature, humidity) VALUES ('%s', %s, %s)""" % (timestamp,t,h))
    cnx.commit()
    cursor.close()
    cnx.close()

if __name__ == "__main__":
    main()
