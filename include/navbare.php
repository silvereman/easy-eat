<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	?>



<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/navbare.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">		
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 


<header id="header">
	<div class="logo"><a href="../index.php">Easy Eat</a></div>
	<nav id="navbar">
		<ul>
			<?php
			if(!isset($_SESSION['nom']))
			{
				echo 
				"<li><a href=\"connexion.php\" class=\"login\"><i class=\"fas fa-user\"></i> Se connecter</a></li>
				<li><a href=\"inscription.php\" class=\"login\"><i class=\"fas fa-user-plus\"></i> S'inscrire</a></li>
				<li><a href=\"livreur.php\" class=\"login\"><i class=\"fas fa-bicycle\"></i> Easy Livreur</a></li>
				<li><a href=\"restaurant.php\" class=\"login\"><i class=\"fas fa-concierge-bell\"></i> Zone Restaurateur</a></li>";
			}
			else
			{	
				if ($_SESSION['table'] == "clients") {
					echo 
					"<li class=\"login\">
						<a href=\"gestionuser.php\" ><i class=\"fas fa-user\"></i> ".$_SESSION['nom']."</a>
					</li>
					<li class=\"login\">
						<a href=\"deconnexion.php\" ><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>
					</li>";	
				}else{
					if ($_SESSION['table'] == "restaurateurs") {
						echo 
						"<li class=\"login\">
							<a href=\"gestion1.php\"><i class=\"fas fa-user\"></i> ".$_SESSION['nom']."</a>
						</li>
						<li class=\"login\">
							<a href=\"deconnexion.php\"><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>
						</li>";	
					}else{
						echo 
						"<li class=\"login\">
							<a href=\"gestion1.php\"><i class=\"fas fa-user\"></i> ".$_SESSION['nom']."</a>
						</li>
						<li class=\"login\">
							<a href=\"deconnexion.php\"><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>
						</li>";	
					}
				}					
			}
			?>
		</ul>
	</nav>
	<!-- Pas touche -->
	<div class="open">
		<i class="fas fa-bars"></i>
	</div>
	<script src="../script/bar.js"></script>
	<!-- Pas touche -->
</header>