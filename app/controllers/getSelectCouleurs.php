<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_colour.php';
$InfoColour = new InfoColour();
$InfoColour->getListColours();
?>
