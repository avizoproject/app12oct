<?php
require_once 'info_model.php';

class InfoStatus extends InfoModel
{

    protected $table_name = 'statut';

    protected $primary_key = "pk_statut";

    protected $pk_statut = 0;

    protected $nom_statut = '';

    protected $description_statut = '';

    function __construct()
    {}

function getPk_statut() {
    return $this->pk_statut;
}

function getNom_statut() {
    return $this->nom_statut;
}

function getDescription_statut() {
    return $this->description_statut;
}

function setPk_statut($pk_statut) {
    $this->pk_statut = $pk_statut;
}

function setNom_statut($nom_statut) {
    $this->nom_statut = $nom_statut;
}

function setDescription_statut($description_statut) {
    $this->description_statut = $description_statut;
}


}

?>