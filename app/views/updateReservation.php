<?php
/****************************************************************
		File : updateReservation.php
		Author : Frédérick Morin
		Functionality : Page to modify a vehicule's reservation
		Date: 2017-10-06

		Last modification:
		2017-10-06     Frédérick Morin   1 Creation
    2017-10-11     Frédérick Morin   2 Ajout PHP
 ******************************************************************/
 session_start();
 error_reporting(0);
 require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
 require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
 $listVehicule = new InfoVehicule();
 $gReservation = new InfoReservation();
 ?>
 <html>
     <head>
           <title>Avizo - Modification d'une réservation</title>
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
                         <div class="col-md-8 center-block float-none">
                             <div class="card">
                                 <div class="card-header" data-background-color="blue">
                                     <h4 class="title">Formulaire de modification</h4>
                                     <p class="category">Tous les champs sont obligatoires.</p>
                                 </div>
                                 <div class="card-content">
                                     <form id="formAjout" >
                                         <label id="trigger" class="hidden"></label>
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="form-group label-static col-md-4">
                                                     <label class="control-label">Dates</label>

                                                     <input type='text' size="40" class="flatpickr form-control" name="date_acquisition" id='acquisition' placeholder="Choisissez la période de réservation">

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


                                         <div class="row">
                                             <div class="col-md-12">

                                                 <div class="form-group label-static col-md-4">
                                                     <label class="control-label">Choisissez un véhicule</label>
                                                     <select class="form-control" id="vehicule" name="select"></select>
                                                 </div>
                                             </div>

                                         </div>

                                         <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer">
                                         <input type="submit" id="supprimer" class="btn pull-right" value="Supprimer" style="margin-right: 10px;">
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
            function removeTime(dateStr) {
                var parts = dateStr.split(" ");
                return parts[0];
            }

            $("#trigger").load("../controllers/getSelectUsers.php?id=<?php echo $_GET['id']; ?>", function() {

                var date = $("#acquisition").val();
                var deuxDates = date.split(' à ');
                var dateFrom = removeTime(deuxDates[0]);
                var dateTo = removeTime(deuxDates[1]);

                $("#vehicule").load("../controllers/getSelectVehicules.php?datefin=" + dateTo + "&id=<?php echo $_GET['id']; ?>&datedebut=" + dateFrom);

            });

             //si les dates sont changées, reload vehicules dispos
             $("#acquisition").change(function () {
                 var date = $("#acquisition").val();
                 var deuxDates = date.split(' à ');
                 var dateFrom = removeTime(deuxDates[0]);
                 var dateTo = removeTime(deuxDates[1]);

                 $("#vehicule").load("../controllers/getSelectVehicules.php?datefin=" + dateTo + "&id=<?php echo $_GET['id']; ?>&datedebut=" + dateFrom);
             });

             $(document).on("click", "#confirmer", function(e) {
                 e.preventDefault();
                 swal({
                     title: "Ajouté",
                     text: "La réservation a bien été modifiée.",
                     type: "success"
                 }).then(function () {
                     var date = $("#acquisition").val();
                     var deuxDates = date.split(' à ');
                     var dateFrom = deuxDates[0];
                     var dateTo = deuxDates[1];

                     var pkVehicule = $("#vehicule").val();

                     location.href = "../controllers/controller_reservation.php?mod=1&id=<?php echo $_GET['id']; ?>&datefin=" + dateTo + "&datedebut=" + dateFrom + "&pkvehicule=" + pkVehicule;
                 })
             });

             $(document).on("click", "#supprimer", function(e) {
                 e.preventDefault();
                 swal({
                     title: "",
                     text: "La réservation va être annulée.",
                     type: "warning",
                     showCancelButton: true,
                     confirmButtonText: "Ok",
                     cancelButtonColor: "#969696",
                     cancelButtonText: "Annuler"
                 }).then(function () {
                     location.href = "../controllers/controller_reservation.php?supp=1&id=<?php echo $_GET['id']; ?>";
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
                location.href = "../views/reservation.php";
                })
            });



                 $('.navbar-header a').html("Modification de réservation");

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
                text: "Vous n'êtes pas authorisé à voir cette page!",
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
        if ($_SESSION['admin'] == true) {
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
