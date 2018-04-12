from fonctions import Fonctions
from flask import Flask, render_template
import datetime
app = Flask(__name__)

@app.route("/")
def formulaire():
   now = datetime.datetime.now()
   timeString = now.strftime("%d-%m-%Y %H:%M")
   fonctions = Fonctions()
   temp = fonctions.get_temp()
   niveau = fonctions.get_level()
   templateData = {
	'title' : 'Flask Industriel',
	  'time': timeString,
	  'temp': temp,
	  'niveau':niveau
      }
   return render_template('index.html', **templateData)
   
if __name__ == '__main__':
    app.run()