<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
$dateDebut = $_GET['datedebut'];
$dateFin = $_GET['datefin'];
$pkreservation = $_GET['id'];

$InfoVehicule = new InfoVehicule();
$InfoVehicule->getListVehiculeSector($pkreservation, $_SESSION['user']['fk_secteur'], $dateDebut, $dateFin);
?>