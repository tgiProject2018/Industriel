from socketIO_client import SocketIO
import mysql.connector


## Connection a la base de donnee
cnx = mysql.connector.connect(user='root', password='',port=3306,
	host='127.0.0.1',
	database='dbsystemcontrolleur')
cursor = cnx.cursor()

## Deleguees
def on_connect():
	print('connect')
def on_disconnect():
	print('disconnect')
def on_reconnect():
	print('reconnect')
	
def on_donneDB_Server():
    cursor.execute("Select id, prenom, nom, adresse from tblClient")
    results = cursor.fetchall()
    socketIO.emit('afficherClient', results)
    cnx.commit();

def on_donneDB_ServerH():
    cursor.execute("Select temperature, niveau, dateProduction from tblmelange")
    results = cursor.fetchall()
    socketIO.emit('afficherHistorique', results)
    cnx.commit();

def modifierClient(*args):
    dic = args[0]
    query = ("update tblClient set prenom = %s, nom = %s, adresse = %s where id = %s")
    cursor.execute(query, (dic['prenom'],dic['nom'],dic['Adresse'],dic['id']))
    cnx.commit()
    on_donneDB_Server()

def afficherMelanges(*args):
	idClient = args[0]
	query = ("Select dateProduction, niveau, temperature from tblMelange where idClient = %s")
	cursor.execute(query,idClient)
	results = cursor.fetchall()
	socketIO.emit('afficherMelanges',results)
	cnx.commit()
	cursor.close()
	cnx.close()

def on_Login(username, password):
    cursor.execute("Select user, password From tblemploye where tblemploye.user =%s and tblemploye.password =%s",(username, password))
    results = cursor.fetchall()
    if not results:
        socketIO.emit('error')
    else:
        socketIO.emit('redirect',username,password)
    cnx.commit()
	
def rechercheChamp(*args):
    print('allo')
    query = ("select * from tblClient where prenom like %s or nom like %s")
    
    cursor.execute(query,(args[0]+"%",args[0]+"%"))
    results = cursor.fetchall()
    print(results)
    socketIO.emit('afficherClient', results)
    cnx.commit()
	
def on_Save_echeancier(prenom, nom, produit1, produit2, produit3, dateLivraison):
    msg = "Echeancier Sauveguarder\nClient: %s %s\n Produit: %s %s %s \n Date de livraison %s" %(prenom, nom, produit1, produit2, produit3, dateLivraison)
    socketIO.emit('echeancier_resultat', msg)

def on_Sync():
    msg = "Synchronisation Reussie"
    socketIO.emit('sync_reussi', msg)
	
	
## 'main'
socketIO = SocketIO("localhost",8080)
#socketIO.on('afficherInfo', afficherInfo)
socketIO.on('donneDB_Server', on_donneDB_Server)
socketIO.on('donneDB_ServerHistorique', on_donneDB_ServerH)
socketIO.on('ModificationDataBase', modifierClient)
socketIO.on('afficherMelanges', afficherMelanges)
socketIO.on('login', on_Login)
socketIO.on('SendSearchDatabase', rechercheChamp)
socketIO.on('save_echeancier', on_Save_echeancier)
socketIO.on('synchronisation_serveur', on_Sync)
#rechercheChamp("t")
## Loop principal
socketIO.wait()
## On fait le menage
cursor.close()
cnx.close()