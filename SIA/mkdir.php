<?php

error_reporting(0);
require_once './const.php';

$mkdir = $_POST['mkdir'];
$pmkdir = $_POST['pathmkdir'];


//echo $mkdir;
//echo $pmkdir;

/* permet de créer un répertoire */
//if(isset($mkdir) && !empty($mkdir) && isset($pmkdir) && !empty($pmkdir))
if(isset($mkdir) && !empty($mkdir))
{
    
    /* On récupère le chemin du répertoire du fichier (sans le non du fichier) */
    $rep = dirname($pmkdir);

    /* On récupère le dossier ou est stocké le fichier (uniquement le nom du dossier, pas le chemin) */
    $occ = substr(strrchr($pmkdir, '/'), 1);

    /* On récupère l'id du dossier ou est stocké le fichier pour pouvoir le stocker dans la base de données lors de l'insertion d'un document */
    $resultat = $co->execQuery("SELECT id_dossier FROM `bddepa`.`dossier` WHERE nom_dossier ='".$occ."'");
    $idd = $co->recup1Res();

    /*echo 'Id du sous dossier: '.$idd['id_dossier'].'';*/

    $ddl_dir = $pmkdir.'/'.$mkdir;

    /* On récupère les noms des dossiers et leur chemin dans la base de données */
    $req1 = $manager->execQuery("SELECT nom_dossier, chemin FROM `bddepa`.`dossier`");
    $manager->recupLRes();
    $dossier = $manager->getListeRes();



    $i = 0;

    while($i < sizeof($dossier))
    {
        if($dossier[$i]['chemin'].'/'.$dossier[$i]['nom_dossier'] == $ddl_dir && file_exists($ddl_dir) && is_dir($ddl_dir))
        {
           header('location:index.php?dir='.$pmkdir.'&mkd=2');
        }
        
        $i++;
    }

    $resultat = $ms->execQuery("INSERT INTO `bddepa`.`dossier`(`nom_dossier`,`chemin`) 
    								VALUES ('".$mkdir."', '".$pmkdir."')"); 

    if(!mkdir($ddl_dir,0777) && !$resultat)
    {
        header('location:index.php?dir='.$pmkdir.'&mkd=1');
    }
    else
    {
        header('location:index.php?dir='.$pmkdir.'&mkd=0');
    }
    
       
}else{
	echo "dans else";
}


