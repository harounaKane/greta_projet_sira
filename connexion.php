<?php

include 'fonctions.php';

if(isset($_POST['connexion']) && !empty($_POST['pseudo'])){
  //$sql = "SELECT * FROM membre";
   $sql = "SELECT * FROM membre WHERE pseudo = ?";
 // $sql = "SELECT * FROM membre WHERE pseudo = :login";
  $req = bd()->prepare($sql);

  $req->execute(array( $_POST['pseudo']));


  if($req->rowCount() != 0){

    $membre= $req->fetch();
    //test si mdp POST == mdp BD
    if( password_verify($_POST['mdp'], $membre['mdp']) ){
      $_SESSION['membre'] = $membre;
      $_SESSION['message'] = "Connexion réussie !";
      header("location: index.php");
      exit;
    }else{
      $_SESSION['message'] = "Mot de pas incorrect !";
      header("location: connexion.php");
      exit;
    }
  }else{
    $_SESSION['message'] = "Login et/ou mot de passe incorrect !";
    header("location: connexion.php");
    exit;
  }

}

if(isset($_GET['action']) && $_GET['action'] == "logOut"){
  session_destroy();
  header("Location: .");
}

require 'vues/header.php';

include 'vues/vue_connexion.php';

require 'vues/footer.php';
