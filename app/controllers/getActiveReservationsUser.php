<?php
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
$gReservation = new InfoReservation();
$idUser = $_SESSION['user']['pk_utilisateur'];
echo $gReservation->getActiveReservationsForUser($idUser);
?>