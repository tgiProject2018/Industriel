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
    adc.configure()
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
        self.threadID = threadID
        self.name = name
        self.counter = counter
    def run(self):
        #IndustrielShell().cmdloop()
        while True:
            print(get_level())
            time.sleep(2)

##main
tacheShell = Tache_Shell(1, "tache_Shell", 1)

tacheShell.start()