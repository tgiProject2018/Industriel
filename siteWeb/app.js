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
    // Dès qu'on nous donne un pseudo, on le stocke en variable de session et on informe les autres personnes
    // ============================================================================================================
    socket.on('nouveau_client', function(pseudo) {
        pseudo = ent.encode(pseudo);
        socket.pseudo = pseudo;
        socket.broadcast.emit('nouveau_client', pseudo);
    });
    // ============================================================================================================

    // Dès qu'on nous donne un professeur, (username password), on le stocke en variable de session et on informe
    // les autres utilisateurs
    // ============================================================================================================
    socket.on('nouveau_professeur', function(pseudo) {
        pseudo = ent.encode(pseudo);
        socket.pseudo = pseudo;
        socket.broadcast.emit('nouveau_professeur', pseudo);
    });
    // ============================================================================================================
	//Rajouté par Erwin rempli le tableau
	socket.on('getDBClient', function () {
        //message = ent.encode(message);
        socket.broadcast.emit('donneDB_Server');
    }); 
	socket.on('getDataBase', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('DataBase', data);
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

    socket.on('synchronisation', function () {
        //message = ent.encode(message);
        socket.broadcast.emit('synchronisation_serveur');
    }); 
    
    // On ecoute le login_formulaire pour authentifier une personne lorsqu'il entre ses données
    // ============================================================================================================
    socket.on('login_formulaire', function(username,password) {
        socket.username = username;
        socket.password = password;
        socket.broadcast.emit('login', username, password);
    });
    // ============================================================================================================

    // Dès qu'on reçoit un message, on récupère le pseudo de son auteur et on le transmet aux autres personnes
    // ============================================================================================================
    socket.on('nouveau_message', function (message) {
        message = ent.encode(message);
        socket.broadcast.emit('nouveau_message', {pseudo: socket.pseudo, message: message});
    }); 
    // ============================================================================================================
});

server.listen(8080);
