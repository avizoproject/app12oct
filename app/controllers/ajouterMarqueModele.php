<?php
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
  if ($_GET['type'] == "marque") {
    $sql = "INSERT INTO marque (nom_marque) VALUES ('" . $_GET['nom'] . "')";
    $conn->query($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else if ($_GET['type'] == "modele") {
    $sql = "INSERT INTO modele (fk_marque, nom_modele) VALUES ('" . $_GET['marque'] . "', '" . $_GET['nom'] . "')";
    $conn->query($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>
