var express = require('express');
const path = require('path');
const app = express();
var server = require('http').createServer(app),
io = require('socket.io').listen(server),
ent = require('ent'), // Permet de bloquer les caractères HTML (sécurité équivalente à htmlentities en PHP)
fs = require('fs');
    
// On recupere mon image de background

app.use(express.static(__dirname + '/public'));
// Chargement de la page index.html
// ============================================================================================================
app.get('/', function (req, res) {
  res.sendfile(__dirname + '/index.html');
});
// ============================================================================================================

// Chargement de la page consoleetudiant.html
// ============================================================================================================
app.get('/echeancier', function (req, res) {
  res.sendfile(__dirname + '/echeancier.html');
});
// ============================================================================================================

// Chargement de la page consoleprofesseur.html
// ============================================================================================================
app.get('/historique', function (req, res) {
  res.sendfile(__dirname + '/historique.html');
});
// ============================================================================================================

// Chargement de la page login.html
// ============================================================================================================
app.get('/listeClient', function (req, res) {
  res.sendfile(__dirname + '/listeClient.html');
});
// ============================================================================================================



io.sockets.on('connection', function (socket) {

    //Rajouté par Erwin rempli le tableau
	socket.on('getDBClient', function () {
        //message = ent.encode(message);
        socket.broadcast.emit('donneDB_Server');
    }); 
	socket.on('afficherClient', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('DataBase', data);
    });
	socket.on('SendModification', function(data) {
        console.log("mod");
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('ModificationDataBase', data);
		//console.log(data);
		
    });
	socket.on('SearchClient', function(data) {
        //data = ent.encode(data);
        console.log("send search");
        socket.data = data;
        console.log("send search2");
        socket.broadcast.emit('SendSearchDatabase', data);
		console.log(data);
		
    });
    socket.on('SendSearchHistorique', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('SendSearchDataBaseHistorique', data);
		//console.log(data);
		
    });
    socket.on('getDBHistorique', function () {
        //message = ent.encode(message);
        socket.broadcast.emit('donneDB_ServerHistorique');
    }); 
    socket.on('afficherHistorique', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('DataBaseHistorique', data);
    });
   
    socket.on('enregister_echeancier', function( prenom, nom, produit1, produit2, produit3, dateLivraison) {
        //data = ent.encode(data);
        socket.prenom = prenom;
        socket.nom = nom;
        socket.produit1 = produit1;
        socket.produit2 = produit2;
        socket.produit3 = produit3;
        socket.dateLivraison = dateLivraison;
        socket.broadcast.emit('save_echeancier', prenom, nom, produit1, produit2, produit3, dateLivraison);
    });
    socket.on('echeancier_resultat', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('ech_resultat', data);
    });

    socket.on('synchronisation', function () {
        //message = ent.encode(message);
        socket.broadcast.emit('synchronisation_serveur');
    }); 
    socket.on('sync_reussi', function (msg) {
        //message = ent.encode(message);
        socket.broadcast.emit('sync_resultat', msg);
    }); 

    socket.on('error', function () {
        //message = ent.encode(message);
        socket.broadcast.emit('mauvaise_connection');
    }); 

    socket.on('redirect', function(username, pasword) {
        //data = ent.encode(data);
        var sendTo = '/echeancier'
        socket.broadcast.emit('redirectTo', sendTo, username, pasword);
        console.log("redirectTo emit");
    });
    
    // On ecoute le login_formulaire pour authentifier une personne lorsqu'il entre ses données
    // ============================================================================================================
    socket.on('login_formulaire', function(username,password) {
        socket.username = username;
        socket.password = password;
        socket.broadcast.emit('login', username, password);
        console.log("login emit");
    });
    // ============================================================================================================

   });

server.listen(8080);
