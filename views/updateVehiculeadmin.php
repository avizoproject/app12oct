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
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_vehicule.php';
$listVehicule = new InfoVehicule();
$currentVehicule = $listVehicule->getObjectFromDB($_GET["id"]);
?>
 <html>
     <head>
           <title>Avizo - Modification d'un véhicule</title>
 	<?php
             require_once $_SERVER["DOCUMENT_ROOT"] . '/views/header.php';
             session_start();
             error_reporting(1);
             ?>
     </head>
<body>

 	<div class="wrapper">
 	    <?php
             require_once $_SERVER["DOCUMENT_ROOT"] . '/views/wrapper.php';
             ?>

 	    <div class="main-panel">
 			<?php
             require_once $_SERVER["DOCUMENT_ROOT"] . '/views/navigation.php';
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
                                           <?php
                                           if (file_exists("../img/car" . $currentVehicule['pk_vehicule'] . ".jpg")) {
                                               echo '<div class="col-md-5 pull-right"><div class="form-group"><img src="../img/car' . $currentVehicule['pk_vehicule'] . '.jpg" />';
                                               echo '<label class="control-label">Image du véhicule</label><br><br>';
                                               echo '<input type="file" name="fileToUpload" id="fileToUpload" ><br>';
                                               echo '</div></div><div class="clearfix visible-xs"></div>';
                                           } else {
                                               echo '<div class="col-md-5 pull-right">';
                                               echo '<label class="control-label">Image du véhicule</label><br><br>';
                                               echo '<input type="file" name="fileToUpload" id="fileToUpload" ><br>';
                                               echo '</div><div class="clearfix visible-xs"></div>';
                                           } ?>
                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Marque</label>
                                                   <select class="form-control" id="marque" name="marque" required></select>
                                                   <label onclick="modMarque()">Modifier</label><label onclick="ajoutMarque()" style="float: right;">Ajouter</label>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Modèle</label>
                                                   <select class="form-control" id="modele" name="modele" required></select>
                                                   <label onclick="modModele()">Modifier</label><label onclick="ajoutModele()" style="float: right;">Ajouter</label>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Année</label>
                                                   <input type='number' class='form-control' id='annee' name='annee' maxlength="4" min="1950" pattern="\d{4}" value='<?php echo $currentVehicule['annee']; ?>' required>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Couleur</label>
                                                   <select class="form-control" id="couleur" name="couleur" required></select>
                                                   <label onclick="modCouleur()">Modifier</label><label onclick="ajoutCouleur()" style="float: right;">Ajouter</label>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Secteur</label>
                                                   <select class="form-control" id="secteur" name="secteur" required></select>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Odomètre</label>
                                                   <input type='number' class='form-control' id='odometre' name='odometre'maxlength='6' min='1' value='<?php echo $currentVehicule['odometre']; ?>' required>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Plaque</label>
                                                   <input type='text' class='form-control' id='plaque' name='plaque'maxlength='7' value='<?php echo $currentVehicule['plaque']; ?>' required>
                                               </div>
                                           </div>
                                       </div>

                                       <div>
                                           <div class="col-md-7">
                                               <div class="form-group label-static">
                                                   <label class="control-label">Date d'achat</label>
                                                   <input type='text' size="40" class="flatpickr form-control" data-enabletime=true data-enable-seconds=true name="date_acquisition" id='acquisition' required>
                                                   <script src="../js/flatpickr.js" type="text/javascript"></script>
                                                   <script>
                                                       flatpickr(".selector", {});
                                                       document.getElementById("acquisition").flatpickr({
                                                         defaultDate: "<?php echo $currentVehicule['date_achat']; ?>",
                                                         mode: "single",
                                                         disableMobile:true
                                                       });
                                                   </script>
                                               </div>
                                           </div>
                                       </div>

                                       <?php
                                       if ($currentVehicule['fk_statut'] ==="1")
                                       {
                                           echo "<div class='row'>
                                                   <div class='form-group col-md-8'>
                                                       <div class='checkbox'>
                                                           <label>
                                                               <input checked type='checkbox' id='active' name='optionsCheckboxes'>
                                                               <label for='active' class='control-label'>Véhicule actif</label>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>";
                                       } else {
                                           echo "<div class='row'>
                                                   <div class='form-group col-md-8'>
                                                       <div class='checkbox'>
                                                           <label>
                                                               <input type='checkbox' id='active' name='optionsCheckboxes'>
                                                               <label for='active' class='control-label'>Véhicule actif</label>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>";
                                       }
                                       ?>

                                       <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer">
                                       <input type="button" id="supprimer" class="btn pull-right" value="Supprimer" style="margin-right: 10px;">
                                       <input type="button" id="cancel" class="btn pull-right" value="Annuler" style="margin-right: 10px;">
                                       <div class="clearfix"></div>
                                   </form>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

 	        <?php
 			require_once $_SERVER["DOCUMENT_ROOT"] . '/views/footer.php';
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

        $("#marque").load("../controllers/getSelectMarques.php" + "?id=<?php echo $currentVehicule['fk_marque']; ?>");
        $("#modele").load("../controllers/getSelectModeles.php" + "?idMarque=<?php echo $currentVehicule['fk_marque']; ?>&idModele=<?php echo $currentVehicule['fk_modele']; ?>");
        $("#couleur").load("../controllers/getSelectCouleurs.php" + "?id=<?php echo $currentVehicule['fk_couleur']; ?>");
        $("#secteur").load("../controllers/getSelectSecteurs.php" + "?id=<?php echo $currentVehicule['fk_secteur']; ?>");

        $(document).on('change','#marque',function(){
          $("#modele").load("../controllers/getSelectModeles.php?idMarque=" + $('#marque').val() + "&idModele=0");
        });

        $(document).on("submit", "#formAjout", function(e) {
            e.preventDefault();
            var marque = $("#marque").val();
            var modele = $("#modele").val();
            var annee = $("#annee").val();
            var couleur = $("#couleur").val();
            var secteur = $("#secteur").val();
            var odometre = $("#odometre").val();
            var plaque = $("#plaque").val();
            var date = $("#acquisition").val();

            if ($('#active').is(':checked') == true) {
                var statut = 1;
            } else {
                var statut = 2;
            }

            if (marque && modele && annee && couleur && secteur && odometre && plaque && date) {
              swal({
                  title: "Modifié",
                  text: "Le véhicule a bien été modifié",
                  type: "success"
              }).then(function () {
                  var url = "../controllers/controller_vehicules.php?mod=1&id=<?php echo $_GET['id']; ?>";
                //location.href = "../controllers/controller_vehicules.php?mod=1&id=<?php echo $_GET['id']; ?>&marque=" + marque + "&modele=" + modele + "&annee=" + annee + "&couleur=" + couleur + "&secteur=" + secteur + "&odometre=" + odometre + "&plaque=" + plaque + "&date=" + date + "&statut=" + statut;
                  var form = $("#formAjout")[0];

                  var formData = new FormData(form);

                  $.ajax({
                      type: "POST",
                      url: url,
                      data: formData,
                      contentType: false,
                      processData: false,
                      success: function (response) {
                          console.log(response);
                          window.location.replace("/views/vehicule.php");
                      },
                      error: function (xhr, title, trace) {
                          console.error(title + trace);
                      }
                  });
              })
            }
        });

         $(document).on("click", "#supprimer", function(e) {
             e.preventDefault();
             swal({
                 title: "",
                 text: "Le véhicule sera mis hors service de façon permanente. Êtes-vous certain de vouloir continuer?",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonText: "Ok",
                 cancelButtonColor: "#969696",
                 cancelButtonText: "Annuler"
             }).then(function () {
                 location.href = "../controllers/controller_vehicules.php?supp=1&id=<?php echo $_GET['id']; ?>";
             })
         });

            $(document).on("click", "#cancel", function(e) {
                e.preventDefault();
                swal({
                    title: "",
                    text: "Les modifications vont être annulées.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ok",
                    cancelButtonColor: "#969696",
                    cancelButtonText: "Annuler"
                }).then(function () {
                    location.href = "../views/vehicule.php";
                })
            });

                 $('.navbar-header a').html("Modification de véhicule");

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

