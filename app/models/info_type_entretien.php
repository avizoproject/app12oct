<?php
require_once 'info_model.php';

class InfoTypeEntretien extends InfoModel
{

    protected $table_name = 'type_entretien';

    protected $primary_key = "pk_type_entretien";

    protected $pk_type_entretien = 0;

    protected $intervalle = '';
    
    protected $nom = '';

    protected $description = '';

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

function getDescription() {
    return $this->description;
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

function setDescription($description) {
    $this->description = $description;
}

    function getSelectTypeEntretien() {
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

        $results = $conn->query("SELECT * FROM type_entretien");

        echo "<option value=''>Sélectionnez un entretien...</option>";
        while ($row = $results->fetch_assoc()) {
            echo "<option value='" . $row['pk_type_entretien'] . "'>" . $row['nom'] . "</option>";
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();
    }

}

?>