<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_brand.php';
$InfoBrand = new InfoBrand();
$InfoBrand->getListMarques($_GET['id']);
?>
