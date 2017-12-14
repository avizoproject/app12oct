<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/31/2017
 * Time: 5:27 PM
 */
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_reservation.php';
session_start();
$gReservation = new InfoReservation();
$idUser = $_SESSION['user']['pk_utilisateur'];
$type = $_POST['type'];
echo $gReservation->getWeekEntretiensForUser($idUser, $type);
?>