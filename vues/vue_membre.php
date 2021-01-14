
  <h3>Liste des membres</h3>

  <table class="table table-striped">
    <tr>
      <th>Pseudo </th>
      <th>Nom </th>
      <th>Prénom </th>
      <th>Email </th>
      <th>Civilité </th>
      <th>Satut </th>
      <th>Date enregistrement </th>
      <th>Action</th>
    </tr>
    <?php foreach($liste as $key => $value): ?>
      <tr>
        <td> <?= $value['pseudo'] ?></td>
        <td> <?= $value['civilite'] ?></td>
        <td> <?= $value['nom'] ?></td>
        <td> <?= $value['prenom'] ?></td>
        <td> <?= $value['email'] ?></td>
        <td> <?= $value['statut'] ?></td>
        <td> <?= $value['date_enregistrement'] ?></td>
        <td>
          <a href="">Modifier</a>
          <a href="">Supprimer</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
