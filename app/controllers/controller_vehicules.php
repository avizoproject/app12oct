<?php
// Start the session
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';

/**
 * Description of
 */
class controller_vehicules
{
    private $arrayVehicules = array();
    private $infosVehicules;

    function __construct()
    {
        $this->arrayVehicules[0] = isset($_POST['marque']) ? $_POST['marque'] : null;
        $this->arrayVehicules[1] = isset($_POST['modele']) ? $_POST['modele'] : null;
        $this->arrayVehicules[2] = isset($_POST['annee']) ? $_POST['annee'] : null;
        $this->arrayVehicules[3] = isset($_POST['couleur']) ? $_POST['couleur'] : null;
        $this->arrayVehicules[4] = isset($_POST['secteur']) ? $_POST['secteur'] : null;
        $this->arrayVehicules[5] = isset($_POST['odometre']) ? $_POST['odometre'] : null;
        $this->arrayVehicules[6] = isset($_POST['plaque']) ? $_POST['plaque'] : null;
        $this->arrayVehicules[7] = isset($_POST['date_acquisition']) ? $_POST['date_acquisition'] : null;
        $this->arrayVehicules[8] = isset($_POST['date_service']) ? $_POST['date_service'] : null;
        $this->arrayVehicules[9] = isset($_POST['description']) ? $_POST['description'] : null;
        $this->arrayVehicules[10] = isset($_POST['optionsCheckboxes']) ? '1' : '0';

        $this->infosVehicules = new InfoVehicule();
    }
    function ajoutVehicule()
    {
      $this->infosVehicules->setFk_marque($this->arrayVehicules[0]);
      $this->infosVehicules->setFk_modele($this->arrayVehicules[1]);
      $this->infosVehicules->setAnnee($this->arrayVehicules[2]);
      $this->infosVehicules->setFk_Couleur($this->arrayVehicules[3]);
      $this->infosVehicules->setFk_secteur($this->arrayVehicules[4]);
      $this->infosVehicules->setOdometre($this->arrayVehicules[5]);
      $this->infosVehicules->setPlaque($this->arrayVehicules[6]);
      $this->infosVehicules->setDate_achat($this->arrayVehicules[7]);
      $this->infosVehicules->setDate_mise_hors_service($this->arrayVehicules[8]);
      $this->infosVehicules->setDescription_hors_service($this->arrayVehicules[9]);
      $this->infosVehicules->setFk_statut($this->arrayVehicules[10]);
      $this->infosVehicules->setPhoto($this->addImage());
      $this->infosVehicules->addDBObject();

      echo json_encode($this->infosVehicules);
    }

    function modVehicule($id)
    {
      $this->infosVehicules->setPk_vehicule($id);
      $this->infosVehicules->setFk_marque($this->arrayVehicules[0]);
      $this->infosVehicules->setFk_modele($this->arrayVehicules[1]);
      $this->infosVehicules->setAnnee($this->arrayVehicules[2]);
      $this->infosVehicules->setFk_Couleur($this->arrayVehicules[3]);
      $this->infosVehicules->setFk_secteur($this->arrayVehicules[4]);
      $this->infosVehicules->setOdometre($this->arrayVehicules[5]);
      $this->infosVehicules->setPlaque($this->arrayVehicules[6]);
      $this->infosVehicules->setDate_achat($this->arrayVehicules[7]);
      $this->infosVehicules->setDate_mise_hors_service($this->arrayVehicules[8]);
      $this->infosVehicules->setDescription_hors_service($this->arrayVehicules[9]);
      $this->infosVehicules->setFk_statut($this->arrayVehicules[10]);
      $this->infosVehicules->setPhoto($this->addImage());
      $this->infosVehicules->updateDBObject();
    }

    function suppVehicule($id)
    {
        $today = strtotime('today'); //For some reason it needs - 1 day or it always thinks it's one day forward, might be a timezone thing.
        echo $today;
        $this->infosVehicules->updateObjectDynamically("fk_statut", 2, $id);
        $this->infosVehicules->updateObjectDynamically("date_mise_hors_service", date('Y-m-d',$today), $id);
    }

    function getInfosVehicules() {
        return $this->infosVehicules;
    }

    function getArrayVehicules() {
        return $this->arrayVehicules;
    }

    function addImage(){
        if (!isset($_GET['mod'])) {
            include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
            $results = $conn->query("SELECT MAX(pk_vehicule) + 1 AS Top FROM vehicule");
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
            chmod($target_file,0755); //Change the file permissions if allowed
            unlink($target_file); //remove the file
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 16000000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
            && strtolower($imageFileType) != "gif") {
            $uploadOk = 0;
        }
        // If everything is ok, upload file
        if ($uploadOk == 1) {
            if (!isset($_GET['mod'])) {
                echo move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "car" . $row['Top'] . ".jpg");
                return "img/car" . $row['Top'] . ".jpg";
            } else {
                echo move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "car" . $_GET['id'] . ".jpg");
                return "img/car" . $_GET['id'] . ".jpg";
            }
        }
    }
}
$vehiculesControl = new controller_vehicules();

if (isset($_GET['ajout'])) {
  $vehiculesControl->ajoutVehicule();
} elseif (isset($_GET['mod'])) {
  $vehiculesControl->modVehicule($_GET['id']);
} elseif (isset($_GET['supp'])) {
  $vehiculesControl->suppVehicule($_GET['id']);
}


header("Location: http://localhost/app/app/views/vehicule.php");


?>
