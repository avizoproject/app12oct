<?php
/****************************************************************
File : modifyReservation.php
Authour : Jérémy Besserer-Lemay
Functionality : Page to modify a vehicule's reservation
Date: 2017-10-03

Last modification:
2017-10-03     Jérémy Besserer-Lemay   1 Creation
2017-10-06     Frédérick Morin         2 Ajout calendrier
2017-10-03     Frédérick Morin         3 Modification calendrier

 ******************************************************************/
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_sector.php';
$listUser = new InfoUser();
$currentUser = $listUser->getObjectFromDB($_GET["id"]);
?>
<html>
<head>
    <title>Avizo - Consulter un utilisateur</title>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/header.php';
    session_start();
    error_reporting(1);
    //            if($_SESSION['loggedIn']==false){
    //                echo '<script type="text/javascript">';
    //                echo 'alert("Vous n\'êtes pas connecté.");';
    //                echo 'window.location.href = "../views/signin.php";';
    //                echo '</script>';
    //            }
    ?>
</head>
<body>

<div class="wrapper">
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/wrapper.php';
    ?>

    <div class="main-panel">
        <?php
        require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/navigation.php';
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 center-block float-none">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Consultation d'un utilisateur</h4>
                            </div>
                            <div class="card-content">
                                <form id="formAjout" >

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Nom</label>
                                                <input type="text" class="form-control" id="nom" maxlength="100" value='<?php echo $currentUser['nom']; ?>' disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Prénom</label>
                                                <input type="text" class="form-control" id="prenom" maxlength="100" value='<?php echo $currentUser['prenom']; ?>' disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Téléphone</label>
                                                <input type="text" class="form-control" id="telephone" maxlength="12" value='<?php echo $currentUser['telephone']; ?>' disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Courriel</label>
                                                <input type="text" class="form-control" id="courriel" maxlength="150" value='<?php echo $currentUser['courriel']; ?>' disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Secteur</label>
                                                <select class="form-control" id="secteur" name="select" disabled><?php $listUser->getSecteurSelect($_GET["id"]); ?></select>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if ($currentUser['fk_statut'] === "1") {
                                        echo "<div class='row'>
                                                <div class='form-group col-md-8'>
                                                    <div class='checkbox'>
                                                      <label>
                                                          <input checked type='checkbox' id='active' name='optionsCheckboxes' disabled>
                                                          <label for='active' class='control-label'>Utilisateur actif</label>
                                                      </label>
                                                      <label style='margin-left: 100px;''>
                                                          <input checked type='checkbox' id='admin' name='optionsCheckboxes' disabled>
                                                          <label for='admin' class='control-label'>Administrateur</label>
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>";
                                    } else if ($currentUser['fk_statut'] === "2") {
                                      echo "<div class='row'>
                                              <div class='form-group col-md-8'>
                                                  <div class='checkbox'>
                                                    <label>
                                                        <input checked type='checkbox' id='active' name='optionsCheckboxes' disabled>
                                                        <label for='active' class='control-label'>Utilisateur actif</label>
                                                    </label>
                                                    <label style='margin-left: 100px;'>
                                                        <input type='checkbox' id='admin' name='optionsCheckboxes' disabled>
                                                        <label for='admin' class='control-label'>Administrateur</label>
                                                    </label>
                                                  </div>
                                              </div>
                                          </div>";
                                    } else {
                                      echo "<div class='row'>
                                              <div class='form-group col-md-8'>
                                                  <div class='checkbox'>
                                                    <label>
                                                        <input type='checkbox' id='active' name='optionsCheckboxes' disabled>
                                                        <label for='active' class='control-label'>Utilisateur actif</label>
                                                    </label>
                                                    <label style='margin-left: 100px;'>
                                                        <input type='checkbox' id='admin' name='optionsCheckboxes' disabled>
                                                        <label for='admin' class='control-label'>Administrateur</label>
                                                    </label>
                                                  </div>
                                              </div>
                                          </div>";
                                    }
                                    ?>
                                    <input type="submit" id="modifier" class="btn pull-right margin-button2" value="Modifier">
                                    <button id="retour" class="btn pull-right">Retour</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/footer.php';
        ?>
    </div>
</div>
</body>

<!--   Core JS Files   -->


<script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="../js/jquery.dataTables.min.js"></script>

<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../js/chartist.min.js"></script>

<!--  Sweet alert -->
<script src="../js/sweetalert2.min.js"></script>
<script src="../js/sweetalert2.js"></script>

<!--  Notifications Plugin    -->
<script src="../js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="../js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

            $(document).on("click", "#retour", function (e) {
                e.preventDefault();
                location.href = "http://localhost/app/app/views/user.php";
            });

           $(document).on("click", "#modifier", function(e) {
               e.preventDefault();
               location.href = "updateUseradmin.php?id=<?php echo $_GET["id"]; ?>";

           });
               $('.navbar-header a').html("Consultation d'utilisateur");
    });

function erreurNonCon(){
          swal({
                  title: "Erreur",
                  type: "error",
                  text: "Vous n'êtes pas connecté!",
                  timer: 2000,
                  showConfirmButton: false,
                  animation : "pop"
                  });
                  setTimeout(function(){window.location.href='../views/signin.php';},1800);
      }
</script>

        <?php
        if($_SESSION['loggedIn']==false){
                echo '<script type="text/javascript">',
                      'erreurNonCon();',
                    '</script>';
            }
            ?>
<script src="../js/calendarModernizr.js"></script>
<script>
    if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="../js/calendarMain.js"></script> <!-- Resource jQuery -->
</html>
