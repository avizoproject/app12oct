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
    <title>Avizo - Modification d'un utilisateur</title>
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
                                <h4 class="title">Formulaire de modification</h4>
                                <p class="category">Tous les champs sont obligatoires.</p>
                            </div>
                            <div class="card-content">
                                <form id="formAjout">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Nom</label>
                                                <input type="text" class="form-control" id="nom" maxlength="100" value='<?php echo $currentUser['nom']; ?>' required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Prénom</label>
                                                <input type="text" class="form-control" id="prenom" maxlength="100" value='<?php echo $currentUser['prenom']; ?>' required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Téléphone</label>
                                                <input type="text" class="form-control" id="telephone" maxlength="12" value='<?php echo $currentUser['telephone']; ?>' pattern="\d{3}[ ]\d{3}[\-]\d{4}" title="Le format doit être 555 555-5555." required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Courriel</label>
                                                <input type="text" class="form-control" id="courriel" maxlength="150" value='<?php echo $currentUser['courriel']; ?>' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Le format doit resemblé à: exemple@exemple.ca" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Mot de passe</label>
                                                <input type="password" class="form-control" id="password" maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" Title="Le mot de passe doit contenir au moins huit charactères, une minuscule, une majuscule, un chiffre." required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Confirmation du mot de passe</label>
                                                <input type="password" class="form-control" id="passwordConfirmed" maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" Title="Le mot de passe doit contenir au moins huit charactères, une minuscule, une majuscule, un chiffre." required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-static">
                                                <label class="control-label">Secteur</label>
                                                <select class="form-control" id="secteur" name="select" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if ($currentUser['fk_statut'] === "1") {
                                        echo "<div class='row'>
                                                <div class='form-group col-md-8'>
                                                    <div class='checkbox'>
                                                      <label>
                                                          <input checked type='checkbox' id='active' name='optionsCheckboxes'>
                                                          <label for='active' class='control-label'>Utilisateur actif</label>
                                                      </label>
                                                      <label style='margin-left: 100px;''>
                                                          <input checked type='checkbox' id='admin' name='optionsCheckboxes'>
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
                                                        <input checked type='checkbox' id='active' name='optionsCheckboxes'>
                                                        <label for='active' class='control-label'>Utilisateur actif</label>
                                                    </label>
                                                    <label style='margin-left: 100px;'>
                                                        <input type='checkbox' id='admin' name='optionsCheckboxes'>
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
                                                        <input type='checkbox' id='active' name='optionsCheckboxes'>
                                                        <label for='active' class='control-label'>Utilisateur actif</label>
                                                    </label>
                                                    <label style='margin-left: 100px;'>
                                                        <input type='checkbox' id='admin' name='optionsCheckboxes'>
                                                        <label for='admin' class='control-label'>Administrateur</label>
                                                    </label>
                                                  </div>
                                              </div>
                                          </div>";
                                    }
                                    ?>

                                    <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer">
                                    <input type="button" id="supprimer" class="btn pull-right" value="Supprimer" style="margin-right: 10px;">
                                    <input type="button" id="cancel" class="btn pull-right" value="Annuler" style="margin-right: 10px;">
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

<!-- Material Dashboard javascript methods -->
<script src="../js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

      $("#secteur").load("../controllers/getSelectSecteurs.php" + "?id=<?php echo $currentUser['fk_secteur']; ?>");

        $(document).on("submit", "#formAjout", function(e) {
          e.preventDefault();
          var nom = $("#nom").val();
          var prenom = $("#prenom").val();
          var telephone = $("#telephone").val();
          var courriel = $("#courriel").val();
          var secteur = $("#secteur").val();

          if ($('#active').is(':checked') == true) {
            var statut = 2;
          } else {
            var statut = 3;
          }

          if ($('#admin').is(':checked') == true) {
              var statut = 1;
          }

          if ($("#password").val() != null && $("#password").val() === $("#passwordConfirmed").val()) {
            var password = $("#password").val();
            if (nom && prenom && telephone && courriel && password && secteur) {
              location.href = "../controllers/controller_users.php?mod=1&id=<?php echo $_GET['id']; ?>&nom="+ nom +"&prenom="+ prenom +"&telephone="+ telephone +"&courriel="+ courriel +"&password="+ password +"&secteur="+ secteur +"&statut="+ statut;
            }
          } else {
            swal({
                title: "",
                text: "Les mots de passe entrés ne sont pas identiques",
                type: "error",
                showCancelButton: false,
                confirmButtonText: "Ok",
                cancelButtonColor: "#969696",
                cancelButtonText: "Annuler"
            })
          }

          if (nom && prenom && telephone && courriel && secteur && $("#password").val() == "") {
            swal({
                title: "Modifié",
                text: "L'utilisateur a bien été modifié.",
                type: "success"
            }).then(function () {
              location.href = "../controllers/controller_users.php?mod=1&id=<?php echo $_GET['id']; ?>&nom="+ nom +"&prenom="+ prenom +"&telephone="+ telephone +"&courriel="+ courriel +"&secteur="+ secteur +"&statut="+ statut;
            })
          }
        });

        $(document).on("click", "#supprimer", function(e) {
            e.preventDefault();
            swal({
                title: "",
                text: "L'utilisateur va être supprimé.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ok",
                cancelButtonColor: "#969696",
                cancelButtonText: "Annuler"
            }).then(function () {
                location.href = "../controllers/controller_users.php?supp=1&id=<?php echo $_GET['id']; ?>";
            })
        });

        $(document).on("click", "#cancel", function(e) {
            e.preventDefault();
            swal({
                title: "",
                text: "Les changements vont être annulés.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ok",
                cancelButtonColor: "#969696",
                cancelButtonText: "Annuler"
            }).then(function () {
                location.href = "../views/user.php";
            })
        });

        $('.navbar-header a').html("Modification d'utilisateur");

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
