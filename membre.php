<?php

include 'fonctions.php';

$sql = "SELECT * FROM membre";

$req = bd()->prepare($sql);
$req->execute();

$liste = $req->fetchAll();

require 'vues/header.php';

include 'vues/vue_membre.php';

require 'vues/footer.php';

// while ($list = $req->fetch()) {
//   var_dump($list);
// }
