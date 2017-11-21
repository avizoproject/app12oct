<?php
/****************************************************************
Fichier : controller_reservation.php
Auteur :
Fonctionnalité :
Vérification:

======================================================

Dernière modification:

 *****************************************************************/
// Start the session
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';



/**
 * Description of
 */
class controller_reservation
{
    private $arrayReservation = array();
    private $InfosReservation;

    function __construct()
    {
        $this->arrayReservation[0] = isset($_GET['datedebut']) ? $_GET['datedebut'] : null;
        $this->arrayReservation[1] = isset($_GET['datefin']) ? $_GET['datefin'] : null;
        $this->arrayReservation[2] = isset($_GET['pkvehicule']) ? $_GET['pkvehicule'] : null;

        if (isset($_GET['admin'])==1 || isset($_GET['mod'])==1) {

            $this->arrayReservation[3] = $_GET['user'];
            $this->arrayReservation[4] = $_GET['statut'];

        }else{
            $this->arrayReservation[3] = $_SESSION['user']['pk_utilisateur'];
            $this->arrayReservation[4] = "1";
        }
        $this->InfosReservation = new InfoReservation();

    }
    function ajoutReservation()
    {
        $today = strtotime('today'); //For some reason it needs - 1 day or it always thinks it's one day forward, might be a timezone thing. //FIXED WITH MOMENT?
        $this->InfosReservation->setDate_debut($this->arrayReservation[0]);
        $this->InfosReservation->setDate_fin($this->arrayReservation[1]);
        $this->InfosReservation->setDate_emise(date('Y-m-d',$today));
        $this->InfosReservation->setFk_vehicule($this->arrayReservation[2]);
        $this->InfosReservation->setFk_utilisateur($this->arrayReservation[3]);
        $this->InfosReservation->setStatut(1);
        $this->InfosReservation->addDBObject();
    }

    function ajoutReservationAdmin()
    {
        $today = strtotime('today'); //For some reason it needs - 1 day or it always thinks it's one day forward, might be a timezone thing. //FIXED WITH MOMENT?
        $this->InfosReservation->setDate_debut($this->arrayReservation[0]);
        $this->InfosReservation->setDate_fin($this->arrayReservation[1]);
        $this->InfosReservation->setDate_emise(date('Y-m-d',$today));
        $this->InfosReservation->setFk_vehicule($this->arrayReservation[2]);
        $this->InfosReservation->setFk_utilisateur($this->arrayReservation[3]);
        $this->InfosReservation->setStatut($this->arrayReservation[4]);
        $this->InfosReservation->addDBObject();
    }

    function modReservation($id)
    {
        $object = $this->InfosReservation->getObjectFromDB($id); //Gets the date of the reservation (should think to add a date modified for the reservation, maybe.)

        $this->InfosReservation->setPk_reservation($id);
        $this->InfosReservation->setDate_debut($this->arrayReservation[0]);
        $this->InfosReservation->setDate_fin($this->arrayReservation[1]);
        $this->InfosReservation->setDate_emise($object['date_emise']);
        $this->InfosReservation->setFk_vehicule($this->arrayReservation[2]);
        $this->InfosReservation->setFk_utilisateur($this->arrayReservation[3]);
        $this->InfosReservation->setStatut($this->arrayReservation[4]);
        $this->InfosReservation->updateDBObject();
    }

    function suppReservation($id)
    {
      $this->InfosReservation->updateObjectDynamically("statut", 0, $id);
    }

    function getInfosReservation(){
        return $this->InfosReservation;
    }

    function getarrayReservation(){
        return $this->arrayReservation;
    }

}
$reservControl = new controller_reservation();

if (isset($_GET['admin'])&& isset($_GET['ajout'])) {
    $reservControl->ajoutReservationAdmin();
} elseif (isset($_GET['mod'])) {
  $reservControl->modReservation($_GET['id']);
} elseif (isset($_GET['supp'])) {
  $reservControl->suppReservation($_GET['id']);
} elseif (isset($_GET['ajout'])){
    $reservControl->ajoutReservation();
}

if ($_SESSION['admin'] === 1) {
    header("Location: http://localhost/app/app/views/reservation.php");
} else {
    header("Location: http://localhost/app/app/views/reservationuser.php");
}
?>
