<?php

require_once './const.php';

error_reporting(0);

$n_titre = $_POST["newtitre"];
$iddoc = $_POST["newid"];
$newdroit = $_POST["droit"];
$path = $_POST["path"];


$uploaddir = $path.'/';
$uploadfile = $uploaddir.basename($n_titre);
$uploaddirBDD = $path.'/';
$uploadfileBDD = $uploaddirBDD.basename($n_titre);
$nameF = $_FILES['newfic']['name'];
$typeF = $_FILES['newfic']['type'];
$tailleF = $_FILES['newfic']['size'];
$cheminF = $_FILES['newfic']['tmp_name'];


$resultat = $co->execQuery("SELECT * FROM `bddepa`.`document` WHERE id_document = '".$iddoc."'");
$t_Res = $co->recup1Res();


$req = "UPDATE `bddepa`.`document` SET nom_document = '".$n_titre."',`id_statut`= '".$newdroit."', `date_document`= CURRENT_DATE(), `chemin_r_doc` = '".$uploadfile."', `chemin_a_doc` = '".$uploadfileBDD."'  
        WHERE id_document = '".$iddoc."'"; 
$res = $co->execQuery($req);  

$resbis = $co->execQuery("SELECT * FROM `bddepa`.`document` WHERE id_document = '".$iddoc."'");
$tabF = $co->recup1Res();


if($res)
{
    $dif = array_diff($t_Res, $tabF);
    if(!empty($dif))
    {
        copy($cheminF, $uploadfile);

        if (move_uploaded_file($cheminF, $uploadfile)) 
        {
            header('Location:index.php?dir='.$path.'&upd=0');
        }
    }  
    else
        header('Location:index.php?dir='.$path.'&upd=0');
}


