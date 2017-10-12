<!doctype html>
<html lang="en">
<head>
	    <title>Avizo - Notifications</title>
	<?php 
            require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/views/header.php';
            session_start();
            error_reporting(1);
//            if($_SESSION['loggedIn']==false){
//                echo '<script type="text/javascript">'; 
//                echo 'alert("Vous n\'êtes pas connecté.");'; 
//                echo 'window.location.href = "../views/signin.php";';
//                echo '</script>';
//            }
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
	                <div class="card">
	                    <div class="card-header" data-background-color="purple">
	                        <h4 class="title">Notifications</h4>
	                        <p class="category">Handcrafted by our friend <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a></p>
	                    </div>
	                    <div class="card-content">
	                        <div class="row">
	                            <div class="col-md-6">
	                                <h5>Notifications Style</h5>
	                                <div class="alert alert-info">
	                                    <span>This is a plain notification</span>
	                                </div>
	                                <div class="alert alert-info">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <span>This is a notification with close button.</span>
	                                </div>
	                                <div class="alert alert-info alert-with-icon" data-notify="container">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <i data-notify="icon" class="material-icons">add_alert</i>
	                                    <span data-notify="message">This is a notification with close button and icon.</span>
	                                </div>
	                                <div class="alert alert-info alert-with-icon" data-notify="container">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <i data-notify="icon" class="material-icons">add_alert</i>
	                                    <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <h5>Notification states</h5>
	                                <div class="alert alert-info">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <span><b> Info - </b> This is a regular notification made with ".alert-info"</span>
	                                </div>
	                                <div class="alert alert-success">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
	                                </div>
	                                <div class="alert alert-warning">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <span><b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
	                                </div>
	                                <div class="alert alert-danger">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <span><b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
	                                </div>
									<div class="alert alert-primary">
	                                    <button type="button" aria-hidden="true" class="close">×</button>
	                                    <span><b> Primary - </b> This is a regular notification made with ".alert-primary"</span>
	                                </div>
	                            </div>
	                        </div>

	                        <br>
	                        <br>

	                        <div class="places-buttons">
	                            <div class="row">
	                                <div class="col-md-6 col-md-offset-3 text-center">
	                                    <h5>Notifications Places
	                                        <p class="category">Click to view notifications</p>
	                                    </h5>
	                                </div>
	                            </div>
	                            <div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="col-md-4">
		                                    <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','left')">Top Left</button>
		                                </div>
		                                <div class="col-md-4">
		                                    <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','center')">Top Center</button>
		                                </div>
		                                <div class="col-md-4">
		                                    <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','right')">Top Right</button>
		                                </div>
									</div>
	                            </div>
	                            <div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="col-md-4">
		                                    <button class="btn btn-primary btn-block" onclick="demo.showNotification('bottom','left')">Bottom Left</button>
		                                </div>
		                                <div class="col-md-4">
		                                    <button class="btn btn-primary btn-block" onclick="demo.showNotification('bottom','center')">Bottom Center</button>
		                                </div>
		                                <div class="col-md-4">
		                                    <button class="btn btn-primary btn-block" onclick="demo.showNotification('bottom','right')">Bottom Right</button>
		                                </div>
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
            	
                var active = activePage.substring(activePage.lastIndexOf('/') + 1);
                console.log(active);
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
                $('.navbar-header a').html("Notifications");
    	});
	</script>

</html>
