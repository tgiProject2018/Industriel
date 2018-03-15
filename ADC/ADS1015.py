import random
#import smbus

ADS1015_DEFAULT_ADDRESS = 0x0048
ADS1015_CONVERSION_POINTER = 0x00
ADS1015_CONFIG_POINTER = 0x01
ADS1015_LOW_THRESH_POINTER = 0x02
ADS1015_HIGH_THRESH_POINTER = 0x03


class ADS1015(object):
    def __init__(self, address=ADS1015_DEFAULT_ADDRESS, i2c=None, **kwargs):
        #allo=1
        self.configure()
        #if i2c is None:
            #import Adafruit_GPIO.I2C as I2C
            #i2c = I2C
        #self._device = i2c.get_i2c_device(address, **kwargs)
        

    def read_level(self):
        #self._device.writeList()
        # On s assure qu auncune conversion n est en cours en verifiant
        # le registre OS du convertisseur
        #is_converting = _device.
        return random.randint(0,1)

    def configure(self):
        config = 0x8000
        #config |= 
        self.data_rate = 0x0080 # 1600
        self.mux = 0 # Config par defaut
        self.mode = 1 # Power-down single-shot mode
        
