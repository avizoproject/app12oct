<?php
require_once 'info_model.php';

class InfoVehicule extends InfoModel
{

    protected $table_name = 'vehicule';

    protected $primary_key = "pk_vehicule";

    protected $pk_vehicule = 0;

    protected $fk_marque = 0;

    protected $fk_modele = 0;

    protected $annee = '';

    protected $fk_couleur = 0;

    protected $fk_secteur = 0;

    protected $odometre = '';

    protected $plaque = '';

    protected $photo = '';

    protected $date_achat = '';

    protected $date_mise_hors_service = '';

    protected $description_hors_service = '';

    protected $fk_statut = 0;

    function __construct()
    {}

function getPk_vehicule() {
    return $this->pk_vehicule;
}

function getFk_marque() {
    return $this->fk_marque;
}

function getFk_modele() {
    return $this->fk_modele;
}

function getAnnee() {
    return $this->annee;
}

function getFk_Couleur() {
    return $this->fk_couleur;
}

function getFk_secteur() {
    return $this->fk_secteur;
}

function getOdometre() {
    return $this->odometre;
}

function getPlaque() {
    return $this->plaque;
}

function getPhoto() {
    return $this->photo;
}

function getDate_achat() {
    return $this->date_achat;
}

function getDate_mise_hors_service() {
    return $this->date_mise_hors_service;
}

function getDescription_hors_service() {
    return $this->description_hors_service;
}

function getFk_statut() {
    return $this->fk_statut;
}

function setPk_vehicule($pk_vehicule) {
    $this->pk_vehicule = $pk_vehicule;
}

function setFk_marque($fk_marque) {
    $this->fk_marque = $fk_marque;
}

function setFk_modele($fk_modele) {
    $this->fk_modele = $fk_modele;
}

function setAnnee($annee) {
    $this->annee = $annee;
}

function setFk_Couleur($fk_couleur) {
    $this->fk_couleur = $fk_couleur;
}

function setFk_secteur($fk_secteur) {
    $this->fk_secteur = $fk_secteur;
}

function setOdometre($odometre) {
    $this->odometre = $odometre;
}

function setPlaque($plaque) {
    $this->plaque = $plaque;
}

function setPhoto($photo) {
    $this->photo = $photo;
}

function setDate_achat($date_achat) {
    $this->date_achat = $date_achat;
}

function setDate_mise_hors_service($date_mise_hors_service) {
    $this->date_mise_hors_service = $date_mise_hors_service;
}

function setDescription_hors_service($description_hors_service) {
    $this->description_hors_service = $description_hors_service;
}

function setFk_statut($fk_statut) {
    $this->fk_statut = $fk_statut;
}

function getListVehiculeSector ($pkreservation, $user_sector, $datedebut, $datefin, $pkvehicule){
include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

echo $pkreservation . " " . $user_sector . " " . $datedebut . " " . $datefin . " " . $pkvehicule;

$results = $conn->query("SELECT v.fk_secteur, v.pk_vehicule, m.nom_marque, o.nom_modele FROM vehicule v LEFT JOIN marque m ON v.fk_marque=m.pk_marque LEFT JOIN modele o ON o.pk_modele = v.fk_modele WHERE v.pk_vehicule NOT IN
( Select vehicule.pk_vehicule
FROM vehicule INNER JOIN reservation ON vehicule.pk_vehicule = reservation.fk_vehicule
WHERE date_fin >= '" . $datedebut . "'
AND date_debut <= '" . $datefin . "'
AND reservation.statut = '1'
AND reservation.pk_reservation !='". $pkreservation ."')
AND v.fk_secteur = '" . $user_sector . "'");




    while ($row = $results->fetch_assoc()) {
        if ($row['pk_vehicule']==$pkvehicule){
            echo "<option selected value='" . $row['pk_vehicule'] . " " . $row['fk_secteur'] ."'>" . $row['nom_marque'] . " " . $row['nom_modele'] . " #".$row['pk_vehicule'] ."</option>";
        }else {
            echo "<option value='" . $row['pk_vehicule'] . " " . $row['fk_secteur'] ."'>" . $row['nom_marque'] . " " . $row['nom_modele'] . " #".$row['pk_vehicule'] ."</option>";
        }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();

    //return $allvehicule;
}

    function getListVehicule ($pk)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';


        $results = $conn->query("SELECT v.fk_secteur, v.pk_vehicule, m.nom_marque, o.nom_modele FROM vehicule v LEFT JOIN marque m ON v.fk_marque=m.pk_marque LEFT JOIN modele o ON o.pk_modele = v.fk_modele");

        if ($pk == null) {
            echo "<option>Sélectionnez un véhicule...</option>";
        }
        while ($row = $results->fetch_assoc()) {
            if ($row['pk_vehicule'] == $pk){
                echo "<option selected value='" . $row['pk_vehicule'] . "'>" . $row['nom_marque'] . " " . $row['nom_modele'] . " #" . $row['pk_vehicule'] . "</option>";
            }else {
                echo "<option value='" . $row['pk_vehicule'] . "'>" . $row['nom_marque'] . " " . $row['nom_modele'] . " #" . $row['pk_vehicule'] . "</option>";
            }

        }
        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();

        //return $allvehicule;
    }

function getVehiculeReservation ($id_reservation){
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query("SELECT * FROM reservation LEFT OUTER JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT OUTER JOIN modele ON vehicule.fk_modele = modele.pk_modele LEFT OUTER JOIN marque ON modele.fk_marque = marque.pk_marque
 WHERE reservation.pk_reservation =" . $id_reservation . "");

  $allreservation = array();
  while ($row = $results->fetch_assoc()) {
      $allreservation[] = array(
          'pk_vehicule' => $row['pk_vehicule'],
          'nom_marque' => $row['nom_marque'],
          'nom_modele' => $row['nom_modele']
      );
  }

  return $allreservation[0]['pk_vehicule'];

  /*$size= sizeof($allreservation);
  if($size != null){
    echo "<option value=".$allreservation[0]['pk_vehicule'].">".$allreservation[0]['nom_marque']." ".$allreservation[0]['nom_modele']."</option>";
  }*/

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}

//Gets the list of vehicules to population de table in vehicule.php
function getListVehicules(){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query('SELECT vehicule.odometre, vehicule.pk_vehicule, marque.nom_marque, modele.nom_modele, vehicule.annee, couleur.nom_couleur, statut_vehicule.nom_statut FROM `vehicule` LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele LEFT JOIN statut_vehicule ON vehicule.fk_statut = statut_vehicule.pk_statut_vehicule LEFT JOIN couleur ON vehicule.fk_couleur = couleur.pk_couleur WHERE vehicule.date_mise_hors_service IS NULL');

    $allvehicules= array();
    while ($row = $results->fetch_assoc()) {
        $allvehicules[] = array(
            'pk_vehicule' => $row['pk_vehicule'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'odometre' => $row['odometre'],
            'annee' => $row['annee'],
            'nom_couleur' => $row['nom_couleur'],
            'nom_statut' => $row['nom_statut']
        );
    }
    $size= sizeof($allvehicules);
    if($size != null){
        for($i=0;$i<$size;$i++){
            echo "<tr class=''>";
            echo "<td>";
            echo $allvehicules[$i]['pk_vehicule'] . "</td>";
            echo "<td>";
            echo $allvehicules[$i]['nom_marque'] . " ".$allvehicules[$i]['nom_modele']."</td>";
            echo "<td>";
            echo $allvehicules[$i]['annee'] . "</td>";
            echo "<td>";
            echo $allvehicules[$i]['nom_couleur'] . "</td>";
            echo "<td>";
            echo $allvehicules[$i]['odometre'] . "</td>";
            echo "<td>";
            echo $allvehicules[$i]['nom_statut'] . "</td>";
            echo "</tr>";
        }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

function getMarqueSelect($id) {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query("SELECT * FROM vehicule LEFT OUTER JOIN marque ON vehicule.fk_marque = marque.pk_marque WHERE vehicule.pk_vehicule ='" . $id . "'");

  while ($row = $results->fetch_assoc()) {
    echo "<option selected>" . $row['nom_marque'] . "</option>";
  }

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}

function getModeleSelect($id) {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query("SELECT * FROM vehicule LEFT OUTER JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE vehicule.pk_vehicule ='" . $id . "'");

  while ($row = $results->fetch_assoc()) {
    echo "<option selected>" . $row['nom_modele'] . "</option>";
  }

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}

function getCouleurSelect($id) {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query("SELECT * FROM vehicule LEFT OUTER JOIN couleur ON vehicule.fk_couleur = couleur.pk_couleur WHERE vehicule.pk_vehicule ='" . $id . "'");

  while ($row = $results->fetch_assoc()) {
    echo "<option selected>" . $row['nom_couleur'] . "</option>";
  }

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}

function getSecteurSelect($id) {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query("SELECT * FROM vehicule LEFT OUTER JOIN secteur ON vehicule.fk_secteur = secteur.pk_secteur WHERE vehicule.pk_vehicule ='" . $id . "'");

  while ($row = $results->fetch_assoc()) {
    echo "<option selected>" . $row['nom_secteur'] . "</option>";
  }

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}

function getVehiculesCouteux() {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query('SELECT *, SUM(entretien.cout_entretien) AS Cout FROM entretien LEFT JOIN vehicule ON entretien.fk_vehicule = vehicule.pk_vehicule LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele LEFT JOIN marque ON modele.fk_marque = marque.pk_marque GROUP BY entretien.fk_vehicule ORDER BY Cout DESC');

  for ($i = 0; $i < 5; $i++) {
    $row = $results->fetch_assoc();
    $coutsKM = $row['Cout'] / $row['odometre'];
    if ($row['Cout']) {
      echo "<tr>";
        echo "<td>".$row['nom_marque']." ".$row['nom_modele']." #".$row['pk_vehicule']."</td>";
        echo "<td>".$row['Cout']." $</td>";
        echo "<td>".round($coutsKM, 3)." $</td>";
      echo "</tr>";
    }
  }

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}
}
?>
