<?php 
session_start();
if (!empty($_SESSION['mail'])) {
	header("Location: ../index.php");
	exit();
}

if (isset($_GET['inscription'])=="S'inscrire")
{
	if (!empty($_GET['name']) && !empty($_GET['passwd']) && !empty($_GET['passwdconf']) && !empty($_GET['mail']) && !empty($_GET['tel']) )
	 {

	 	if ($_GET['passwd'] != $_GET['passwdconf'])
		 {
			 $erreur="Les deux mots de passe sont differents.";
		 }else{
		 	 
			 $base=mysqli_connect("localhost","root","","easyeatdatabase");
			 
			 $requete1="SELECT * FROM easyeatdatabase.clients WHERE (email='".mysqli_real_escape_string($base,$_GET['mail'])."') ";
			 $requete2="SELECT * FROM easyeatdatabase.restaurant WHERE (emailresto='".mysqli_real_escape_string($base,$_GET['mail'])."') ";
			 $requete3="SELECT * FROM easyeatdatabase.livreur WHERE (emaillivreur='".mysqli_real_escape_string($base,$_GET['mail'])."') ";
			 
			 $resultat1=mysqli_query($base,$requete1) or die("Erreur SQL ! <br />".$requete1."<br />".mysqli_error($base));
			 $resultat2=mysqli_query($base,$requete2) or die("Erreur SQL ! <br />".$requete2."<br />".mysqli_error($base));
			 $resultat3=mysqli_query($base,$requete3) or die("Erreur SQL ! <br />".$requete."<br />".mysqli_error($base));
			 
			 $data1=mysqli_fetch_array($resultat1);
			 $data2=mysqli_fetch_array($resultat2);
			 $data3=mysqli_fetch_array($resultat3);
			 
			 $id1=$data1['idclient'];
			 $id2=$data2['idresto'];
			 $id3=$data3['idlivreur'];
			 if($data1[0]==0 && $data2[0]==0 && $data3[0]==0 )
			 {
			 	$name = htmlentities(trim($_GET['name']));
			 	$mail = htmlentities(strtolower(trim( $_GET['mail'])));
			 	$passwd = htmlentities(trim($_GET['passwd']));
			 	$tel = htmlentities(trim($_GET['tel']));
			 	if (iconv_strlen($name, "UTF-8") < 4 || iconv_strlen($name, "UTF-8") > 51) {
			 		$erreur = "Votre nom complet doit être compris entre 4 et 50 caractères";
			 	}else{

			 		if (!preg_match("/^[\p{L}0-9- ]*$/u", $name)) {
			 			$erreur= "Votre nom complet peut contenir les caractères suivants A-Z, a-z, 0-9, espace, -,...";
			 		}else{
			 			if (!preg_match("/^[0-9_]{8}$/u", $tel)) {
			 				$erreur = "Numero de telephone incorrect";
			 			}else{
			 				if (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)) {
			 					$erreur = "email incorrect";
			 				}else{
			 					if (iconv_strlen($passwd, "UTF-8") < 4 || iconv_strlen($passwd, "UTF-8") > 8) {
			 						$erreur = "Votre mot de passe doit contenir entre 4 et 8 caractères";
			 					}else{
			 						$dateinscription = date('Y-m-d H:i:s');
			 						$passHache=password_hash($passwd, PASSWORD_DEFAULT);
			 						$passwd=$passHache;
									$requete="INSERT INTO easyeatdatabase.clients SET nom='".$name."', mdp='".$passwd."', email='".$mail."', dateinscription='".$dateinscription."', tel='".$tel."' ";
									mysqli_query($base,$requete) or die("Erreur SQL ! <br />".$requete."<br />".mysqli_error($base));
									$table = "clients";
									$_SESSION['table']=$table;
								 	$_SESSION['mail'] = $mail;
									$_SESSION['nom'] = $name;
									header("Location:../index.php");
									exit();
			 					}
			 				}
			 			}
			 		}
			 	}

			 }else{

			 	$erreur="compte existant";
			}
		}

	 }else{

		 $erreur="Veillez remplir tous les champs";
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Inscription</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/incription.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<link rel="shortcut icon" type="image/png" href="../image/ee.png">
	</head>
	<body>
		<header>
			<div class="logo">
				<img src="../image/ee.png">
				<a href="../index.php">Easy Eat</a>
			</div>
			<nav class="">
				<ul>
					<li><a href="connexion.php"><i class="fas fa-user"></i> Connexion</a></li>
					<li><a href="livreur.php"><i class="fas fa-bicycle"></i> Easy Livreur</a></li>
					<li><a href="restaurant.php"><i class="fas fa-concierge-bell"></i> Zone Restaurant</a></li>
				</ul>
			</nav>
		</header>
			<section class="boxes">
				<h2>Inscription</h2>
					<form method="post">
						<label><i class="far fa-user"></i> Nom & Prenom(s):</label>
						<input type="text" name="name" placeholder="Entrer votre nom et prenom(s)..." value="<?php  if(isset($_GET['name'])) echo $_GET['name'] ?>" required>
						<label><i class="far fa-envelope-open"></i> Email:</label>
						<input type="mail" name="mail" placeholder="Entrer votre mail..." value="<?php  if(isset($_GET['mail'])) echo $_GET['mail'] ?>" required>
						<label><i class="fas fa-mobile"></i> Telephone</label>
						<input type="text" name="tel" placeholder="Entrer votre numero de telephone (ex: 75000000)..."value="<?php  if(isset($_GET['tel'])) echo $_GET['tel'] ?>" required>
						<label><i class="fas fa-lock"></i> Mot de passe:</label>
						<input type="password" name="passwd" placeholder="Entrer votre mot de passe" required>
						<label>Confirmer votre mot de passe:</label>
						<input type="password" name="passwdconf" placeholder="Entrer à nouveau votre mot de passe" required>
						 <?php
							if (isset($erreur))
							{
								echo "<p class=\"erreur\">*".$erreur."</p>" ;
							}
						?>
						<input type="submit" class="btn" name="inscription" value="S'inscrire">
					</form>
					<div class="cgu">
						<p>En vous inscrivant vous accepter nos <a href="cgu.php">conditions générales d'utilisation</a> et notre <a href="cookies.php">politique de cookies</a>. <a href="connexion.php">Se connecter.</a> <a href="restaurant.php"> Je suis restaurateur</a> <a href="livreur.php"> Je voudrais devenir Livreur</a></p>
					</div>
			</section>
		<?php require '../include/footer.php';?>
		<script src="../script/aff.js"></script>
	</body>
</html>