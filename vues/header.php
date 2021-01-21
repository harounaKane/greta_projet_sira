<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <title> <?= $title ?? "Agence" ?> </title>
</head>
<body>
  <header class="text-center text-white">
    <h1>Bienvenue à bord</h1>
    <h2>Location de véhicule</h2>
    <nav>
      <a class="btn btn-warning" href="index.php">Accueil</a>
      <?php if( isConnected() ): ?>
        <a class="btn btn-success" href="compte.php">Mon compte</a>

        <?php if( isAdmin() ): ?>
          <a class="btn btn-success" href="membre.php">Gestion Membre</a>
          <a class="btn btn-success" href="vehicule.php">Gestion Véhicule</a>
          <a class="btn btn-success" href="agence.php">Gestion Agence</a>
          <a class="btn btn-success" href="commande.php">Gestion Commande</a>
        <?php endif; ?>
        <a class="btn btn-danger" href="connexion.php?action=logOut">Déconnexion</a>
      <?php else: ?>
          <a class="btn btn-success" href="inscription.php">Inscription</a>
          <a class="btn btn-success" href="connexion.php">Connexion</a>
      <?php endif; ?>
    </nav>
  </header>
  <main class="container-fluid">

    <?php if( isset($_SESSION['message']) ): ?>
      <div id="messageInfo" class="bg-success text-white p-3 text-center my-2">
          <?= $_SESSION['message'] ?>
          <?php unset($_SESSION['message']); ?>
      </div>
    <?php endif; ?>

