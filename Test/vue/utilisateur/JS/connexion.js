


$(document).ready(function(){
    init();

    function valide(){
        var regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var regexTel =/^0\d(\s|-)?(\d{2}(\s|-)?){4}$/;
        var login = $("#login").val();
        var loginConf = $("#login_confirmation").val();
        var correct = true;
        var html ="";
        if(regexEmail.test(login)==false && regexTel.test(login)==false){
            html = html+"<p> Vous devez saisir un email ou un numéro de téléphone valide </p>";
            $("#message").css({color:"red"});
            $("#login").css({borderColor:"red"});
            correct = false;
        }
        else { 
            $("#login").css({borderColor:"#ccc"});
        }
        if(login!=loginConf){
            html = html+ "<p> Vous devez confirmer votre email ou votre numéro de téléphone </p>";
            $("#message").css({color:"red"});
            $("#login_confirmation").css({borderColor:"red"});
            correct = false;
        }
        else{
            $("#login_confirmation").css({borderColor:"#ccc"});
        }
        $("#message").html(html);
        return correct;
    }

    function erreurNom(){
        var nom = $("#nom");
        if (nom.validity.typeMismatch){
            nom.setCustomValidity("Il ne doit y avoir que des lettres");
        }
    }

   function init(){
      $("#formInscription").submit(valide);
      $("$nom").keyup(erreurNom);
   }

});


    