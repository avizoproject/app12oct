<?php
require_once 'info_model.php';

class InfoGarage extends InfoModel
{

    protected $table_name = 'garage';

    protected $primary_key = "pk_garage";

    protected $pk_garage= 0;

    protected $nom = '';
    
    protected $telephone = '';

    protected $fk_statut = 0;
    
    function __construct()
    {}
    
    function getPk_garage() {
        return $this->pk_garage;
    }

    function getNom() {
        return $this->nom;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getFk_statut() {
        return $this->fk_statut;
    }

    function setPk_garage($pk_garage) {
        $this->pk_garage = $pk_garage;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setFk_statut($fk_statut) {
        $this->fk_statut = $fk_statut;
    }

}

?>