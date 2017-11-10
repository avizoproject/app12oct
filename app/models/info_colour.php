<?php
require_once 'info_model.php';

class InfoColour extends InfoModel
{

    protected $table_name = 'couleur';

    protected $primary_key = "pk_couleur";

    protected $pk_couleur = 0;

    protected $nom_couleur = '';

    function __construct()
    {}

function getPk_couleur() {
    return $this->pk_couleur;
}

function getNom_couleur() {
    return $this->nom_couleur;
}

function setPk_couleur($pk_couleur) {
    $this->pk_couleur = $pk_couleur;
}

function setNom_couleur($nom_couleur) {
    $this->nom = $nom_couleur;
}

function getListColours($id) {
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query("SELECT * FROM couleur ORDER BY nom");

    echo "<option value=''>Sélectionnez une couleur...</option>";
    while ($row = $results->fetch_assoc()) {
      if ($id == $row['pk_couleur']) {
        echo "<option value='" . $row['pk_couleur'] . "' selected>" . $row['nom'] . "</option>";
      } else {
        echo "<option value='" . $row['pk_couleur'] . "'>" . $row['nom'] . "</option>";
      }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}
}

?>
