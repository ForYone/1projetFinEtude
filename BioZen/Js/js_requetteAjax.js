$(document).ready(function() {


    $(".voirPromo").click(function() {


            if ($(".modaleContact").css("display", "flex")) {
                $(".modalContact").css("display", "none")
            }
            if ($(".modaleConnexion").css("display", "flex")) {
                $(".modalConnexion").css("display", "none")
            }




            var articlePromo = $(this).attr("id");


            $.ajax({
                url: 'Controlleurs/ModalPromo.php',
                type: 'post',
                data: { articlePromo: articlePromo },
                success: function(data) {

                    $(".contenueModal").html(data);
                    $(".modalePromo").css('display', 'block');
                    $(".div-hide").slideDown(900);




                }

            });




        })
        //fermeture modal Promo
    $("#fermeturePromo").click(function() {
        $(".modalePromo").css('display', 'none')
        $('.promotion').removeClass('promotionClick');
        $(".div-hide").slideUp(900);
    });










});