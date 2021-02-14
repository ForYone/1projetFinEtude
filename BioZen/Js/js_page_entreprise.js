$(document).ready(function() {

    /***********Alimente Modale Page Entreprise************************************ */
    function alimenteModalcategories() {
        $(".view_data").on("click", function() {

            var id_article = $(this).attr("id");

            $.ajax({
                url: 'Controlleurs/ModaleArticleControlleur.php',
                method: 'POST',
                data: 'id_article=' + id_article,

                success: function(data) {
                    $(".modale-offre").empty();
                    $(".modale-offre").append(data);
                    $(".modale-offre").slideDown(900);
                    $(".div-hide").slideDown(900);


                    $('#supp-croix, .div-hide').click(function() {
                        $(".modale-offre").slideUp(800);
                        $(".div-hide").slideUp(800);

                    });

                }

            });
        });
    }

    alimenteModalcategories();
    /****************************************************** END ***********************/







});