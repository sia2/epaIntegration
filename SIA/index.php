<?php
    require_once './const.php';
    require_once "./MysqlManager.php";
    require_once "./Affichage.php";
   
    error_reporting(0);

    //$DEFAULT=$_SERVER['DOCUMENT_ROOT']; /*Default redirection quand le script commence*/
    $path = "C:/wamp/www/SIA/Documents";

    /* si aucun dossier n'a encore été créer on affiche la path courante */
    if(!isset($_POST['mkdir'])&&!isset($_POST['pathmkdir'])&&!isset($_GET['dir']))
    {
        header('location:?dir='.$path);
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
            <div class="row">
            <div class="col-lg-offset-10 col-lg-4 col-md-4 col-sm-4 ">
                <br><br><br>
                <button class="btn btn-primary" type="button" style="margin-bottom: 30px;" data-toggle="modal" data-target="#myRep"><i class="glyphicon glyphicon-plus"></i> Ajouter un répertoire </button>
                <?php
                
                if($_GET['dir'] != "C:/wamp/www/SIA/Documents")
                {
                    echo '<br><button class="btn btn-primary" type="button" style="margin-bottom: 30px;" data-toggle="modal" data-target="#myModal"><i      class="glyphicon glyphicon-plus"></i> Ajouter un document </button></div>'; 
                }
                    echo'<br><br>
                    <div class="col-lg-6">
                        <form method="POST" action="recherche.php?dir='.$_GET['dir'].'">                   
                        <div class="input-group">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-btn"><button class="btn btn-default" type="submit" name="go" >Go!</button></span>
                        </div>
                        </form>
                    </div>'; 

        
                    /* Lorsque l'on clique sur le bouton  Ajouter un document , on affiche le modal contenant le formulaire d'ajout */
                    $a = new Affichage();
                    $a->ajout_Doc();

                    /*Verifie la variable et bien un repertoire*/
                    if(isset($_GET['dir']) && !empty($_GET['dir']) && file_exists($_GET['dir']) && is_dir($_GET['dir']))
                    {
                        $rep=$_GET['dir'];
                        $rep=str_replace("//","/",$rep);
                        $handle = @opendir($rep); /* Ouvre le repertoire */

                        if(!$handle){ echo('Erreur l\'ors de l\'ouverture de '.$rep.' !'); exit; }
                        $replien=str_replace(" ",'%20',$rep);/*idem pour les dossier*/

                        $a->ajout_Rep();
                    }
                        
                        echo '<section>
                                <table class="table table-striped text-center">
                                    <thead style="font-size : 15px; cursor: pointer;">
                                        <tr>
                                            <!--<th colspan="2"> </th>-->
                                            <th class="text-center"> Nom </th>
                                        </tr>
                                    </thead>   
                                    <tbody> ';

                        $resultat = $co->execQuery("SELECT * FROM `bddepa`.`dossier`");
                        $co->recupLRes();
                        
                        $tab = $co->getListeRes();

                        for($i=0; $i < sizeof($tab); $i++)
                        {
                            /* affichage du tableau des répertoires : lorsuque l'on clique sur le nom d'un répertoire, on accède à son contenu */
                            if($_GET['dir'] == $tab[$i]["chemin"])
                            {
                            
                                echo '<tr>';
                                echo '<td>';
                                echo '<a href=?dir='.$tab[$i]["chemin"].'/'.$tab[$i]["nom_dossier"].'><i class="glyphicon glyphicon-folder-open"></i> &nbsp ' .$tab[$i]  ["nom_dossier"].'</a>';
                                echo '</td>';
                                echo '</tr>';  
                            }   
                    }
                
                        echo '  </tbody>
                                </table>
                                </section>';
                        echo '<br><br><br>';

                       /* On récupère les identifiants des dossiers qui possèdent des fichiers */
                        $sql = "SELECT DISTINCT `bddepa`.`document`.id_dossier 
                                FROM `bddepa`.`document`, `bddepa`.`dossier` 
                                WHERE `bddepa`.`dossier`.id_dossier = `bddepa`.`document`.id_dossier";
                        $exec = $ms->execQuery($sql);

                        $ms->recupLRes();
                        $recup = $ms->getListeRes();
                        $cpath = array();

                        /*echo '<br>Taille du tableau : '.sizeof($recup).'';*/
                        for($k = 0; $k < sizeof($recup); $k++)
                        {
                            /*echo '<br><br>Id dossier : '.$recup[$k]['id_dossier'].' <br>';*/

                            /* On récupère les chemins des dossiers qui ont des fichiers */
                            $requete =  $sqli->execQuery("  SELECT chemin, id_dossier, nom_dossier
                                                            FROM `bddepa`.`dossier`
                                                            WHERE id_dossier = '".$recup[$k]['id_dossier']."'");
                            $cpath[$k] = $sqli->recup1Res();
                            $cpath[$k]['chemin'] = $cpath[$k]['chemin'].'/'.$cpath[$k]['nom_dossier'];
                        }

                        $cpt = 0;

                        while ($cpt < sizeof($cpath))
                        {
                            if($_GET['dir'] == $cpath[$cpt]["chemin"])
                            {
                                $resultat = $ms->execQuery("SELECT * FROM `bddepa`.`document` WHERE id_dossier = '".$cpath[$cpt]["id_dossier"]."'");
                                $ms->recupLRes();
                                $tab_Res = $ms->getListeRes();

                                if(!empty($tab_Res))
                                {
                                    $a->affTabFichier($tab_Res);
                                }
                            }

                            $cpt++;
                        }

        
                    if(isset($_GET["nom"]) AND isset($_GET["idupd"]) AND isset($_GET["dir"]))
                    {
                        $nom = $_GET["nom"];
                        $idmod = $_GET["idupd"];
                        $che = $_GET["dir"];

                        $tab = array("name" => "$nom", "id" => $idmod, "chemin" => $che);
                        print_r($tab);
                        $a->upd_Doc($tab);
                    }
                
                    if(isset($_GET["in"]))
                    {
                        $in = $_GET["in"];
                        $a->avert_insert($in);
                    }
                    
                    if(isset($_GET["del"]))
                    {
                        $del = $_GET["del"];
                        $a->avert_delete($del);
                    }
                    
                    if(isset($_GET["m"]))
                    {
                        $mail = $_GET["m"];
                        
                        $a->form_mail();
                    }
                    
                    if(isset($_GET["upd"]))
                    {
                        $upd = $_GET["upd"];
                        $a->avert_update($upd);
                    }

                    if(isset($_GET["rr"]))
                    {
                        $rr= $_GET["rr"];
                        $a->avert_search($rr);
                    }
                
                    if(isset($_GET["rre"]))
                    {
                        $my_array = unserialize($_GET["rre"]);
                        for($p = 0; $p < sizeof($my_array); $p++)
                    {
                       echo '<br><br>
                                <h4 class="text-center"> Resultat(s) de la recherche  </h4>
                                <table class="table table-striped text-center">
                                <thead style="font-size : 15px; cursor: pointer;">
                                    <tr>
                                        <!--<th colspan="2"> </th>-->
                                        <th class="text-center"> Nom </th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-file"></i><a href="'.$my_array[$p]["chemin_r_doc"].'"> '.$my_array[$p]["nom_document"].'</a></td>
                                    </tr>
                                </tbody>
                            </table> ';
                    }
                }
                    ?>
        </div>
    </div>

        <script type="text/javascript">
    
            $('#i_success').modal();
            $('#i_echec').modal();
            $('#d_success').modal();
            $('#d_echec').modal();
            $('#d_echecbis').modal();
            $("#mod_update").modal();
            $('#u_success').modal();
            $('#u_echec').modal();
            $('#mod_mail').modal();
            $('#mod_rr').modal();
            $('table').tablesorter();
            
            function confirmDelete(delUrl) 
            {
                if (confirm("Etes-vous sur de vouloir supprimer ce document?")) { document.location = delUrl;}
            }
        </script>
    </body>
</html>