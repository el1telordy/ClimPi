#!/usr/bin/env python3.7
# -*- coding: utf-8 -*-

import sys, adafruit_dht, pytz
from datetime import datetime
import mysql.connector

PIN=4
device = adafruit_dht.DHT22(PIN)

cnx = mysql.connector.connect(user='pi', password='xiaomitop', database='climate')
cursor = cnx.cursor(buffered=True)

def getTime():
    # current date and time
    localTz = pytz.timezone('Europe/Moscow')
    now = datetime.now()
    timestamp = datetime.timestamp(now)
    return(datetime.utcfromtimestamp(timestamp).strftime('%Y-%m-%d %H:%M:%S'))

def getSensors():
    temp = int(device.temperature)
    #temp = 25
    #hum = 32
    hum = int(device.humidity)
    return(temp, hum)

def main():
    time = getTime()
    print(time)
    t = getSensors()[0]
    h = getSensors()[1]
    cursor.execute("""INSERT INTO clim1 (date, temperature, humidity) VALUES ('%s', %s, %s)""" % (time,t,h))
    cnx.commit()
    cursor.close()
    cnx.close()

if __name__ == "__main__":
   main()