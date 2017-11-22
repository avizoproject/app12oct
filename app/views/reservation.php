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
$_SESSION['plusmoinsWeek'] = 0;
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
                                            <th class="tableColWidth">Statut</th>
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
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Horaire</h4>
                        <p class="category">Cliquez sur une réservation pour la modifier</p>
                    </div>
                    <div class="card-content table-responsive col-md-12">
                        <div class="row padding-md"><button class="btn btn-default" name="" id="previousWeek"><i class='material-icons'>fast_rewind</i></button><button class="pull-right btn btn-default" name="" id="nextWeek"><i class='material-icons'>fast_forward</i></button></div>

                        <div class="col-md-11 margin-left-lg center-block float-none" id="schedule"></div>

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

    <!--  Moments Plugin    -->
    <script type="text/javascript" src="../js/moment-with-locales.js"></script>

    <!--  Sweet alert -->
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/sweetalert2.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!--  Moments   -->
    <script type="text/javascript" src="../js/moment-with-locales.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../js/demo.js"></script>
    <script src= 'https://code.jquery.com/ui/1.10.4/jquery-ui.min.js' type= 'text/javascript' language= 'javascript'></script>

    <script type="text/javascript" src="../js/jq.schedule.js"></script>

	<script type="text/javascript">

        function CreateHoraire(numberofWeeks) {

            getWeek = function (start, weekNum) {
                var weekmultiplicator = 7;
                var numberofWeeks =  weekNum || 0;

                if (numberofWeeks >=2){
                    $('#nextWeek').prop('disabled',true);
                }else{
                    $('#nextWeek').prop('disabled',false);
                }
                if (numberofWeeks <=-2){
                    $('#previousWeek').prop('disabled',true);
                }else{
                    $('#previousWeek').prop('disabled',false);
                }

                //Calcing the starting point
                start = start || 0;
                //var today = new Date(this.setHours(0, 0, 0, 0));

                /* MOMENT */
                var today = moment();
                var today2 = moment();

                var day = today.day() - start;
                var day2= today2.day() -start;
                today2 = today2.subtract(day2, 'days');
                var startdate = today.add((numberofWeeks * weekmultiplicator)-day, 'days');
                var enddate  =today2.add((6 +(numberofWeeks * weekmultiplicator)), 'days');

                var StartDate = moment(startdate).format("YYYY-MM-DD HH:mm:ss");
                var EndDate = moment(enddate).format("YYYY-MM-DD HH:mm:ss");
                console.log(StartDate +" "+ EndDate);
                return [StartDate, EndDate];
            }

            Date.prototype.addDays = function(days) {
                var dat = new Date(this.valueOf());
                dat.setDate(dat.getDate() + days);
                return dat;
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

            var numofWeeks = numberofWeeks || 0;

            var reservations = null;
            $.ajax({
                url: "../controllers/getReservationsCalendar.php",
                type: "POST",
                data: {Week: numofWeeks},
                success: function (data) {


                    reservations = JSON.parse(data);
                    if (reservations != null){
                        if (numberofWeeks >=2){
                            $('#nextWeek').prop('disabled',true);
                        }else{
                            $('#nextWeek').prop('disabled',false);
                        }
                        if (numberofWeeks <=-2){
                            $('#previousWeek').prop('disabled',true);
                        }else{
                            $('#previousWeek').prop('disabled',false);
                        }
                        printHoraire();
                    }

                },
                error: function (trace) {
                    alert(trace);
                }
            });




            function printHoraire() {

                function getDataCalendar() {
                    var data = {};
                    $.each(reservations, function (index) {
                        //si date debut plus petite que dimanche, date debut dimanche
                        var Dates = getWeek(0, numberofWeeks);

                        var comp1 = moment(Dates[0]);

                        var comp2 = moment(reservations[index]['date_debut']);

                        if (comp1 > comp2) {
                            var dateDebut = '0' + comp1.day() + ':00';
                        }
                        else {
                            if (comp2.hour() < 12) {
                                var dateDebut = '0' + comp2.day() + ':00';
                            } else {
                                var dateDebut = '0' + comp2.day() + ':30';
                            }
                        }

                        //si date fin plus grande que samedi, date fin samedi

                        var comp3 = moment(Dates[1]);
                        var comp4 = moment(reservations[index]['date_fin']);

                        if (comp3 < comp4) {

                            var dateFin = '0' + (comp3.day()) + ':00';

                        }
                        else {
                            if (comp4.hour() <= 12) {
                                var dateFin = '0' + comp4.day() + ':30';

                            } else {
                                var dateFin = '0' + (comp4.day() + 1) + ':00';

                            }
                        }

                        var nom_vehicule = reservations[index]['nom_modele'] + "  #" + reservations[index]['fk_vehicule'];
                        var nom_user = reservations[index]['prenom'] + " " + reservations[index]['nom'].charAt(0);
                        var dated = removeTime(splitDate(reservations[index]['date_debut'])[2]) + "-" + removeTime(splitDate(reservations[index]['date_fin'])[2]) + " " + getTime(splitDate(reservations[index]['date_fin'])[2])[0] + "h";
                        var pk = reservations[index]['pk_reservation'] + "";

                        var schedule = [];
                        var scheduleData = {
                            start: dateDebut + '',
                            end: dateFin + '',
                            text: dated,
                            dated: nom_user,
                            pk: pk,
                            data: {}

                        };

                        schedule.push(scheduleData);
                        var rowNum = index + 1;
                        data["'" + rowNum + "'"] = {

                            schedule: schedule,
                            title: nom_vehicule
                        };


                    });
                    return data;
                }



                var $sc = $("#schedule").timeSchedule({
                    startTime: "00:00", // schedule start time(HH:ii)
                    endTime: "07:00",   // schedule end time(HH:ii)
                    widthTime: 60 * 30,  // cell timestamp example 10 minutes
                    timeLineY: 40,       // height(px)
                    verticalScrollbar: 20,   // scrollbar (px)
                    timeLineBorder: 2,   // border(top and bottom)
                    debug: "#debug",     // debug string output elements
                    rows: getDataCalendar(),
                    change: function (node, data) {
                        alert("change event");
                    },
                    init_data: function (node, data) {
                    },
                    click: function (node, data) {
                        //sweetalert moé ca
                        var pk = node.find('.hidden').text();
                        window.location.href = "http://localhost/app/app/views/updateReservationadmin.?id=" + pk;
                    },


                });

            }
        }


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
            	//console.log(activePage);
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

                CreateHoraire();


    	});
        //clic next
        $('#nextWeek').click(function () {
            $.post( "../controllers/changeWeek.php", { modifWeek: 1})
                .done(function(data) {
                    $('#schedule').html(' ');


                    CreateHoraire(data);
                });

        });

        //clic prev
        $('#previousWeek').click(function () {
            $.post( "../controllers/changeWeek.php", { modifWeek: -1})
                .done(function(data) {
                    $('#schedule').html(' ');


                    CreateHoraire(data);
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

		function noAuthorize() {

        swal({
            title: "Erreur",
            type: "error",
            text: "Vous n'êtes pas autorisé à accéder à cette page!",
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
        if($_SESSION['loggedIn']==false){
                echo '<script type="text/javascript">',
                      'erreurNonCon();',
                    '</script>';
            }
			if ($_SESSION['admin'] == 2) {
				echo '<script type="text/javascript">',
				'noAuthorize();',
				'</script>';
			}
            ?>
  <script src="../js/calendarModernizr.js"></script>
    <script>
        if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
    </script>
    <script src="../js/calendarMain.js"></script> <!-- Resource jQuery -->
</html>
