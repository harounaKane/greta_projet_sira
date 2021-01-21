<?php

include 'fonctions.php';

if( !isConnected() ){
  header("Location: index.php");
  exit();
}


// $commandes = executeRequete("SELECT prenom, nom, commande.*, agence.titre, marque
//                               FROM commande, membre, agence, vehicule
//                               WHERE commande.id_membre = membre.id_membre
//                               AND commande.id_agence = agence.id_agence
//                               AND commande.id_vehicule = vehicule.id_vehicule");

$commandes = executeRequete("SELECT prenom, nom, commande.*, agence.titre, marque
                              FROM commande
                              INNER JOIN membre ON commande.id_membre = membre.id_membre
                              INNER JOIN agence ON  commande.id_agence = agence.id_agence
                              INNER JOIN vehicule ON commande.id_vehicule = vehicule.id_vehicule
                              WHERE commande.id_membre = :id",
                              ['id' => $_SESSION['membre']['id_membre']]);

//var_dump($commandes->fetchAll());
//$commandes = $commandes->fetchAll();

$title = "Liste commande";

include "vues/header.php";
include "vues/vue_compte.php";
include "vues/footer.php";
