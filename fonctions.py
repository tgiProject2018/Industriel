
from ADC.ADS1015 import ADS1015 as ADC
from Thermometre import MLX as MLX

# Instanciation des capteurs
adc = ADC()
therm = MLX.MLX()

class Fonctions():
    # Fonction retournant le niveau de liquide courant
    def get_level(self):
        lvl = adc.read_level()
        return lvl

    # Fonction retournant la temperature courante
    def get_temp_ambiente(self):
        temp = therm.read_temp_ambiente()
        return temp

    def get_temp_objet(self):
        temp = therm.read_temp_objet()
        return temp

    def save_current_user_data(self):
        return

    def config_date(self, sDate):
        return

    def send_data(self, ip):
        return
