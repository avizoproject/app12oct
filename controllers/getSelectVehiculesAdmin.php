<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_vehicule.php';
$dateDebut = $_GET['datedebut'];
$dateFin = $_GET['datefin'];
$secteur = $_GET['secteur'];

if (isset($_GET['id'])){
    $InfoVehicule = new InfoVehicule();
    $idreservation = $_GET['id'];
    $idvehicule = $InfoVehicule->getVehiculeReservation($idreservation);
}else {
    $InfoVehicule = new InfoVehicule();
    $idreservation = null;
    $idvehicule = null;
}

$InfoVehicule->getListVehiculeSector($idreservation,$secteur, $dateDebut, $dateFin, $idvehicule);
?>