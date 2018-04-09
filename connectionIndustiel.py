from socketIO_client import SocketIO
import mysql.connector


## Connection a la base de donnee
cnx = mysql.connector.connect(user='root', password='',
	host='127.0.0.1',
	database='dbindustriel')
cursor = cnx.cursor()

## Deleguees
def on_connect():
	print('connect')
def on_disconnect():
	print('disconnect')
def on_reconnect():
	print('reconnect')
	
def afficherToutLesClient(*args):
	#idPatient = args[0]
	query = ("Select id, prenom, nom, adresse from tblClient");
	cursor.execute(query);
	#Select x.id, prenom, nom, y.date from tbpatient x
	#inner join tbpriseteste y
	#on(y.idClient = x.id)
	#Where y.id = (select max(id) from tbpriseteste where idClient = x.id);
	results = cursor.fetchall();
	socketIO.emit('afficherClients', results);
	cursor.close();
	cnx.close();
def modifierClient(*args):
	idClient = args[0];
	query = ("update tblClient set prenom = %s, nom = %s, adresse = %s where id = %s");
	cursor.execute(query, (args[1],args[2],args[3],idClient));
	cursor.close();
	cnx.close();
	
def afficherMelanges(*args):
	idClient = args[0];
	query = ("Select dateProduction, niveau, temperature from tblMelange where idClient = %s");
	cursor.execute(query,idClient);
	results = cursor.fetchall();
	socketIO.emit('afficherMelanges',results);
	cursor.close();
	cnx.close();

def authentification(*args):
	user = args[0];
	password = args[1];
	query = ("Select id from tblEmployer where user = %s and password = %s");
	cursor.execute(query,(user,password));
	if cursor.rowcount == 1:
		socketIO.emit('authentification',true);
	else:
		socketIO.emit('authentification',false);
def rechercheChamp(*args):
	query = ("select * from tblClient where prenom like %s or nom like %s");
	cursor.execute(query,(args[0]+"%",args[0]+"%"));
	results = cursor.fetchall();
	socketIO.emit('rechercheChamp', resultats);
	cursor.close();
	cnx.close();
	
	
## 'main'
socketIO = SocketIO("localhost",8080)
#socketIO.on('afficherInfo', afficherInfo)
socketIO.on('afficherClients', afficherToutLesClient)
socketIO.on('modifierClient', modifierClient)
socketIO.on('afficherMelanges', afficherMelanges)
socketIO.on('authentification', authentification)
socketIO.on('rechercheChamp', rechercheChamp)
## Loop principal
socketIO.wait()
## On fait le menage
cursor.close()
cnx.close()
