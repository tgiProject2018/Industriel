# -*- coding: utf-8  -*-
from socketIO_client import SocketIO

import time
import mysql.connector
import ast

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
  db = mysql.connector.connect(host="localhost", port=3306, user="root", passwd="", db="classevirtuel")
  cursor = db.cursor()
  sql = "INSERT INTO `message`(`Pseudo`, `Message`, `TempMessage`) VALUES ('"+str(dic['pseudo'])+"','"+str(dic['message'])+"',Now())"
  cursor.execute(sql)
  db.commit()
  db.close()
  
def on_donneDB_Server():
  print ("database")
  db = mysql.connector.connect(host="127.0.0.1", user="root", passwd="", db="dbsystemcontrolleur")
  cursor = db.cursor()
  sql = "SELECT `nom`,`prenom`,`adresse` FROM `tblclient` "
  cursor.execute(sql)
  results = cursor.fetchall()
  socketIO.emit('getDataBase',results)
  db.commit()
  db.close() 
  
def on_Login(username, password):
    print ("login started")
    db = mysql.connector.connect(host="localhost", port=3306, user="root", passwd="", db="dbsystemcontrolleur")
    cursor = db.cursor()
    cursor.execute("Select utilisateur, password From tblClient where tblClient.utilisateur =%s and tblClient.password =%s",  (username, password))
    print ("sql executed")
    results = cursor.fetchall()
    if not results:
        print ("login failed")
        socketIO.emit('error')
        print ("socket emit mauvaise_connection")
    else:
        print ("login succesful")
     
        socketIO.emit('redirect', username, password)
        print ("socket emit redirectTo")
    db.commit()
    db.close() 

def on_Save_echeancier(prenom, nom, produit1, produit2, produit3, dateLivraison):
    msg = "Echeancier Sauveguarder\nClient: %s %s\n Produit: %s %s %s \n Date de livraison %s" %(prenom, nom, produit1, produit2, produit3, dateLivraison)
    socketIO.emit('echeancier_resultat', msg)

def on_Sync():
    msg = "Synchronisation Reussie"
    socketIO.emit('sync_reussi', msg)

socketIO = SocketIO('localhost', 8080)
socketIO.on('connect', on_connect)
socketIO.on('disconnect', on_disconnect)
socketIO.on('reconnect', on_reconnect)
socketIO.on('messageServer', on_message)
socketIO.on('donneDB_Server', on_donneDB_Server)
socketIO.on('login', on_Login)
socketIO.on('save_echeancier', on_Save_echeancier)
socketIO.on('synchronisation_serveur', on_Sync)

socketIO.wait()

