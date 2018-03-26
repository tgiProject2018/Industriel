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

def on_message(*args):
  dic = args[0]
  print ("message:", dic['message'],"Pseudo:", dic['pseudo'])
  db = MySQLdb.connect(host="localhost", port=3306, user="root", passwd="", db="classevirtuel")
  cursor = db.cursor()
  sql = "INSERT INTO `message`(`Pseudo`, `Message`, `TempMessage`) VALUES ('"+str(dic['pseudo'])+"','"+str(dic['message'])+"',Now())"
  cursor.execute(sql)
  db.commit()
  db.close()
  
def on_donneDB_Server():
  print ("database")
  db = MySQLdb.connect(host="localhost", port=3306, user="root", passwd="", db="dbsystemcontrolleur")
  cursor = db.cursor()
  sql = "SELECT `nom`,`prenom`,`adresse` FROM `tblclient` "
  cursor.execute(sql)
  results = cursor.fetchall()
  socketIO.emit('getDataBase',results)
  db.commit()
  db.close()  
  
  
socketIO = SocketIO('localhost', 8080)
socketIO.on('connect', on_connect)
socketIO.on('disconnect', on_disconnect)
socketIO.on('reconnect', on_reconnect)
socketIO.on('messageServer', on_message)
socketIO.on('donneDB_Server', on_donneDB_Server)


socketIO.wait()

