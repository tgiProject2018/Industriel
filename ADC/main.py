import Adafruit_ADS1015
import threading



class Tache_ReadADS1015(threading.Thread):
    def __init__(self, threadID, name, counter):
        self.threadID = threadID
        self.name = name
        self.counter = counter

    def run(self):
        ads1015 = ADS1015()
        while True:
            ads1015.read_level()


class Tache_ReadTemp(threading.Thread):
    def __init__(self, threadID, name, counter):
        self.threadID = threadID
        self.name = name
        self.counter = counter
    def run(self):
        therm = Temp()
        while True:
            therm.read_temp()

class Tache_Shell(threading.Thread):
    def __init__(self, threadID, name, counter):
        self.threadID = threadID
        self.name = name
        self.counter = counter
    def run(self):
        IndustrielShell().cmdloop()

##main
#tacheADS1015 = Tache_ReadADS1015(1, "tache_ADS1015", 1)
tacheTemperature = Tache_ReadTemp(2, "tache_Temperature", 2)
tacheShell = Tache_Shell(1, "tache_Shell", 1)

#tacheADS1015.start()
tacheTemperature.start()
tacheShell.start()