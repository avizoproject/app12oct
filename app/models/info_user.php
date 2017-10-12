<?php
require_once 'info_model.php';

class InfoUser extends InfoModel
{

    protected $table_name = 'utilisateur';

    protected $primary_key = "pk_utilisateur";

    protected $pk_utilisateur = 0;

    protected $nom = '';
    
    protected $prenom = '';
    
    protected $telephone = '';
    
    protected $courriel = '';
    
    protected $mot_de_passe = '';
    
    protected $fk_statut = 0;
    
    protected $fk_secteur = 0;

    function __construct()
    {}

function getPk_utilisateur() {
    return $this->pk_utilisateur;
}

function getNom() {
    return $this->nom;
}

function getPrenom() {
    return $this->prenom;
}

function getTelephone() {
    return $this->telephone;
}

function getCourriel() {
    return $this->courriel;
}

function getMot_de_passe() {
    return $this->mot_de_passe;
}

function getFk_statut() {
    return $this->fk_statut;
}

function getFk_secteur() {
    return $this->fk_secteur;
}

function setPk_utilisateur($pk_utilisateur) {
    $this->pk_utilisateur = $pk_utilisateur;
}

function setNom($nom) {
    $this->nom = $nom;
}

function setPrenom($prenom) {
    $this->prenom = $prenom;
}

function setTelephone($telephone) {
    $this->telephone = $telephone;
}

function setCourriel($courriel) {
    $this->courriel = $courriel;
}

function setMot_de_passe($mot_de_passe) {
    $this->mot_de_passe = $mot_de_passe;
}

function setFk_statut($fk_statut) {
    $this->fk_statut = $fk_statut;
}

function setFk_secteur($fk_secteur) {
    $this->fk_secteur = $fk_secteur;
}

function getUser($email_client)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $sql = "SELECT * FROM utilisateur u WHERE u.courriel = '". $email_client ."'";
        
        
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $anObject = Array();
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $aRowName => $aValue) {
                    $anObject[$aRowName] = $aValue;
                }
                
            }
            
            $conn->close();
            return $anObject;
        }
        $conn->close();
        return null;
    }

    function getListUsers (){
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';


        $results = $conn->query("SELECT fk_secteur, pk_utilisateur, nom, prenom FROM utilisateur ORDER BY nom");




        while ($row = $results->fetch_assoc()) {
            echo "<option value='" . $row['fk_secteur'] . " " . $row['pk_utilisateur'] . "'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();

        //return $allvehicule;
    }

}

?>