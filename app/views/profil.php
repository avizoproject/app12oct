<?php
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_sector.php';
$listUser = new InfoUser();
$currentUser = $listUser->getObjectFromDB($_SESSION['user']['pk_utilisateur']);
?>
<html>
<head>
    <title>Avizo - Modifier mon profil</title>
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
                                <h4 class="title">Modifier mon profil</h4>
                            </div>
                            <div class="card-content">
                                <form id="formAjout" >

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group label-static col-md-4">
                                              <label class="control-label">Courriel</label>
                                              <input type="text" class="form-control" id="courriel" maxlength="12" value='<?php echo $currentUser['courriel']; ?>' disabled>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group label-static col-md-4">
                                              <label class="control-label">Mot de passe actuel</label>
                                              <input type="password" class="form-control" id="passwordOld" maxlength="50" required>
                                          </div>
                                      </div>
                                  </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-static col-md-4">
                                                <label class="control-label">Téléphone</label>
                                                <input type="text" class="form-control" id="telephone" maxlength="12" value='<?php echo $currentUser['telephone']; ?>'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-static col-md-4">
                                                <label class="control-label">Noueau mot de passe</label>
                                                <input type="password" class="form-control" id="password" maxlength="50">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-static col-md-4">
                                                <label class="control-label">Confirmation du mot de passe</label>
                                                <input type="password" class="form-control" id="passwordConfirmed" maxlength="50">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer">
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

      $("#secteur").load("../controllers/getSelectSecteurs.php" + "?id=<?php echo $currentUser['fk_secteur']; ?>");

        $(document).on("click", "#confirmer", function(e) {
          e.preventDefault();
          var passwordOld = $("#passwordOld").val();
          var passwordOldTrue = "<?php echo $currentUser['mot_de_passe']; ?>";
          var telephone = $("#telephone").val();
          var password = $("#password").val();
          var passwordConfirmed = $("#passwordConfirmed").val();

          if ((passwordOld == passwordOldTrue) && telephone) {
            if ($("#password").val() != null && $("#password").val() === $("#passwordConfirmed").val()) {
              location.href = "../controllers/controller_users.php?profil=1&id=<?php echo $_SESSION['user']['pk_utilisateur']; ?>&telephone="+ telephone +"&password="+ password;
            } else {
              location.href = "../controllers/controller_users.php?profil=1&id=<?php echo $_SESSION['user']['pk_utilisateur']; ?>&telephone="+ telephone;
            }
          } else {
            alert("Le mot de passe actuel entré est incorrect !!");
          }
        });

        $('.navbar-header a').html("Modifier mon profil");
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
