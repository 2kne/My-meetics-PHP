$(document).ready(function(){
 
    $("#submit_mail").click(function(e){
        e.preventDefault();
        $.post(
            'js/ajax_php/ajax_mail.php',
            {
                mail : $("#mail").val(),
                se1 : $("#se1").val()
            },
 
            function(data){
 
                if(data == 'Succes')
                {
                   alert("Votre email a ete modifie")
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