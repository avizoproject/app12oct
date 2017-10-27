<?php
require_once 'info_model.php';

class InfoBrand extends InfoModel
{

    protected $table_name = 'marque';

    protected $primary_key = "pk_marque";

    protected $pk_marque= 0;

    protected $nom_marque = '';

    protected $description_marque = '';

    function __construct()
    {}

    function getPk_marque() {
        return $this->pk_marque;
    }

    function getNom_marque() {
        return $this->nom_marque;
    }

    function getDescription_marque() {
        return $this->description_marque;
    }

    function setPk_marque($pk_marque) {
        $this->pk_marque = $pk_marque;
    }

    function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
    }

    function setDescription_marque($description_marque) {
        $this->description_marque = $description_marque;
    }

    function getListMarques() {
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

        $results = $conn->query("SELECT * FROM marque ORDER BY nom_marque");

        while ($row = $results->fetch_assoc()) {
                echo "<option value='" . $row['pk_marque'] . "'>" . $row['nom_marque'] . "</option>";
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();
    }
}
?>
