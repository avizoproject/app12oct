<?php
require_once 'info_model.php';

class InfoSector extends InfoModel
{

    protected $table_name = 'secteur';

    protected $primary_key = "pk_secteur";

    protected $pk_secteur = 0;

    protected $nom_secteur = '';

    function __construct()
    {}

function getPk_secteur() {
    return $this->pk_secteur;
}

function getNom_secteur() {
    return $this->nom_secteur;
}

function setPk_secteur($pk_secteur) {
    $this->pk_secteur = $pk_secteur;
}

function setNom_secteur($nom_secteur) {
    $this->nom_secteur = $nom_secteur;
}

    function getListSecteur (){
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';


        $results = $conn->query("SELECT secteur.pk_secteur, secteur.nom_secteur FROM secteur");



        echo "<option value=''>Sélectionnez un secteur...</option>";
        while ($row = $results->fetch_assoc()) {
            echo "<option value=" . $row['pk_secteur'] . ">" . $row['nom_secteur'] . "</option>";
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();

        //return $allvehicule;
    }

}

?>