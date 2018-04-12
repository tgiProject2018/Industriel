
import random
import time

MLX_DEFAULT_ADDRESS = 0x5a
MLX_AMB_TEMP = 0x06
MLX_OBJ_TEMP_1 = 0x07
MLX_OBJ_TEMP_2 = 0x08

class MLX(object):
    def __init__(self, address=0, i2c=None, **kwargs):
        if i2c is None:
            import Adafruit_GPIO.I2C as I2C
            i2c = I2C
        self._device = i2c.get_i2c_device(address, **kwargs)
        self.configure()
        
    def read_temp_ambiente(self):
        temp_ambiente = self._device.read_reg(MLX_AMB_TEMP)
        
        return temp_ambiente

    def read_temp_objet(self):
        temp_objet = self._device.read_reg(MLX_OBJ_TEMP_1)
        #temp_objet_2 = self._device.read_reg(MLX_OBJ_TEMP_2)


        return temp_objet

    def configure(self):
        pass