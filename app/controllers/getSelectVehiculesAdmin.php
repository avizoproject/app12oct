<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
$dateDebut = $_GET['datedebut'];
$dateFin = $_GET['datefin'];
$secteur = $_GET['secteur'];
$idreservation = $_GET['id'];
$InfoVehicule = new InfoVehicule();

$idvehicule = $InfoVehicule->getVehiculeReservation($idreservation);
$InfoVehicule->getListVehiculeSector($idreservation,$secteur, $dateDebut, $dateFin, $idvehicule);
?>