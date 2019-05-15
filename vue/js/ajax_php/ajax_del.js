$(document).ready(function(){
 
    $("#submit_del").click(function(e){
        e.preventDefault();
        $.post(
            'js/ajax_php/ajax_del.php',
            {
                se3 : $("#se3").val()
            },
 
            function(data){
                if(data == 'Succes')
                {
                   alert("Votre compte a bien ete supprimer")
                   document.location.href="accueil.php"
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