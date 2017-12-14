<?php
// Start the session
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_user.php';

/**
 * Description of
 */
class controller_users
{
    private $arrayUsers = array();
    private $infosUsers;

    function __construct()
    {
        $this->arrayUsers[0] = isset($_GET['nom']) ? $_GET['nom'] : null;
        $this->arrayUsers[1] = isset($_GET['prenom']) ? $_GET['prenom'] : null;
        $this->arrayUsers[2] = isset($_GET['telephone']) ? $_GET['telephone'] : null;
        $this->arrayUsers[3] = isset($_GET['courriel']) ? $_GET['courriel'] : null;
        $this->arrayUsers[4] = isset($_GET['password']) ? $_GET['password'] : null;
        $this->arrayUsers[5] = isset($_GET['statut']) ? $_GET['statut'] : null;
        $this->arrayUsers[6] = isset($_GET['secteur']) ? $_GET['secteur'] : null;

        $this->infosUsers = new InfoUser();
    }
    function ajoutUser()
    {
      $this->infosUsers->setNom($this->arrayUsers[0]);
      $this->infosUsers->setPrenom($this->arrayUsers[1]);
      $this->infosUsers->setTelephone($this->arrayUsers[2]);
      $this->infosUsers->setCourriel($this->arrayUsers[3]);
      $this->infosUsers->setMot_de_passe($this->arrayUsers[4]);
      $this->infosUsers->setFk_statut($this->arrayUsers[5]);
      $this->infosUsers->setFk_secteur($this->arrayUsers[6]);
      $this->infosUsers->addDBObject();
    }

    function modUser($id)
    {
      if ($this->arrayUsers[4] != null) {
        $this->infosUsers->setPk_utilisateur($id);
        $this->infosUsers->setNom($this->arrayUsers[0]);
        $this->infosUsers->setPrenom($this->arrayUsers[1]);
        $this->infosUsers->setTelephone($this->arrayUsers[2]);
        $this->infosUsers->setCourriel($this->arrayUsers[3]);
        $this->infosUsers->setMot_de_passe($this->arrayUsers[4]);
        $this->infosUsers->setFk_statut($this->arrayUsers[5]);
        $this->infosUsers->setFk_secteur($this->arrayUsers[6]);
        $this->infosUsers->updateDBObject();
      } else {
        $this->infosUsers->updateObjectDynamically("nom", $this->arrayUsers[0], $id);
        $this->infosUsers->updateObjectDynamically("prenom", $this->arrayUsers[1], $id);
        $this->infosUsers->updateObjectDynamically("telephone", $this->arrayUsers[2], $id);
        $this->infosUsers->updateObjectDynamically("courriel", $this->arrayUsers[3], $id);
        $this->infosUsers->updateObjectDynamically("fk_statut", $this->arrayUsers[5], $id);
        $this->infosUsers->updateObjectDynamically("fk_secteur", $this->arrayUsers[6], $id);
      }
    }

    function suppUser($id)
    {
      $this->infosUsers->updateObjectDynamically("fk_statut", 3, $id);
    }

    function profilUser($id)
    {
      $this->infosUsers->updateObjectDynamically("telephone", $this->arrayUsers[2], $id);
      if ($this->arrayUsers[4] != null) {
        $this->infosUsers->updateObjectDynamically("mot_de_passe", $this->arrayUsers[4], $id);
      }
    }

    function getInfosUsers() {
        return $this->infosUsers;
    }

    function getArrayUsers() {
        return $this->arrayUsers;
    }
}
$usersControl = new controller_users();

if (isset($_GET['ajout'])) {
  $usersControl->ajoutUser();
} elseif (isset($_GET['mod'])) {
  $usersControl->modUser($_GET['id']);
} elseif (isset($_GET['supp'])) {
  $usersControl->suppUser($_GET['id']);
} elseif (isset($_GET['profil'])) {
  $usersControl->profilUser($_GET['id']);
  header("Location: /views/dashboard.php");
  exit;
}

header("Location: /views/user.php");
?>
