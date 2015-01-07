<?php
	require('../../ProjetS3/Scripts/verif_session.php');
	header('Content-type: text/html; charset=utf-8');

	$id = $_SESSION['idMembre']; //On récupère l'id du membre connecté
	/* Informations structure page */
	$Titre = 'Stages-IUT Informatique';
	$AffichageNom = $_SESSION['nom'];
	$AffichagePrenom = $_SESSION['prenom'];
	$AffichageEmail = $_SESSION['email'];
	/* Mettre à la suite sous le même format, les différents CSS intervenant sur la page*/
	$Style[] = '../../ProjetS3/CSS/head.css';
	$Style[] = '../../ProjetS3/CSS/body.css';
	$Style[] = '../../ProjetS3/CSS/foot.css';
	$Style[] = '../../ProjetS3/CSS/formes.css';
	$Style[] = '../../ProjetS3/CSS/balises.css';
	$Style[] = '../../ProjetS3/CSS/couleurs_idDiv.css';
	$Style[] = '../../ProjetS3/CSS/positions.css';
	$Style[] = '../../ProjetS3/CSS/footer.css';
	$Style[] = '../../ProjetS3/CSS/formulaires.css';

	include('../../ProjetS3/Structures/head.php');

	if ($id == 1 || $id == 3 || $id == 4){ //si etudiant ou tuteur enseignant ou membre du secrétariat
		echo 
		"
			<div class='informationsMembre' id='bleu-fonce'>
				<form action='../../ProjetS3/Scripts/modifier_infos134.php' method='post'>
	    			<fieldset>
			    		<legend>Vos informations personnelles</legend>
				    	<input name='nom' type='text' placeholder='$AffichageNom' disabled='disabled'/>
				   		<input name='prenom' type='text' placeholder='$AffichagePrenom' disabled='disabled'/>
				   		<input name='mdp' type='password' placeholder='Mot de passe'/>
				   		<input name='confirmmdp' type='password' placeholder='Confirmation mdp'/>
				   		<input name='mail' type='email' placeholder='$AffichageEmail'/>
				   		<input name='maj' type='submit' style='display:block; value='Mettre a jour'/>
		    		</fieldset>
		    		<br>
   				</form>
			</div>
			<br>
		";
	}
	else if ($id == 2){ //si tuteur entreprise
		//même formulaire avec choix supplémentaires (informations entreprise)
		// => ajouter informations entreprise dans la table entreprise et y joindre le membre par son id
	}
	
	else if($id == 5){ //si responsable
		//même formulaire qu'en haut, avec plus de choix
	}
	else{ //sinon, déconnexion forcée
		header('../../ProjetS3/Scripts/fermeture_session.php');
		exit();
	}

	include('../../ProjetS3/Structures/foot.php');
?>