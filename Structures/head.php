<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width" />
	<title><?php echo $Titre ?></title>

	<?php
	for($i = 0; $i < count($Style); $i++)
		echo "<link rel='stylesheet' href='".$Style[$i]."' type='text/css' >";
	?>

</head>
<body>
	<div class="banniere">
		<a href="http://www.univ-valenciennes.fr/" target="_blank">
			<img class="position_logo_sponsor" src="../../projetS3/Images/logo-transparent-final.png" border="0"/>
		</a>
		<img class="position_logo_projet" src="../../ProjetS3/Images/logo-groupe-transparent.png"/>
	</div>
	<nav class="menuHorizontal">
		<a href="../../ProjetS3/index.php">Accueil</a>
		<a href="../../ProjetS3/Informations_Generales/">Informations générales</a>
		<a href="../../ProjetS3/Informations_Etudiants/">Informations étudiants</a>
		<a href="../../ProjetS3/Informations_Entreprises/">Informations entreprises</a>
		<a href="../../ProjetS3/Mon_Espace/">Mon espace</a>
	</nav>