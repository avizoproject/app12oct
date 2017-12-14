
<div id='modalService' class='modal fade' role='dialog'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <div class='modal-body'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h3>Historique des réservations</h3>
         <div class='card-content table-responsive'>
            <table class="table table-striped table-bordered nowrap" id='example'>
                <thead class='text-primary'>
                <th>Date émise</th>
                <th>Véhicule</th>
                <th>Date de début</th>
                <th>Date de retour</th>
                <th>Statut</th>
                </thead>
                <tbody>
                    <?php
                    $id = $_SESSION['user']['pk_utilisateur'];
                    $gReservation->getListReservationsUser($id);
                    ?>
                </tbody>
            </table>
        </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
      </div>
    </div>
  </div>
</div>
