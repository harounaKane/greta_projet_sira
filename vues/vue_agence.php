
<h3 id="ancre_delete">Liste des agences</h3>

<table class="table table-striped table-hover table-sm table-bordered">
  <thead class="thead-dark">
    <tr>
      <td>Titre </td>
      <td>Adresse </td>
      <td>Ville </td>
      <td>CP </td>
      <td>Description </td>
      <td>Photo </td>
      <td>Action</td>
    </tr>
  </thead>

  <?php foreach($liste_agence as $value): ?>

    <tr>
      <td> <?= $value['titre']; ?> </td>
      <td> <?= $value['adresse']; ?> </td>
      <td> <?= $value['ville']; ?> </td>
      <td> <?= $value['cp']; ?> </td>
      <td> <?= $value['description']; ?> </td>
      <td> <img class="w-50" src="public/images/agences/<?= $value['photo']; ?>" alt="photo agence"> </td>
      <td>
        <a href="?action=modifier&id=<?= $value['id_agence']; ?>">modif</a>
        <a href="?action=supprimer&id=<?= $value['id_agence']; ?>&photo=<?= $value['photo']; ?>">Delete</a>
      </td>
    </tr>

  <?php endforeach; ?>

</table>

<hr>

  <h3>Ajout/modification d'agence</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_agence" value="<?= $agence_actuelle['id_agence'] ?? 0 ?>">
    <div class="row">
      <div class="form-group col-6">
        <label for="">Titre</label>
        <input type="text" class="form-control" name="titre" value="<?= $agence_actuelle['titre'] ?? '' ?>">
      </div>
      <div class="form-group col-6">
        <label for="">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="<?= $agence_actuelle['adresse'] ?? '' ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-6">
          <label for="">Description</label>
        <div class="input-group">
          <textarea name="description" class="form-control"><?= $agence_actuelle['description'] ?? '' ?> </textarea>
        </div>
      </div>
      <div class="form-group col-6">
        <label for="">Ville</label>
        <input type="text" class="form-control" name="ville" value="<?= $agence_actuelle['ville'] ?? '' ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="">Photo</label>
        <input type="file" class="form-control" name="photo" value="<?= $agence_actuelle['photo'] ?? '' ?>">
        <?php if( !empty($agence_actuelle['photo']) ): ?>
          <img src="public/images/agences/<?= $agence_actuelle['photo']; ?>" alt="">
          <input type="hidden" name="photo_actuelle" value="<?= $agence_actuelle['photo']; ?>">
        <?php endif; ?>
      </div>
      <div class="form-group col-6">
        <label for="">Code postal</label>
        <input type="text" class="form-control" name="cp" value="<?= $agence_actuelle['cp'] ?? '' ?>">
      </div>
    </div>
    <button type="submit">Envoyer</button>
  </form>
