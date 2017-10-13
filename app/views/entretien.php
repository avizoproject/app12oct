<!doctype html>
<html lang="en">
<head>
    	<title>Avizo - Entretiens</title>
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
	                        <div class="card card-plain">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Material Design Icons</h4>
	                                <p class="category">Handcrafted by our friends from <a target="_blank" href="https://design.google.com/icons/">Google</a></p>
	                            </div>
	                            <div class="card-content">
									<div class="iframe-container hidden-sm hidden-xs">
										<iframe src="https://design.google.com/icons/">
											<p>Your browser does not support iframes.</p>
										</iframe>
									</div>
									<div class="col-md-6 hidden-lg hidden-md text-center">
										<h5>The icons are visible on Desktop mode inside an iframe. Since the iframe is not working on Mobile and Tablets please visit the icons on their original page on Google. Check the  <a href="https://design.google.com/icons/" target="_blank">Material Icons</a></h5>
									</div>
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

			// Javascript method's body can be found in assets/js/demos.js
        	
                
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
                $('.navbar-header a').html("Entretiens");
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

</html>
