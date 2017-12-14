<?php
require_once 'info_model.php';

class InfoInvoice extends InfoModel
{

    protected $table_name = 'facture';

    protected $primary_key = "pk_facture";

    protected $pk_facture= 0;

    protected $fk_entretien = 0;

    protected $photo = '';

    protected $montant_entretien = 0;
    
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

    function getMontant_entretien() {
        return $this->montant_entretien;
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

    function setMontant_entretien($montant_entretien) {
        $this->montant_entretien = $montant_entretien;
    }

    function findFactureByFk($fkentretien){
        include $_SERVER["DOCUMENT_ROOT"] . '/database_connect.php';

        $results = $conn->query("SELECT pk_facture, photo FROM facture WHERE facture.fk_entretien='" . $fkentretien ."'");

        $allreservation = array();
        while ($row = $results->fetch_assoc()) {
            $allreservation[] = array(
                'pk_facture' => $row['pk_facture'],
                'photo' => $row['photo']
            );
        }
        return $allreservation[0];
    }
}

?>