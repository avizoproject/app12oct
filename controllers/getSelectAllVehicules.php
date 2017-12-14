<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_vehicule.php';

$InfoVehicule = new InfoVehicule();
    $InfoVehicule->getListVehicule($_GET['pk']);
?>