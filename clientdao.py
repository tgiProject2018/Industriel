#from saveUser import *
import sqlite3 
#Couche dacces de donne vers le bl
class ClientDao() :
	#Chemin de la base de donne local
	#A modifier
	path = ''
	def create_connection() :
		db_file = path
		try: 
			conn = sqlite3.connect(db_file)
			return conn
		except Error as e:
			print (e)		
		return none
	
	#Sauvegarde un client dans la base de donne local
	def saveUserLocal(user) :
		conn = create_connection()
		with conn:
			cur = conn.cursor()
			cur.execute("INSERT INTO tblclient(prenom,nom) values (%s,%s)" , user.prenom,user.name)
		cur.close()
		conn.commit()
		conn.close()
	
	#Sauvegarde la temperature et le niveau dans le melange
	def saveMelange(melange):
		conn = create_connection()
		with conn:
			cur = conn.cursor()
			cur.execute("INSERT INTO tblmelange(temperature,quantite,niveau,date) values (%f,%f,%d,datetime.now())" , melange.temperature,melange.quantite,melange.niveau)
			#cur.execute("INSERT INTO tblassoClientMelange(idClient,idMelange) values (%s,last_insert_rowid())")
		cur.close()
		conn.commit()
conn.close()
	
	
