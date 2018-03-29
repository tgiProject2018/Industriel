# -*- coding: utf-8  -*-
from socketIO_client import SocketIO

import MySQLdb

import sys
import json
from pprint import pprint
def on_connect():
    print('connect')

def on_disconnect():
    print('disconnect')

def on_reconnect():
    print('reconnect')
def on_donneDB_Server():
  print ("database")
  db = MySQLdb.connect(host="localhost", port=3306, user="root", passwd="", db="siteweb")
  cursor = db.cursor()
  sql = "SELECT `Nom`,`Prenom`,`Adresse`,`Telephone` FROM `client` "
  cursor.execute(sql)
  results = cursor.fetchall()
  socketIO.emit('getDataBase',results)
  db.commit()
  db.close()  
  
  
socketIO = SocketIO('localhost', 8080)
socketIO.on('connect', on_connect)
socketIO.on('disconnect', on_disconnect)
socketIO.on('reconnect', on_reconnect)
socketIO.on('donneDB_Server', on_donneDB_Server)


socketIO.wait()

