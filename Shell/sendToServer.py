#from shell import IndustrielShell
#import shell
class Transfere():
	ipSender = ""
	ipReceiver = ""
	tableauDeUser = ""
	
	def __init__(self):
		self.ipSender = ""
		self.ipReceiver = ""

		
	def createTransfere(self, ipSenderArg, ipReceiverArg):
		self.ipSender = ipSenderArg
		self.ipReceiver = ipReceiverArg
	
	
	def transferer(self):
		# tableauDeUser = callIPSender()
		nombreUser = 100
		print("envoye de",nombreUser, "user(s) a", self.ipReceiver)
		# sendToIPReceiver(tableauDeUser)
		return True
		
