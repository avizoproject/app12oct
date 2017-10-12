<!doctype html>
<html lang="en">
<head>
    	<title>Avizo - Profil</title>
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
	                <div class="row">
	                    <div class="col-md-8 center-block float-none">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Modifier mon profil</h4>
									<p class="category">Tous les champs sont obligatoires</p>
	                            </div>
	                            <div class="card-content">
	                                <form>
	                                    <div class="row">	                                        
	                                        
	                                        <div class="col-md-5 center-block float-none">
												<div class="form-group label-floating">
													<label class="control-label">Adresse courriel</label>
													<input type="email" disabled="true" class="form-control" value="<?php echo $_SESSION['user']['courriel']?>">
												</div>
	                                        </div>
                                                
	                                    </div>
                                            <div class="row">	 
	                                    <div class="col-md-5 center-block float-none">
												<div class="form-group label-floating">
													<label class="control-label">Mot de passe</label>
													<input type="password" class="form-control" value="<?php echo $_SESSION['user']['mot_de_passe']?>">
												</div>
	                                        </div>
	                                    </div>
	                                    </div>

	                                    
	                                    <button type="submit" class="btn margin-button pull-right">Modifier</button>
	                                    <div class="clearfix"></div>
	                                </form>
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
                $('.navbar-header a').html("Mon profil");
    	});
	</script>

</html>