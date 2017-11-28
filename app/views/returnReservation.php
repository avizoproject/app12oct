<?php
/****************************************************************
 * File : returnReservation.php
 * Authour : Jérémy Besserer-Lemay
 * Functionality : User page to return a reservation after being done with it
 * Date: 2017-10-06
 *
 * Last modification:
 * 2017-10-06     Jérémy Besserer-Lemay   1 Creation
 ******************************************************************/
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
$gReservation = new InfoReservation();
?>
<html>
<head>
    <title>Avizo - Retour d'une réservation</title>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/header.php';
    session_start();
    error_reporting(1);
    ?>
</head>
<body>

<div class="wrapper">
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/wrapperUser.php';
    ?>

    <div class="main-panel">
        <?php
        require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/navigation.php';
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form id="formRetour" action="" enctype="multipart/form-data" accept-charset="utf-8">
                                <div class="col-md-6">
                                    <div class="form-group label-static">
                                        <label for='selectReservation'>Choisissez le véhicule à retourner</label>
                                        <?php $gReservation->getSelectReservations($_SESSION['user']['pk_utilisateur']); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label for='odometer'>Kilométrage du véhicule</label>

                                        <input type="text" size="40" maxlenght="50" class="form-control" id="odometer" name="odometer" required>
                                    </div>
                                </div>
                                <br><br><br><br><br><br>
                                <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer" style="margin-right:10px;margin-bottom:10px;">
                                <input class="btn pull-right" type="button" id="retour" name="Retour" value="Annuler" style="margin-right:10px;">
                            </form>
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

<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../js/chartist.min.js"></script>



<!--  Notifications Plugin    -->
<script src="../js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="../js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../js/demo.js"></script>

<!--  Sweet alert -->
<script src="../js/sweetalert2.min.js"></script>
<script src="../js/sweetalert2.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        //clic consulter, envoie en get le id selectionné
        $('#retour').click(function () {
            swal({
                title: "",
                text: "Le retour va être annulé.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ok",
                cancelButtonColor: "#969696",
                cancelButtonText: "Annuler"
            }).then(function () {
                location.href = "../views/reservationuser.php";
            })
        });

        // this is the id of the form
        $(document).on("click", "#confirmer", function(e) {
            e.preventDefault();
            if($('#odometer').val() != ""){
                var url = "../controllers/cReservation.php?mod=3";

                var form = $('#formRetour')[0];

                var formData = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData, // serializes the form's elements.
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {

                        //If error is found inside of the return data.
                        if(data.toLowerCase().indexOf('error')!= -1){
                            swal({
                                title: "Erreur",
                                type: "error",
                                text: "Le kilométrage de retour ne peut pas être plus petit que celui de départ.",
                                showCancelButton: false,
                                confirmButtonText: "Ok",
                                animation : "pop",
                                allowOutsideClick : true
                            });
                        }else{
                            swal({
                                title: "Retour",
                                text: "Le retour du véhicule a été effectué.",
                                type: "success"
                            });
                        }
                    },error: function(trace){
                        alert(trace);
                    }
                });
            }else{
                swal({
                    title: "Erreur",
                    type: "error",
                    text: "Veuillez remplir le kilométrage de retour.",
                    showCancelButton: false,
                    confirmButtonText: "Ok",
                    animation : "pop",
                    allowOutsideClick : true
                });
            }

        });


        $('.navbar-header a').html("Retour de véhicule");

    });


    function noAuthorize() {
        swal({
            title: "Erreur",
            type: "error",
            text: "Vous n'êtes pas autorisé à voir cette page!",
            timer: 2000,
            showConfirmButton: false,
            animation: "pop",
            allowOutsideClick: false
        });
        setTimeout(function () {
            window.location.href = '../views/dashboard.php';
        }, 1800);
    }
</script>
<?php
if ($_SESSION['admin'] == 1) {
    echo '<script type="text/javascript">',
    'noAuthorize();',
    '</script>';
}
?>
</html>
