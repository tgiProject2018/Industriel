ADS1015_DEFAULT_ADDRESS = 0x0048
ADS1015_CONVERSION_POINTER = 0x00
ADS1015_CONFIG_POINTER = 0x01
ADS1015_LOW_THRESH_POINTER = 0x02
ADS1015_HIGH_THRESH_POINTER = 0x03

class ADS1015(object):
    def __init__(self, address=ADS1015_DEFAULT_ADDRESS, i2c=None, **kwargs):
        if i2c is None:
            import Adafruit_GPIO.I2C as I2C
            i2c = I2C
        self._device = i2c.get_i2c_device(address, **kwargs)
        self.configure()

    def read_level():
        self._device.writeList()
        # Read Config register OS bit to check if we are currently 
        # performing a conversion
        #level = _device.

    def configure():
        self.data_rate = 0x0080 # 1600
        self.mux = 0 # Config par defaut
        self.mode = 1 # Power-down single-shot mode

