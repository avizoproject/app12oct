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
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';
 $listVehicule = new InfoVehicule();
 $gReservation = new InfoReservation();
$currentReservation = $gReservation->getObjectFromDB($_GET["id"]);

 $listUser = new InfoUser();
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
                                     <h4 class="title">Formulaire de modification</h4>
                                     <p class="category">Tous les champs sont obligatoires.</p>
                                 </div>
                                 <div class="card-content">
                                     <form id="formAjout">
                                       <?php
                                        if (file_exists("../img/car" . $currentReservation['fk_vehicule'] . ".jpg")) {
                                         echo '<div class="col-md-5 pull-right"><img id="imgVehicule" src="../img/car' . $currentReservation["fk_vehicule"] . '.jpg" /></div>';
                                        }
                                       ?>
                                       <div>
                                         <div class="col-md-7">
                                           <div class="form-group label-static">
                                             <label class="control-label">Employé</label>
                                             <select class="form-control" id="user" name="select"></select>
                                           </div>
                                         </div>
                                       </div>

                                       <div>
                                         <div class="col-md-7">
                                           <div class="form-group label-static">
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

                                       <div>
                                         <div class="col-md-7">
                                           <div class="form-group label-static">
                                             <label class="control-label">Véhicule</label>
                                             <select class="form-control" id="vehicule" name="select"></select>
                                               <p id="vehiculeError" hidden style="color:red; font-size:11px;">Aucun véhicule n'est disponible pour la période choisie et/ou l'utilisateur choisi.</p>
                                           </div>
                                         </div>
                                       </div>


                                         <?php
                                         if ($currentReservation['statut'] ==="1")
                                         {
                                             echo "<div class='row'>
                                                     <div class='form-group col-md-8'>
                                                         <div class='checkbox'>
                                                             <label>
                                                                 <input checked type='checkbox' id='active' name='optionsCheckboxes'>
                                                                 <label for='active' class='control-label'>Réservation active</label>
                                                             </label>
                                                         </div>
                                                     </div>
                                                 </div>";
                                         }else {
                                             echo "<div class='row'>
                                                     <div class='form-group col-md-8'>
                                                         <div class='checkbox'>
                                                             <label>
                                                                 <input type='checkbox' id='active' name='optionsCheckboxes'>
                                                                 <label for='active' class='control-label'>Réservation active</label>
                                                             </label>
                                                         </div>
                                                     </div>
                                                 </div>";
                                         }

                                         ?>

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
            var currentIDVehicule;

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

                $("#vehicule").load("../controllers/getSelectVehiculesAdmin.php?datefin=" + dateTo + "&id=<?php echo $_GET['id']; ?>&datedebut=" + dateFrom + "&secteur=" + fk_secteur, function(){
                    currentIDVehicule = $("#vehicule").val().substr(0,$("#vehicule").val().indexOf(' '));
                });
            });


            $("#user").change(function () {
                var date = $("#acquisition").val();
                var deuxDates = date.split(' à ');
                var dateFrom = removeTime(deuxDates[0]);
                var dateTo = removeTime(deuxDates[1]);
                var utilisateurfks = $("#user").val();
                var deuxfks = utilisateurfks.split(' ');
                var fk_secteur = deuxfks[0];

                if ($("#acquisition").val()) {
                    $("#acquisition").trigger("change");
                }
            });

            $("#vehicule").change(function () {
              $.get('../img/car' + $( "#vehicule" ).val().substr(0,$( "#vehicule" ).val().indexOf(' ')) + '.jpg').done(function() {
                $("#imgVehicule").show();
                $("#imgVehicule").attr('src', '../img/car' + $( "#vehicule" ).val().substr(0,$( "#vehicule" ).val().indexOf(' ')) + '.jpg');
              }).fail(function() {
                $("#imgVehicule").hide();
              })
            });

            $("#acquisition").change(function () {
                var date = $("#acquisition").val();
                var deuxDates = date.split(' à ');
                var dateFrom = removeTime(deuxDates[0]);
                var dateTo = removeTime(deuxDates[1]);
                var utilisateurfks = $("#user").val();
                var deuxfks = utilisateurfks.split(' ');
                var fk_secteur = deuxfks[0];
                var found = false;

                $("#vehicule").load("../controllers/getSelectVehiculesAdmin.php?datefin=" + dateTo + "&id=<?php echo $_GET['id']; ?>&datedebut=" + dateFrom + "&secteur=" + fk_secteur, function(){
                    //Removes selected from any in the list in case the vehicule is still available during these dates
                    $("#vehicule option:selected").prop("selected", false);

                    //If the id of the vehicule selected previously is presented, it will be selected in the list.

                    $("#vehicule option").each(function(){
                        if($(this).val().substr(0,$(this).val().indexOf(' '))==currentIDVehicule){ // EDITED THIS LINE
                            $(this).prop("selected","selected");
                            found = true;
                        }else{
                            if(!found){
                                $("#vehicule option:first").prop("selected", "selected");
                            }
                        }
                    });

                    if( !$('#vehicule').val() ){
                        $('#vehiculeError').show();
                    }else{
                        $('#vehiculeError').hide();
                    }
                });
            });

             $(document).on("click", "#confirmer", function(e) {
                 e.preventDefault();
                 var date = $("#acquisition").val();
                 var deuxDates = date.split(' à ');
                 var dateFrom = deuxDates[0];
                 var dateTo = deuxDates[1];

                 var utilisateurfks = $("#user").val();
                 var deuxfks = utilisateurfks.split(' ');
                 var fk_user = deuxfks[0];

                 var vehiculesfks = $("#vehicule").val();
                 var fksvehic = vehiculesfks.split(' ');
                 var pkVehicule = fksvehic[0];


                 if ($('#active').is(':checked') == true) {
                     var statut = 1;
                 } else {
                     var statut = 0;
                 }

                 if ($("#user").val() && $("#acquisition").val() && $("#vehicule").val()) {
                   swal({
                       title: "Modifiée",
                       text: "La réservation a bien été modifiée.",
                       type: "success"
                   }).then(function () {
                     location.href = "../controllers/controller_reservation.php?mod=1&id=<?php echo $_GET['id']; ?>&statut=" + statut + "&user=" + fk_user + "&datefin=" + dateTo + "&datedebut=" + dateFrom + "&pkvehicule=" + pkVehicule;
                 })
               }
             });

             $(document).on("click", "#supprimer", function(e) {
                 e.preventDefault();
                 swal({
                     title: "",
                     text: "La réservation va être supprimée.",
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
