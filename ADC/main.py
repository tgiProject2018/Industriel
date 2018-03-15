#!/usr/bin/env python
# -*- coding: utf-8 -*-

import ADS1015 as ADC
#import Thermometre as Therm

import threading
import time

# Instanciation des capteurs
adc = ADC.ADS1015()
#therm = Thermometre()

# Fonction retournant le niveau de liquide courant
def get_level():
    #adc.configure()
    lvl = adc.read_level()
    return lvl

# Fonction retournant la température courante
def get_temp():
    #therm.configure()
    temp = 1#therm.read_temp()
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
        #IndustrielShell().cmdloop()
        counter = 1
        # Main loop for testing stubs
        while counter <= 5:
            print("----- Lecture " + str(counter) + " -----")
            print("Niveau: " + str(get_level()))
            print("Temperature: " + str(get_temp()))
            print("----- Fin lecture " + str(counter) + " -----\n")
            time.sleep(1)
            counter+=1

##main
tacheShell = Tache_Shell(1, "tache_Shell", 1)

# Start the thread
tacheShell.start()