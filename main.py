#!/usr/bin/env python
# -*- coding: utf-8 -*-

from ADC import ADS1015 as ADC
from Thermometre import MLX as MLX
from Shell.shell import IndustrielShell
from Shell.sendToServer import Transfere

#import Thermometre as Therm
from socketIO_client import SocketIO
import threading
import time

# Instanciation des capteurs
adc = ADC.ADS1015()
therm = MLX.MLX()

# Fonction retournant le niveau de liquide courant
def get_level():
    #adc.configure()
    lvl = adc.read_level()
    return lvl

# Fonction retournant la température courante
def get_temp():
    #therm.configure()
    temp = therm.read_temp()
    return temp

def save_current_user_data():
    return

def config_date(sDate):
    return

def send_data(ip):
    return

class Tache_Shell(threading.Thread):
    def __init__(self, threadID, name, counter):
        threading.Thread.__init__(Tache_Shell)
        self.threadID = threadID
        self.name = name
        self.counter = counter

    def run(self):
        IndustrielShell().cmdloop()
        # counter = 1
        # Main loop for testing stubs
        # while counter <= 5:
        #     print("----- Lecture " + str(counter) + " -----")
        #     print("Niveau: " + str(get_level()))
        #     print("Temperature: " + str(get_temp()))
        #     print("----- Fin lecture " + str(counter) + " -----\n")
        #     time.sleep(1)
        #     counter+=1

class Tache_Flask(threading.Thread):
    def __init__(self, threadID, name, counter):
        threading.Thread.__init__(Tache_Flask)
        self.threadID = threadID
        self.name = name
        self.counter = counter

    def run(self):
        #IndustrielUI.loop()
        counter = 1
        # Main loop for testing stubs
        # while counter <= 5:
        #     print("----- Lecture " + str(counter) + " -----")
        #     print("Niveau: " + str(get_level()))
        #     print("Temperature: " + str(get_temp()))
        #     print("----- Fin lecture " + str(counter) + " -----\n")
        #     time.sleep(1)
        #     counter+=1
# main

# Écoute de l'application web par sockets
# socketIO = SocketIO('localhost', 8080)
# socketIO.on('...', send_data())

# Déclaration des threads
tacheShell = Tache_Shell(1, "tache_Shell", 1)
tacheFlask = Tache_Flask(2, "tache_Flask", 2)

# Départ des threads
tacheShell.start()
#tacheFlask.start()

# Écoute des sockets
# print("À l'écoute des messages web...")
# socketIO.wait()