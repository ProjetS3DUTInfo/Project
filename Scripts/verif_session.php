<?php
	session_start();
	if ( ((!isset($_SESSION['email'])) || (empty($_SESSION['email'])) ) && ( (!isset($_SESSION['mdp'])) || (empty($_SESSION['mdp'])) ))
	{	//La session n'existe pas
		echo "Vous devez être membre et être connecté pour voir ce contenu.<br>
			<a href='../../ProjetS3/Mon_Espace/index.php'>Cliquez ici pour vous connecter </a>";
		exit();
	}
?>