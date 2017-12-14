<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_colour.php';
$InfoColour = new InfoColour();
$InfoColour->getListColours($_GET['id']);
?>
