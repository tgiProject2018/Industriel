
import random
import time
#import smbus

MLX_DEFAULT_ADDRESS = 0x5a
MLX_AMB_TEMP = 0x06
MLX_OBJ_TEMP_1 = 0x07
MLX_OBJ_TEMP_2 = 0x08

class MLX(object):
    def __init__(self, address=MLX_DEFAULT_ADDRESS, i2c=None, **kwargs):
        if i2c is None:
            import Adafruit_GPIO.I2C as I2C
            i2c = I2C
        self._device = i2c.get_i2c_device(address, **kwargs)

    def read_temp_objet(self):
        temp_objet = self._device.readList(MLX_OBJ_TEMP_1, 2)

        #print("{} | {}".format(bin(temp_objet[0]), bin(temp_objet[1])))

        temp_objet = (temp_objet[1] << 8) | temp_objet[0]
        #print("Raw data: ", temp_objet)
        return self.data_to_temp(temp_objet)

    def data_to_temp(self, data):
        temp = (data * 0.02) - 273.15
        return temp