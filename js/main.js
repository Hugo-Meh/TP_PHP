'use strict';

$(function () {


    console.log("chargement effectué");
    var valeur_modif;
    var valeur;
    $('.neutre').on('click',function(){
        $('.neutre').removeClass('active');
        $(this).addClass('active');
    });
    $('.add').on('click', function (e) {
        e.preventDefault();
        console.log($(this).attr('href'));
        $.get($(this).attr('href'), 'false', function (data) {
            if (data.error) {
                alert(data.message)
            }
            else {
                if (confirm(data.message + "\nVoulez vous consulter votre panier ?")) {
                    console.log("redirection");
                    location.href = "panier.php";
                }
                else {
                    $('.total_prix').text(data.total);
                    $('.qte_total').text(data.qte);
                }
            }
        }, 'json');
    });

    $('.del').on('click', function (e) {
        e.preventDefault();

        console.log("delete ctivé");

        $.get($(this).attr('href'), 'false', function (data) {
            console.log(data);
            $(this).remove();

            if (data.error) {
                alert(data.message)
            }
            else {
                $('.total_prix').text(data.total);
                $('.qte_total').text(data.qte);

            }


        }, 'json');

        $(this).parents(".article_panier").fadeOut(5000, function () {
            $(this).parents(".article_panier").remove()
        });

    });
    $(".qte").on("click", function () {

        console.log("quantité a  modifié");
        valeur = parseInt($(this).text());
        var id = $(this).parents('.article_panier').attr('id');
        $(this).replaceWith("<input type=number min=0 max=10 class='input_qte' value='" + valeur + "'><a class='valider_qte' href='ajax/traitement_panier.php' ><img  src='image/bouton/OK' alt='OK'/></a>");

        $(".valider_qte").on("click", function (event) {
            event.preventDefault();
            valeur_modif = parseInt($('.input_qte').val());
            var prix = parseFloat($(this).parents(".article_panier").find('.prix').text(), 2);
            console.log(valeur_modif);
            if (valeur_modif == 0) {
                $(this).parents(".article_panier").fadeOut(5000, function () {
                    $(this).parents(".article_panier").remove();
                });
            }
            console.log($(this).attr('href'));
            if (valeur_modif != valeur) {
                $.get($(this).attr('href'), {"id": id, "qte": valeur_modif, "prix": prix}, function (data) {

                    if (data.error) {
                        alert(data.message)
                    }
                    else {
                        $('.total_prix').text(data.total);
                        $('.qte_total').text(data.qte);
                    }
                }, 'json');
            }

            $(this).parent().replaceWith("<li><span class='titre qte_title'>Quantité</span><span  class='qte'>" + valeur_modif + "</span></li>");
        });
    });


});