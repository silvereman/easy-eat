<?php 
session_start();
	if (isset($_GET['vas'])=="S'inscrire"){
		if (!empty($_SESSION['nom'])) {
			header("Location: ../index.php");
			exit();
		}else{
			header("Location: inscription-restaurant.php");
		}
		
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Easy-Eat: Commandez en toute simplicité</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/style-restaurant.css">
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
					<h1>Restaurateur Easy Eat</h1>
					<p>
						Rejoignez les Restaurateurs Easy-Eat
					</p>
					<form method="post">
						<input type="submit" name="vas" class="btn" value="S'inscrire">
					</form>
				</div>
				<div class="imageBx"></div>
			</section>
			<section class="suite">
				<h3>Développez votre business et boostez vos commandes en devenant restaurateur partenaire avec le service de commande de repas en ligne Easy-Eat</h3>
				<section class="part2">
					<div class="content">
						<i class="fas fa-shopping-basket"></i>
						<h4>Plus de commandes</h4>
						<p>Nous faisons la meilleure promotion possible de votre restaurant pour qu'il apparaisse dans le plus de résultats de recherche et sur le plus d’écrans possible. Nous vous proposons de nouvelles façons de gagner des clients et travaillons avec vous pour fidéliser votre clientèle actuelle.</p>
					</div>
					<div class="content">
						<i class="fas fa-money-bill-wave"></i>
						<h4>Boostez vos commandes</h4>
						<p>En faisant partie de la communauté Easy-Eat vous accédez à une clientèle plus importante et par conséquent augmentez votre chiffre d'affaires</p>
					</div>
					<div class="content">
						<i class="fas fa-receipt"></i>
						<h4>De la valeur ajoutée</h4>
						<p>Nous vous proposons un ensemble de services faciles et simple à utiliser : vous gagnez du temps et vous gagnez en visibilité !</p>
					</div>
				</section>
				<h3>Etapes à suivre</h3>
				<section class="part3">
					<div class="content">
						<div class="circle">
							<span>1</span>
						</div>
						<h4>Inscrivez-vous</h4>
					</div>
					<div class="fleche">
						<i class="fas fa-angle-double-right"></i>
					</div>
					<div class="content">
						<div class="circle">
							<span>2</span>
						</div>
						<h4>Payez l'abonnement de votre choix</h4>
					</div>
					<div class="fleche">
						<i class="fas fa-angle-double-right"></i>
					</div>
					<div class="content">
						<div class="circle">
							<span>3</span>
						</div>
						<h4>Profitez de nos services</h4>
					</div>
				</section>
				<section class="part4">
					<h4>Quelques conseils pour commencer</h4>
					<p>Le restaurant doit disposer d’assez de personnel pour faire face aux commandes sur place et en ligne. Même si le nombre de commandes augmente, le restaurateur devrait aussi vérifier que sa marge sur chaque commande après commission couvre encore les frais fixes de l’établissement.
					Des plats transportables et correctement emballés feront la différence. 
					En étant mis en avant sur un site de service de livraison à domicile, le restaurant profite de plus de visibilité : un moyen de conquérir de nouveaux clients.</p>
				</section>
			</section>
			<section class="part5">
				<h2>Se lancer</h2>
				<form method="post">
					<input type="submit" name="vas" class="btn" value="S'inscrire">
				</form>
			</section>
		</section>
		<?php require '../include/footer.php';?>
	</body>
</html>