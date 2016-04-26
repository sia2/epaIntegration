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

	<!-- MENU SECTION BEGIN-->
	<?php include("entete.php"); ?>
    <!-- MENU SECTION END-->
	
	
    <div class="content-wrapper">		
		
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="assets/img/13.JPG" alt="...">
					<div class="carousel-caption">
						FIRST
					</div>
				</div>
				
				<div class="item">
					<img src="assets/img/13.JPG" alt="...">
					<div class="carousel-caption">
					SECOND
					</div>
				</div>
				...
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		
	 <form class="navbar-form  inline-form">

      <div class="form-group">

        <input type="search" class="input-sm form-control" placeholder="Recherche">

        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>

      </div>

    </form>
			
		
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
