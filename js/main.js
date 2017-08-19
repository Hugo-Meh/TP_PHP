'use strict';

$(function () {
    console.log("chargement effectué");
    $('.add').on('click', function (e) {
        e.preventDefault();
        console.log($(this).attr('href'));
        $.get($(this).attr('href'), 'false', function (data) {
            console.log(data);
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

        $(this).parents(".article_panier").fadeOut( 5000, function() {
            $(this).parents(".article_panier").remove()
        });
    });
});