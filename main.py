#!/usr/bin/env python
# -*- coding: utf-8 -*-

import fonctions
from Shell.shell import IndustrielShell
from Shell.sendToServer import Transfere
import fonctions
#import Thermometre as Therm
from socketIO_client import SocketIO
import threading
import time


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
        # IndustrielUI.loop()
        counter = 1
        # Main loop for testing stubs
        while counter <= 5:
            print("----- Lecture " + str(counter) + " -----")
            print("Niveau: " + str(fonctions.get_level()))
            print("Temperature: " + str(fonctions.get_temp()))
            print("----- Fin lecture " + str(counter) + " -----\n")
            time.sleep(1)
            counter+=1
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