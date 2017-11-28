<!doctype html>
<html lang="en">
<head>
    <title>Avizo - Accueil</title>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/header.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_entretien.php';
    $gVehicule = new InfoVehicule();
    $gReservation = new InfoReservation();
    $gEntretien = new InfoEntretien();
    session_start();
    error_reporting(1);
    ?>
</head>

<body>

<div class="wrapper">

    <?php
    if (intval($_SESSION['admin']) === 1)
        require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/wrapper.php';
    else require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/wrapperUser.php';

    ?>

    <div class="main-panel">
        <?php
        require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/navigation.php';
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="card-content">
                                <p class="category"><?php echo $_SESSION['secteur'] ?></p>
                                <h3 class="title"><?php echo $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom'] ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Les grands promeneurs</h4>
                            <p class="category">Les utilisateurs avec le plus de réservations</p>
                        </div>
                        <div class="card-content table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <th><strong>Utilisateur</strong></th>
                              <th><strong>Nombre de réservations</strong></th>
                            </thead>
                            <tbody>
                              <?php $gReservation->getGrandsPromeneurs(); ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                      <div class="card">
                          <div class="card-header" data-background-color="blue">
                              <h4 class="title">Les véhicules populaires</h4>
                              <p class="category">Les véhicules avec le plus de réservations</p>
                          </div>
                          <div class="card-content table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <th><strong>Véhicule</strong></th>
                                <th><strong>Nombre de réservations</strong></th>
                              </thead>
                              <tbody>
                                <?php $gReservation->getVehiculesPopulaires(); ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Les véhicules coûteux</h4>
                            <p class="category">Les véhicules ayant coûté le plus cher en réparations</p>
                        </div>
                        <div class="card-content table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <th><strong>Véhicule</strong></th>
                              <th><strong>Coût total</strong></th>
                              <th><strong>Coût par KM</strong></th>
                            </thead>
                            <tbody>
                              <?php $gVehicule->getVehiculesCouteux(); ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Les garages populaires</h4>
                            <p class="category">Les garages ayant effectué le plus d'entretiens</p>
                        </div>
                        <div class="card-content table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <th><strong>Garage</strong></th>
                              <th><strong>Nombre d'entretiens</strong></th>
                            </thead>
                            <tbody>
                              <?php $gEntretien->getGaragesPopulaires(); ?>
                            </tbody>
                          </table>
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
</div>

</body>

<!--   Core JS Files   -->
<script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
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


    $(document).ready(function () {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        var activePage = window.location.href;
        console.log(activePage);
        var active = activePage.substring(activePage.lastIndexOf('/') + 1);

        $('.sidebar-wrapper a').each(function () {
            var linkPage = this.href;
            console.log(linkPage);
            if (activePage == linkPage) {
                $(this).closest("li").addClass("active");
                $('li').each(function () {
                    //$(this).closest("a").removeClass("navigation1");

                    $(this).closest("li").removeClass("active");
                });
                $(this).closest("li").addClass("active");
            }
        });
        $('.navbar-header a').html("Accueil");
    });


    function erreurNonCon() {
        swal({
            title: "Erreur",
            type: "error",
            text: "Vous n'êtes pas connecté!",
            timer: 2000,
            showConfirmButton: false,
            animation: "pop",
            allowOutsideClick: false
        });
        setTimeout(function () {
            window.location.href = '../views/signin.php';
        }, 1800);
    }


    function firstTime() {
        swal({
            title: "Connexion",
            text: "Authentification réussie!",
            type: 'success',
            timer: 2000,
            showConfirmButton: false,
            animation: "pop",
            allowOutsideClick: true
        });
    }

</script>

<?php
if ($_SESSION['loggedIn'] == false) {
    echo '<script type="text/javascript">',
    'erreurNonCon();',
    '</script>';
}


if ($_SESSION["firstTime"] == true) {
    echo '<script type="text/javascript">',
    'firstTime();',
    '</script>';
    $_SESSION["firstTime"] = false;
}
?>

</html>
