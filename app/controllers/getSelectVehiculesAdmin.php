<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
$dateDebut = $_GET['datedebut'];
$dateFin = $_GET['datefin'];
$secteur = $_GET['secteur'];

$InfoVehicule = new InfoVehicule();
$InfoVehicule->getListVehiculeSector(null,$secteur, $dateDebut, $dateFin);
?>