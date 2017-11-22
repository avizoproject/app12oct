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
        $this->arrayVehicules[0] = isset($_GET['marque']) ? $_GET['marque'] : null;
        $this->arrayVehicules[1] = isset($_GET['modele']) ? $_GET['modele'] : null;
        $this->arrayVehicules[2] = isset($_GET['annee']) ? $_GET['annee'] : null;
        $this->arrayVehicules[3] = isset($_GET['couleur']) ? $_GET['couleur'] : null;
        $this->arrayVehicules[4] = isset($_GET['secteur']) ? $_GET['secteur'] : null;
        $this->arrayVehicules[5] = isset($_GET['odometre']) ? $_GET['odometre'] : null;
        $this->arrayVehicules[6] = isset($_GET['plaque']) ? $_GET['plaque'] : null;
        $this->arrayVehicules[7] = isset($_GET['photo']) ? $_GET['photo'] : null;
        $this->arrayVehicules[8] = isset($_GET['date']) ? $_GET['date'] : null;
        $this->arrayVehicules[9] = isset($_GET['date_service']) ? $_GET['date_service'] : null;
        $this->arrayVehicules[10] = isset($_GET['description']) ? $_GET['description'] : null;
        $this->arrayVehicules[11] = isset($_GET['statut']) ? $_GET['statut'] : null;

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
      $this->infosVehicules->setPhoto($this->arrayVehicules[7]);
      $this->infosVehicules->setDate_achat($this->arrayVehicules[8]);
      $this->infosVehicules->setDate_mise_hors_service($this->arrayVehicules[9]);
      $this->infosVehicules->setDescription_hors_service($this->arrayVehicules[10]);
      $this->infosVehicules->setFk_statut($this->arrayVehicules[11]);
      $this->infosVehicules->addDBObject();
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
      $this->infosVehicules->setPhoto($this->arrayVehicules[7]);
      $this->infosVehicules->setDate_achat($this->arrayVehicules[8]);
      $this->infosVehicules->setDate_mise_hors_service($this->arrayVehicules[9]);
      $this->infosVehicules->setDescription_hors_service($this->arrayVehicules[10]);
      $this->infosVehicules->setFk_statut($this->arrayVehicules[11]);
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
