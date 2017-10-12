<?php
require_once 'info_model.php';

class InfoTypeEntretien extends InfoModel
{

    protected $table_name = 'type_entretien';

    protected $primary_key = "pk_type_entretien";

    protected $pk_type_entretien = 0;

    protected $intervalle = '';
    
    protected $nom = '';

    function __construct()
    {}

function getPk_type_entretien() {
    return $this->pk_type_entretien;
}

function getIntervalle() {
    return $this->intervalle;
}

function getNom() {
    return $this->nom;
}

function setPk_type_entretien($pk_type_entretien) {
    $this->pk_type_entretien = $pk_type_entretien;
}

function setIntervalle($intervalle) {
    $this->intervalle = $intervalle;
}

function setNom($nom) {
    $this->nom = $nom;
}



}

?>