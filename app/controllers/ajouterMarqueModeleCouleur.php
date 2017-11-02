<?php
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
  if ($_GET['type'] == "marque") {
    if ($_GET['mod'] == 1) {
      $sql = "UPDATE marque SET nom_marque = '" . $_GET['nom'] . "' WHERE pk_marque = '" . $_GET['id'] . "'";
      $conn->query($sql);
    } else {
      $sql = "INSERT INTO marque (nom_marque) VALUES ('" . $_GET['nom'] . "')";
      $conn->query($sql);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else if ($_GET['type'] == "modele") {
    if ($_GET['mod'] == 1) {
      $sql = "UPDATE modele SET nom_modele = '" . $_GET['nom'] . "' WHERE pk_modele = '" . $_GET['id'] . "'";
      $conn->query($sql);
    } else {
      $sql = "INSERT INTO modele (fk_marque, nom_modele) VALUES ('" . $_GET['marque'] . "', '" . $_GET['nom'] . "')";
      $conn->query($sql);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else if ($_GET['type'] == "couleur") {
    if ($_GET['mod'] == 1) {
      $sql = "UPDATE couleur SET nom = '" . $_GET['nom'] . "' WHERE pk_couleur = '" . $_GET['id'] . "'";
      $conn->query($sql);
    } else {
      $sql = "INSERT INTO couleur (nom) VALUES ('" . $_GET['nom'] . "')";
      $conn->query($sql);
  }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>
