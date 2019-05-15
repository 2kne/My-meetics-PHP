<?php
require "header.php";
?>
<link rel="stylesheet" href="css/acc_co.css">
<script>
	$(window).ready(function(){
		var i = 1;
		var nbSlide = $(".account_1 li").length;
		for (var b = 0; b <= nbSlide; b++)
		{
			$("li." + b).hide();
		}
		$("li.1").show('slow')
		window.setInterval(function()
		{
			$("li." + i).hide();

			if(i >= nbSlide)
			{
				$("li." + i).hide();
				i = 0;
			}	
			
			var next = i + 1;
			$("li." + next).show('slow');
			i++;

		},4000);
	});

</script>
<div class="account_1">
	<?php 
	$search = new Recherche($bdd);
	$search->search($_POST['genre'], $_POST['age'], $_POST['ville'], $_SESSION['user']['email']);
	?>
</div>