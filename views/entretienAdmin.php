<?php
/****************************************************************
 * File : vehicule.php
 * Authour : Jérémy Besserer-Lemay
 * Functionality : Page to consult vehicules and change their informations
 * Date: 2017-10-26
 *
 * Last modification:
 * 2017-10-26    Jérémy Besserer-Lemay   1 Creation
 ******************************************************************/
session_start();
error_reporting(0);
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/info_reservation.php';
$gEntretiens = new InfoReservation();
?>
<html>
<head>
    <title>Avizo - Entretiens à venir</title>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Entretiens à venir</h4>
                                <p class="category">Liste des entretiens importants à venir</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table" id="example">
                                    <thead class="text-primary">
                                        <th class="hidden">ID Entretien</th>
                                        <th>Véhicule</th>
                                        <th>Dernier entretien</th>
                                        <th>Odomètre actuel</th>
                                        <th>Entretien à faire</th>
                                    </thead>
                                    <tbody>
                                    <?php $gEntretiens->getListEntretiens(1);
                                    $gEntretiens->getListEntretiens(2);
                                    $gEntretiens->getListEntretiens(5); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="margin-button2">
                            <button class="btn btn-default" name="Ajouter" id="Ajouter">Ajouter</button>
                            <button class="btn btn-default" name="Imprimer" id="Imprimer">Imprimer</button>
                            <button class="btn btn-default" name="Historique" id="Historique">Historique</button>
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
<script src='https://code.jquery.com/ui/1.10.4/jquery-ui.min.js' type='text/javascript' language='javascript'></script>

<script type="text/javascript">
    $(document).ready(function () {

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

        $('#Historique').click(function () {
          window.location.href = "entretienHistorique.php";
        });

        $('#Imprimer').click(function () {
          var divToPrint = document.getElementById('example');
          var htmlToPrint = '' +
              '<style type="text/css">' +
              'table {' +
              'border-collapse:collapse;' +
              '}' +
              'table th, table td {' +
              'border:1px solid #000;' +
              'padding:0.5em;' +
              'text-align:center;' +
              '}' +
              '</style>' +
              '<h1>Entretiens à faire</h1>';
          htmlToPrint += divToPrint.outerHTML;
          newWin = window.open("");
          newWin.document.write(htmlToPrint);
          newWin.print();
          newWin.close();
        });

        $('#Ajouter').click(function () {
          window.location.href = "addEntretiensadmin.php";
        });

        var activePage = window.location.href;

        var active = activePage.substring(activePage.lastIndexOf('/') + 1);

        $('.sidebar-wrapper a').each(function () {
            var linkPage = this.href;

            if (activePage == linkPage) {
                $(this).closest("li").addClass("active");
                $('li').each(function () {
                    //$(this).closest("a").removeClass("navigation1");

                    $(this).closest("li").removeClass("active");
                });
                $(this).closest("li").addClass("active");
            }

        });

        $('.navbar-header a').html("Entretiens");
    });


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
<script>
    if (!window.jQuery) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
</html>
