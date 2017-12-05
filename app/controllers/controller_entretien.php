<?php
/****************************************************************
Fichier : controller_entretien.php
Auteur :
Fonctionnalité :
Vérification:

======================================================

Dernière modification:

 *****************************************************************/
// Start the session
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_entretien.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_invoice.php';


/**
 * Description of
 */
class controller_entretien
{

    private $InfosEntretien;
    private $InfosFacture;

    function __construct()
    {


        $this->arrayEntretien[0] = isset($_POST['date']) ? $_POST['date'] : null;
        $this->arrayEntretien[1] = isset($_POST['type']) ? $_POST['type'] : null;
        $this->arrayEntretien[2] = isset($_POST['vehiculefk']) ? $_POST['vehiculefk'] : null;
        $this->arrayEntretien[3] = isset($_POST['garage']) ? $_POST['garage'] : null;
        $this->arrayEntretien[4] = isset($_POST['cout']) ? $_POST['cout'] : null;
        $this->arrayEntretien[5] = isset($_POST['description']) ? $_POST['description'] : null;
        $this->arrayEntretien[6] = isset($_POST['odometre']) ? $_POST['odometre'] : null;
        $this->arrayEntretien[7] = $_SESSION['user']['pk_utilisateur'];

        echo $this->InfosEntretien;
        $this->InfosEntretien = new InfoEntretien();
        $this->InfosFacture = new InfoInvoice();
    }
    function ajoutEntretien()
    {
        $this->InfosEntretien->setDate_entretien($this->arrayEntretien[0]);
        $this->InfosEntretien->setFk_type_entretien($this->arrayEntretien[1]);
        $this->InfosEntretien->setFk_vehicule($this->arrayEntretien[2]);
        $this->InfosEntretien->setFk_garage($this->arrayEntretien[3]);
        $this->InfosEntretien->setCout_entretien($this->arrayEntretien[4]);
        $this->InfosEntretien->setDescription($this->arrayEntretien[5]);
        $this->InfosEntretien->setOdometre_entretien($this->arrayEntretien[6]);
        $this->InfosEntretien->setFk_utilisateur($this->arrayEntretien[7]);
        $insertedID = $this->InfosEntretien->addDBObject();

        $this->InfosFacture->setFk_entretien($insertedID);
        $this->InfosFacture->setMontant_entretien($this->arrayEntretien[4]);
        $this->InfosFacture->setPhoto($this->addImage($insertedID));
        $this->InfosFacture->addDBObject();
    }

    function modEntretien($id)
    {
        $facture = $this->InfosFacture->findFactureByFk($id);

        $this->InfosEntretien->setPk_entretien($id);
        $this->InfosEntretien->setDate_entretien($this->arrayEntretien[0]);
        $this->InfosEntretien->setFk_type_entretien($this->arrayEntretien[1]);
        $this->InfosEntretien->setFk_vehicule($this->arrayEntretien[2]);
        $this->InfosEntretien->setFk_garage($this->arrayEntretien[3]);
        $this->InfosEntretien->setCout_entretien($this->arrayEntretien[4]);
        $this->InfosEntretien->setDescription($this->arrayEntretien[5]);
        $this->InfosEntretien->setOdometre_entretien($this->arrayEntretien[6]);
        $this->InfosEntretien->setFk_utilisateur($this->arrayEntretien[7]);
        $this->InfosEntretien->updateDBObject();

        if($facture == null){
            $this->InfosFacture->setFk_entretien($id);
            $this->InfosFacture->setMontant_entretien($this->arrayEntretien[4]);
            $this->InfosFacture->setPhoto($this->addImage($id));
            $this->InfosFacture->addDBObject();
        }else{
            $this->InfosFacture->setPk_facture($facture["pk_facture"]);
            $this->InfosFacture->setFk_entretien($id);
            $this->InfosFacture->setMontant_entretien($this->arrayEntretien[4]);
            $this->InfosFacture->setPhoto($this->addImage($id));
            $this->InfosFacture->updateDBObject();
        }
    }

    function suppEntretien($id)
    {
      $this->InfosEntretien->deleteDBObject($id); //cascade sur facture à ajouter !!!!
    }

    function getInfosEntretien(){
        return $this->InfosEntretien;
    }

    function getarrayEntretien(){
        return $this->arrayEntretien;
    }

    function addImage($pkentretien){
        if ($pkentretien == null){
            $pkentretien = $this->InfosFacture->getFk_entretien();
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
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
            && strtolower($imageFileType) != "gif") {
            $uploadOk = 0;
        }
        // If everything is ok, upload file
        if ($uploadOk == 1) {
            if (!$_GET['mod']) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "facture" . strval($pkentretien) . ".jpg");
                return "img/facture" . strval($pkentretien) . ".jpg";
            } else {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "facture" . strval($pkentretien) . ".jpg");
                return "img/facture" . strval($pkentretien) . ".jpg";
            }
        }
    }
}
$entControl = new controller_entretien();
if (isset($_GET["supp"])){
    $entControl->suppEntretien($_GET["id"]);
}elseif (isset($_GET["mod"])){
    $entControl->modEntretien($_GET["id"]);
}else {
    $entControl->ajoutEntretien();
}


    if ($_SESSION['admin'] == '1')
        header("Location: http://localhost/app/app/views/entretienAdmin.php");
    else{
        header("Location: http://localhost/app/app/views/entretien.php");
    exit();
    }

?>
