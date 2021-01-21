
  <div class="row m-2">

    <figure class="col-4">
      <img class="img-fluid w-100 img-thumbnail" src="public/images/vehicules/<?= $vehicule['photo']?>" alt="">
      <figcaption class="text-center"><?= $vehicule['marque']?></figcaption>
    </figure>

    <div class="col-4">
      <?= $vehicule['description']?>
      <?= $vehicule['prix_journalier']?> € / jour
    </div>

  </div>

  <form action="" method="post">

    <input type="hidden" name="id_membre" value="<?= $_SESSION['membre']['id_membre'] ?>">
    <input type="hidden" name="id_vehicule" value=" <?= $vehicule['id_vehicule']?>">
    <input type="hidden" name="id_agence" value=" <?= $vehicule['id_agence']?>">
    <input type="hidden" name="prix_jounalier" id="prix" value="<?= $vehicule['prix_journalier']?>">

    <div class="row">
      <div class="form-group col-3">
        <label for="">Date de début</label>
        <input id="date_debut" type="date" name="date_debut" min="<?= date('Y-m-d') ?>" class="form-control">
      </div>

      <div class="form-group col-3">
        <label for="">Date de fin</label>
        <input id="date_fin" type="date" name="date_fin" disabled min="" class="form-control">
      </div>
    </div>

    <div class="row">
      <div id="prix_ttc" class="col-2 text-center m-3 p-2"></div>
    </div>

    <div class="row">
      <div class="col-3">
        <input type="submit" value="Réserver" class="btn btn-primary">
        <input type="reset"  class="btn btn-danger">
      </div>
    </div>

  </form>

  <script type="text/javascript">
    let date_debut = document.getElementById('date_debut');
    let date_fin = document.getElementById('date_fin');
    let prix = document.getElementById('prix').value;

    date_debut.addEventListener('change', function(){
      date_fin.disabled = false;
      date_fin.min = date_debut.value;

      date_fin.addEventListener('change', () => {
        let jours = nbJours(date_debut.value, date_fin.value);

        document.getElementById('prix_ttc').innerHTML = jours + " jours pour " + (prix*jours) +"€";
      });

    });

    function nbJours(d1, d2){
      let debut = new Date(d1);
      let fin = new Date(d2);

      return (fin-debut)/(24*60*60*1000)+1;//*1000; //86400000+1;
    }

  </script>
