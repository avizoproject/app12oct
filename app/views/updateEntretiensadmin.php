<?php
/****************************************************************
 * File : modifyReservation.php
 * Authour : Jérémy Besserer-Lemay
 * Functionality : Page to modify a vehicule's reservation
 * Date: 2017-10-03
 *
 * Last modification:
 * 2017-10-03     Jérémy Besserer-Lemay   1 Creation
 * 2017-10-06     Frédérick Morin         2 Ajout calendrier
 * 2017-10-03     Frédérick Morin         3 Modification calendrier
 ******************************************************************/
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_entretien.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_invoice.php';

$listVehicule = new InfoVehicule();
$gEntretien = new InfoEntretien();
$currentEntretien = $gEntretien->getObjectFromDB($_GET["id"]);
$date = date_create($currentEntretien['date_entretien']);
$date = date_format($date,"Y-m-d");
$gFacture = new InfoInvoice();


?>
<html>
<head>
    <title>Avizo - Modification d'un entretien</title>
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
                                <h4 class="title">Formulaire d'ajout</h4>
                                <p class="category">Tous les champs sont obligatoires.</p>
                            </div>
                            <div class="card-content">

                                <form id="formAjout">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">

                                                <label class="control-label">Choisissez un garage</label>
                                                <select class="form-control" id="garage" name="garage"
                                                        required></select><label onclick="ajoutGarage()" style="float: right;">Ajouter</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">
                                                <label class="control-label">Date</label>
                                                <input type='text' size="40" class="flatpickr form-control"
                                                       name="date" id='acquisition'
                                                       placeholder="Choisissez la date de l'entretien" required>

                                                <script src="../js/flatpickr.js" type="text/javascript"></script>
                                                <script>
                                                    flatpickr(".selector", {});
                                                    document.getElementById("acquisition").flatpickr({
                                                        disableMobile:true,
                                                        defaultDate: <?php echo "'".$currentEntretien['date_entretien']."'";  ?>

                                                    });
                                                </script>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">

                                                <label class="control-label">Choisissez un véhicule</label>
                                                <select class="form-control" id="vehicule" name="vehiculefk"
                                                        required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">

                                                <label class="control-label">Choisissez le type d'entretien</label>
                                                <select class="form-control" id="type" name="type"
                                                        required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">
                                                <label class="control-label">Coût</label>
                                                <input type="number" class="form-control" id="cout" name="cout" maxlength="7" value="<?php echo $currentEntretien["cout_entretien"] ?>" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">
                                                <label class="control-label">Odomètre</label>
                                                <input type="number" class="form-control" id="odometre" name="odometre" value="<?php echo $currentEntretien["odometre_entretien"] ?>" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">
                                                <label class="control-label">Description</label>
                                                <textarea class="form-control" id="description" name="description"><?php echo $currentEntretien["description"] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-static">
                                                <label class="control-label">Facture</label>
                                                <?php
                                                    echo '<img src="../'. $gFacture->findFactureByFk($currentEntretien["pk_entretien"]) .'"/>';
                                                ?>
                                                <input type="file" class="btn-default" name="fileToUpload" id="fileToUpload">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" id="confirmer" class="btn pull-right" value="Confirmer">
                                    <input type="submit" id="supprimer" class="btn pull-right" value="Supprimer" style="margin-right: 10px;">
                                    <input type="submit" id="cancel" class="btn pull-right" value="Annuler"
                                           style="margin-right: 10px;">
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
    function ajoutGarage() {
        var name = prompt("Veuillez entrer le nom du garage :");
        var tel = prompt("Veuillez entrer le téléphone du garage :");
        var desc = prompt("Veuillez entrer l'adresse du garage :");
        if (name != null && name != "" && tel != null && tel != "" && desc != null && desc != "") {
            location.href = "../controllers/ajouterGarage.php?nom=" + name + "&tel=" + tel + "&desc=" + desc;
        }
    }

    $(document).ready(function () {
        $("#vehicule").load("../controllers/getSelectAllVehicules.php?pk=<?php echo $currentEntretien["fk_vehicule"]; ?>");
        $("#garage").load("../controllers/getSelectGarage.php?pk=<?php echo $currentEntretien["fk_garage"]; ?>");
        $("#type").load("../controllers/getSelectTypeEntretien.php?pk=<?php echo $currentEntretien["fk_type_entretien"]; ?>");

        $(document).on("click", "#confirmer", function (e) {
            e.preventDefault();
            swal({
                title: "Ajouté",
                text: "L'entretien a bien été modifié.",
                type: "success"
            }).then(function () {

                    var form = $("#formAjout")[0];
                    var id = <?php echo $currentEntretien["pk_entretien"]; ?>;
                    var formData = new FormData(form);

                    $.ajax({method : "POST",
                        url : "../controllers/controller_entretien.php?mod=1&id=" + id,
                        data : formData,
                        async: false,
                        cache: false,
                        contentType: false,

                        processData: false,
                        beforeSend : function() {
                            // TO INSERT - loading animation
                        },
                        success : function(response) {
                            console.log(response);
                            window.location.replace("http://localhost/app/app/views/entretien.php");
                        },
                        error : function(xhr, title, trace) {
                            console.error(title + trace);
                        }


                    });


            })
        });

        $(document).on("click", "#cancel", function (e) {
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
                location.href = "../views/entretien.php";
            })
        });

        $(document).on("click", "#supprimer", function(e) {
            e.preventDefault();
            swal({
                title: "",
                text: "L'entretien va être supprimé.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ok",
                cancelButtonColor: "#969696",
                cancelButtonText: "Annuler"
            }).then(function () {
                location.href = "../controllers/controller_entretien.php?supp=1&id=<?php echo $_GET['id']; ?>";
            })
        });

        $('.navbar-header a').html("Ajout d'entretien");

        function removeTime(dateStr) {
            var parts = dateStr.split(" ");
            return parts[0];
        }

    });


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


    function erreurNonCon() {
        swal({
            title: "Erreur",
            type: "error",
            text: "Vous n'êtes pas connecté!",
            timer: 2000,
            showConfirmButton: false,
            animation: "pop"
        });
        setTimeout(function () {
            window.location.href = '../views/signin.php';
        }, 1800);
    }
</script>

<?php
if ($_SESSION['loggedIn'] == false) {
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
    if (!window.jQuery) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="../js/calendarMain.js"></script> <!-- Resource jQuery -->
</html>