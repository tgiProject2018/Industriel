
from ADC.ADS1015 import ADS1015 as ADC
from Thermometre import MLX as MLX

# Instanciation des capteurs
adc = ADC()
therm = MLX.MLX()

# Fonction retournant le niveau de liquide courant
def get_level():
    #adc.configure()
    lvl = adc.read_level()
    return lvl

# Fonction retournant la temperature courante
def get_temp():
    #therm.configure()
    temp = therm.read_temp()
    return temp

def save_current_user_data():
    return

def config_date(sDate):
    return

def send_data(ip):
    return
