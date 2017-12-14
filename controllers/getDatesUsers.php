<?php
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_reservation.php';
$gReservation = new InfoReservation();

$clientReservation = $gReservation->getWeekReservations();

echo $clientReservation[0];



?>