<?php
require_once 'info_model.php';

class InfoAddress extends InfoModel
{

    protected $table_name = 'adresse';

    protected $primary_key = "pk_adresse";

    protected $pk_adresse = 0;

    protected $no_civique = 0;

    protected $nom = '';
    
    function __construct()
    {}
    
    function getPk_adresse() {
        return $this->pk_adresse;
    }

    function getNo_civique() {
        return $this->no_civique;
    }

    function getNom() {
        return $this->nom;
    }

    function setPk_adresse($pk_adresse) {
        $this->pk_adresse = $pk_adresse;
    }

    function setNo_civique($no_civique) {
        $this->no_civique = $no_civique;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }
}

?>