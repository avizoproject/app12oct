<?php
/****************************************************************
		File : viewReservation.php
		Author : Frédérick Morin
		Functionality : Page to view a vehicule's reservation
		Date: 2017-10-11

		Last modification:
    2017-10-11     Frédérick Morin   1 Création
 ******************************************************************/
 session_start();
 error_reporting(0);
 require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
 require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
 $listVehicule = new InfoVehicule();
 $gReservation = new InfoReservation();
 $currentReservation = $gReservation->getObjectFromDB($_GET["id"]);
 ?>
 <html>
     <head>
           <title>Avizo - Consulter une réservation</title>
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
                         <div class="col-md-8 center-block float-none">
                             <div class="card">
                                 <div class="card-header" data-background-color="blue">
                                     <h4 class="title">Consultation d'une réservation</h4>
                                 </div>
                                 <div class="card-content">
                                     <form id="formAjout">
                                       <?php
                                        if (file_exists("../img/car" . $currentReservation['fk_vehicule'] . ".jpg")) {
                                         echo '<div class="col-md-5 pull-right"><img src="../img/car' . $currentReservation["fk_vehicule"] . '.jpg" /></div>';
                                        }
                                       ?>
                                       <div>
                                         <div class="col-md-7">
                                           <div class="form-group label-static">
                                             <label class="control-label">Employé</label>
                                             <select class="form-control" id="user" name="select" disabled></select>
                                           </div>
                                         </div>
                                       </div>

                                       <div>
                                         <div class="col-md-7">
                                           <div class="form-group label-static">
                                             <label class="control-label">Dates</label>
                                             <input type='text' size="40" class="flatpickr form-control" name="date_acquisition" id='acquisition' placeholder="Choisissez la période de réservation" disabled>
                                             <script src="../js/flatpickr.js" type="text/javascript"></script>
                                             <script>
                                                 flatpickr(".selector", {});
                                                 document.getElementById("acquisition").flatpickr({


                                                     defaultDate: <?php $gReservation->getDatesReservation($_GET["id"]); ?>
                                                     enableTime: true,
                                                     mode: "range"


                                                 });
                                             </script>
                                           </div>
                                         </div>
                                       </div>

                                       <div>
                                         <div class="col-md-7">
                                           <div class="form-group label-static">
                                             <label class="control-label">Véhicule</label>
                                             <select class="form-control" id="vehicule" name="select" disabled></select>
                                           </div>
                                         </div>
                                       </div>

                                       <?php
                                       if ($currentReservation['statut'] ==="1") {
                                           echo "<div class='row'>
                                                   <div class='form-group col-md-8'>
                                                       <div class='checkbox'>
                                                           <label>
                                                               <input checked type='checkbox' id='active' name='optionsCheckboxes' disabled>
                                                               <label for='active' class='control-label'>Réservation active</label>
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
                                                               <label for='active' class='control-label'>Réservation active</label>
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

 	<!-- Material Dashboard javascript methods -->
 	<script src="../js/material-dashboard.js"></script>

 	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
 	<script src="../js/demo.js"></script>

 	<script type="text/javascript">
     	$(document).ready(function(){

            function removeTime(dateStr) {
                var parts = dateStr.split(" ");
                return parts[0];
            }

            $("#user").load("../controllers/getSelectUsers.php?id=<?php echo $_GET['id']; ?>", function() {

                var date = $("#acquisition").val();
                var deuxDates = date.split(' à ');
                var dateFrom = removeTime(deuxDates[0]);
                var dateTo = removeTime(deuxDates[1]);
                var utilisateurfks = $("#user").val();
                var deuxfks = utilisateurfks.split(' ');
                var fk_secteur = deuxfks[0];

                $("#vehicule").load("../controllers/getSelectVehiculesAdmin.php?datefin=" + dateTo + "&id=<?php echo $_GET['id']; ?>&datedebut=" + dateFrom + "&secteur=" + fk_secteur);


            });

            $(document).on("click", "#retour", function (e) {
                e.preventDefault();
                location.href = "http://localhost/app/app/views/reservation.php";
            });

             $(document).on("click", "#modifier", function(e) {
                 e.preventDefault();
                 location.href = "http://localhost/app/app/views/updateReservationAdmin.php?id=<?php echo $_GET["id"]; ?>";

             });

             $('.navbar-header a').html("Consultation de réservation");
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
