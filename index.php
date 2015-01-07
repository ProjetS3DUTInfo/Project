<?php
/* Informations utilisateur */

/* Informations structure page */
$Titre = 'Stages-IUT Informatique';

/* Mettre à la suite sous le même format, les différents CSS intervenant sur la page*/
$Style[] = './CSS/head.css';
$Style[] = './CSS/body.css';
$Style[] = './CSS/foot.css';
$Style[] = './CSS/formes.css';
$Style[] = './CSS/balises.css';
$Style[] = './CSS/couleurs_idDiv.css';
$Style[] = './CSS/positions.css';
$Style[] = './CSS/footer.css';

include('Structures/head.php');
?>

<!-- Début contenu spécifique à la page -->
<div class="texte" id="bleu-fonce">
	<h1>Bienvenue sur le gestionnaire de stages</h1>
	<p>Si vous êtes ici, c'est que vous avez un lien avec le stage de deuxième année de DUT
		informatique.<br/>
		Si vous n'êtes pas encore inscrit, merci de commencer par cette étape.
	</p>
</div>
<br>

<!-- fin contenu spécifique à la page -->
<?php
include('Structures/foot.php');
?>