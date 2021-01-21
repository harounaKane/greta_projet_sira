<?php

include 'fonctions.php';

if( !isAdmin() ){
  header("Location: index.php");
  exit();
}

$liste_agence = getAll("agence");
$nom_photo = "imageParDefaut";

if( isset($_POST['photo_actuelle']) ){
    $nom_photo = $_POST['photo_actuelle'];
}

if( isset($_POST['titre']) ){
  extract($_POST);

  //récup de la photo
  if( !empty($_FILES['photo']['name']) ){
    $nom_photo = loadImage('agences', $ville . date('Ydmhis'));
  }
  //cas UPDATE
  if( !empty($_POST['id_agence']) ){

    $sql = "UPDATE agence SET
                                titre = :titre,
                                adresse = :adresse,
                                ville   = :ville,
                                cp      = :cp,
                                description = :descr,
                                photo       = :photo
                          WHERE id_agence = :id";
    $up = bd()->prepare($sql);
    $up->execute([
        "titre"    => $titre,
        "adresse"  => $adresse,
        "ville"    => $ville,
        "cp"       => $cp,
        "descr"    => $description,
        "photo"    => $nom_photo,
        "id"       => $id_agence
    ]);
    if( $up ){
        header("Location: agence.php#ancre_delete");
    }

  }else{
    $sql = "INSERT INTO agence VALUES(NULL, :titre, :adr, :ville, :cp, :descr, :photo)";
     $req = bd()->prepare($sql);

     $req->execute(array(
       "titre"    => $titre,
       "adr"      => $adresse,
       "ville"    => $ville,
       "cp"       => $cp,
       "descr"    => $description,
       "photo"    => $nom_photo
     ));

    if( $req ){
        header("Location: agence.php#ancre_delete");
    }
  }
}

//Suppression / Modification
if( isset($_GET['action']) && ctype_digit($_GET['id']) ){
   $action = $_GET['action'];

   if( $action == 'supprimer' ){
      $delet = bd()->prepare("DELETE FROM agence WHERE id_agence = :id_a_suprimer");

      $delet->execute([':id_a_suprimer' => $_GET['id']]);

      //suppression du fichier
      $photo_a_supp = "public/images/agences/".$_GET['photo'];
      if( !empty($_GET['photo']) && file_exists($photo_a_supp) ) {
        unlink($photo_a_supp);
      }

      if($delet)
         header("Location: agence.php#ancre_delete");
   }

   if( $action == "modifier" ){
      $recup = bd()->prepare("SELECT * FROM agence WHERE id_agence = :id_a_modifier");

      $recup->execute(array("id_a_modifier" => $_GET['id']));

      $agence_actuelle = $recup->fetch();
   }
}


require 'vues/header.php';

include 'vues/vue_agence.php';

require 'vues/footer.php';
