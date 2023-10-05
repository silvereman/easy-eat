<?php 
session_start();
	if (isset($_GET['vas'])=="S'inscrire"){
		if (!empty($_SESSION['nom'])) {
			header("Location: ../index.php");
			exit();
		}else{
			header("Location: inscription-livreur.php");
		}
		
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Easy-Eat: Commandez en toute simplicité</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/style-livreur.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet"> 
		<link rel="shortcut icon" type="image/png" href="../image/ee.png">
	</head>
	<body>
		<?php require'../include/navbare.php';?>
		
		<section class="corps">
			<section class="part1">
				<div class="connect">
					<h1>Easy Livreur</h1>
					<p>
						Devenez coursier <br> travaillez en toute liberté.<br>  Profitez d'une rémunération attractive <br>avec Easy-Eat.
					</p>
					<form method="post">
						<input type="submit" name="vas" class="btn" value="S'inscrire">
					</form>
						

				</div>
				<div class="imageBx"></div>
			</section>
			<section class="part2">
				<div class="imgebx"></div>
				<div class="content">
					
					<h2>Choisissez quand livrer</h2>
					<p>En tant que prestataire indépendant, vous êtes libre de rouler quand vous le souhaitez et selon vos besoins.Easy-Eat vous aidera à planifier votre activité à l’avance.</p> 
				</div>
			</section>
			<section class="part3">
				<h2>Des revenus rapides et élevés</h2>
				<div class="container">
					<div class="content">
						<ul>
							<li>
								<div class="log">
									<i class="fas fa-bicycle"></i>
								</div>
								<div class="text">
									<h3>Livraison<br>
									<span>Gagnez 80% sur chaque livraison</span></h3>
								</div>
							</li>
							<li>
								<div class="log">
									<i class="fas fa-money-bill"></i>
								</div>
								<div class="text">
									<h3>Pourboire<br>
									<span>Gardez 100% des pourboires</span></h3>
								</div>
							</li>
						</ul>
					</div>
					<div class="imageBx"></div>
				</div>
			</section>
			<section class="part4">
				<div class="partie1">
					<span>Vous aurez besoin</span>
					<ul>
						<li><i class="fas fa-check-square"></i> D'un velo ou d'une moto pour les livraisons. Et les équipements de protection comme les casques</li>
						<li><i class="fas fa-check-square"></i> D'un téléphone android pour recevoir les alertes livraisons et plannifiez vos horaires.</li>
					</ul>
				</div>
				<div class="partie2">
					<span>On vous offrira</span>
					<ul>
						<li><i class="fas fa-check-square"></i> Un t-shirt Easy-Eat</li>
						<li><i class="fas fa-check-square"></i> Un sac pour la livraison</li>
					</ul>
				</div>
			</section>
			<section class="part5">
				<h4>Commençons</h4> 
				<form method="post">
					<input type="submit" name="vas" class="btn1" value="S'inscrire">
				</form>
			</section>
		</section>
		<?php require '../include/footer.php';?>
	</body>
</html>