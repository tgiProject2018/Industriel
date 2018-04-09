import random
import time

ADS1015_DEFAULT_ADDRESS = 0x0048
ADS1015_CONVERSION_POINTER = 0x00
ADS1015_CONFIG_POINTER = 0x01
ADS1015_LOW_THRESH_POINTER = 0x02
ADS1015_HIGH_THRESH_POINTER = 0x03

ADS1015_DATA_RATE = 1600

class ADS1015(object):
    def __init__(self, address=ADS1015_DEFAULT_ADDRESS, i2c=None, **kwargs):
        #allo=1
        if i2c is None:
            import Adafruit_GPIO.I2C as I2C
            i2c = I2C
        self._device = i2c.get_i2c_device(address, **kwargs)
        self.read_level()

    def read_level(self):
        self.configure()

        # On s assure qu auncune conversion n est pas en cours en verifiant
        # le registre OS du convertisseur
        while (self._device.readList(ADS1015_CONFIG_POINTER, 1) == 1):
            #print("Waiting...")
            time.sleep(1 / ADS1015_DATA_RATE + 0.001)
        
        time.sleep(1 / ADS1015_DATA_RATE + 0.001)
        
        value = self._device.readList(ADS1015_CONVERSION_POINTER, 2)
        valeur = (value[0] << 8) | value[1]
        print(valeur)
        
        if (valeur > 10000):
            return 0
        else:
            return 100

    def configure(self):
        config = 0x8000

        # Register
        #  OS   MUX2   MUX1   MUX0   PGA2   PGA1   PGA0   MODE   DR2   DR1   DR0  ...
        #   1    0      0      0      0      1      0      1      1     0     0
        data_rate = 0b010 << 5 # 1600
        mux = 0 << 12# Config par defaut
        os = 1 << 15 # Power-down single-shot mode
        gain = 0b010 << 9
        mode = 1 << 8
        config |= data_rate | mode | gain | mux | os
        
        # On ecrit dans le registre de configuration en convertissant en little endian
        self._device.writeList(ADS1015_CONFIG_POINTER, [(config >> 8) & 0xFF, config & 0xFF])

    def valeur_convertie(self, low, high):
        # Convertir en valeur signee 12-bit
        value = ((high & 0xFF) << 4) | ((low & 0xFF) >> 4)

        # On verifie si le MSB est a 1 ou 0. S il est a 1, la valeur convertie est negative
        if value & 0x800 != 0:
            value -= 1 << 12
        return value
        
        
