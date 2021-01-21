<?php

include 'fonctions.php';

$vehicules = executeRequete("SELECT v.*, a.titre titre_ag FROM vehicule v, agence a WHERE a.id_agence = v.id_agence");

$vehicules = $vehicules->fetchAll();

if( isset($_GET['action']) && $_GET['action'] == 'filtre' ){
  $vehicules = executeRequete("SELECT v.*, a.titre titre_ag FROM vehicule v, agence a WHERE a.id_agence = v.id_agence ORDER BY prix_journalier " . $_GET['ordre']);
}

$title = "Accueil";

require 'vues/header.php';
require 'vues/vue_listeVehicule.php';
require 'vues/footer.php';

