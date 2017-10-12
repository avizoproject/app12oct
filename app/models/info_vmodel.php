<?php
require_once 'info_model.php';

class InfoVModel extends InfoModel
{

    protected $table_name = 'modele';

    protected $primary_key = "pk_modele";

    protected $pk_modele= 0;

    protected $nom_modele = '';
    
    function __construct()
    {}
    
    function getPk_modele() {
        return $this->pk_modele;
    }

    function getNom_modele() {
        return $this->nom_modele;
    }

    function setPk_modele($pk_modele) {
        $this->pk_modele = $pk_modele;
    }

    function setNom_modele($nom_modele) {
        $this->nom_modele = $nom_modele;
    }
}

?>