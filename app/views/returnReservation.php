<?php
/****************************************************************
		File : returnReservation.php
		Authour : Jérémy Besserer-Lemay
		Functionality : User page to return a reservation after being done with it
			Date: 2017-10-06
			
			Last modification:
			2017-10-06     Jérémy Besserer-Lemay   1 Creation
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
        require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/wrapper.php';
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
                                    <form action="../controllers/cReservation.php?mod=3" method="post" enctype="multipart/form-data">
                                        <fieldset>
                                            <div class="col-md-6">
                                                <div class="form-group label-static">
                                                    <label for='selectReservation'>Choisissez le véhicule à retourner</label>
                                                    <?php $gReservation->getSelectReservations($_SESSION['user']['pk_utilisateur']); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group label-static">
                                                <label for='odometer'>Kilométrage du véhicule</label>

                                                <input type="text" size="40" maxlenght="50" class="form-control" id="odometer" name="odometer" placeholder="Kilométrage au retour" required>
                                                </div>
                                                </div>
                                            <div class=" col-md-12 buttons">
                                                <div class="centerbuttons">
                                                    <button class="btn btn-default" type="button" id="Retour" name="Retour">Annuler</button>
                                                    <button class="btn btn-default" type="submit" >Confirmer</button>
                                                </div>
                                            </div>
                                        </fieldset>
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

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            //clic consulter, envoie en get le id selectionné
            $('#retour').click(function () {

                    window.location.href = "http://localhost/app/app/views/reservationuser";

            });

            //clic envoyer
            $('#Ajouter').click(function () {
                window.location.href = "http://localhost/app/app/views/addReservation.php";
            });

            $('.navbar-header a').html("Retour de véhicule");

    	});
	</script>
</html>