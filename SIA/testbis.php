<?php
    require_once './const.php';
    require_once "./MysqlManager.php";
   
    error_reporting(0);

    $DEFAULT=$_SERVER['DOCUMENT_ROOT']; /*Default redirection quand le script commence*/
    /*$path = C:\wamp64\www\EPA\Documents";

    /* si aucun dossier n'a encore été créer on affiche la path courante */
    if(!isset($_POST['mkdir'])&&!isset($_POST['pathmkdir'])&&!isset($_GET['dir']))
    {
        header('location:?dir='.$DEFAULT);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Explorer fichiers </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="js/jquery-1.12.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.tablesorter.min.js"></script>
        <script src="js/jquery.tablesorter.widgets.min.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="col-lg-offset-10 col-lg-4 col-md-4 col-sm-4 ">
                <br><br><br>
                <button class="btn btn-primary" type="button" style="margin-bottom: 30px;" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Ajouter un répertoire </button>
            </div>

           <?php
                    if(isset($_GET['dir'])&&!empty($_GET['dir'])&&file_exists($_GET['dir'])&&is_dir($_GET['dir']))/*Verifie la variable et bien un repertoire*/
                    {
                        $rep=$_GET['dir'];
                        $rep=str_replace("//","/",$rep);
                        $handle = @opendir($rep);/* Ouvre le repertoire */

                        if(!$handle)
                        {
                            Erreur('Erreur l\'ors de l\'ouverture de '.$rep.' !');
                            exit;
                        }
                        
                        $replien=str_replace(" ",'%20',$rep);/*idem pour les dossier*/
                    }

            echo '<div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Ajout Répertoire </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="mkdir.php">
                        <div class="form-group">
                            <label for="choix"> Nom dossier </label>
                            <input type="text"  id="name" name ="mkdir" class="form-control"/>
                            <input type="hidden" name="pathmkdir" value="'.$replien.'" />
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
                </div>
      
                </div>

            </div>';

            echo '<section>
                    <table class="tablesorter table table-striped text-center ">
                        <thead style="font-size : 15px; cursor: pointer;">
                            <tr>
                                <th class="text-center"> Nom </th>
                            </tr>
                        </thead>   
                    <tbody> ';

                    
                    $resultat = $co->execQuery("SELECT * FROM `test`.`dossier` ORDER BY id_dossier ASC");
                    $co->recupLRes();
                    
                    $tab = $co->getListeRes();

                    for($i=0; $i < sizeof($tab); $i++)
                    {
                       /* si les chemins sont identiques */
                        if($_GET['dir'] == $tab[$i]["chemin_dossier"])
                        {
                            
                            $res = $co->execQuery("SELECT id_sousdossier FROM `test`.`dossier` WHERE id_dossier = '".$tab[$i]["id_dossier"]."'");
                            $ids = $co->recup1Res();

                            echo '<tr>';
                            echo '<td>';
                            
                            if(!empty($ids['id_sousdossier']))
                            {
                                echo '<a href=testbis.php?dir='.$tab[$i]["chemin_dossier"].'/'.$tab[$i]["nom_dossier"].'><i class="glyphicon glyphicon-folder-open"></i> &nbsp ' .$tab[$i]["nom_dossier"].'</a>';
                            }
                            else
                            {
                                echo '<a href=test_href.php?dir='.$tab[$i]["chemin_dossier"].'/'.$tab[$i]["nom_dossier"].'><i class="glyphicon glyphicon-folder-open"></i> &nbsp ' .$tab[$i]["nom_dossier"].'</a>';
                            }

                            echo '</td>';
                            echo '</tr>';  
                        }   
                    } 


                    ?>

                    </tbody>
                 </table>
             </section>
        </div>
    </body>
</html>

