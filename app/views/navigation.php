<?php
echo "<nav class='navbar navbar-transparent navbar-absolute'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle' data-toggle='collapse'>
							<span class='sr-only'>Toggle navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='#'>Accueil</a>
					</div>
					<div class='collapse navbar-collapse'>
						<ul class='nav navbar-nav navbar-right'>
							
							<li class='dropdown'>
								<a href='notifications.php' class='dropdown-toggle' data-toggle='dropdown'>
									<i class='material-icons'>notifications</i>
									<span class='notification'>33</span>
									<p class='hidden-lg hidden-md'>Notifications</p>
								</a>
								<ul class='dropdown-menu'>
                                                                    <li><a href='notifications.php'>Mike John responded to your email</a></li>
									
								</ul>
							</li>
							<li class='dropdown'>
								<a href='#pablo' class='dropdown-toggle' data-toggle='dropdown'>
	 							   <i class='material-icons'>person</i>
	 							   <p class='hidden-lg hidden-md'>Profil</p>
		 						</a>
                                                            <ul class='dropdown-menu'>
                                                                <li><a href='../views/profil.php'>Profil</a></li>
                                                                <li><a href='../views/signin.php'>Se déconnecter</a></li>									
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</nav>";


?>

