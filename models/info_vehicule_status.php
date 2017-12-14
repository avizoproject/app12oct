<?php
require_once 'info_model.php';

class InfoVehiculeStatus extends InfoModel
{

    protected $table_name = 'statut_vehicule';

    protected $primary_key = "pk_statut_vehicule";

    protected $pk_statut_vehicule = 0;

    protected $nom_statut = '';

    function __construct()
    {}

function getPk_statut_vehicule() {
    return $this->pk_statut_vehicule;
}

function getNom_statut() {
    return $this->nom_statut;
}

function setPk_statut_vehicule($pk_statut_vehicule) {
    $this->pk_statut_vehicule = $pk_statut_vehicule;
}

function setNom_statut($nom_statut) {
    $this->nom_statut = $nom_statut;
}


}

?>
