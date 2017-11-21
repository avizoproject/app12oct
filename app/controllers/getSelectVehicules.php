<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
$dateDebut = $_GET['datedebut'];
$dateFin = $_GET['datefin'];
$InfoVehicule = new InfoVehicule();
if (isset($_GET['id'])){
    $pkreservation = $_GET['id'];
    $idvehicule = $InfoVehicule->getVehiculeReservation($pkreservation);
}else{
    $pkreservation = null;
    $idvehicule = null;
}



$InfoVehicule->getListVehiculeSector($pkreservation, $_SESSION['user']['fk_secteur'], $dateDebut, $dateFin, $idvehicule);
?>