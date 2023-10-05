<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	 if (!empty($_GET['adress']))
	 {
	 	if($_GET['adress'] == "Bobo" || $_GET['adress'] == "bobo"){
			$_GET['adress'] = "Bobo-Dioulasso";
		}
		if($_GET['adress'] == "Ouaga"){
			$_GET['adress'] = "Ouagadougou";
		}
		$_SESSION['ville']=$_GET['adress'];
		header('Location:page/commande.php');
		

	 }
	if (isset($_GET['ouaga']) && $_GET['ouaga']=="Ouagadougou"){

		$base=mysqli_connect("localhost","root","","easyeatdatabase");
		$requete1="SELECT * FROM easyeatdatabase.restaurant WHERE (ville='".mysqli_real_escape_string($base,$_GET['ouaga'])."')";
		$resultat1=mysqli_query($base,$requete1) or die("Erreur SQL ! <br />".$requete1."<br />".mysqli_error($base));
		$data1=mysqli_fetch_array($resultat1);
		//session_start();
		$_SESSION['ville']="Ouagadougou";
		$_SESSION['liste']=$data1;
		header('Location:page/commande.php');
	}else{
		if (isset($_GET['bobo']) && $_GET['bobo']=="Bobo-Dioulasso"){

			$base=mysqli_connect("localhost","root","","easyeatdatabase");
			$requete1="SELECT * FROM easyeatdatabase.restaurant WHERE (ville='".mysqli_real_escape_string($base,$_GET['bobo'])."')";
			$resultat1=mysqli_query($base,$requete1) or die("Erreur SQL ! <br />".$requete1."<br />".mysqli_error($base));
			$data1=mysqli_fetch_array($resultat1);
			//session_start();
			$_SESSION['ville']="Bobo-Dioulasso";
			$_SESSION['liste']=$data1;
			header('Location:page/commande.php');
		}else{
			if (isset($_GET['banfora']) && $_GET['banfora']=="Banfora"){

				$base=mysqli_connect("localhost","root","","easyeatdatabase");
				$requete1="SELECT * FROM easyeatdatabase.restaurant WHERE (ville='".mysqli_real_escape_string($base,$_GET['banfora'])."')";
				$resultat1=mysqli_query($base,$requete1) or die("Erreur SQL ! <br />".$requete1."<br />".mysqli_error($base));
				$data1=mysqli_fetch_array($resultat1);
				//session_start();
				$_SESSION['ville']="Banfora";
				$_SESSION['liste']=$data1;
				header('Location:page/commande.php');
			}else{
					if (isset($_GET['kdg']) && $_GET['kdg']=="Koudougou"){

						$base=mysqli_connect("localhost","root","","easyeatdatabase");
						$requete1="SELECT * FROM easyeatdatabase.restaurant WHERE (ville='".mysqli_real_escape_string($base,$_GET['kdg'])."')";
						$resultat1=mysqli_query($base,$requete1) or die("Erreur SQL ! <br />".$requete1."<br />".mysqli_error($base));
						$data1=mysqli_fetch_array($resultat1);
						//session_start();
						$_SESSION['ville']="Koudougou";
						$_SESSION['liste']=$data1;
						header('Location:page/commande.php');

					}
			}
		}
	}

	?>

