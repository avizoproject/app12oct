<?php
require_once 'info_model.php';

class InfoBrand extends InfoModel
{

    protected $table_name = 'marque';

    protected $primary_key = "pk_marque";

    protected $pk_marque= 0;

    protected $nom_marque = '';
    
    function __construct()
    {}
    
    function getPk_marque() {
        return $this->pk_marque;
    }

    function getNom_marque() {
        return $this->nom_marque;
    }

    function setPk_marque($pk_marque) {
        $this->pk_marque = $pk_marque;
    }

    function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
    }
}

?>