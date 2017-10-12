<?php
require_once 'info_model.php';

class InfoInvoice extends InfoModel
{

    protected $table_name = 'facture';

    protected $primary_key = "pk_facture";

    protected $pk_facture= 0;

    protected $fk_entretien = 0;

    protected $photo = '';
    
    function __construct()
    {}
    
    function getPk_facture() {
        return $this->pk_facture;
    }

    function getFk_entretien() {
        return $this->fk_entretien;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setPk_facture($pk_facture) {
        $this->pk_facture = $pk_facture;
    }

    function setFk_entretien($fk_entretien) {
        $this->fk_entretien = $fk_entretien;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }
}

?>