<?php
session_start();
$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';

$InfoUser = new InfoUser();
$InfoUser->getListUsers();

?>