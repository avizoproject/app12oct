<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';

$InfoVehicule = new InfoVehicule();
if (isset($_GET['pk'])){
    $InfoVehicule->getListVehicule($_GET['pk']);
}else{
    $InfoVehicule->getListVehicule();
}



?>