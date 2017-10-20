<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';
if (isset($_GET['id'])){
    $idreservation = $_GET['id'];
    $InfoUser = new InfoUser();
    $iduser = $InfoUser->getUserReservation($idreservation);
    $InfoUser->getListUsers($iduser);
}else{
    $InfoUser = new InfoUser();
    $iduser = $InfoUser->getListUsers(null);
}



?>