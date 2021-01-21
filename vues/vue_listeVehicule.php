
  <div class="row">
    <div class="form-group col-2 m-3">

      <select class="form-control text-center bg-light" id="filtre">
        <option>-- filtre --</option>
        <option href="?action=filtre&ordre=asc">prix croissant</option>
        <option href="?action=filtre&ordre=desc">prix décroissant</option>
      </select>

    </div>
  </div>

  <div class="row d-flex justify-content-around">

    <?php if( $vehicules ): ?>

      <?php foreach($vehicules as $vehicule): ?>

         <div class="d-flex flex-column justify-content-end align-items-center card m-2 col-2">
            <?php if( !empty($vehicule['photo']) ): ?>
               <img class="img-fluid" src="public/images/vehicules/<?= $vehicule['photo']?>" alt="">
            <?php endif; ?>
            <div>
               <?= $vehicule['titre'] ?>
            </div>
            <div>
               <?= $vehicule['titre_ag'] ?>
            </div>
            <div>
               <?= $vehicule['prix_journalier']  ?> € / jour
            </div>
            <form action="reservation.php" method="post">
               <input type="hidden" name="reservation" value="<?= $vehicule['id_vehicule'] ?>">
               <button type="submit" class="btn btn-success m-2" <?= enLocation($vehicule['id_vehicule']) ? "disabled" : "" ?>>Réserver</button>
            </form>
         </div>

      <?php endforeach; ?>

    <?php else: ?>
        <div> PAS DE VEHICULES </div>
    <?php endif; ?>

  </div>
