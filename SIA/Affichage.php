<?php

/**
 * Description of Affichage
 *
 * @author soray_000
 */
class Affichage 
{
   function ajout_Doc()
   {
       echo '<div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Ajout Document </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="insert.php?dir='.$_GET['dir'].'" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="choix"> Fichier (tous formats) : </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                            <input type="file"  id="fic" name ="fic" />
                        </div>
                        <div class="form-group">
                            <label for="droit">  Droit </label>
                            <div class="col-lg-offset-4 col-lg-8 ">
                                <div class="radio">
                                    <label><input type="radio" name="droit" value="1"> Membres du bureau </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="droit" value="2"> Conseil d\'Administration </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="droit" value="3"> Adhérents </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="droit" value="4"> Tous </label>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary" name="Valider"> Valider </button>
                    </form> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Fermer </button>
                </div>
                </div>
                </div>
            </div>';
   }

   function ajout_Rep()
   {
      echo '<div class="modal fade" id="myRep" role="dialog">
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
   }
   function upd_Doc($tab)
   {
       echo '<div class="modal fade" id="mod_update" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"> Modification Utilisateur </h4>
                </div>
                <div class="modal-body">
                   <form method="post" action="update.php" enctype="multipart/form-data">
                        <input type="hidden" name="newid" value="'.$tab["id"].'" />
                        <div class="form-group">
                            <label for="choix"> Fichier (tous formats) : </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                            <input type="file"  id="fic" name ="newfic" />
                        </div>
                        <div class="form-group">
                            <label for="titre"> Nom </label>
                            <input type="text" class="form-control" id="titre"  name="newtitre" size="10" value="'.$tab["name"].'"/>
                            <input type="hidden" name="path" value="'.$tab["chemin"].'" />
                        </div>
                        <div class="form-group">
                        <label for="droit">  Droit </label>
                        <div class="col-lg-offset-4 col-lg-8 ">
                            <div class="radio">
                                <label><input type="radio" name="droit" value="1"> Membres du bureau </label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="droit" value="2"> Conseil d\'Administration </label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="droit" value="3"> Adhérents </label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="droit" value="4"> Tous </label>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form> 
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
   }
   
   function affTabFichier($tab)
   {

       echo '  <section>
                <table class="tablesorter table table-striped text-center ">
                    <thead style="font-size : 15px; cursor: pointer;">
                      <tr>
                        <th class="text-center"> Nom </th>
                        <th class="text-center"> Modifié le </th>
                        <th class="text-center"> Taille </th>
                        <th class="text-center">  Actions </th>
                      </tr>
                    </thead>   
                    <tbody>';
      for($i=0; $i < sizeof($tab); $i++)
      {
          echo '<tr>';
          echo '<td><a href="'.$tab[$i]["chemin_r_doc"].'"><i class="glyphicon glyphicon-open"></i> &nbsp ' .$tab[$i]["nom_document"].'</a></td>';
          echo '<td>'.$tab[$i]["date_document"].'</td>';
          echo '<td>'.$tab[$i]["taille_document"].' MO </td>';
          echo'<td> 
              <div class="col-lg-3 col-lg-offset-1">
                  <a href="info_upd.php?idupd='.$tab[$i]["id_document"].'&dir='.$_GET['dir'].'" ><button class="btn btn-primary" type="button" value="Modifier" ><i class="glyphicon glyphicon-refresh"></i> &nbsp Modifier </button></a>
              </div>
              <div class="col-lg-3 col-lg-offset-1">' ?>
                  <a href="javascript:confirmDelete('supp.php?iden= <?php echo $tab[$i]["id_document"]; ?>');"><button class="btn btn-danger" name="supp"><i class="glyphicon glyphicon-remove"></i> &nbsp Supprimer</button></a>
              </div>
             <?php 
                  echo '<div class="col-lg-3 col-lg-offset-1">
                      <a href="test.php?m='.$tab[$i]["id_document"].'"class="btn btn-success" role="button"><i class="glyphicon glyphicon-envelope"></i> &nbsp Envoyer</a>
                      </div>
              </td>';
                  echo '</tr>'; 
      } 
      
      echo ' </tbody>
            </table>
           </section>';

            
   }
   
   function avert_insert($in)
   {
       /* Insertion a reussi */
       if($in == 0)
       {
           echo '<div class="modal fade" id="i_success" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat ajout </h4>
                </div>
                <div class="modal-body">
                  <p> Document ajouté avec succès ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
       }
       /* Echec insertion */
       else
       {
           echo '<div class="modal fade" id="i_echec" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat ajout </h4>
                </div>
                <div class="modal-body">
                  <p> Le document n\'a pas été ajouté ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
       }
   }

   function avert_delete($del)
   {
       /* Suppression reussie */
       if($del == 0)
       {
           echo '<div class="modal fade" id="d_success" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat suppression </h4>
                </div>
                <div class="modal-body">
                  <p> Le document a été supprimé avec succès ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
       }
       /* Echec suppression */
       else if($del == 1)
       {
           echo '<div class="modal fade" id="d_echec" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat suppression </h4>
                </div>
                <div class="modal-body">
                  <p> Le document n\'a pas été supprimé ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
       }
       else 
      {
           echo '<div class="modal fade" id="d_echecbis" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat suppression </h4>
                </div>
                <div class="modal-body">
                  <p> Le document n\'existe pas ou est introuvable ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
      }
   }
   
   function avert_update($upd)
   {
       /* Update reussie */
       if($upd == 0)
       {
           echo '<div class="modal fade" id="u_success" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat update </h4>
                </div>
                <div class="modal-body">
                  <p> Le document a été modifié avec succès ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
       }
       /* Echec update*/
       else
       {
           echo '<div class="modal fade" id="u_echec" role="dialog">
                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Résultat updtae </h4>
                </div>
                <div class="modal-body">
                  <p> Le document n\'a pas été modifié ! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
       }
   }
   function form_mail()
   {
       echo '<div class="modal fade" id="mod_mail" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"> Envoyer document </h4>
                </div>
                <div class="modal-body">
                   <form method="post" action="renommer.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="destinataire"> Destinataire(s) : </label>
                            <input type="text"  id="dest" name ="dest" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="objet"> Objet : </label>
                            <input type="text" id="obj" name="obj" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="description"> Votre Mail </label><br />
                            <textarea name="description" id="description" rows="5" cols="60" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="choix"> Piece jointe : </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                            <input type="file"  id="fic" name ="newfic" class="form-control"/>
                        </div>
                        <button type="submit" class="btn btn-primary"> Envoyer </button>
                    </form> 
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
      
                </div>
            </div>';
   }

   function avert_search($rr)
   {
      if($rr == 1)
      {
        echo '<div class="modal fade" id="mod_rr" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"> Resultat recherche </h4>
                </div>
                <div class="modal-body">
                  <h4> Aucun resultat ne correspond a votre recherche </h4>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Fermer </button>
                </div>
                </div>
      
                </div>
            </div>';
      }
   }
}
