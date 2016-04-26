<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
 
    <title>Ensemble pour l'Afrique</title>
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <link href="assets/css/style.css" rel="stylesheet" />
    
	
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script> 
		
		<script type='text/javascript'> 
		$(function(){ 
		$(window).scroll(function () {
		//Au scroll dans la fenetre on déclenche la fonction 
		if ($(this).scrollTop() > 105) { 
		//si on a défilé de plus de 150px du haut vers le bas 
		$('#navigation').addClass("fixNavigation"); //on ajoute la classe "fixNavigation" à <div id="navigation"> 
		} else {
		$('#navigation').removeClass("fixNavigation");//sinon on retire la classe "fixNavigation" à <div id="navigation"> 
		}
		}); 
		}); 
		</script>
</head>

<body>

	<?php include("entete_con.php"); ?>
	
    <div class="content-wrapper">	
		
		<div class="col-md-6 menu_gauche">
			<p>
				Téléphone :
			</p>
			<p>
				(0033) 01 00 00 00 00 
			</p>
		</div>
		
		<div class=" col-md-6 contenu">

		<fieldset>
			<legend class="titres">10, Avenue Paul Appel 75014 Paris – France</legend>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.9175022497475!2d2.3258902156730703!3d48.8216354792838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671af2c2a3c3b%3A0x8493a47e268d0ca6!2s10+Avenue+Paul+Appell%2C+75014+Paris!5e0!3m2!1sfr!2sfr!4v1461624871809" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</fieldset>
		
		</div>


			<!-- Le code ici -->	
		

			
		
    </div>
	
    <!-- CONTENT-WRAPPER SECTION END-->
	
 <?php include("footer.php"); ?>
    <!-- FOOTER SECTION END-->
	
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
