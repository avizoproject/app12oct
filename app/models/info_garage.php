<?php
require_once 'info_model.php';

class InfoGarage extends InfoModel
{

    protected $table_name = 'garage';

    protected $primary_key = "pk_garage";

    protected $pk_garage= 0;

    protected $nom = '';

    protected $Description= '';
    
    protected $telephone = '';

    protected $fk_statut_garage = 0;
    
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

    function getFk_statut_garage() {
        return $this->fk_statut_garage;
    }

    function getDescription() {
        return $this->Description;
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

    function setDescription($Description) {
        $this->Description = $Description;
    }

    function setFk_statut_garage($fk_statut_garage) {
        $this->fk_statut_garage = $fk_statut_garage;
    }

    function getSelectGarage($pk) {
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

        $results = $conn->query("SELECT * FROM garage");
        if ($pk === null){
            echo "<option value='0'>Sélectionnez un garage...</option>";
        }

        while ($row = $results->fetch_assoc()) {
            if($row['pk_garage'] == $pk){
                echo "<option selected value='" . $row['pk_garage'] . "'>" . $row['nom'] . "</option>";
            }else {
                echo "<option value='" . $row['pk_garage'] . "'>" . $row['nom'] . "</option>";
            }
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();
    }

}

?>