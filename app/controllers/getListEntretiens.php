<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Marc
 * Date: 11/17/2017
 * Time: 9:45 AM
 */
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
session_start();
$gReservation = new InfoReservation();
$type = $_POST['type'];
echo $gReservation->getListEntretiens($type);
?>