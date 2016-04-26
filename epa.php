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

	<?php include("entete.php"); ?>
	
    <div class="content-wrapper">	
		
		<div class="col-md-6 menu_gauche">
			<li><a href="#">Mot de la directrice</a></li>
			<li><a href="#">Membres</a></li>
			<li><a href="#">Projets</a></li>
			<li><a href="#">Partenaires</a></li>
			
		</div>
		
		<div class=" col-md-6 contenu">

		<p>Agir ensemble pour l'Afrique est notre ambition.

Elle est née d’une prise de conscience collective (étudiants de la Cité Internationale Universitaire et habitués de la chapelle des Franciscains sise dans le 14ème arrondissement de Paris) devant la gravité des violences survenues au Rwanda en 1994, puis en Côte d'ivoire en 1999.

Pour conjurer le sentiment d'impuissance et de culpabilité ressenti en pareille circonstance, le meilleur moyen était de nous engager dans le projet de développement durable de l'Afrique.

Des textes fondateurs sont venus consolider notre volonté d'agir ensemble pour l'Afrique :

-       le Message de Gorée sur la purification de la mémoire  (SCEAM, Dakar octobre 2003, cf. lien en annexe),

-       le Rapport d'information du Sénat sur l'accueil « immédiat et chaleureux » des étudiants et stagiaires étrangers en France, notamment les primo-arrivants individuels (Sénat 2006 cf. lien en annexe),

-       la loi ESS (économie sociale et solidaire du 31 juillet 2014, dite loi Hamon (cf. lien en annexe), qui ouvre de nouvelles perspectives pour le développement des projets associatifs, et vient conforter nos intuitions.</p>
		
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
