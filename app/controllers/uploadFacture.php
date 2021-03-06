<?php
if (!$_GET['update']) {
  include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
  $results = $conn->query("SELECT MAX(pk_facture) + 1 AS Top FROM facture");
  $row = $results->fetch_assoc();
}
$target_dir = $_SERVER["DOCUMENT_ROOT"] . "/app/app/img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
// If everything is ok, upload file
if ($uploadOk == 1) {
  if (!$_GET['update']) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "facture" . $row['Top'] . ".jpg");
  } else {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "facture" . $_GET['update'] . ".jpg");
  }
}

if (!$_GET['update']) {
  header('Location: ../views/addEntretiens.php?upload=1');
} else {
  header('Location: ../views/updateEntretiens.php?id=' . $_GET['update']);
}
?>
