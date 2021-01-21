<?php

include 'fonctions.php';

if(isset($_POST['inscription'])){
 $pseudo = $_POST['pseudo'];
 $mdp = $_POST['mdp'];
 $civilite = $_POST['civilite'];
 $prenom = $_POST['prenom'];
 $nom = $_POST['nom'];
 $mail = $_POST['mail'];

// $sql = "INSERT INTO membre(pseudo, mdp, nom, prenom, email, civilite, statut, date_enregistrement) VALUES(:login, :mdp, :nom, :prenom, :mail, :sexe, 0, now())"

 $sql = "INSERT INTO membre VALUES(NULL, :login, :mdp, :nom, :prenom, :mail, :sexe, 0, now())";
   $req = bd()->prepare($sql);
  $req->execute([
    "login"   => $pseudo,
    "mdp"     => $mdp,
    "nom"     => $nom,
    "prenom"  => $prenom,
    "mail"    => $mail,
    "sexe"    => $civilite
  ]);

  if($req){
    header("Location: connexion.php");
    exit;
  }

}

$title = "Inscription";

require 'vues/header.php';

include 'vues/vue_inscription.php';

require 'vues/footer.php';

