<?php
include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
include $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_garage.php';
$gGarage = new InfoGarage();
if ($_GET['mod'] == 1) {
    $nom = str_replace("'", "\'", $_GET['nom']);
    $desc = str_replace("'", "\'", $_GET['desc']);
    $sql = "UPDATE garage SET nom = '" . $nom . "', telephone ='" . $_GET['tel'] . "', fk_statut_garage='".$_GET['statut']."', Description='".$desc."'  WHERE pk_garage = '" . $_GET['id'] . "'";
    $conn->query($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $nom = str_replace("'", "\'", $_GET['nom']);
    $desc = str_replace("'", "\'", $_GET['desc']);
    $gGarage->setFk_statut_garage(2);
    $gGarage->setNom($nom);
    $gGarage->setTelephone($_GET['tel']);
    $gGarage->setDescription($desc);
    $lastIdInserted = $gGarage->addDBObject();
    if ($lastIdInserted != null) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}


?>