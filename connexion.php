<?php

include 'fonctions.php';

if(isset($_POST['connexion']) && !empty($_POST['pseudo'])){
  //$sql = "SELECT * FROM membre";
   $sql = "SELECT * FROM membre WHERE pseudo = ? AND mdp = ?";
 // $sql = "SELECT * FROM membre WHERE pseudo = :login";
  $req = bd()->prepare($sql);

  $req->execute(array( $_POST['pseudo'], $_POST['mdp'] ));


  if($req->rowCount() != 0){
    $_SESSION['membre'] = $req->fetch();
  }

}

if(isset($_GET['action']) && $_GET['action'] == "logOut"){
  session_destroy();
  header("Location: .");
}

require 'vues/header.php';

include 'vues/vue_connexion.php';

require 'vues/footer.php';
