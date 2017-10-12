<?php
require_once 'info_model.php';

class InfoAlert extends InfoModel
{

    protected $table_name = 'alerte';

    protected $primary_key = "pk_alerte";

    protected $pk_alerte = 0;

    protected $fk_reservation = '';

    protected $fk_type_entretien = 0;
    
    function __construct()
    {}
    
    function getPk_alerte() {
        return $this->pk_alerte;
    }

    function getFk_reservation() {
        return $this->fk_reservation;
    }

    function getFk_type_entretien() {
        return $this->fk_type_entretien;
    }

    function setPk_alerte($pk_alerte) {
        $this->pk_alerte = $pk_alerte;
    }

    function setFk_reservation($fk_reservation) {
        $this->fk_reservation = $fk_reservation;
    }

    function setFk_type_entretien($fk_type_entretien) {
        $this->fk_type_entretien = $fk_type_entretien;
    }
}

?>