function ajoutMarque() {
  var answer = prompt("Veuillez entrer la nouvelle marque :");
  if (answer != null && answer != "") {
    location.href = "../controllers/ajouterMarqueModeleCouleur.php?type=marque&nom=" + answer;
  }
}

function ajoutModele() {
  var answer = prompt("Veuillez entrer le nouveau modèle :");
  if (answer != null && answer != "") {
    location.href = "../controllers/ajouterMarqueModeleCouleur.php?type=modele&marque=" + $("#marque").val() + "&nom=" + answer;
  }
}

function ajoutCouleur() {
  var answer = prompt("Veuillez entrer la nouvelle couleur :");
  if (answer != null && answer != "") {
    location.href = "../controllers/ajouterMarqueModeleCouleur.php?type=couleur&nom=" + answer;
  }
}

function modMarque() {
  if ($("#marque").val()) {
    var answer = prompt("Veuillez modifier la marque :", $("#marque option:selected").text());
  }
  if (answer != null && answer != "") {
    location.href = "../controllers/ajouterMarqueModeleCouleur.php?type=marque&mod=1&id="+$("#marque").val()+"&nom=" + answer;
  }
}

function modModele() {
  if ($("#modele").val()) {
    var answer = prompt("Veuillez modifier le modèle :", $("#modele option:selected").text());
  }
  if (answer != null && answer != "") {
    location.href = "../controllers/ajouterMarqueModeleCouleur.php?type=modele&mod=1&id="+$("#modele").val()+"&nom=" + answer;
  }
}

function modCouleur() {
  if ($("#couleur").val()) {
    var answer = prompt("Veuillez modifier la couleur :", $("#couleur option:selected").text());
  }
  if (answer != null && answer != "") {
    location.href = "../controllers/ajouterMarqueModeleCouleur.php?type=couleur&mod=1&id="+$("#couleur").val()+"&nom=" + answer;
  }
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
