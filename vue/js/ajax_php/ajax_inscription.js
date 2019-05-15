$(document).ready(function(){
 
    $("#submit").click(function(e){
        e.preventDefault();
        $.post(
            'js/ajax_php/inscription_test.php',
            {
                prenom : $("#prenom").val(),
                nom : $("#nom").val(),
                date_naissance : $("#date_naissance").val(),
                sexe : $('input[type=radio][name=sexe]:checked').attr('value'),
                ville : $("#ville").val(),
                mail : $("#mail").val(),
                pass : $("#pass").val(),
                pass_conf : $("#pass_conf").val()
            },
 
            function(data){

                if(data == 'Succes')
                {
                    $(location).attr('href',"profil_accueil.php");
                }
                else
                {
                    $("#errors").html(data.substr(6))
                }
            },
            'text'
         );
    });
});