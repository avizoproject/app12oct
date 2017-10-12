<?php
require_once 'info_model.php';

class InfoClient extends InfoModel
{

    protected $table_name = 'client';

    protected $primary_key = "pk_client";

    protected $pk_client = 0;

    protected $fk_utilisateur = 0;

    protected $prenom = '';

    protected $nom = '';

    protected $fk_adresse = '';

    protected $telephone = '';

    protected $infolettre = '';

    function __construct()
    {}

    /**
     * pk_client
     * 
     * @return int
     */
    public function getPk_client()
    {
        return $this->pk_client;
    }

    /**
     * pk_client
     * 
     * @param int $pk_client
     * @return InfoService
     */
    public function setPk_client($pk_client)
    {
        $this->pk_client = $pk_client;
        return $this;
    }

    /**
     * fk_utilisateur
     * 
     * @return int
     */
    public function getFk_utilisateur()
    {
        return $this->fk_utilisateur;
    }

    /**
     * fk_utilisateur
     * 
     * @param int $fk_utilisateur
     * @return InfoService
     */
    public function setFk_utilisateur($fk_utilisateur)
    {
        $this->fk_utilisateur = $fk_utilisateur;
        return $this;
    }

    /**
     * fk_adresse
     * 
     * @return int
     */
    public function getFk_adresse()
    {
        return $this->fk_adresse;
    }

    /**
     * fk_adresse
     * 
     * @param int $fk_adresse
     * @return InfoService
     */
    public function setFk_adresse($fk_adresse)
    {
        $this->fk_adresse = $fk_adresse;
        return $this;
    }

    /**
     * prenom
     * 
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * prenom
     * 
     * @param string $prenom
     * @return InfoService
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * nom
     * 
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * nom
     * 
     * @param string $nom
     * @return InfoService
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * telephone
     * 
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * telephone
     * 
     * @param int $telephone
     * @return InfoService
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * infolettre
     * 
     * @return int
     */
    public function getInfolettre()
    {
        return $this->infolettre;
    }

    /**
     * infolettre
     * 
     * @param int $infolettre
     * @return InfoService
     */
    public function setInfolettre($infolettre)
    {
        $this->infolettre = $infolettre;
        return $this;
    }

    function getDynamicList()
    {
        $aListOfObjects = $this->getListOfActiveBDObjects();
        if ($aListOfObjects != null) {
            foreach ($aListOfObjects as $anObject) {
                
                echo "<div class='border'>";
                echo "<img class='excel' src='images/services/coursexcel.png' title='excel' alt='excel'>";
                echo "<h4>" . $anObject['prenom'] . "</h4><br>";
                echo "<p class='textExcel'>" . $anObject['nom'] . "</p>";
                echo "<br><p class='tarifExcel'>Tarif :" . $anObject['tarif'] . "$</p><p class='telephoneExcel'>Durée : " . $anObject['telephone'] . "h</p><img class='panier' src='images/icones/panier.png' title='panier' alt='panier'>";
                echo "</div>";
            }
        }
    }

    function getInscription($pk_client)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/infoplusplus/Info++/database_connect.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/infoplusplus/Info++/MVC/Model/info_ville.php';
        $internalAttributes = get_object_vars($this);
        $Villes = new InfoVille();
        $sql = "SELECT c.nom, c.prenom, c.telephone, c.infolettre, u.courriel, u.mot_de_passe, u.administrateur, a.fk_ville, a.no_civique, a.rue, a.code_postal
FROM client c
JOIN utilisateur u ON u.pk_utilisateur = c.fk_utilisateur

JOIN adresse a ON c.fk_adresse = a.pk_adresse
JOIN ville v ON v.pk_ville = a.fk_ville

WHERE c.pk_client = '" . $pk_client . "'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $anObject = Array();
            
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $aRowName => $aValue) {
                    $anObject[$aRowName] = $aValue;
                }
            }
            $conn->close();
            
            echo "<input name='nom' id='lname' class='inputMarginWidth' placeholder='Nom' value='" . $anObject['nom'] . "'></input>";
            echo "<input name='prenom' id='fname' class='inputMarginWidth' placeholder='Prénom' value='" . $anObject['prenom'] . "'></input><br>";
            echo "<input name='civic' id='streetadd' class='inputMarginWidthCivic' placeholder='No civic' value='" . $anObject['no_civique'] . "'></input>";
            echo "<input name='rue' id='sname' class='inputMarginWidthRue' placeholder='Rue' value='" . $anObject['rue'] . "'></input>";
            echo $Villes->getActiveVillesAsSelect($anObject['fk_ville']);
            echo "<input name='codepostal' id='zip' class='inputMarginWidth' placeholder='Code postale' value='" . $anObject['code_postal'] . "'></input>";
            echo "<input name='telephone' id='phone' class='inputMarginWidth' placeholder='Numéro de téléphone' value='" . $anObject['telephone'] . "'></input>";
            echo "<div id='selector' class='invisible'>" . $anObject['fk_ville'] . "</div>";
            echo "<br>";
            echo "<h4>Vos informations de connexion</h4>";
            echo "<h5>Le mot de passe doit contenir un chiffre, une lettre et 8 caractères au mininum.</h5>";
            echo "<input name='email' id='ema' class='inputMarginWidth' placeholder='Adresse courriel' value='" . $anObject['courriel'] . "'></input>";
            echo "<input name='emailconfirm' id='emailconf' class='inputMarginWidth' placeholder='Confirmez adresse courriel' onBlur='confirmEmail()'
        value='" . $anObject['courriel'] . "'></input><br>";
            echo "<input type='password' id='pass' name='password' class='inputMarginWidth' placeholder='Mot de passe'
        value='" . $anObject['mot_de_passe'] . "'></input>";
            echo "<input type='password' name='passwordconfirm' id='passwordconf' class='inputMarginWidth' placeholder='Confirmer mot de passe'
        onBlur='confirmPass()' value='" . $anObject['mot_de_passe'] . "'></input><br>";
            echo "<button class='buttonConfirmer'>Modifier</button>";
            return;
        }
        $conn->close();
        return null;
    }
    
    
    
    function getObjectAsArrayWithMetadata()
    {
        return get_object_vars($this);
    }
    
    function getObjectAsArrayWithOutMetadata()
    {
        $anObject = get_object_vars($this);
        unset($anObject['table_name']);
        unset($anObject['primary_key']);
        return $anObject;
    }
}

?>