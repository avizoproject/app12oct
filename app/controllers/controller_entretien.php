<?php
/****************************************************************
Fichier : controller_entretien.php
Auteur :
Fonctionnalité :
Vérification:

======================================================

Dernière modification:

 *****************************************************************/
// Start the session
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_entretien.php';



/**
 * Description of
 */
class controller_entretien
{
    private $arrayReservation = array();
    private $InfosEntretien;

    function __construct()
    {
        $this->arrayEntretien[0] = isset($_GET['date']) ? $_GET['date'] : null;
        $this->arrayEntretien[1] = isset($_GET['type']) ? $_GET['type'] : null;
        $this->arrayEntretien[2] = isset($_GET['vehiculefk']) ? $_GET['vehiculefk'] : null;
        $this->arrayEntretien[3] = isset($_GET['garage']) ? $_GET['garage'] : null;
        $this->arrayEntretien[4] = isset($_GET['cout']) ? $_GET['cout'] : null;
        $this->arrayEntretien[5] = isset($_GET['description']) ? $_GET['description'] : null;   $this->InfosEntretien = new InfoEntretien();
        $this->arrayEntretien[6] = isset($_GET['odometre']) ? $_GET['odometre'] : null;
    }
    function ajoutEntretien()
    {
        $this->InfosEntretien->setDate_entretien($this->arrayEntretien[0]);
        $this->InfosEntretien->setFk_type_entretien($this->arrayEntretien[1]);
        $this->InfosEntretien->setFk_vehicule($this->arrayEntretien[2]);
        $this->InfosEntretien->setFk_garage($this->arrayEntretien[3]);
        $this->InfosEntretien->setCout_entretien($this->arrayEntretien[4]);
        $this->InfosEntretien->setDescription($this->arrayEntretien[5]);
        $this->InfosEntretien->setOdometre_entretien($this->arrayEntretien[6]);
        $this->InfosEntretien->addDBObject();
    }

    /*function modReservation($id)
    {
        $object = $this->InfosEntretien->getObjectFromDB($id); //Gets the date of the reservation (should think to add a date modified for the reservation, maybe.)

        $this->InfosEntretien->setPk_reservation($id);
        $this->InfosEntretien->setDate_debut($this->arrayEntretien[0]);
        $this->InfosEntretien->setDate_fin($this->arrayEntretien[1]);
        $this->InfosEntretien->setDate_emise($object['date_emise']);
        $this->InfosEntretien->setFk_vehicule($this->arrayEntretien[2]);
        $this->InfosEntretien->setFk_utilisateur($this->arrayEntretien[3]);
        $this->InfosEntretien->setStatut($this->arrayEntretien[4]);
        $this->InfosEntretien->updateDBObject();
    }

    function suppReservation($id)
    {
      $this->InfosEntretien->updateObjectDynamically("statut", 0, $id);
    }*/

    function getInfosEntretien(){
        return $this->InfosEntretien;
    }

    function getarrayEntretien(){
        return $this->arrayEntretien;
    }

}
$entControl = new controller_entretien();
$entControl->ajoutEntretien();


    if ($_SESSION['admin'] === 1)
        header("Location: http://localhost/app/app/views/entretien.php");
    else{
        header("Location: http://localhost/app/app/views/entretien.php");
    exit();
    }

?>
