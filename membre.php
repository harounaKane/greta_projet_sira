<?php

include 'fonctions.php';

if( !isAdmin() ){
  header("Location: index.php");
  exit();
}

$sql = "SELECT * FROM membre";

$req = bd()->prepare($sql);
$req->execute();

$liste = $req->fetchAll();
$membre_actuel = "";

if( isset($_GET['action']) && ctype_digit($_GET['id']) ){
  $action = $_GET['action'];

  //cas de suppression
  if( $action == "supprimer" ){
    $sql = "DELETE FROm membre WHERE id_membre = :id";

    $delet = bd()->prepare($sql);
    $delet->execute(["id" => $_GET['id']]);

    if($delet){
      header("Location: membre.php");
      exit;
    }else{
      echo 'erreur';
    }
  }

  //modification
  if( $action == "modifier" ){
    $sql = "SELECT * FROM membre WHERE id_membre = :id";

    $recup = bd()->prepare($sql);
    $recup->execute( ["id" => $_GET['id']] );

    $membre_actuel = $recup->fetch();
  }
}
if( isset($_POST['ajout']) ){
  //va produire des variables ($prenom, $pseudo ...)
  extract($_POST);
  //cas UPDATE
  if( !empty($_POST['id_membre']) ){

    $sql = "UPDATE membre SET
                          pseudo   = :pseudo,
                          prenom   = :prenom,
                          nom      = :nom,
                          civilite = :civilite,
                          statut   = :statut,
                          email    = :mail
            WHERE id_membre = :id
    ";
    $upd = bd()->prepare($sql);
    $upd->execute([
      "pseudo"    => $pseudo,
      "prenom"    => $prenom,
      "nom"       => $nom,
      "civilite"  => $civilite,
      "statut"    => $statut,
      "mail"      => $mail,
      "id"        => $id_membre
    ]);

    if( $req ){
      header("Location: membre.php");
      exit;
    }

    //cas INSERT
  }else{
    if( existes("membre", "pseudo", $pseudo) || existes("membre", "email", $mail) ){
      $_SESSION['message'] = "Ce pseudo ou mail existe déjà !";
      header("location: membre.php");
      exit();
    }

    $sql = "INSERT INTO membre VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, now())";
    $req = bd()->prepare($sql);
    $req->execute([$pseudo, $mdp, $nom, $prenom, $mail, $civilite, $statut]);

    if( $req ){
      header("Location: membre.php");
      exit;
    }
  }


}


// $liste = [
//   [
//     "id_membre" => 1,
//     "pseudo" => "greta",
//     "mdp" => "greta",
//     "civilite" => "greta",
//     "email" => "greta@hotmail.fr",
//     "nom" => "greta",
//     "prenom" => "greta",
//     "date_enregistrement" => "greta",
//     "statut" => 10
//   ]
// ];


require 'vues/header.php';

include 'vues/vue_membre.php';

require 'vues/footer.php';

// while ($list = $req->fetch()) {
//   var_dump($list);
// }
