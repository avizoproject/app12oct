<?php
require_once 'info_model.php';

class InfoEntretien extends InfoModel
{

    protected $table_name = 'entretien';

    protected $primary_key = "pk_entretien";

    protected $pk_entretien= 0;

    protected $date_entretien = '';

    protected $odometre_entretien = 0;

    protected $fk_utilisateur = 0;

    protected $fk_garage = 0;

    protected $fk_vehicule = 0;

    protected $fk_type_entretien = 0;

    protected $cout_entretien = 0;

    protected $description = '';


    function __construct()
    {}

    function getPk_entretien() {
        return $this->pk_entretien;
    }

    function getDate_entretien() {
        return $this->date_entretien;
    }

    function getOdometre_entretien() {
        return $this->odometre_entretien;
    }

    function getFk_utilisateur() {
        return $this->fk_utilisateur;
    }

    function getFk_garage() {
        return $this->fk_garage;
    }

    function getFk_vehicule() {
        return $this->fk_vehicule;
    }

    function getFk_type_entretien() {
        return $this->fk_type_entretien;
    }

    function getCout_entretien() {
        return $this->cout_entretien;
    }

    function getDescription() {
        return $this->description;
    }

    function setPk_entretien($pk_entretien) {
        $this->pk_entretien = $pk_entretien;
    }

    function setDate_entretien($date_entretien) {
        $this->date_entretien = $date_entretien;
    }

    function setOdometre_entretien($odometre_entretien) {
        $this->odometre_entretien = $odometre_entretien;
    }

    function setFk_utilisateur($fk_utilisateur) {
        $this->fk_utilisateur = $fk_utilisateur;
    }

    function setFk_garage($fk_garage) {
        $this->fk_garage = $fk_garage;
    }

    function setFk_vehicule($fk_vehicule) {
        $this->fk_vehicule = $fk_vehicule;
    }

    function setFk_type_entretien($fk_type_entretien) {
        $this->fk_type_entretien = $fk_type_entretien;
    }

    function setCout_entretien($cout_entretien) {
        $this->cout_entretien = $cout_entretien;
    }

    function setDescription($description) {
        $this->description = $description;
    }

function getGaragesPopulaires() {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query('SELECT *, COUNT(entretien.pk_entretien) AS Total FROM entretien LEFT JOIN garage ON entretien.fk_garage = garage.pk_garage GROUP BY entretien.fk_garage');

  for ($i = 0; $i < 5; $i++) {
    $row = $results->fetch_assoc();
    if ($row['Total']) {
      echo "<tr>";
        echo "<td>".$row['nom']."</td>";
        echo "<td>".$row['Total']."</td>";
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
