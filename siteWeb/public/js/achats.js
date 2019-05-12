

function validerFormulaireAchat() {

    var telephone = document.forms["identification"]["telephoneText"].value;
    var description = document.forms["identification"]["nomText"].value;
    var numeroCarte = document.forms["identification"]["numero"].value;

    if( $('#dropDownMenu').val() == "Aucune") {
        alert("Veuillez choisir une activité");
    }


    // Ici je prend un regex qui prend plusieurs formats de numéro de téléphone pour valider que
    // l'utilisateur entre un bon numéro 
    // ==================================================================================================
    var verificationPourFormatTelephone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    var formatTelephoneAccepte = verificationPourFormatTelephone.test(telephone);
    if (!formatTelephoneAccepte) {
        alert("Votre numero de telephone ne respecte pas les normes. Veuillez respecter\n "
            + "(123) 456-7890 ou 1234567890 ou \n"
            + "123.456.7890 ou 123-456-7890 ou \n"
            + "075-63546725");
        return false;
    }
    // ==================================================================================================

    // Ici je vérifie si la description est au moins de 1 caractère et moins de 100 caractères pour ne pas
    // causer de crash puisque le maximum dans la base de données est de 100 caractères. 
    // ==================================================================================================
    if (description.length < 1 || description.length > 100) {
        alert("Veuillez entrer une description entre 1 et 100 caractères.");
        return false;
    }
    // ==================================================================================================

    var divCompleteReady = $("creditcomplet").attr("style")

    if ($("#creditcomplet").is(":visible") ) {
        var numeroDeSecurite = $("#cv").val();
        var numeroDeCarte = $("#numero").val();


        var encryption = numeroDeSecurite + numeroDeCarte;
        var CryptoJSAesJson = {
            stringify: function (cipherParams) {
                var j = { ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64) };
                if (cipherParams.iv) j.iv = cipherParams.iv.toString();
                if (cipherParams.salt) j.s = cipherParams.salt.toString();
                return JSON.stringify(j);
            },
            parse: function (jsonStr) {
                var j = JSON.parse(jsonStr);
                var cipherParams = CryptoJS.lib.CipherParams.create({ ciphertext: CryptoJS.enc.Base64.parse(j.ct) });
                if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv);
                if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s);
                return cipherParams;
            }
        }
        var encrypted = CryptoJS.AES.encrypt(JSON.stringify(encryption), "PhraseEncryption", { format: CryptoJSAesJson }).toString();
        var formData = "encrypted=" + encrypted;

        $.ajax({
            url: "DataLayer/BusinessLayer/decryption.php",
            type: "POST",
            data: formData,
            success: function (data) {

                alert(data);

            },
            error: function () {

                alert('Grave erreur!')
            }
        });
    }
    
}