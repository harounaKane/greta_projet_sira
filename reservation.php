<?php

require 'fonctions.php';

if( !isConnected() ){
  $_SESSION['message'] = "Veuillez vous connecter pour effectuer une reservation";
  header("location: connexion.php");
  exit();
}

if( isset($_POST['reservation']) ){
  $vehicule = executeRequete("SELECT *
    FROM vehicule
    WHERE id_vehicule = ?", [$_POST['reservation']]);

  $vehicule = $vehicule->fetch();
}

if (isset($_POST['date_debut'])) {
  extract($_POST);
  $nbrJour = nombreJour($date_debut, $date_fin);
  $prix_total = $nbrJour * $prix_jounalier;

  $res = executeRequete("INSERT INTO commande VALUES(NULL, :membre, :agence, :vehicule, :depart, :fin, :prix, now())", ["membre" => $id_membre, "agence" => $id_agence, "vehicule" => $id_vehicule, "depart" => $date_debut, "fin" => $date_fin, "prix" => $prix_total]);

  if( $res ){
    $_SESSION['message'] = "Réservation effectuée !";
    header("location: .");
    exit();
  }

}

$title = "Réservation";

require 'vues/header.php';
require 'vues/vue_reservation.php';
require 'vues/footer.php';
