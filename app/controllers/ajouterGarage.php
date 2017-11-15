<?php
include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
include $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_garage.php';
$gGarage = new InfoGarage();
$gGarage->setFk_statut_garage(2);
$gGarage->setNom($_GET['nom']);
$gGarage->setTelephone($_GET['tel']);
$gGarage->setDescription($_GET['desc']);
$lastIdInserted = $gGarage->addDBObject();
if ($lastIdInserted != null){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>