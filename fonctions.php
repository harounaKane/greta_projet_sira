<?php
session_start();

/**
deescription
*/
function bd(){
  $pdo = new PDO("mysql:host=localhost;dbname=greta_projet_sira", "root", '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  return $pdo;
}


function isConnected(){
  if( isset($_SESSION['membre']) ){
    return true;
  }
  return false;
}

function isAdmin(){
 if( isConnected() && $_SESSION['membre']['statut'] == 1 ){
  return true;
 }
 return false;
}

//liste
function getAll($table){

  $recup = executeRequete("SELECT * FROM ".$table);

  return $recup->fetchAll();
}


function executeRequete($query, $params = array()){

  $res = bd()->prepare($query);
  $res->execute($params);

  return $res;
}

function loadImage($destination, $name){
  //taille autorisée
  if( $_FILES['photo']['size'] <= 20000 ){
    $extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff'];
    $info = pathinfo($_FILES['photo']['name']);

    if( in_array($info['extension'], $extensions) ){
     $root = "public/images/".$destination.'/'.$name.'.'.$info['extension'];
     //déplacement de l'image
     move_uploaded_file($_FILES['photo']['tmp_name'], $root);
     return $name.'.'.$info['extension'];
   }
 }
}


function nombreJour($debut, $fin){
  $dd = strtotime($debut);
  $df = strtotime($fin);
  $nbjTimeStamp = $df - $dd;

  return $nbjTimeStamp/86400 + 1; //86400 = 60*60*24;
}
