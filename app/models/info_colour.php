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


}

?>

