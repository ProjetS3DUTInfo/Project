<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=projets3', 'root', '');
	}
	catch(Exception $e){
    	echo 'Echec de la connexion à la base de données <br>';

    	echo 'Erreur : '.$e->getMessage().'<br />';
    	echo 'N° : '.$e->getCode();
    	exit();
	}
?>