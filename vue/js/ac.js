$("#bt_ins").click(function(){
	$("#accueil").hide('slow');
	 $('#inscription').show('slow');
});

$("#ins_nav").click(function(){
	$("#accueil").hide('slow');
	$("#connexion").hide('slow');
	$('#inscription').show('slow');
});

$("#co_nav").click(function(){
	$("#accueil").hide('slow');
	$('#inscription').hide('slow');
	$('#connexion').show('slow');
});

$("#bt_co").click(function(){
	$("#accueil").hide('slow');
	$('#connexion').show('slow');
});

$("#acc_nav").click(function(){
	$("#inscription").hide('slow');
	$("#connexion").hide('slow');
	$("#accueil").show('slow');
});
