#!/usr/bin/env python
# -*- coding: utf-8 -*-

import fonctions
from Shell.shell import IndustrielShell
#from Flask import flaskIndustriel
from Shell.sendToServer import Transfere
from flask import Flask, render_template

#from socketIO_client import SocketIO
from threading import Thread
import time 


class Tache_Shell(Thread):
    def __init__(self, threadID, name, counter):
        Thread.__init__(self)
        self.threadID = threadID
        self.name = name
        self.counter = counter

    def run(self):
        IndustrielShell().cmdloop()

class Tache_Flask(Thread):
    def __init__(self, threadID, name, counter):
        Thread.__init__(self)
        self.threadID = threadID
        self.name = name
        self.counter = counter

    def run(self):
		app = Flask("__main__")
		app.run()
		app.register_blueprint(app, url_prefix='/Flask')
		
# main

# Écoute de l'application web par sockets
# socketIO = SocketIO('localhost', 8080)
# socketIO.on('...', send_data())

# Déclaration des threads
tacheShell = Tache_Shell(1, "tache_Shell", 1)
tacheFlask = Tache_Flask(2, "tache_Flask", 2)

# Départ des threads
#tacheShell.start()
tacheFlask.start()

# Écoute des sockets
# print("À l'écoute des messages web...")
# socketIO.wait()
