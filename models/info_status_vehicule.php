<?php
require_once 'info_model.php';

class InfoStatusVehicule extends InfoModel
{

    protected $table_name = 'statut_vehicule';

    protected $primary_key = "pk_statut_vehicule";

    protected $pk_statut_vehicule = 0;

    protected $nom_statut = '';

    protected $description_statut_vehicule = '';

    function __construct()
    {}

function getPk_statut() {
    return $this->pk_statut_vehicule;
}

function getNom_statut() {
    return $this->nom_statut;
}

function getDescription_statut_vehicule() {
    return $this->description_statut_vehicule;
}

function setPk_statut($pk_statut_vehicule) {
    $this->pk_statut_vehicule = $pk_statut_vehicule;
}

function setNom_statut($nom_statut) {
    $this->nom_statut = $nom_statut;
}

function setDescription_statut_vehicule($description_statut_vehicule) {
    $this->description_statut_vehicule = $description_statut_vehicule;
}

}

?>