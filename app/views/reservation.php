<?php
/****************************************************************
		File : reservation.php
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
	                                <h4 class="title">Réservations</h4>
	                                <p class="category">Sélectionnez une réservation avant de choisir une action</p>
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
                            <div class="">
                                <div class="margin-button2">
                                    <button class="btn btn-default" name="Ajouter" id="Ajouter">Ajouter</button>
                                    <button class="btn btn-default" name="Modifier" id="Modifier">Modifier</button>
                                    <button class="btn btn-default" name="Consulter" id="Consulter">Consulter</button>
                                </div>
                            </div>
	                </div>
	            </div>

                <br>

                <div class="col-md-12" id="schedule"></div>


                <!--Fred's calendar, disabled for demo -->
              <!--<div class="cd-schedule loading">
              	<div style="float: left; position: relative;">
              		<ul>
                    <?php /*$gReservation->getReservationsNamesCalendar(); */?>
              		</ul>
              	</div>

              	<div class="events">
              		<ul>
                    <?php /*$gReservation->getReservationsCalendar(); */?>
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
              </div>-->
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
    <script src= 'https://code.jquery.com/ui/1.10.4/jquery-ui.min.js' type= 'text/javascript' language= 'javascript'></script>

    <script type="text/javascript" src="../js/jq.schedule.js"></script>

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
                        window.location.href = "http://localhost/app/app/views/updateReservationadmin.php?id=" + idcont + "";
                    }else{
                        swal({
                                title:"",
                                text:"Vous devez sélectionner une réservation",
                                type:"warning",
                                allowOutsideClick : true
                            });
                    }
                });

                //clic consulter, envoie en get le id selectionné
                $('#Consulter').click(function () {
                    if ($('#example tr.selected td:first').length > 0) {
                        var idcons = $('#example tr.selected td:first').html();
                        window.location.href = "http://localhost/app/app/views/viewReservationAdmin.php?id=" + idcons + "";
                    }else{
                        swal({
                                title:"",
                                text:"Vous devez sélectionner une réservation",
                                type:"warning",
                                allowOutsideClick : true
                            });
                    }
                });

                //clic ajouter
                $('#Ajouter').click(function () {
                    window.location.href = "http://localhost/app/app/views/addReservationadmin.php";
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



                //---------------HORAIRE ALEX----------------


            Date.prototype.getWeek = function(start)
            {
                //Calcing the starting point
                start = start || 0;
                var today = new Date(this.setHours(0, 0, 0, 0));
                var day = today.getDay() - start;
                var date = today.getDate() - day;

                // Grabbing Start/End Dates
                var StartDate = new Date(today.setDate(date));
                var EndDate = new Date(today.setDate(date + 6));

                return [StartDate, EndDate];
            }



            // test code


           /* var start = new Date(Dates[0].toLocaleDateString()).getDay();
            var end = new Date(Dates[1].toLocaleDateString()).getDay() + 1;
            var startOfTheWeek = "0"+start+":00";
            var endOfTheWeek = "0"+end+":00";
*/

            var reservations = <?php echo $gReservation->getWeekReservations(); ?>;




        function getDataCalendar() {
            var data = {};
            $.each(reservations, function (index) {
                //si date debut plus petite que dimanche, date debut dimanche
                var Dates = new Date().getWeek();
                var comp1 = new Date(Dates[0]);
                var comp2 = new Date(toDate(removeTime(reservations[index]['date_debut'])));

                if (comp1 > comp2) {

                    var dateDebut = '0' + new Date(Dates[0].toLocaleDateString()).getDay() + ':00';
                }
                else {
                    if (getTime(splitDate(reservations[index]['date_debut'])[2])[0] < 12) {
                        var dateDebut = '0' + new Date(toDate(removeTime(reservations[index]['date_debut']))).getDay() + ':00';
                    }else{
                        var dateDebut = '0' + new Date(toDate(removeTime(reservations[index]['date_debut']))).getDay() + ':30';
                    }
                }

                //si date fin plus grande que samedi, date fin samedi

                var comp3 = new Date(Dates[1]);
                var comp4 = new Date(toDate(removeTime(reservations[index]['date_fin'])));

                if (comp3 < comp4) {

                    var dateFin = '0' + new Date(Dates[1].toLocaleDateString()).getDay() + 1 + ':00';

                }
                else {
                    if (getTime(splitDate(reservations[index]['date_fin'])[2])[0] <= 12) {
                        var dateFin = '0' + (new Date(toDate(removeTime(reservations[index]['date_fin']))).getDay()) + ':30';

                    }else{
                        var dateFin = '0' + (new Date(toDate(removeTime(reservations[index]['date_fin']))).getDay() + 1) + ':00';

                    }
                }

                var nom_vehicule = reservations[index]['nom_marque'] + " " + reservations[index]['nom_modele'];
                var nom_user = reservations[index]['prenom'] + " " + reservations[index]['nom'];
                var dated = removeTime(splitDate(reservations[index]['date_debut'])[2]) + "-" + removeTime(splitDate(reservations[index]['date_fin'])[2]) + " " + getTime(splitDate(reservations[index]['date_fin'])[2])[0]+"h" ;
                var pk = reservations[index]['pk_reservation']+"";

                var schedule = [];
                var scheduleData = {
                    start: dateDebut+'',
                    end: dateFin + '',
                    text: nom_user,
                    dated : dated,
                    pk: pk,
                    data: {}

                };

                schedule.push(scheduleData);
                var rowNum = index +1;
                data["'" + rowNum + "'"] = {

                    schedule: schedule,
                    title: nom_vehicule
                };



            });
            return data;
        }

            function toDate(dateStr) {
                var parts = dateStr.split("-");
                return new Date(parts[0], parts[1] - 1, parts[2]);
            }

            function splitDate(dateStr) {
                var parts = dateStr.split("-");
                return parts;
            }
            function removeTime(dateStr) {
                var parts = dateStr.split(" ");
                return parts[0];
            }

            function getTime(dateStr) {
                var parts = dateStr.split(" ");
                var timeparts = parts[1].split(":")
                return timeparts;
            }



            console.log(getDataCalendar());





            var $sc = $("#schedule").timeSchedule({
                startTime: "00:00", // schedule start time(HH:ii)
                endTime: "07:00",   // schedule end time(HH:ii)
                widthTime:60 * 30,  // cell timestamp example 10 minutes
                timeLineY:40,       // height(px)
                verticalScrollbar:20,   // scrollbar (px)
                timeLineBorder:2,   // border(top and bottom)
                debug:"#debug",     // debug string output elements
                rows : getDataCalendar(),
                change: function(node,data){
                    alert("change event");
                },
                init_data: function(node,data){
                },
                click: function(node,data){
                    //sweetalert moé ca
                    var pk = node.find('.hidden').text();
                    window.location.href = "http://localhost/app/app/views/updateReservationadmin.?id="+pk;
                },


            });
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
