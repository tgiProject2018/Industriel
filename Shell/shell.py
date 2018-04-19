import cmd, sys
from sendToServer import Transfere
from fonctions import Fonctions
class IndustrielShell(cmd.Cmd):
    intro = 'Welcome Industrial , Bonjour\n'
    prompt = '>'
    file = None
    
    # result = Resultat()
		
    #commande principale do_commande
    def do_gettemp(self, arg):
        'Fait acquisition de la temperature et affichage console'
		# self.result = GetResultat().getResultat()
		#attendre les reponse des capteurs.	
        fonctions = Fonctions()
        #temp_ambiente = fonctions.get_temp_ambiente()
        temp_objet = fonctions.get_temp_objet()
        #print('Temperature ambiente en Celcius', temp_ambiente)
        print('Temperature du liquide en Celcius: %s' % temp_objet)
        print('Temperature prise')
		
    def do_savecuruserdata(self, arg):
        'Sauvegarder lacquisition courante dans la BD locale du capteur'
        #spliter nom prenom date
        tout = arg.split(' ')
        if(len(tout)==3):
            nom,prenom,adresse = arg.split(' ')
            print('User sauvegarder: Nom: '+nom+' Prenom: '+prenom+' Address: '+ adresse)
            # user = User()
            # user.createUser(nom, prenom, adresse, self.result)
            # user.sendUser("192.0.0.0")
		
    def do_configdate (self, arg):
        'Ajuster la date et le temps. YYYY/MM/DD HH:MM'
        annee,mois,reste = arg.split('/')
        jour,reste = reste.split(' ')
        heure,minute = reste.split(':')	
        print(annee,"/",mois,"/",jour," ",heure,":",minute)
	
    def do_senddata(self, arg):
        'Envoie des donnees au serveur a distance. L adresse ip du serveur (ipserver) doit etre envoyee en parametre'
        transfere = Transfere()
        transfere.createTransfere("ip1",arg)
        transfere.transferer()

		
    def do_exit(self, arg):
        'Exit the shell'
        return True
		
    def do_getlevel(self, arg):
        'Fait acquisition du niveau de liquide et affichage console'
        fonctions = Fonctions()
        niveau = fonctions.get_level()
        print('Hauteur atteinte en cm', niveau)
        print('Niveau du liquide pris')
        
		
    def changerHeure(self, arg):
	    #spliter en annee mois jour heure minute
        annee,mois,reste = arg.split('/')
        jour,reste = reste.split(' ')
        heure,minute = reste.split(':')	
	
	#setTime(heure,minute,0,jour,mois,annee);
if __name__ == '__main__':
	IndustrielShell().cmdloop()	