<!DOCTYPE html>
<html>
	<head>
		<title>Easy-Eat: Commandez en toute simplicité</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style-index.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<link rel="shortcut icon" type="image/png" href="image/ee.png">
	</head>
	<body>
		<header>
			<div class="logo"><a href="index.php">Easy Eat</a></div>
			<nav>
				<ul>
				<?php
					if(!isset($_SESSION['nom']))
					{
						echo 
						"<li><a href=\"page/connexion.php\" class=\"login\"><i class=\"fas fa-user\"></i> Se connecter</a></li>
						<li><a href=\"page/inscription.php\" class=\"login\"><i class=\"fas fa-user-plus\"></i> S'inscrire</a></li>
						<li><a href=\"page/livreur.php\" class=\"login\"><i class=\"fas fa-bicycle\"></i> Easy Livreur</a></li>
						<li><a href=\"page/restaurant.php\" class=\"login\"><i class=\"fas fa-concierge-bell\"></i> Zone Restaurateur</a></li>";
					}
					else
					{
						
						if ($_SESSION['table'] == "clients") {
							echo 
							"<li class=\"login\">
								<a href=\"page/gestionuser.php\" ><i class=\"fas fa-user\"></i> ".$_SESSION['nom']."</a>
							</li>
							<li class=\"login\">
								<a href=\"page/deconnexion.php\" ><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>
							</li>";	
						}else{
							if ($_SESSION['table'] == "restaurateurs") {
								echo 
								"<li class=\"login\">
									<a href=\"restaurant/gestion1.php\"><i class=\"fas fa-user\"></i> ".$_SESSION['nom']."</a>
								</li>
								<li class=\"login\">
									<a href=\"page/deconnexion.php\"><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>
								</li>";	
							}else{
								echo 
								"<li class=\"login\">
									<a href=\"page/gestionuser.php\" ><i class=\"fas fa-user\"></i> ".$_SESSION['nom']."</a>
								</li>
								<li class=\"login\">
									<a href=\"page/deconnexion.php\" ><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>
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
			<script src="script/bar.js"></script>
			<!-- Pas touche -->
		</header>


		<section id="corps"> 
			
			<section class="box-commande">
				<h2>COMMANDEZ EN TOUTE SIMPLICITE</h2>
				<form name="commande" method="post">
					<label class="adress">Adresse</label><input type="text" name="adress" class="boxed" placeholder="ex: Bobo-Dioulasso, Ouagadougou..."><br>
					<input type="submit"  name="commande"  class="button" value="Je commande">
				</form>
			</section>

			<section class="bas-du-corps">
				<h2 class="euh">Travaillons ensemble!</h2>
				<div class="container">
					<div class="boxe">
						<div class="content">
							<h2><i class="fas fa-bicycle"></i></h2>
							<h3>Devenir Easy-Livreur</h3>
							<p>Deviens coursier et travaille en toute liberté. Profite d'une rémunération attractive avec Easy-Eat</p>
							<a href="page/inscription.php" class="btn">Devenir Livreur</a>
						</div>
					</div>
					<div class="boxe">
						<div class="content">
							<h2><i class="fas fa-concierge-bell"></i></h2>
							<h3>Devenir Restaurateur</h3>
							<p>Devenez partenaire de Easy-Eat et attirez encore plus de clients. Gérer ou laisser nous gérer la livraison, vous ne gérez que la préparation !</p>
							<a href="page/restaurant.php" class="btn">Devenir Partenaire</a>
						</div>
					</div>
					<div class="boxe">
						<div class="content">
							<h2><i class="far fa-handshake"></i></h2>
							<h3>Qui sommes nous</h3>
							<p>Un groupe d'étudiants passionés par la technologie et par la création de nombreuses choses pour faciliter la vie.</p>
							<a href="#" class="btn">En savoir plus</a>
						</div>
					</div>
				</div>
			</section>
			<section class="suite-bas-corps">
				<h2>Easy Eat: Commandez en toute simplicité</h2>
				<p>
					Le restaurant doit disposer d’assez de personnel pour faire face aux commandes sur place et en ligne. Même si le nombre de commandes augmente, le restaurateur devrait aussi vérifier que sa marge sur chaque commande après commission couvre encore les frais fixes de l’établissement.
					Des plats transportables et correctement emballés feront la différence.
					En étant mis en avant sur un site de service de livraison à domicile, le restaurant profite de plus de visibilité : un moyen de conquérir de nouveaux clients.
					Notre mission est de révolutionner la manière dont vous commandez vos plats. C'est un projet ambitieux, comme nous. Et nous avons besoin de vous pour nous aider !. Découvrez l’ensemble de nos restaurants disponibles en livraison à domicile près de chez vous en commençant par renseigner votre adresse plus haut. Une fois géolocalisé, on vous proposera tous les restos en livraison à coté de chez vous et ce sera à vous de jouer, ou plutôt de vous faire plaisir ! Se faire livrer à manger n’a jamais été aussi facile, surtout avec notre food community qui partage son expérience pour vous aider à choisir ! Bon appétit !
				</p>
			</section>

		</section>

		<footer>
			<section class="tete-pied">
				<div class="site-plan">
					<div class="content">
						<h3>Contact</h3>
						<ul>
							<li><i class="fas fa-map-marked-alt"></i> Adresse: Bobo-Dioulasso</li>
							<li><i class="fas fa-mobile"></i> Telephone: <a href="tel:+22665212279">+22665212279</a></li>
							<li><i class="far fa-envelope"></i> Email EasyEat: <a href="mailto:easyeat_easylife@yahoo.com">easyeat_easylife@yahoo.com</a></li>
							<li><i class="far fa-envelope"></i> Email EasyLife: <a href="mailto:contact_easylife@yahoo.com">contact_easylife@yahoo.com</a></li>
						</ul>
					</div>

					<div class="content">
						<h3>Conseils Pratiques</h3>
						<p>
							Le restaurant doit disposer d’assez de personnel pour faire face aux commandes sur place et en ligne. Même si le nombre de commandes augmente, le restaurateur devrait aussi vérifier que sa marge sur chaque commande après commission couvre encore les frais fixes de l’établissement.
							<br> Des plats transportables et correctement emballés feront la différence.
							<br> En étant mis en avant sur un site de service de livraison à domicile, le restaurant profite de plus de visibilité : un moyen de conquérir de nouveaux clients.
						</p>
					</div>

					<div class="content idem">
						<h3>Liens Rapides</h3>
						<ul>
							<li><a href="index.php">Acceuil</a></li>
							<li><a href="">Blog</a></li>
							<li><a href="">A propos</a></li>
							<li><a href="">FAQ</a></li>
							<li><a href="">Easy-Life</a></li>
						</ul>
					</div>

					<div class="content idem">
						<h3>Villes</h3>
						<ul>
							<li>
								<form method="POST" name="ouaga">
									<input class="bouton" type="submit" name="ouaga" value="Ouagadougou">
								</form>
							</li>
							<li>
								<form method="POST" name="bobo">
									<input class="bouton" type="submit" name="bobo" value="Bobo-Dioulasso">	
								</form>
							</li>
							<li>
								<form method="POST" name="banfora">
									<input class="bouton" type="submit" name="banfora" value="Banfora">
								</form>
							</li>
							<li>
								<form method="POST" name="kdg">
									<input class="bouton" type="submit" name="kdg" value="Koudougou">
								</form>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<section class="milieu">
				<div class="box">
					<h4>Devenir Restaurateur Easy Eat</h4>
					<p>Faites la promotion de votre restaurant à travers Easy Eat</p>
					<a class="btn" href="page/restaurant.php">S'inscrire Maintenant</a>
				</div>
				<div class="box">
					<h4>Devenir Livreur Easy Eat</h4>
					<p>Faites-vous de l'argent en livrant des plats grace à Easy Eat</p>
					<a class="btn" href="page/livreur.php">S'inscrire Maintenant</a>
				</div>
			</section>
			<section class="social-icon">
				<ul>
					<li><a href="https://www.facebook.com/Easy-Life-Bobo-Dioulasso-725186737931752/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-github"></i></a></li>
					<li><a href="https://twitter.com/EasyLif36005001"><i class="fab fa-twitter" target="_blank"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
				</ul>
			</section>
			<section class="fin">
				<ul>
					<li><a href="">Mentions Légales</a></li>
					<li>Copyright &copy 2019 Easy-Life. Tout droit reservé</li>
					<li><a href="">Conditions Générales d'utilisation</a></li>
				</ul>
			</section>
		</footer>
	</body>
</html>