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

    function getListUsers ($iduser){
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';


        $results = $conn->query("SELECT fk_secteur, pk_utilisateur, nom, prenom FROM utilisateur WHERE fk_statut!='3' ORDER BY nom");




        while ($row = $results->fetch_assoc()) {
            if ($row['pk_utilisateur']==$iduser) {
                echo "<option selected value='" . $row['fk_secteur'] . " " . $row['pk_utilisateur'] . "'>" . $row['prenom'] . " " . $row['nom'] . "</option>";
            }else {
                echo "<option value='" . $row['fk_secteur'] . " " . $row['pk_utilisateur'] . "'>" . $row['prenom'] . " " . $row['nom'] . "</option>";
            }
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();

    }

    function getUserReservation ($id_reservation){
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

        $results = $conn->query("SELECT * FROM reservation LEFT OUTER JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur WHERE reservation.pk_reservation =" . $id_reservation . "");

        $allreservation = array();
        while ($row = $results->fetch_assoc()) {
            $allreservation[] = array(
                'pk_utilisateur' => $row['pk_utilisateur'],
                'nom' => $row['nom'],
                'prenom' => $row['prenom'],
                'fk_secteur' => $row['fk_secteur']
            );
        }

        return $allreservation[0]['pk_utilisateur'];
       /* $size= sizeof($allreservation);
        if($size != null){
            echo "<option value='".$allreservation[0]['pk_utilisateur']." " . $allreservation[0]['fk_secteur']."'>".$allreservation[0]['nom']." ".$allreservation[0]['prenom']."</option>";
        }*/

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();
    }

    //Gets the list of users to population de table in user.php
    function populateUserTable(){
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

        $results = $conn->query('SELECT utilisateur.pk_utilisateur, utilisateur.nom, utilisateur.prenom, utilisateur.telephone, utilisateur.courriel, statut.nom_statut FROM `utilisateur` LEFT JOIN statut ON utilisateur.fk_statut = statut.pk_statut');

        $allusers= array();
        while ($row = $results->fetch_assoc()) {
            $allusers[] = array(
                'pk_utilisateur' => $row['pk_utilisateur'],
                'nom' => $row['nom'],
                'prenom' => $row['prenom'],
                'telephone' => $row['telephone'],
                'courriel' => $row['courriel'],
                'nom_statut' => $row['nom_statut']
            );
        }
        $size= sizeof($allusers);
        if($size != null){
            for($i=0;$i<$size;$i++){
                echo "<tr class=''>";
                echo "<td class='hidden'>";
                echo $allusers[$i]['pk_utilisateur'] . "</td>";
                echo "<td>";
                echo $allusers[$i]['nom'] . "</td>";
                echo "<td>";
                echo $allusers[$i]['prenom'] . "</td>";
                echo "<td>";
                echo $allusers[$i]['telephone'] . "</td>";
                echo "<td>";
                echo $allusers[$i]['courriel'] . "</td>";
                echo "<td>";
                echo $allusers[$i]['nom_statut'] . "</td>";
                echo "</tr>";
            }
        }

        // Frees the memory associated with a result
        $results->free();

        // close connection
        $conn->close();
    }

function getSecteurSelect($id) {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

  $results = $conn->query("SELECT * FROM utilisateur LEFT OUTER JOIN secteur ON utilisateur.fk_secteur = secteur.pk_secteur WHERE utilisateur.pk_utilisateur ='" . $id . "'");

  while ($row = $results->fetch_assoc()) {
    echo "<option selected>" . $row['nom_secteur'] . "</option>";
  }

  // Frees the memory associated with a result
  $results->free();

  // close connection
  $conn->close();
}
}
?>
