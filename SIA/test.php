<?php
    require_once './const.php';
    require_once './Affichage.php';
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap Example</title>
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
                <button class="btn btn-primary" type="button" style="margin-bottom: 30px;" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Ajouter un utilisateur </button>
            </div>
            
            <?php
                $a = new Affichage();
                $a->ajout_Doc();
            ?>
          
            <section>
                <table class="tablesorter table table-striped text-center ">
                    <thead style="font-size : 15px; cursor: pointer;">
                        <tr>
                            <th class="text-center"> Nom </th>
                            <th class="text-center"> Modifié le </th>
                            <th class="text-center"> Taille </th>
                            <th class="text-center">  Actions </th>
                        </tr>
                    </thead>   
                    <tbody>
                     <?php
                            $resultat = $co->execQuery("SELECT * FROM `document` ORDER BY id_document ASC");
                            $co->recupLRes();
                            
                            $tab_Res = $co->getListeRes();
                            
                            $a->affTabFichier($tab_Res);
                        ?>

                    </tbody>
                 </table>
             </section>
             
             <div class="col-lg-offset-5">
                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                   
                </ul>
             </div>
            <?php

                if(isset($_GET["nom"]) AND isset($_GET["idupd"]))
                {
                    $nom = $_GET["nom"];
                    $idmod = $_GET["idupd"];
                    
                    $tab = array("name" => "$nom", "id" => $idmod);
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
            ?>
         </div>
        </body>
        </html>

<script type="text/javascript">
    
    $('#i_success').modal();
    $('#i_echec').modal();
    $('#d_success').modal();
    $('#d_echec').modal();
    $("#mod_update").modal();
    $('#u_success').modal();
    $('#u_echec').modal();
    $('#mod_mail').modal();
    $('table').tablesorter();
    
    function confirmDelete(delUrl) 
    {
        if (confirm("Etes-vous sur de vouloir supprimer ce document?")) { document.location = delUrl;}
    }

</script>



