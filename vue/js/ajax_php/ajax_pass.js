$(document).ready(function(){
 
    $("#submit_pass").click(function(e){
        e.preventDefault();
        $.post(
            'js/ajax_php/ajax_pass.php',
            {
                pass : $("#pass").val(),
                se2 : $("#se2").val()
            },
 
            function(data){
    console.log(data);
                if(data == 'Succes')
                {
                   alert("Votre mot de passe a ete modifie")
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