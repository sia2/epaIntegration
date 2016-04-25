<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="../assets/img/user.png">

    <title>Paiment EPA</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/hover.zoom.js"></script>
    <script src="../assets/js/hover.zoom.conf.js"></script>
    <SCRIPT>
var index
function  sort_int(p1,p2) { return p1[index]-p2[index]; }			//fonction pour trier les nombres
function sort_char(p1,p2) { return ((p1[index]>=p2[index])<<1)-1; }	//fonction pour trier les strings

function TableOrder(e,Dec)  //Dec= 0:Croissant, 1:Décroissant
{ //---- Détermine : oCell(cellule) oTable(table) index(index cellule) -----//
	var FntSort = new Array()
	if(!e) e=window.event
	for(oCell=e.srcElement?e.srcElement:e.target;oCell.tagName!="TD";oCell=oCell.parentNode);	//determine la cellule sélectionnée
	for(oTable=oCell.parentNode;oTable.tagName!="TABLE";oTable=oTable.parentNode);				//determine l'objet table parent
	for(index=0;oTable.rows[0].cells[index]!=oCell;index++);									//determine l'index de la cellule

 //---- Copier Tableau Html dans Table JavaScript ----//
	var Table = new Array()
	for(r=1;r<oTable.rows.length;r++) Table[r-1] = new Array()

	for(c=0;c<oTable.rows[0].cells.length;c++)	//Sur toutes les cellules
	{	var Type;
		objet=oTable.rows[1].cells[c].innerHTML.replace(/<\/?[^>]+>/gi,"")
		if(objet.match(/^\d\d[\/-]\d\d[\/-]\d\d\d\d$/)) { FntSort[c]=sort_char; Type=0; } //date jj/mm/aaaa
		else if(objet.match(/^[0-9£?$\.\s-]+$/))		{ FntSort[c]=sort_int;  Type=1; } //nombre, numéraire
		else											{ FntSort[c]=sort_char; Type=2; } //Chaine de caractère

		for(r=1;r<oTable.rows.length;r++)		//De toutes les rangées
		{	objet=oTable.rows[r].cells[c].innerHTML.replace(/<\/?[^>]+>/gi,"")
			switch(Type)		
			{	case 0: Table[r-1][c]=new Date(objet.substring(6),objet.substring(3,5),objet.substring(0,2)); break; //date jj/mm/aaaa
				case 1: Table[r-1][c]=parseFloat(objet.replace(/[^0-9.-]/g,'')); break; //nombre
				case 2: Table[r-1][c]=objet.toLowerCase(); break; //Chaine de caractère
			}
			Table[r-1][c+oTable.rows[0].cells.length] = oTable.rows[r].cells[c].innerHTML
		}
	}

 //--- Tri Table ---//
	Table.sort(FntSort[index]);
	if(Dec) Table.reverse();

 //---- Copier Table JavaScript dans Tableau Html ----//
	for(c=0;c<oTable.rows[0].cells.length;c++)	//Sur toutes les cellules
		for(r=1;r<oTable.rows.length;r++)		//De toutes les rangées 
			oTable.rows[r].cells[c].innerHTML=Table[r-1][c+oTable.rows[0].cells.length];  
}
</SCRIPT>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-default-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">EPA</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="about.html">Forum</a></li>
            <li><a href="blog.html">Forum2</a></li>
            <li><a href="contact.html">Forum 3</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	
	<!-- +++++ Contact Section +++++ -->
	
	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>ME RENDRE RICHE</h3>
				<hr>
				<p>Historique des paiements percu par EPA</p>
                                <a class="btn btn-default" href="indon.php"> <span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 1.5em;"></span> Ajouter un don </a>
			</div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID paiment <span onclick=TableOrder(event,1)>&#9660;</span><span onclick=TableOrder(event,0)>&#9650;</span> </th>
                  <th>Nom et Prénom</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Montant</th>
                  <th>Etat<span onclick=TableOrder(event,1)>&#9660;</span><span onclick=TableOrder(event,0)>&#9650;</span></th>
                  <th>Plus d'info</th>
                  <th> Modifier </th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01234</td>
                  <td>Salim Derghoum</td>
                  <td>11-11-2014</td>
                  <td>Don</td>
                  <td>100</td>
                  <td>En attente chèque</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="modifiercollection2.html" name="submit" class="btn btn-info">Valider</a>  <a href="supprimer.html" class="btn btn-danger">Supprimer</a></td>
                </tr>
                 <tr>
                  <td>01234</td>
                  <td>Mamod Dhergoum</td>
                  <td>11-11-2014</td>
                  <td>Adhérent</td>
                  <td>50</td>
                  <td>En attente RIB</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="modifiercollection2.html" name="submit" class="btn btn-info">Valider</a>  <a href="supprimer.html" class="btn btn-danger">Supprimer</a></td>
                </tr>
                <tr>
                  <td>01234</td>
                  <td>Soraya Dhergoum</td>
                  <td>11-11-2014</td>
                  <td>Don</td>
                  <td>50000</td>
                  <td>En attente RIB</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="supprimer.html" class="btn btn-danger">Recu Fiscal</a></td>
                </tr>
                        <td>01234</td>
                  <td>Soraya Dhergoum</td>
                  <td>11-11-2014</td>
                  <td>Don</td>
                  <td>50000</td>
                  <td>En attente RIB</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="supprimer.html" class="btn btn-danger">Recu Fiscal</a></td>
                </tr>
                        <td>01234</td>
                  <td>Soraya Dhergoum</td>
                  <td>11-11-2014</td>
                  <td>Don</td>
                  <td>50000</td>
                  <td>En attente RIB</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="supprimer.html" class="btn btn-danger">Recu Fiscal</a></td>
                </tr>
                        <td>01234</td>
                  <td>Soraya Dhergoum</td>
                  <td>11-11-2014</td>
                  <td>Don</td>
                  <td>50000</td>
                  <td>En attente RIB</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="supprimer.html" class="btn btn-danger">Recu Fiscal</a></td>
                </tr>
                        <td>01234</td>
                  <td>Soraya Dhergoum</td>
                  <td>11-11-2014</td>
                  <td>Don</td>
                  <td>50000</td>
                  <td>En attente RIB</td>
                  <td><button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                  </td>
                  <td><a href="supprimer.html" class="btn btn-danger">Recu Fiscal</a></td>
                </tr>
                
               
              </tbody>
            </table>
          </div>
    

            </div>
			</div>
		</div><!-- /row -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selection de Boutiques</h4>
      </div>
      <div class="modal-body">
    <h2 class="sub-header">Information de la personne</h2>
          <div class="table-responsive">
              <span><b>Nom : </b><input type="text" value="MIZOURI"></span> <br/>
              <span><b>Prénom : </b><input type="text" value="Mohamed-Hedi"></span> <br/>
              <span><b>Téléphoone : </b><input type="text" value="064251513"></span> <br/>
              <span><b>Mail : </b><input type="text" value="Mohamed-Hedi@mail.fr"></span><br/>
          </div>
 <h2 class="sub-header">Historique des paiments</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Montant</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01-04-2015</td>
                  <td>100€</td>
                  <td>Adhérent</td>
                </tr>
                <tr>
                  <td>01-04-2015</td>
                  <td>100€</td>
                  <td>Adhérent</td>
                </tr>
                <tr>
                  <td>01-04-2015</td>
                  <td>100€</td>
                  <td>Adhérent</td>
                </tr>
                <tr>
                  <td>01-04-2015</td>
                  <td>100€</td>
                  <td>Adhérent</td>
                </tr>
                <tr>
                  <td>01-04-2015</td>
                  <td>100€</td>
                  <td>Adhérent</td>
                </tr>
                <tr>
                  <td>01-04-2015</td>
                  <td>100€</td>
                  <td>Adhérent</td>
                </tr>
              </tbody>
            </table>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
</div>
<nav>
<div class="text-center">
  <ul class="pagination text-center">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
  <div class="text-center"> 
<button id="singlebutton" name="singlebutton" class="btn btn-primary">Retour</button>  </br></br>
</div>
  </div>
</nav>


    </div>
	</div><!-- /container -->
	
	
	<!-- +++++ Footer Section +++++ -->
	
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>My Bunker</h4>
					<p>
						Sartrouville (78),<br/>
						+33 6 42 51 38 43, <br/>
						France.
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>Réseaux sociaux</h4>
					<p>
						<a href="http://fr.viadeo.com/fr/profile/mohamed-hedi.mizouri">Viadéo</a><br/>
						<a href="https://www.linkedin.com/pub/mohamedhedi-mizouri/91/281/8ab?domainCountryName=&csrfToken=guest_token#reg-modal">Linkedin</a><br/>
						
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>A propos de moi</h4>
					<p>Ce site a été crée pour montrer mes compétences de manière simple et efficace.</p>
				</div><!-- /col-lg-4 -->
			
			</div>
		
		</div>
	</div>
	<footer>
	<p class ="text-center">
		Made in France - Marmoh tous droits réservés
	</p>
	</footer>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
