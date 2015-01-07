<div class="texte" id="bleu-fonce">
	<h1>Pour utiliser le gestionnaire, connectez-vous ou inscrivez-vous</h1>

	<div class="formInscriptionConnexion">
		<form action='../../ProjetS3/Scripts/verif_inscription.php' method='post'>
	    	<fieldset>
	    		<legend> Inscription </legend>
		    	<input name="nom" type="text" placeholder="Votre nom"/>
		   		<input name="prenom" type="text" placeholder="Votre prénom"/>
		   		<input name="mdp" type="password" placeholder="Mot de passe"/>
		   		<input name="confirmmdp" type="password" placeholder="Confirmation mdp"/>
		   		<input name="mail" type="email" placeholder="Votre adresse mail"/><br>
		   		<input name="choixRadio" type="radio" value="Etudiant" checked="true"/><label for="Etudiant">Je suis étudiant</label><br>
		   		<input name="choixRadio" type="radio" value="TuteurEntreprise"/><label for="TuteurEntreprise">Je suis tuteur en entreprise</label><br>
		   		<input name="choixRadio" type="radio" value="TuteurUniversitaire"/><label for="TuteurUniversitaire">Je suis tuteur universtiaire</label><br>
		   		<input name="choixRadio" type="radio" value="Administration"/><label for="Administration">Je suis membre du secrétariat</label><br><br>
		   		<input name="inscription" type="submit" style="display:block;" value="Inscription"/>
		    </fieldset>
   		</form>
   	</div>
   	<br>


   	<div class="formInscriptionConnexion">
   		<form action='../../ProjetS3/Scripts/verif_connexion.php' method='post'>
   			<fieldset>
   				<legend> Connexion </legend>
   				<input name="mailCo" type="email" placeholder="Email"/>
   				<input name="mdpCo" type="password" placeholder="Mot de passe"/>
   				<!--<input name="sessionActive" type="checkbox" id="sessionactive"/><label for="sessionactive">Garder ma session active</label></br></br> -->
   				
   				<input name="connexion" type="submit" style="display:inline-block;" value="Connexion"/>
   			</fieldset>
   		<br>
   		</form>
   	</div>
</div>
<br>