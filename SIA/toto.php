<?php

    error_reporting(0);

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
