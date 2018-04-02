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
	socket.on('afficherClient', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('DataBase', data);
    });
	socket.on('SendModification', function(data) {
        //data = ent.encode(data);
        socket.data = data;
        socket.broadcast.emit('ModificationDataBase', data);
		//console.log(data);
		
    });
    // On ecoute le login_formulaire pour authentifier une personne lorsqu'il entre ses données
    // ============================================================================================================
    socket.on('login_formulaire', function(username,password) {

        // On se connecte a notre base de données
        // --------------------------------------------------------------------------------------------------------
        var mysql = require('mysql');
        var con = mysql.createConnection({
            host: "localhost", user: "root",
            password: "",
            database: "projetnodejs"
        });
        // --------------------------------------------------------------------------------------------------------
          
        // S'il a une erreur à la connection (par exemple XAMPP n'est pas running)
        // --------------------------------------------------------------------------------------------------------
        con.connect(function(queryErreur) {
            if (queryErreur) {
                throw queryErreur;
            }
        // --------------------------------------------------------------------------------------------------------

            // On fait un select dans notre database dans notre table user pour voir si le user existe et procède aux étapes de vérification
            // ------------------------------------------------------------------------------------------------------------------------------
            con.query("SELECT Username, Password FROM user WHERE user.Username = '" + username + "' and user.Password = '" + password + "'", 
            function (queryErreur, queryRetour) {

                // Si on trouve une erreur dans la query, on throw
                // **************************************************************************************************************************
                if(queryErreur) {
                    throw queryErreur;
                }
                // **************************************************************************************************************************

                // Si on a rien, on emit notre fonction qui alertera notre utilisateur que quelque chose ne marche pas
                // **************************************************************************************************************************
                if(!queryRetour[0])
                {
                    socket.emit('unauthorized_login'); 
                    return false;
                }
                // **************************************************************************************************************************

                // Si les données sont bonnes, on redirige l'utilisateur à la page professeur
                // **************************************************************************************************************************
                if( password == queryRetour[0].Password && username == queryRetour[0].Username) {
                    socket.emit('redirect', "consoleProfesseur", queryRetour[0].Username);
                }
                // **************************************************************************************************************************

                // Si les données sont mauvaises, on alerte l'utilisateur.
                // **************************************************************************************************************************
                else {
                    socket.emit('unauthorized_login');
                }
                // **************************************************************************************************************************
            });
            // ------------------------------------------------------------------------------------------------------------------------------
        });
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
