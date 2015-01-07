<?php
//Script de connexion.
 header('Content-type: text/html; charset=utf-8');
 include("loginBDD.php");
 $table = 'membres';

 $_SESSION['email'] = '';
 $_SESSION['mdp'] = '';
 $_SESSION['idMembre'] = '';
 //si tout a été envoyé, alors
 if(isset($_POST['connexion'])){

  //on vérifie que rien n'est vide
  if($_POST['mailCo'] != null && $_POST['mdpCo'] != null){

   //on place le contenu des champs dans des variables
   $mail = $_POST['mailCo'];
   $mdp = $_POST['mdpCo'];
   $toutEstBon = true;

   //on verifie que le mail est valide
   if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $mail)){
    $toutEstBon = false;
   }
   //si tout est bon
   if ($toutEstBon){
    //on compare le mot de passe récupéré avec celui stocké dans la bdd

   /* $sql = " SELECT mdp FROM $table WHERE email='".$mail."' ; "; 
    $req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
    $res= mysql_num_rows($req); 
    $donnee = mysql_fetch_array($req);*/
    
    $reponse = $bdd->prepare("SELECT mdp FROM $table WHERE email=:mail ");
    $reponse->bindValue(":mail", $mail);
    $reponse->execute();
    $mdpStocke = $reponse->fetch();
    $mdpStocke = $mdpStocke['mdp'];
    //on stocke dans une variable le resultat correspondant a la requete
   /* $mdpStocke = $donnee['mdp'];*/
    
    $mdpCrypte = sha1($mdp); //on hash le mot de passe entré dans le champs

    //si le mot de passe est le même
    if ($mdpCrypte == $mdpStocke){
     /*$reponse = $bdd->query("SELECT idMembre FROM $table WHERE email='".$mail."' ; "); 
     $id = $reponse->fetch();*/
     $req = $bdd->prepare("SELECT idMembre FROM $table WHERE email=:mail");
     $req->bindValue(":mail", $mail);
     $req->execute();
     $id = $req->fetch();
     $id = $id['idMembre'];
     //ici, faire le stockage d'infos dans la session
     session_start();
               $req = $bdd->prepare("SELECT nom FROM $table WHERE email=:mail");
               $req->bindValue(":mail", $mail);
               $req->execute();
               $nom = $req->fetch();
               $nom = $nom['nom'];

               $req = $bdd->prepare("SELECT prenom FROM $table WHERE email=:mail");
               $req->bindValue(":mail", $mail);
               $req->execute();
               $prenom = $req->fetch();
               $prenom = $prenom['prenom'];

                $req = $bdd->prepare("SELECT role FROM $table WHERE email=:mail");
               $req->bindValue(":mail", $mail);
               $req->execute();
               $role = $req->fetch();
               $role = $role['role'];


     $_SESSION['email'] = $mail;
     $_SESSION['mdp'] = $mdpCrypte;
     $_SESSION['idMembre'] = $id;
      $_SESSION['nom'] = $nom;
      $_SESSION['prenom'] = $prenom;
      $_SESSION['role'] = $role;

     //redirection
     header('Location: ../Mon_Espace/index.php');
     /* Sur la page index.php, il faut à présent afficher les informations du membre*/
       exit();
      }
    else
     echo "<br>Erreur, le mot de passe n'est pas correct";
   }
   else
    echo "<br>L'adresse email n'est pas valide";
  }
  else
   echo "<br>Il y a au moins un champ de vide";
 }
 echo "<br><a href='../../ProjetS3/Mon_Espace/index.php'>Retour à la page de connexion</a>";
 $bdd = null;
?>‏