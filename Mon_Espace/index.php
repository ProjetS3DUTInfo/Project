<?php
/* Informations utilisateur */
session_start();

/* Informations structure page */
$Titre = 'Stages-IUT Informatique';

/* Mettre à la suite sous le même format, les différents CSS intervenant sur la page*/
$Style[] = '../CSS/head.css';
$Style[] = '../CSS/body.css';
$Style[] = '../CSS/formes.css';
$Style[] = '../CSS/balises.css';
$Style[] = '../CSS/couleurs_idDiv.css';
$Style[] = '../CSS/formulaires.css';
$Style[] = '../CSS/footer.css';
$Style[] = '../CSS/boutons.css';

include('../Structures/head.php');

//si on est pas loggé on affiche le formulaire d'inscription/connexion
if (((!isset($_SESSION['email'])) || (empty($_SESSION['email']))) && ((!isset($_SESSION['mdp'])) || (empty($_SESSION['mdp']))))
	include('../Structures/formulaire_inscription_connexion.php');

//sinon, on affiche les informations du membre
else{
	
	$role = $_SESSION['role'];
	//si le membre est un étudiant, on affiche la structure du profil de l'étudiant
	if($role == 1){
		include('../../ProjetS3/Structures/PagesPerso/etudiant.php');
	}
	//sinon, si le membre est un tuteur entreprise
	else if($role == 2){
		include('../../ProjetS3/Structures/PagesPerso/tuteurEntreprise.php');
	}
	//sinon, si le membre est un tuteur universitaire
	else if($role == 3){
		include('../../ProjetS3/Structures/PagesPerso/tuteurUniv.php');
	}
	//sinon, si le membre est un membre du secrétariat
	else if($role == 4){
		include('../../ProjetS3/Structures/PagesPerso/secretariat.php');
	}
	//sinon, c'est que c'est un rôle attribué hors inscription, cad directement dans la BDD. Donc c'est un admin (responsable ...)
	else if($role == 5){
		include('../../ProjetS3/Structures/PagesPerso/admin.php');
	}
	//sinon, c'est qu'il y a erreur. On force la déconnexion
	else{
		header("Location: ../../ProjetS3/Scripts/fermeture_session.php");
		exit();
	}
}
?>

<?php
include('../Structures/foot.php');
?>