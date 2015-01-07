<?php
	header('Content-type: text/html; charset=utf-8');
	require('../../ProjetS3/Scripts/verif_session.php');

	/* Informations structure page */
	$Titre = 'Stages-IUT Informatique';

	/* Mettre à la suite sous le même format, les différents CSS intervenant sur la page*/
	$Style[] = '../../ProjetS3/CSS/head.css';
	$Style[] = '../../ProjetS3/CSS/body.css';
	$Style[] = '../../ProjetS3/CSS/foot.css';
	$Style[] = '../../ProjetS3/CSS/formes.css';
	$Style[] = '../../ProjetS3/CSS/balises.css';
	$Style[] = '../../ProjetS3/CSS/couleurs_idDiv.css';
	$Style[] = '../../ProjetS3/CSS/positions.css';
	$Style[] = '../../ProjetS3/CSS/footer.css';

	include('../../ProjetS3/Structures/head.php');


	include('../../ProjetS3/Structures/foot.php');
?>