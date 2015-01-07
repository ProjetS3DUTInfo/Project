<?php
  //Script de modification des informations (membre, secrétariat, tuteur enseignant)
  header('Content-type: text/html; charset=utf-8');
  session_start();
  include("loginBDD.php");
  $table = 'membres';

  $ancienEmail = $_SESSION['email'];
  $ancienMdp = $_SESSION['mdp'];
  $idMembre = $_SESSION['idMembre'];

  //si tout a été envoyé, alors
  if(isset($_POST['maj'])){
    //cas 1: modification du mot de passe ET du mail
    if($_POST['mdp'] != null && $_POST['confirmmdp'] != null && $_POST['mail'] != null){
      //on place le contenu des champs dans des variables
      $nouveauMdp = $_POST['mdp'];
      $nouveauMdpConfirm = $_POST['confirmmdp'];
      $nouveauEmail = $_POST['mail'];
      $toutEstBon = true;

      //on verifie que le mail est valide
      if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $nouveauEmail)){
        $toutEstBon = false;
      }

      //on vérifie que l'adresse email n'est pas déjà inscrite dans la base
      $reponse = $bdd->query("SELECT idMembre FROM $table WHERE email='".$nouveauEmail."' ; ");
      if($reponse->fetch() != 0){
            $toutEstBon = false;
      }

      //on vérifie que les deux mots de passe sont identiques
      if ($nouveauMdp != $nouveauMdpConfirm){
        $toutEstBon = false;
      }
      //si tout est bon
      if ($toutEstBon){
        $mdpCrypte = sha1($nouveauMdp); //on hash le mot de passe entré dans le champs

        //on insère les modifications dans la base de données
        $bdd->exec("UPDATE $table SET email='".$nouveauEmail."', mdp='".$mdpCrypte."' WHERE idMembre='".$_SESSION['idMembre']."' ");

        //on modifie les valeurs de la session du membre
        $_SESSION['mdp'] = $mdpCrypte;
        $_SESSION['email'] = $nouveauEmail;

        echo("Mot de passe et adresse email correctement changés");
        echo("<br><a href='../../ProjetS3/Mon_Espace'>Retour à la page précédente</a>");
      }
      //sinon si il y a une erreur dans un des 3 champs, on redirige vers la page en cours
      else{
        echo("Erreur: L'un des mots de passe ou/et votre adresse email est incorrect(e) <br>
          Note: Il se peut que le mail entré soit déjà utilisé par un membre");
        echo("<br><a href='../../ProjetS3/Mon_Espace'>Retour à la page précédente</a>");
      }
    }
    //sinon, si le membre veut modifier uniquement son mot de passe
    else if ($_POST['mdp'] != null && $_POST['confirmmdp'] != null){
      $nouveauMdp = $_POST['mdp'];
      $nouveauMdpConfirm = $_POST['confirmmdp'];
      $toutEstBon = true;

      //on vérifie que les deux mots de passe sont identiques
      if ($nouveauMdp != $nouveauMdpConfirm){
        $toutEstBon = false;
      }

      if ($toutEstBon){
        $mdpCrypte = sha1($nouveauMdp); //on hash le mot de passe entré dans le champs

        //on insère les modifications dans la base de données
        $bdd->exec("UPDATE $table SET mdp='".$mdpCrypte."' WHERE idMembre='".$_SESSION['idMembre']."' ");

        //on modifie les valeurs de la session du membre
        $_SESSION['mdp'] = $mdpCrypte;

        echo("Mot de passe correctement changé");
        echo("<br><a href='../../ProjetS3/Mon_Espace'>Retour à la page précédente</a>");
      }
      //sinon si il y a une erreur dans un des 2 champs du mot de passe, on redirige vers la page en cours
      else{
        echo("Erreur: L'un des mots de passe est incorrect");
        echo("<br><a href='../../ProjetS3/Mon_Espace'>Retour à la page précédente</a>");
      }
    }
    //sinon si il ne veut modifier que son email
    else if($_POST['mail'] != null){
      $nouveauEmail = $_POST['mail'];
      $toutEstBon = true;

      //on verifie que le mail est valide
      if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $nouveauEmail)){
        $toutEstBon = false;
      }

      //on vérifie que l'adresse email n'est pas déjà inscrite dans la base
      $reponse = $bdd->query("SELECT idMembre FROM $table WHERE email='".$nouveauEmail."' ; ");
      if($reponse->fetch() != 0){
            $toutEstBon = false;
      }
      //si tout est bon
      if ($toutEstBon){
        //on insère les modifications dans la base de données
        $bdd->exec("UPDATE $table SET email='".$nouveauEmail."' WHERE idMembre='".$_SESSION['idMembre']."' ");

        //on modifie les valeurs de la session du membre
        $_SESSION['email'] = $nouveauEmail;

        echo("Email correctement changé");
        echo("<br><a href='../../ProjetS3/Mon_Espace'>Retour à la page précédente</a>");
      }
      //sinon si il y a une erreur dans le champ email, on redirige vers la page en cours
      else{
        echo("Erreur: L'email entré n'est pas correct, ou est déjà attribué à un membre");
        echo("<br><a href='../../ProjetS3/Mon_Espace'>Retour à la page précédente</a>");
      }
    }
    //sinon, c'est que le formulaire est vide, donc on ne modifie rien
    else{
      header('Location: ../../ProjetS3/Mon_Espace/informations.php');
      exit();
    }
  }
  $bdd = null;
?>‏