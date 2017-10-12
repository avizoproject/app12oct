<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_sector.php';

$InfoSecteur = new InfoSector();
$anObject = $InfoSecteur->getObjectFromDB($_SESSION['user']['secteur']);
echo $anObject['nom_secteur'];
?>


