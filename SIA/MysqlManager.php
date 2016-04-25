<?php

/**
 *
 * @author ismailialaouisoraya
 */

class MysqlManager 
{
    private $requete;
    private $reponse;
    private $listeRes;
    private $connexion;
    private $resCo;
    
    /* Fonction qui permet la connexion à la base de données */
    function MysqlManager($host,$db,$user,$password)
    {
        $this->connexion = new mysqli($host, $user, $password, $db);
        $this->resCo = 0;
        
        if($this->connexion->connect_errno > 0)
        {
            $this->resCo = 1;
            die('Unable to connect to database [' . $this->connexion->connect_error . ']');
        }     
    }
    
    /* Fonction qui permet d'exécuter une requete sql */
    function execQuery($sql)
    {
        $this->requete = $sql;
        
       /* echo 'Requete execute : '.$this->requete.'';*/
        
        $this->reponse = $this->connexion->query($this->requete);
        
        return($this->getReponse());
    }
    
    /* Fonction qui récupère une liste de résultat */
    function recupLRes()
    {
        $i = 0;
        
        while($donnee = $this->reponse->fetch_assoc())
        {
            $this->listeRes[$i] = $donnee;
            $i++;
        }
    }
    
    /* Fonction qui récupère un seul résultat */
    function recup1Res()
    {
        return ($this->reponse->fetch_assoc());
    }
    
    function returnNbRes()
    {
        return($this->reponse->num_rows);
    }
    
    function getRequete()
    {
        return($this->requete);
    }
    
    function getReponse()
    {
        return($this->reponse);
    }
    
    function getListeRes()
    {
        return($this->listeRes);
    }
    
    function getResCo()
    {
        return($this->resCo);
    }
    
    function getConnexion()
    {
        return($this->connexion);
    }
    
    function affRequete()
    {
        echo "Requete MYSQL : ".$this->requete."<br/>";
    }
    
   function afficheInfoConnexion()
   {
       if($this->resCo == 0)
       {
            echo 'Connexion [MYSQL] reussie !!';
       }
       else
       {
           echo 'Connexion [MYSQL] echec !!';
       }
   }
    
   function setRequete($req) { $this->requete = $req;}
   
   
   
   
   
}
