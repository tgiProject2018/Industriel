
import random

class MLX():
    def __init__(self, address=0, i2c=None, **kwargs):
        self.configure()
        #if i2c is None:
            #import Adafruit_GPIO.I2C as I2C
            #i2c = I2C
        #self._device = i2c.get_i2c_device(address, **kwargs)

    def read_temp(self):
        return random.randint(0,40)

    def configure(self):
        something = 0