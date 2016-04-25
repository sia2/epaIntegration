<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	function enregistrerDon($id_don,$num_don,$montant_don,$objet_don,$id_recu_fiscal,$id_personne_moral) {	
		try {// On se connecte � MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=EPA', 'root', 'caramelle');
		}
		catch(Exception $e) {// En cas d'erreur, on affiche un message et on arr�te tout
				die('Erreur : '.$e->getMessage());
		}
		
		//On prepare la requete pour inserer les valeurs utilisateur dans la BD
		$req1 = $bdd->prepare('INSERT INTO don(id_don,num_don, montant_don, objet_don, id_recu_fiscal, id_personne_moral) 
							VALUES ( :id_don, :num_don , :montant_don , :objet_don , :id_recu_fiscal, :id_personne_moral )');
		//On execute la requete
		$req1->execute(array(
				'id_don' => $id_don,
				'num_don' => $num_don,
                                'montant_don' => $montant_don,
				'objet_don' => $objet_don,
				'id_recu_fiscal' => $id_recu_fiscal,
				'id_personne_moral' => $id_personne_moral
				));
		
		$req1->closeCursor(); // Termine le traitement de la requ�te
		
		
		
		return 1; 		
	}
?>