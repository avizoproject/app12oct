<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11/14/2017
 * Time: 8:59 AM
 */
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
session_start();
$gReservation = new InfoReservation();
$idUser = $_SESSION['user']['pk_utilisateur'];


$gReservation->getWeekReservationsForEntretiens($idUser);
?>