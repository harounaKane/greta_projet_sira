<?php

include 'fonctions.php';
if( !isAdmin() ){
  header("Location: index.php");
  exit();
}


$agences = getAll("agence");

//$veh = executeRequete("SELECT v.*, a.titre as titre_agence FROM vehicule v, agence a WHERE v.id_agence = a.id_agence");

$veh = executeRequete("SELECT v.*, a.titre as titre_agence
  FROM vehicule as v
  INNER JOIN agence as a ON v.id_agence = a.id_agence");

$liste_vehicule = $veh->fetchAll();
$nom_photo = "";


if( isset($_GET['option']) && $_GET['option'] == 'filtre_agence' ){
  $liste_vehicule = executeRequete("SELECT v.*, a.titre titre_agence
                  FROM vehicule v, agence a
                  WHERE v.id_agence = a.id_agence
                  AND a.id_agence = :filtre_agence",
                  array('filtre_agence' => $_GET['id_agence']));

  $liste_vehicule = $liste_vehicule->fetchAll();

}


if( isset($_POST['titre']) ){
  extract($_POST);

  if( $_POST['photo_actuelle'] ){
     $nom_photo = $_POST['photo_actuelle'];
  }


  if( !empty($_FILES['photo']['name']) ){
    $nom_photo = loadImage('vehicules', $marque . date('Ydmhis'));
  }

  if( !empty($_POST['id_vehicule']) ){
    $sql = "UPDATE vehicule SET titre = :titre, marque = :marque, modele = :modele, description = :descr, prix_journalier = :prix, photo = :photo WHERE id_vehicule = :id";

    executeRequete($sql, ["titre" => $titre, "marque" => $marque, "modele" => $modele, "descr" => $description, "prix" => $prix, "photo" => $nom_photo, "id" => $id_vehicule]);
  }else{
    $query = "INSERT INTO vehicule VALUES(NULL, :agence, :titre, :marque, :modele, :descs, :photo, :prix)";

    $recup = executeRequete($query, [
      "agence"  => $id_agence,
      "titre"   => $titre,
      "marque"  => $marque,
      "modele"  => $modele,
      "descs"   => $description,
      "photo"   => $nom_photo,
      "prix"    => $prix
    ]);

  }
    header("location: vehicule.php");
}

//Suppression / Modification
if( isset($_GET['action']) && ctype_digit($_GET['id']) ){
   $action = $_GET['action'];

   if( $action == 'supprimer' ){
      $delet = executeRequete("DELETE FROM vehicule WHERE id_vehicule = :id_a_suprimer", ["id_a_suprimer" => $_GET['id']]);

      $photo_a_supp = "public/images/vehicules/".$_GET['photo'];

      if( !empty($_GET['photo']) && file_exists($photo_a_supp) ) {
        unlink($photo_a_supp);
      }

      if($delet)
         header("Location: vehicule.php#ancre_delete");
   }

   if( $action == "modifier" ){
      $recup = executeRequete("SELECT * FROM vehicule WHERE id_vehicule = :id_a_modifier", array("id_a_modifier" => $_GET['id']));

      $vehicule_actuel = $recup->fetch();
   }
}




$title = "Véhicule";

require 'vues/header.php';
require 'vues/vue_vehicule.php';
require 'vues/footer.php';
