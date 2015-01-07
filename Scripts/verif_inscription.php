<?php
//Script de verification et j'ajout de membre dans la base de donnees
	header('Content-type: text/html; charset=utf-8');
	include("loginBDD.php");
	$table = 'membres';

	//si tout a été envoyé, alors
	if(isset($_POST['inscription'])){

		//on vérifie que rien n'est vide
		if($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['mdp'] != null && $_POST['confirmmdp'] != null
			&& $_POST['mail'] != null){

			//on place le contenu des champs dans des variables
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mdp = $_POST['mdp'];
			$confirmmdp = $_POST['confirmmdp'];
			$mail = $_POST['mail'];
			$role = $_POST['choixRadio'];
			$toutEstBon = true;

			if($role == 'Etudiant')
				$valeurRole = 1;
			else if($role == 'TuteurEntreprise')
				$valeurRole = 2;
			else if($role == 'TuteurUniversitaire')
				$valeurRole = 3;
			else
				$valeurRole = 4;

			//verification de la structure des champs
			if (strlen($nom) >20){
				echo '<br>Limite de nombre de caractères atteinte. Votre nom ne doit pas dépasser 20 caractères';
				$toutEstBon = false;
			}
			if(strlen($prenom) >20){
				echo '<br>Limite de nombre de caractères atteinte. Votre prénom ne doit pas dépasser 20 caractères';
				$toutEstBon = false;
			}
			if($mdp != $confirmmdp){
				echo '<br>Le mot de passe est différent du mot de passe de confirmation';
				$toutEstBon = false;
			}
			if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $mail)){
				echo "<br>L'adresse email n'est pas valide";
				$toutEstBon = false;
			}
			//si tout est bon, on vérifie que le membre n'est pas présent dans la base
			if ($toutEstBon){
			/*	$sql = " SELECT idMembre FROM $table WHERE email='".$mail."' ; "; 
				$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
				$res= mysql_num_rows($req); 
				$donnee = mysql_fetch_array($req);*/
				$reponse = $bdd->query("SELECT idMembre FROM $table WHERE email='".$mail."' ; ");

				//si le resultat est != 0 c'est que le membre est déjà présent avec cette adresse
				if($reponse->fetch() != 0){ 
    				echo "<br>Un utilisateur est déjà inscrit avec l'adresse mail: $mail";
    			}
    			else{
    				//Sinon, on crypte le mot de passe
    				//$mdpcrypte = crypt($mdp);
    				$mdpcrypte = sha1($mdp);
    				//et on ajoute l'utilisateur dans la base
    				/*$sql = "INSERT INTO $table (nom, prenom, email, mdp, role) VALUES('".$nom."', '".$prenom."', '".$mail."', '".$mdpcrypte."', $valeurRole); "; 
    				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); */

    				$bdd->exec("INSERT INTO $table (nom, prenom, email, mdp, role) VALUES('".$nom."', '".$prenom."', '".$mail."', '".$mdpcrypte."', $valeurRole); ");

    				echo "<br>Merci de votre inscription $nom $prenom. Vous pouvez vous connecter";
    			}
			}
		}
		else{
			echo "<br>Erreur: Il y a au moins 1 champs que vous n'avez pas rempli";
		}
	}
	echo "<br><a href='../../ProjetS3/Mon_Espace/index.php'>Retour à la page d'inscription</a>";

	$bdd = null;
?>