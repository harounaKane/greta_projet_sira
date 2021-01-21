
<h3 class="text-center bg-secondary p-2 my-2">Gestion des commandes</h3>

<table class="table table-striped table-hover table-sm table-bordered">
  <tr class="thead-dark">
    <th>Véhicule </th>
    <th>Agence </th>
    <th>Début </th>
    <th>Fin </th>
    <th>prix </th>
    <th>Statut </th>
    <th>Jours</th>
    <th>Client </th>
  </tr>
  <?php while($commande = $commandes->fetch()): ?>
    <tr>
      <td> <?= $commande['marque'] ?> </td>
      <td> <?= $commande['titre'] ?> </td>
      <td> <?= $commande['date_heure_depart'] ?> </td>
      <td> <?= $commande['date_heure_fin'] ?> </td>
      <td> <?= $commande['prix_total'] ?> </td>
      <td> <?= $commande['date_heure_fin'] > date('Y-m-d') ? "En cours" : "Terminée" ?> </td>
      <td> <?= nombreJour($commande['date_heure_depart'], $commande['date_heure_fin']) ?> </td>
      <td> <?= $commande['prenom']." ".$commande['nom'] ?> </td>
    </tr>
  <?php endwhile; ?>

</table>
