<?php
require_once 'info_model.php';

class InfoColour extends InfoModel
{

    protected $table_name = 'couleur';

    protected $primary_key = "pk_couleur";

    protected $pk_couleur = 0;

    protected $nom = '';

    function __construct()
    {}

function getPk_couleur() {
    return $this->pk_couleur;
}

function getNom() {
    return $this->nom;
}

function setPk_couleur($pk_couleur) {
    $this->pk_couleur = $pk_couleur;
}

function setNom($nom) {
    $this->nom = $nom;
}

function getListColours() {
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query("SELECT * FROM couleur ORDER BY nom");

    echo "<option value=''>Sélectionnez une couleur...</option>";
    while ($row = $results->fetch_assoc()) {
            echo "<option value='" . $row['pk_couleur'] . "'>" . $row['nom'] . "</option>";
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}
}

?>
