<?php

	require_once './const.php';
	require_once "./MysqlManager.php";
	require_once "./Affichage.php";
   
    error_reporting(0);

    $pat = $_GET['dir'];
    $se = $_POST['search'];

    $newse=str_replace(" ",'_',$se);

    /*echo 'Lechemin : '.$pat.'<br>';
    echo 'La requete souhaite : '.$se.'';*/

    if(!empty($newse))
    {
        /*echo 'Recherche voulu : '.$se.'<br>';*/
        $e = "SELECT * FROM `bddepa`.`document` WHERE nom_document 
                          LIKE '%".$newse."%'";
                          /*echo $e;*/
        $co->execQuery($e);
        $co->recupLRes();
        $rech = $co->getListeRes();

        if(empty($rech))
        	header('Location:index.php?dir='.$_GET['dir'].'&rr=1');
        else
        {
        	$narray = serialize($rech);
        	header('Location:index.php?dir='.$_GET['dir'].'&rre='.$narray.'');
        }
    }