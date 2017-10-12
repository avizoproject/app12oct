<?php
/****************************************************************
 Fichier : controller_login.php
 Auteur :
 Fonctionnalité :
 Vérification:
 
 ======================================================
 
 Dernière modification:
 
 *****************************************************************/
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_client.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_sector.php';
// Start the session
session_start();
if(isset($_GET['erreur']))
{
    $message = "Le nom d\'utilisateur ou le mot de passe est erronné.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
/**
 * Description of
 */
class controller_login
{
    private $infosLogin = array();
    private $InfosUtilisateur;
    private $InfosSecteur;
    private $Handshake = false;
    private $allUsers = array();
    function __construct()
    {
        $this->infosLogin[0] = isset($_POST['email']) ? $_POST['email'] : null;
        $this->infosLogin[1] = isset($_POST['password']) ? $_POST['password'] : null;
        $this->InfosUtilisateur = new infoUser();
        $this->InfosSecteur = new InfoSector();
        $this->allUsers = $this->InfosUtilisateur->getListOfAllDBObjects();
       
    }
    function login()
    {
        
        foreach ($this->allUsers as $row) {
            if ($row['courriel'] == $this->infosLogin[0] && $row['mot_de_passe'] == $this->infosLogin[1]) {
                echo "success ";
                $this->Handshake = true;
            }
        }
    }
    
    function getInfosUtilisateur(){
        return $this->InfosUtilisateur;
    }
    
    function getInfos_Sector(){
        return $this->InfosSecteur;
    }
    
    function getInfosLogin(){
        return $this->infosLogin;
    }
    function getHs()
    {
        return $this->Handshake;
    }
}
$loginControl = new controller_login();
$loginControl->login();
if ($loginControl->getHs() == true) {
    $user = $loginControl->getInfosUtilisateur()->getUser($loginControl->getInfosLogin()[0]);
    $secteur = $loginControl->getInfos_Sector()->getObjectFromDB($user['fk_secteur']);
    $_SESSION['user']=array();
    $_SESSION['user']=$user;
    $_SESSION['secteur']= $secteur['nom_secteur'];
    $_SESSION['admin'] = $user['fk_statut'];
    $_SESSION['email'] =$user['courriel'];
    
    $_SESSION['loggedIn']=true;
    echo $_SESSION['admin'];
    if ($_SESSION['admin'] === 1)
        header("Location: http://localhost/app/app/views/dashboard.php");
    else 
        header("Location: http://localhost/app/app/views/dashboard.php");
    exit();
}
else{
    header("Location: http://localhost/app/app/views/signin.php");
    exit();
}
?>