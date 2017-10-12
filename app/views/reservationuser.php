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
$gReservation = new InfoReservation();
?>
<html>
    <head>
          <title>Avizo - Gestionnaire de réservations</title>
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
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Mes réservations</h4>
	                                <p class="category">Sélectionnez avant de choisir une action</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table" id="example">
	                                    <thead class="text-primary">
	                                    	<th class="hidden">ID Réservation</th>
	                                    	<th>Vehicule</th>
	                                    	<th>Réservé par</th>
						                    <th>Date de début</th>
                                            <th>Date de retour prévu</th>
                                            <th>Statut (1=actif , 0=inactif)</th>
	                                    </thead>
	                                    <tbody>
                                                <?php $gReservation->getListReservations(); ?>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
                            <div class="buttons">
                                <div class="centerbuttons">
                                    <button class="btn btn-default" name="Ajouter" id="Ajouter">Ajouter</button>
                                    <button class="btn btn-default" name="Modifier" id="Modifier">Modifier</button>
                                    <button class="btn btn-default" name="Consulter" id="Consulter">Consulter</button>
                                </div>
                            </div>
	                </div>
	            </div>
              <div class="cd-schedule loading">
              	<div style="float: left; position: relative;">
              		<ul>
                    <?php $gReservation->getReservationsNamesCalendar(); ?>
              		</ul>
              	</div>

              	<div class="events">
              		<ul>
                    <?php $gReservation->getReservationsCalendar(); ?>
              		</ul>
              	</div>

              	<div class="event-modal">
              		<header class="header">
              			<div class="content">
              				<span class="event-date"></span>
              				<h3 class="event-name"></h3>
              			</div>

              			<div class="header-bg"></div>
              		</header>

              		<div class="body">
              			<div class="event-info"></div>
              			<div class="body-bg"></div>
              		</div>

              		<a href="#0" class="close">Close</a>
              	</div>

              	<div class="cover-layer"></div>
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

                var table = $('#example').DataTable();

                //modifie les styles pour la sélection de rangée
                $('#example tbody').on('click', 'tr', function () {
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                    } else {
                        table.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }
                });

                //clic modifier, envoie en get le id selectionné
                $('#Modifier').click(function () {

                    if ($('#example tr.selected td:first').length > 0) {
                        var idcont = $('#example tr.selected td:first').html();
                        window.location.href = "http://localhost/app/app/views/updateReservation.php?id=" + idcont + "";
                    }else{
                        swal({
                                title:"",
                                text:"Vous devez sélectionner un client.",
                                type:"warning",
                                allowOutsideClick : true
                            });
                    }
                });

                //clic consulter, envoie en get le id selectionné
                $('#Consulter').click(function () {
                    if ($('#example tr.selected td:first').length > 0) {
                        var idcons = $('#example tr.selected td:first').html();
                        window.location.href = "http://localhost/app/app/views/viewReservation.php?id=" + idcons + "";
                    }else{
                        swal({
                                title:"",
                                text:"Vous devez sélectionner un client.",
                                type:"warning",
                                allowOutsideClick : true
                            });
                    }
                });

                //clic ajouter
                $('#Ajouter').click(function () {
                    window.location.href = "http://localhost/app/app/views/addReservation.php";
                });

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

                $('.navbar-header a').html("Réservations");

    	});
	</script>
  <script src="../js/calendarModernizr.js"></script>
  <script>
  	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
  </script>
  <script src="../js/calendarMain.js"></script> <!-- Resource jQuery -->
</html>
