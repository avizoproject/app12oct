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
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_client.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_sector.php';
$listVehicule = new InfoVehicule();


?>
<html>
<head>
    <title>Avizo - Ajout d'une réservation</title>
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
                                <h4 class="title">Formulaire d'ajout</h4>
                                <p class="category">Tous les champs sont obligatoires.</p>
                            </div>
                            <div class="card-content">
                                <form id="formAjout" >

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-static col-md-4">

                                                <label class="control-label">Choisissez un employé</label>
                                                <select class="form-control" id="user" name="select"></select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-static col-md-4">
                                                <label class="control-label">Dates</label>

                                                <input type='text' size="40" class="flatpickr form-control" name="date_acquisition" id='acquisition' placeholder="Choisissez la période de réservation" required>

                                                <script src="../js/flatpickr.js" type="text/javascript"></script>
                                                <script>
                                                    flatpickr(".selector", {});
                                                    document.getElementById("acquisition").flatpickr({
                                                        minDate: "today",
                                                        enableTime: true,
                                                        mode: "range"
                                                    });
                                                </script>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-static col-md-4">

                                                <label class="control-label">Choisissez un véhicule</label>
                                                <select class="form-control" id="vehicule" name="select" required></select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='row'>
                                        <div class='form-group col-md-12'>
                                            <div class='checkbox'>
                                                <label>
                                                    <input type='checkbox' id='active' name='optionsCheckboxes'>
                                                    <label for='active' class='control-label'>Réservation active</label>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer">
                                    <input type="submit" id="cancel" class="btn pull-right" value="Annuler" style="margin-right: 10px;">
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

        $("#user").load("../controllers/getSelectUsers.php");

        //si les dates sont changées, reload vehicules dispos
        $("#acquisition").change(function () {
            var date = $("#acquisition").val();
            var deuxDates = date.split(' à ');
            var dateFrom = removeTime(deuxDates[0]);
            var dateTo = removeTime(deuxDates[1]);
            var user = $("#user").val();
            var secteurETuser = user.split(' ');
            var secteur = secteurETuser[0];

            $("#vehicule").load("../controllers/getSelectVehiculesAdmin.php?datefin=" + dateTo + "&datedebut=" + dateFrom + "&secteur=" + secteur);

            function removeTime(dateStr) {
                var parts = dateStr.split(" ");
                return parts[0];
            }
        });

        $(document).on("click", "#confirmer", function(e) {
            e.preventDefault();
            var date = $("#acquisition").val();
            var deuxDates = date.split(' à ');
            var dateFrom = deuxDates[0];
            var dateTo = deuxDates[1];

            var userstuff = $("#user").val();
            var secteurETuser = userstuff.split(' ');
            var user = secteurETuser[1];

            var vehiculesfks = $("#vehicule").val();
            var fksvehic = vehiculesfks.split(' ');
            var pkVehicule = fksvehic[0];

            if ($('#active').is(':checked') == true){
                var statut = 1;
            }else{
                var statut = 0;
            }

            location.href = "../controllers/controller_reservation.php?ajout=1&admin=1&statut="+ statut +"&datefin=" + dateTo + "&datedebut=" + dateFrom + "&pkvehicule=" + pkVehicule + "&user=" + user;



        });

        $(document).on("click", "#cancel", function(e) {
            e.preventDefault();
            location.href = "../views/reservation.php";
        });

        $('.navbar-header a').html("Ajout de réservation");

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
