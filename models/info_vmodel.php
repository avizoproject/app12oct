<?php
require_once 'info_model.php';

class InfoVModel extends InfoModel
{

    protected $table_name = 'modele';

    protected $primary_key = "pk_modele";

    protected $pk_modele= 0;

    protected $nom_modele = '';

    protected $description_modele = '';

    function __construct()
    {}

    function getPk_modele() {
        return $this->pk_modele;
    }

    function getNom_modele() {
        return $this->nom_modele;
    }

    function getDescription_modele() {
        return $this->description_modele;
    }

    function setPk_modele($pk_modele) {
        $this->pk_modele = $pk_modele;
    }

    function setNom_modele($nom_modele) {
        $this->nom_modele = $nom_modele;
    }

    function setDescription_modele($description_modele) {
        $this->description_modele = $description_modele;
    }

    function getListModeles($idMarque, $idModele) {
        include $_SERVER["DOCUMENT_ROOT"] . '/database_connect.php';

        $results = $conn->query("SELECT * FROM modele WHERE fk_marque=". $idMarque ." ORDER BY nom_modele");

        echo "<option value=''>Sélectionnez un modèle...</option>";
        while ($row = $results->fetch_assoc()) {
          if ($idModele == $row['pk_modele']) {
            echo "<option value='" . $row['pk_modele'] . "' selected>" . $row['nom_modele'] . "</option>";
          } else {
            echo "<option value='" . $row['pk_modele'] . "'>" . $row['nom_modele'] . "</option>";
          }
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();
    }
}

?>
