<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11/14/2017
 * Time: 8:59 AM
 */
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_garage.php';
session_start();
$gGarage = new InfoGarage();

$gGarage->getSelectGarage();
?>