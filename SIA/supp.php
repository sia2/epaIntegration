<?php

require_once './const.php';

error_reporting(0);

/* SUPPRESSION DE DOCUMENTS */ 
$identifiant = $_GET["iden"];

if(isset($identifiant))
{

  $res = $sqli->execQuery("SELECT chemin_r_doc FROM `bddepa`.`document` WHERE id_document ='".$identifiant."'");
  $chemin = $sqli->recup1Res();

  /*echo 'Chemin document a supprimer : '.$chemin['chemin_r_doc'].'';*/
  /* On récupère le nombre de lignes dans la table avant suppression */
  $nb = $co->execQuery("SELECT COUNT(*) FROM `document`");
  $lg = $co->recup1Res();
  
  $resultat = $co->execQuery("DELETE FROM `document` WHERE id_document = '".$identifiant."'"); 
  
  if($resultat)
  {
      /* On récupère le nombre de lignes dans la table après suppression */
     $nb = $co->execQuery("SELECT COUNT(*) FROM `document`");
     $lgbis = $co->recup1Res();
      

      if(!unlink($chemin['chemin_r_doc']))
      {
         header('Location:index.php?dir='.dirname($chemin["chemin_r_doc"]).'&del=2');
      }

     /* Si les 2 tailles sont différentes alors la suppression a marché sinon non */
     if($lg != $lgbis)
         header('Location:index.php?dir='.dirname($chemin["chemin_r_doc"]).'&del=0');
     else
         header('Location:index.php?dir='.dirname($chemin["chemin_r_doc"]).'&del=1');
  }  
  else
      header('Location:test.php?dir='.dirname($chemin["chemin_r_doc"]).'&del=1');
}
else
{
   /* echo 'Identifiant non existant';*/
    header('Location:test.php?dir='.dirname($chemin["chemin_r_doc"]).'&del=1');
}

