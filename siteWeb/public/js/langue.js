$(document).ready(function () {

    // Bouton anglais francais, compteur incrementable
    // =================================================================
    var boutonLangue = document.getElementById("boutonLangue");
    var boutonLangueConnexion = document.getElementById("boutonLangueConnexion");
    var langueSelectionne = "Anglais";
    var x = 0;
    // =================================================================
    // Nav-link items
    // =================================================================
    var accueilTitre = document.getElementById('accueil');
    var nouvellesTitre = document.getElementById('nouvelles');
    var commandeTitre = document.getElementById('commande');
    var activitesTitre = document.getElementById('activites');
    var contactTitre = document.getElementById('contact');
    var loginTitre = document.getElementById('login');
    var adminTitre = document.getElementById('admin');
    // =================================================================

    // Titres et adresse au haut de la page
    // =================================================================
    var grosTitre = document.getElementById('grosTitre');
    var comite = document.getElementById('comite');
    var adresse = document.getElementById('adresse');
    // =================================================================

    // Bienvenue avec nom
    // =================================================================
    var divBienvenue = document.getElementById('divBienvenue');
    var h1Comite = document.getElementById('h1Comite');
    var divNom = document.getElementById('divNom');
    // =================================================================

    // Variable pour description du carousel. Le nom des variables est 
    // selon le mot important des phrases qui apparait sur les images 
    // du carousel
    // =================================================================
    var panoplie = document.getElementById('panoplie');
    var pourVous = document.getElementById('pourVous');
    var tournois = document.getElementById('tournois');
    var plusieurs = document.getElementById('plusieurs');
    var magnifiques = document.getElementById('magnifiques');
    var pendant = document.getElementById('pendant');
    // =================================================================

    //  Précedent et suivant du carousel
    // =================================================================
    var precedent = document.getElementById('precedent');
    var suivant = document.getElementById('suivant');
    // =================================================================

    // Titre et paragraphes qui decrit le site web et les loisirs
    // =================================================================
    var engager = document.getElementById('engager');
    var premierParagraphe = document.getElementById('premierParagraphe');
    var deuxiemeParagraphe = document.getElementById('deuxiemeParagraphe');
    // =================================================================

    // Partie : Si vous avez de questions... 
    // =================================================================
    var questions = document.getElementById('questions');
    var contacter = document.getElementById('contacter');
    // =================================================================

    $("#boutonLangue").click(function (e) {

        document.cookie = "langue=" + boutonLangue.value;
        x++;

        // *********************************************************************
        if (boutonLangue.value == "Anglais") {

            // Bouton texte retourne a anglais
            // =================================================================
            langueSelectionne = "Français";
            // =================================================================

            // Les titres
            // =================================================================
            grosTitre.innerText = "Leisure Committee of Ivaco"
            comite.innerText = "Ivaco's Leisure"
            // =================================================================

            // Nav-link items texte
            // =================================================================
            accueilTitre.text = ("Home");
            nouvellesTitre.text = ("News");
            commandeTitre.text = ("Order");
            activitesTitre.text = ("Activities");
            contactTitre.text = ("Contact us");
            loginTitre.text = ("Log in");
            adminTitre.text = ("Admin");
            // =================================================================

            // Description des images du carousel
            // =================================================================
            panoplie.innerText = ("A variety of activities");
            pourVous.innerText = ("All that for you!");
            tournois.innerText = ("Lots of tournaments");
            plusieurs.innerText = ("For many sports");
            magnifiques.innerText = ("Wonderful meals");
            pendant.innerText = ("During the activites!");
            // =================================================================

            // Suivant et precedent du carousel
            // =================================================================
            precedent.innerText = ("Previous");
            suivant.innerText = ("Next");
            // =================================================================

            // Bienvenue avec nom
            // =================================================================
            divBienvenue.innerText = ("Welcome to the website of");
            h1Comite.innerText = ("Leisure Committee of Ivaco");
            divNom.innerText = ("C\xE9dric L\xE9veill\xE9");
            // =================================================================

            // Titre et paragraphes qui decrit le site web et les loisirs
            // =================================================================
            engager.innerText = ("WE COMMIT OURSELVES...");
            premierParagraphe.innerText = ("To deliver a panoply of activities"
                + " to satisfy any of your personal taste. We are master for the"
                + " organization of the leisures.");
            deuxiemeParagraphe.innerText = ("If you are not a member of the"
                + " committee, you can even participate in activites, but you're"
                + " going to have to pay the full price. We encourage you to"
                + " register as a member and pay 1$ per pay.");
            // =================================================================

            // Partie : Si vous avez des questions...
            // =================================================================
            questions.innerText = ("If you have any questions...");
            contacter.innerText = ("Please contact us at ivacoloisirscomite@gmail.com");
            // =================================================================

        }
        // *********************************************************************

        // Sinon, on retourne en francais
        // *********************************************************************
        else {

            // Bouton texte retourne a anglais
            // =================================================================
            langueSelectionne = "Anglais";
            // =================================================================

            // Les titres
            // =================================================================
            grosTitre.innerText = "Comit\xE9 de loisirs d'Ivaco"
            comite.innerText = "Ivaco Loisirs"
            // =================================================================

            // Nav-link items texte
            // =================================================================
            accueilTitre.text = ("Accueil");
            nouvellesTitre.text = ("nouvelles");
            commandeTitre.text = ("achats");
            activitesTitre.text = ("activit\xE9s");
            contactTitre.text = ("contact");
            loginTitre.text = ("Connexion");
            adminTitre.text = ("Admin");
            // =================================================================

            // Description des images du carousel
            // =================================================================
            panoplie.innerText = ("Une panoplie d'activi\xE9s");
            pourVous.innerText = ("Et ce, pour vous!");
            tournois.innerText = ("Des tournois");
            plusieurs.innerText = ("Pour plusieurs sports.");
            magnifiques.innerText = ("Des magnifiques repas");
            pendant.innerText = ("Pendant les activit\xE9s!");
            // =================================================================

            // Précedent et suivant du carousel
            // =================================================================
            precedent.innerText = ("Pr\xE9cedent");
            suivant.innerText = ("Suivant");
            // =================================================================

            // Bienvenue avec nom
            // =================================================================
            divBienvenue.innerText = ("Bienvenue au site web du");
            h1Comite.innerText = ("Comit\xE9 de Loisirs d'Ivaco");
            divNom.innerText = ("C\xE9dric L\xE9veill\xE9");
            // =================================================================

            // titre et paragraphes qui decrit le site web et les loisirs
            // =================================================================
            engager.innerText = ("NOUS NOUS ENGAGEONS...");
            premierParagraphe.innerText = ("À vous livrer une grande"
                + " vari\xE9t\xE9 d'activit\xE9s pour satisfaire chacun de vos"
                + " go\xFBts personnels. Nous sommes ma\xEEtres d'oeuvre pour"
                + " l'organisation des loisirs. ");
            deuxiemeParagraphe.innerText = ("Si vous n'\xEAtes pas membre du"
                + " comit\xE9, vous pouvez quand m\xEAme participer aux"
                + " activit\xE9s, mais vous allez devoir payer le plein prix. Nous"
                + "vous encourageons donc de vous inscrire en tant que membre et"
                + "payer 1$ par paye.");
            // =================================================================

            // Partie : Si vous avez des questions...
            // =================================================================
            questions.innerText = ("Si vous avez des questions...");
            contacter.innerText = ("Veuillez nous contacter au ivacoloisirscomite@gmail.com");
            // =================================================================
        }

        // Bouton texte va a francais
        // =================================================================
        boutonLangue.value = langueSelectionne;
        // =================================================================
        // *********************************************************************
    });

    $("#boutonLangueConnexion").click(function (e) {

        document.cookie = "langue=" + boutonLangueConnexion.value;
        x++;

        // *********************************************************************
        if (boutonLangueConnexion.value == "Anglais") {

            // Bouton texte retourne a anglais
            // =================================================================
            langueSelectionne = "Français";
            // =================================================================

            // Les titres
            // =================================================================
            grosTitre.innerText = "Leisure Committee of Ivaco"
            comite.innerText = "Ivaco's Leisure"
            // =================================================================

            // Nav-link items texte
            // =================================================================
            accueilTitre.text = ("Home");
            nouvellesTitre.text = ("News");
            commandeTitre.text = ("Order");
            activitesTitre.text = ("Activities");
            contactTitre.text = ("Contact us");
            loginTitre.text = ("Log out");
            adminTitre.text = ("Admin");
            // =================================================================

            // Description des images du carousel
            // =================================================================
            panoplie.innerText = ("A variety of activities");
            pourVous.innerText = ("All that for you!");
            tournois.innerText = ("Lots of tournaments");
            plusieurs.innerText = ("For many sports");
            magnifiques.innerText = ("Wonderful meals");
            pendant.innerText = ("During the activites!");
            // =================================================================

            // Suivant et precedent du carousel
            // =================================================================
            precedent.innerText = ("Previous");
            suivant.innerText = ("Next");
            // =================================================================

            // Bienvenue avec nom
            // =================================================================
            divBienvenue.innerText = ("Welcome to the website of");
            h1Comite.innerText = ("Leisure Committee of Ivaco");
            divNom.innerText = ("C\xE9dric L\xE9veill\xE9");
            // =================================================================

            // Titre et paragraphes qui decrit le site web et les loisirs
            // =================================================================
            engager.innerText = ("WE COMMIT OURSELVES...");
            premierParagraphe.innerText = ("To deliver a panoply of activities"
                + " to satisfy any of your personal taste. We are master for the"
                + " organization of the leisures.");
            deuxiemeParagraphe.innerText = ("If you are not a member of the"
                + " committee, you can even participate in activites, but you're"
                + " going to have to pay the full price. We encourage you to"
                + " register as a member and pay 1$ per pay.");
            // =================================================================

            // Partie : Si vous avez des questions...
            // =================================================================
            questions.innerText = ("If you have any questions...");
            contacter.innerText = ("Please contact us at ivacoloisirscomite@gmail.com");
            // =================================================================

        }
        // *********************************************************************

        // Sinon, on retourne en francais
        // *********************************************************************
        else {

            // Bouton texte retourne a anglais
            // =================================================================
            langueSelectionne = "Anglais";
            // =================================================================

            // Les titres
            // =================================================================
            grosTitre.innerText = "Comit\xE9 de loisirs d'Ivaco"
            comite.innerText = "Ivaco Loisirs"
            // =================================================================

            // Nav-link items texte
            // =================================================================
            accueilTitre.text = ("Accueil");
            nouvellesTitre.text = ("nouvelles");
            commandeTitre.text = ("achats");
            activitesTitre.text = ("activit\xE9s");
            contactTitre.text = ("contact");
            loginTitre.text = ("DéConnexion");
            adminTitre.text = ("Admin");
            // =================================================================

            // Description des images du carousel
            // =================================================================
            panoplie.innerText = ("Une panoplie d'activi\xE9s");
            pourVous.innerText = ("Et ce, pour vous!");
            tournois.innerText = ("Des tournois");
            plusieurs.innerText = ("Pour plusieurs sports.");
            magnifiques.innerText = ("Des magnifiques repas");
            pendant.innerText = ("Pendant les activit\xE9s!");
            // =================================================================

            // Précedent et suivant du carousel
            // =================================================================
            precedent.innerText = ("Pr\xE9cedent");
            suivant.innerText = ("Suivant");
            // =================================================================

            // Bienvenue avec nom
            // =================================================================
            divBienvenue.innerText = ("Bienvenue au site web du");
            h1Comite.innerText = ("Comit\xE9 de Loisirs d'Ivaco");
            divNom.innerText = ("C\xE9dric L\xE9veill\xE9");
            // =================================================================

            // titre et paragraphes qui decrit le site web et les loisirs
            // =================================================================
            engager.innerText = ("NOUS NOUS ENGAGEONS...");
            premierParagraphe.innerText = ("À vous livrer une grande"
                + " vari\xE9t\xE9 d'activit\xE9s pour satisfaire chacun de vos"
                + " go\xFBts personnels. Nous sommes ma\xEEtres d'oeuvre pour"
                + " l'organisation des loisirs. ");
            deuxiemeParagraphe.innerText = ("Si vous n'\xEAtes pas membre du"
                + " comit\xE9, vous pouvez quand m\xEAme participer aux"
                + " activit\xE9s, mais vous allez devoir payer le plein prix. Nous"
                + "vous encourageons donc de vous inscrire en tant que membre et"
                + "payer 1$ par paye.");
            // =================================================================

            // Partie : Si vous avez des questions...
            // =================================================================
            questions.innerText = ("Si vous avez des questions...");
            contacter.innerText = ("Veuillez nous contacter au ivacoloisirscomite@gmail.com");
            // =================================================================
        }

        // Bouton texte va a francais
        // =================================================================
        boutonLangueConnexion.value = langueSelectionne;
        // =================================================================
        // *********************************************************************
    });
});