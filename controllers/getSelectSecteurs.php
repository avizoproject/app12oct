<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_sector.php';
$InfoSector = new InfoSector();
$InfoSector->getListSecteur($_GET['id']);
?>
