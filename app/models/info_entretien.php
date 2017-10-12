<?php
require_once 'info_model.php';

class InfoEntretien extends InfoModel
{

    protected $table_name = 'entretien';

    protected $primary_key = "pk_entretien";

    protected $pk_entretien= 0;

    protected $date_entretien = '';

    protected $odometre_entretien = 0;
    
    protected $fk_garage = 0;

    protected $fk_vehicule = 0;

    protected $fk_type_entretien = 0;
    
    protected $cout_entretien = 0;

    protected $detail = '';

    
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

    function getDetail() {
        return $this->detail;
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

    function setDetail($detail) {
        $this->detail = $detail;
    }
}

?>