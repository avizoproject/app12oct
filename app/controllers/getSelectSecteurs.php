<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_sector.php';
$InfoSector = new InfoSector();
$InfoSector->getListSecteur($_GET['id']);
?>
