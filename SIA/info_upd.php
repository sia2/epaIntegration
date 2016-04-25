<?php

require_once './const.php';
error_reporting(0);

/* UPDATE DE DOCUMENTS */
$idupd = $_GET[idupd];
$path = $_GET['dir'];

if(isset($idupd))
{
    $resultat = $co->execQuery("SELECT * FROM `bddepa`.`document` WHERE id_document = '".$idupd."'");
    $t_Res = $co->recup1Res();

    unlink($t_Res['chemin_r_doc']);
    
    header('Location:index.php?nom='.$t_Res["nom_document"].'&idupd='.$t_Res["id_document"].'&dir='.$path.'');
}
