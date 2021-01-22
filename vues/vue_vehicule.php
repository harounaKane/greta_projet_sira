
<h3 id="ancre_delete" class="text-center bg-secondary p-2 my-2">Liste des véhicules</h3>

<table class="table table-striped table-hover table-sm table-bordered">
  <tr class="thead-dark">
    <th>Agence </th>
    <th>Titre </th>
    <th>Marque </th>
    <th>Modèle </th>
    <th>Description </th>
    <th>Photo </th>
    <th>Prix </th>
    <th>Action</th>
  </tr>

  <?php foreach($liste_vehicule as $value): ?>

    <tr class="thead-dark">
      <td> <?= $value['titre_agence']; ?> </td>
      <td> <?= $value['titre']; ?> </td>
      <td> <?= htmlentities($value['marque']); ?> </td>
      <td> <?= $value['modele']; ?> </td>
      <td> <?= $value['description']; ?> </td>
      <td> <img class="w-50" src="public/images/vehicules/<?= $value['photo']; ?>" alt="photo véhicule"> </td>
      <td> <?= $value['prix_journalier']; ?> </td>
      <td>
        <a href="?action=modifier&id=<?= $value['id_vehicule']; ?>">modif</a>
        <a href="?action=supprimer&id=<?= $value['id_vehicule']; ?>&photo=<?= $value['photo']; ?>">Delete</a>
      </td>
    </tr>

  <?php endforeach; ?>

</table>

<hr>

  <h3 class="text-center bg-secondary p-2">Ajout/modification de véhicule</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_vehicule" value="<?= $vehicule_actuel['id_vehicule'] ?? 0 ?>">
    <div class="form-group">
      <select name="id_agence" id="filtre" required>

        <?= $_GET['option'] ?? "<option>-- choix Agence --</option>" ?>

        <?php foreach($agences as $agence) : ?>
          <option value="<?= $agence['id_agence'] ?>" href="?option=filtre_agence&id_agence=<?= $agence['id_agence'] ?>">
            <?= $agence['titre'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="">Titre</label>
        <input type="text" class="form-control" name="titre" value="<?= $vehicule_actuel['titre'] ?? '' ?>">
      </div>
      <div class="form-group col-6">
        <label for="">Marque</label>
        <input type="text" class="form-control" name="marque" value="<?= $vehicule_actuel['marque'] ?? '' ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-6">
          <label for="">Description</label>
        <div class="input-group">
          <textarea name="description" class="form-control"><?= $vehicule_actuel['description'] ?? '' ?> </textarea>
        </div>
      </div>
      <div class="form-group col-6">
        <label for="">Modèle</label>
        <input type="text" class="form-control" name="modele" value="<?= $vehicule_actuel['modele'] ?? '' ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="">Photo</label>
        <input type="file" class="form-control" name="photo" value="<?= $agence_actuelle['photo'] ?? '' ?>">
        <?php if( !empty($vehicule_actuel['photo']) ): ?>
          <img src="public/images/vehicules/<?= $vehicule_actuel['photo']; ?>" alt="">
          <input type="hidden" name="photo_actuelle" value="<?= $vehicule_actuel['photo']; ?>">
        <?php endif; ?>
      </div>
      <div class="form-group col-6">
        <label for="">Prix</label>
        <input type="number" class="form-control" name="prix" value="<?= $vehicule_actuel['prix_journalier'] ?? '' ?>">
      </div>
    </div>
    <button type="submit">Envoyer</button>
  </form>

