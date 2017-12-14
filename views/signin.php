<!doctype html>

<?php
    session_start();
if (session_status() == true) {
    $_SESSION["loggedIn"] = false;
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
    }

    session_unset();
    session_destroy();
}
?>

<head>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/views/header.php';
    ?>
</head>
<body>
<div class="page-signin">

    <div class="center-block">
        <div class="center-block">
            <section class="logo">

                  <img class="center-block" src="../img/avizo-logo.png">

            </section>
        </div>
    </div>

    <div class="main-body">
        <div class="container">
            <div class="form-container">

                <br/>

                <form class="form-horizontal" action="/controllers/controller_login.php" method="post">
                    <fieldset>
                        <div class="row">
                            <div class="center-block float-none col-md-4">
                                <div class="form-group label-static">
                                    <label class="control-label">Adresse courriel</label>
                                    <input class="form-control" name="email" type="text">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="center-block float-none col-md-4">
                                <div class="form-group label-static">
                                    <label class="control-label">Mot de passe</label>
                                    <input class="form-control" name="password" type="password">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="">
                          <input type="submit" class="btn center-block" value="Se connecter">
                        </div>
                        <br>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</div>

</body>
	<!--   Core JS Files   -->
	<script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
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

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});

        function badConnection(){
            swal({
                title: "Erreur",
                type: "error",
                text: "Les informations entrées sont invalides.",
                showCancelButton: false,
                confirmButtonText: "Ok",
                animation : "pop",
                allowOutsideClick : false
            }).then(function () {
                location.href = "../views/signin.php";
            })
        }
	</script>

<?php
if(isset($_GET['error'])){
    echo '<script type="text/javascript">',
    'badConnection();',
    '</script>';
    $_GET['error']= null;
}
?>
