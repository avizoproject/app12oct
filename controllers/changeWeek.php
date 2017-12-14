<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_reservation.php';
session_start();
$gReservation = new InfoReservation();

$plusoumoins = $_POST['modifWeek'];
$_SESSION['plusmoinsWeek'] += $plusoumoins;


echo intval($_SESSION['plusmoinsWeek']);

?>


