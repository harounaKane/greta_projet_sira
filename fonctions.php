<?php
session_start();

function bd(){
  $pdo = new PDO("mysql:host=localhost;dbname=greta_projet_sira", "root", '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  return $pdo;
}
