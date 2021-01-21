
  <h3>Liste des membres</h3>

  <table class="table table-striped">
    <tr>
      <th>Pseudo </th>
      <th>Civilité </th>
      <th>Nom </th>
      <th>Prénom </th>
      <th>Email </th>
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
          <a href="membre.php?action=modifier&id=<?= $value['id_membre'] ?>">Modifier</a>
          -
          <a href="membre.php?action=supprimer&id=<?= $value['id_membre'] ?>">Supprimer</a>
        </td>

      </tr>
    <?php endforeach; ?>
  </table>

  <hr>
  <h3>Ajout/Modif d'un membre</h3>
  <form action="" method="post">
    <input type="hidden" name="id_membre" value="<?= $membre_actuel['id_membre'] ?? 0 ?>">
    <div class="row">
      <div class="form-group col-6">
        <label for="">Pseudo</label>
        <input type="text" class="form-control" name="pseudo" value="<?= $membre_actuel['pseudo'] ?? '' ?>">
      </div>
      <div class="form-group col-6">
        <label for="">Email</label>
        <input type="email" class="form-control" name="mail" value="<?= $membre_actuel['email'] ?? '' ?>">
      </div>
    </div>

     <div class="row">
      <div class="form-group col-6">
        <label for="">Password</label>
        <input type="password" class="form-control" name="mdp">
      </div>
      <div class="form-group col-6">
        <label for="">Civilité</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="civilite" value="femme" <?= isset($membre_actuel['civilite']) && $membre_actuel['civilite'] == 'femme' ? 'checked' : '' ?> >
          <label class="form-check-label" for="exampleRadios1">
            Femme
          </label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="civilite" value="homme" <?= isset($membre_actuel['civilite']) && $membre_actuel['civilite'] == 'homme' ? 'checked' : '' ?>>
          <label class="form-check-label" for="exampleRadios1">
            Homme
          </label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="">Nom</label>
        <input type="text" class="form-control" name="nom" value="<?= $membre_actuel['nom'] ?? '' ?>">
      </div>
      <div class="form-group col-2">
        <label for="">Statut</label>
        <select name="statut" id="" class="form-control">
          <option value="1" <?= isset($membre_actuel['statut']) && $membre_actuel['statut'] == 1 ? 'selected' : ''  ?> >Admin </option>
          <option value="0" <?= isset($membre_actuel['statut']) && $membre_actuel['statut'] == 0 ? 'selected' : ''  ?> >utilisateur</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="">Prénom</label>
        <input type="text" class="form-control" name="prenom" value="<?= $membre_actuel['prenom'] ?? '' ?>">
      </div>
    </div>
    <input type="submit" class="btn btn-success" name="ajout">
    <input type="reset" class="btn btn-danger">

  </form>

