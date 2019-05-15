$(document).ready(function(){
 
    $("#log").click(function(e){
        e.preventDefault();
        $.post(
            'js/ajax_php/ajax_connexion.php',
            {
                mail_co : $("#mail_co").val(),
                pass_co : $("#pass_co").val(),
            },
 
            function(data){
 
                   console.log(data);
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