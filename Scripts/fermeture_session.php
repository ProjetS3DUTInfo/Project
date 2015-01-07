<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	$_SESSION = array(); // on réécrit le tableau
	session_destroy(); // on détruit le tableau réécrit


	if(empty($_SESSION['email']) && empty($_SESSION['mdp'])){
		echo "Vous êtes maintenant déconnecté. <br>";
		echo "<a href='../../ProjetS3/index.php'>Retour à l'accueil du site</a>";
	}
?>