$(document).ready(function () {


    var description = document.getElementById("description");
    $('#dropDownRepas').change(function () {
        var val = $(this).val();
        var categorieSelect = $('#dropDownCategorie');
        var activiteSelect = $('#dropDownActivite');

        categorieSelect.empty();
        if (val != "Aucune") {
            $.ajax({
                url: "DataLayer/BusinessLayer/ListeActivites.php",
                method: "GET",
                data: { repas: val },
                success: function (data, status) {
                    $('#description').val('');
                    activiteSelect.append('<option>Aucune</option>');
                    activiteSelect.prop('disabled', true);
                    categorieSelect.append(data);
                    categorieSelect.prop('disabled', false);
                }
            });
        }
        else {
            // Si la valeur de grandeur est Aucune en disable
            $('#description').val('');
            categorieSelect.append('<option>Aucune</option>');
            categorieSelect.prop('disabled', true);
            activiteSelect.empty();
            activiteSelect.append('<option>Aucune</option>');
            activiteSelect.prop('disabled', true);
        }
    });

    $('#dropDownCategorie').change(function () {
        var val = $(this).val();
        var activiteSelect = $('#dropDownActivite');
        activiteSelect.empty();
        if (val != "Aucune") {
            $.ajax({
                url: "DataLayer/BusinessLayer/ListeActivites.php",
                method: "GET",
                data: { categorie: val },
                success: function (data, status) {
                    $('#description').val('');
                    activiteSelect.append(data);
                    activiteSelect.prop('disabled', false);        var combo = document.getElementById('dropDownActivite');
                    var textArea = document.getElementById('description');
                    var str = combo.options[combo.selectedIndex].value;
                    if (str == "Tournoi de Golf") {
                        $('#description').val('Un tournoi rempli de prix \xE0 remporter et de plaisir incroyable.'
                            + ' C’est autant un tournoi comp\xE9titif que pour le plaisir puisqu’il y a des prix de participation'
                            + ' et des prix de comp\xE9tition. Exemple de prix de comp\xE9tition : Le plus pr\xE8s du « Pin » sur le'
                            + ' trou 9 gagnera 50$! Le tout se passe à Hawkesbury, Ontario et le tournoi d\xE9bute \xE0 midi. ');
                    }
                    else if (str == "Tirs au Pigeon d\'Argile") {
                        $('#description').val('Une activit\xE9 pour les amateurs de tirs au pigeon d’argile. Le tout se d\xE9bute'
                            + ' \xE0  10h AM et se termine \xE0 2h  PM dans le fin fond des bois.');
                    }
                    else if (str == "Cabane à Sucre") {
                        $('#description').val('Le 28 f\xE9vrier venez d\xE9guster \xE0 la meilleur cabane \xE0 sucre en ville.');
                    }
                    else if (str == "Soirée Théâtre") {
                        $('#description').val('Une soir\xE9e pour les amateurs de com\xE9dies. Un tourment d’\xE9motions. La troupe de th\xE9\xE2tre' 
                        + ' Jean-Guy vous promet une soir\xE9e d’enfer avec des rires et des pleures. Un meurtre, mais qui est le meurtrier?'
                        + ' Venez le d\xE9couvrir en achetant un billet! Le tout d\xE9bute le 20 septembre 2018 \xE0 10h pm \xE0 Ottawa.');
                    }
                    else {
                    $('#description').val('');
                    }
                }
            });
        }

        else {
            // Si la valeur de grandeur est Aucune en disable
            $('#description').val('');
            activiteSelect.empty();
            activiteSelect.append('<option>Aucune</option>');
            activiteSelect.prop('disabled', true);
        }
    });

    $('#dropDownActivite').change(function () {

        var combo = document.getElementById('dropDownActivite');
        var textArea = document.getElementById('description');
        var str = combo.options[combo.selectedIndex].value;
        if (str == "Tournoi de Golf") {
            $('#description').val('Un tournoi rempli de prix \xE0 remporter et de plaisir incroyable.'
                + ' C’est autant un tournoi comp\xE9titif que pour le plaisir puisqu’il y a des prix de participation'
                + ' et des prix de comp\xE9tition. Exemple de prix de comp\xE9tition : Le plus pr\xE8s du « Pin » sur le'
                + ' trou 9 gagnera 50$! Le tout se passe à Hawkesbury, Ontario et le tournoi d\xE9bute \xE0 midi. ');
        }
        else if (str == "Tirs au Pigeon d\'Argile") {
            $('#description').val('Une activit\xE9 pour les amateurs de tirs au pigeon d’argile. Le tout se d\xE9bute'
                + ' \xE0  10h AM et se termine \xE0 2h  PM dans le fin fond des bois.  ');
        }
        else if (str == "Cabane à Sucre") {
            $('#description').val('Le 28 f\xE9vrier venez d\xE9guster \xE0 la meilleur cabane \xE0 sucre en ville.');
        }
        else if (str == "Soirée Théâtre") {
            $('#description').val('Une soir\xE9e pour les amateurs de com\xE9dies. Un tourment d’\xE9motions. La troupe de th\xE9\xE2tre' 
            + ' Jean-Guy vous promet une soir\xE9e d’enfer avec des rires et des pleures. Un meurtre, mais qui est le meurtrier?'
            + ' Venez le d\xE9couvrir en achetant un billet! Le tout d\xE9bute le 20 septembre 2018 \xE0 10h pm \xE0 Ottawa.');
        }
        else {
        $('#description').val('');
        }
    });
});
