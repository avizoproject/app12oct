<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vmodel.php';
$InfoModel = new InfoVModel();
$InfoModel->getListModeles($_GET['idMarque'], $_GET['idModele']);
?>
