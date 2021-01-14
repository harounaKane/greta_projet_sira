<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <title>Document</title>
</head>
<body>
  <header class="text-center text-white">
    <h1>Bienvenue à bord</h1>
    <h2>Location de véhicule</h2>
    <nav>
      <div> <?= isset($_SESSION['membre']) ?"Bonjour " . $_SESSION['membre']['prenom'] : '' ?> </div>
      <a class="btn btn-success" href="membre.php">Gestion Membre</a>
      <a class="btn btn-success" href="inscription.php">Inscription</a>
      <a class="btn btn-success" href="connexion.php">Connexion</a>
      <a class="btn btn-success" href="connexion.php?action=logOut">Déconnexion</a>

    </nav>
  </header>
  <main class="container-fluid">
