
<?php 
session_start();
if (!empty($_SESSION['mail'])) {
	header("Location: ../index.php");
	exit();
}
if (isset($_GET['connexion']) =="Se connecter")
{ 
	 if (!empty($_GET['mail']) && !empty($_GET['passwd']))
	 {
		 $base=mysqli_connect("localhost","root","","easyeatdatabase");

		 $requete1="SELECT * FROM easyeatdatabase.clients WHERE email='".mysqli_real_escape_string($base,$_GET['mail'])."' ";		 
		 $requete2="SELECT * FROM easyeatdatabase.restaurant WHERE emailresto='".mysqli_real_escape_string($base,$_GET['mail'])."' ";		 
		 $requete3="SELECT * FROM easyeatdatabase.livreur WHERE emaillivreur='".mysqli_real_escape_string($base,$_GET['mail'])."' ";

		 $resultat1=mysqli_query($base,$requete1) or die("Erreur SQL ! <br />".$requete1."<br />".mysqli_error());
		 $resultat2=mysqli_query($base,$requete2) or die("Erreur SQL ! <br />".$requete2."<br />".mysqli_error());
		 $resultat3=mysqli_query($base,$requete3) or die("Erreur SQL ! <br />".$requete3."<br />".mysqli_error());
		 
		 $data1=mysqli_fetch_array($resultat1);
		 $data2=mysqli_fetch_array($resultat2);
		 $data3=mysqli_fetch_array($resultat3);

		 $id1=$data1['idclient'];
		 $id2=$data2['idresto'];
		 $id3=$data3['idliveur'];
		 
		 $nom1=$data1['nom'];
		 $nom2=$data2['nomresp'];
		 $nom3=$data3['nomlivreur'];

		 
		 mysqli_free_result($resultat1);
		 mysqli_free_result($resultat2);
		 mysqli_free_result($resultat3);
		 mysqli_close($base);
		 

		 if($data1[0]==0 && $data2[0]==0 && $data3[0]==0)
		 {
			 $erreur="Compte non reconu, verifier votre e-mail";
		 }
		 
		 
		 elseif ($data1[0]!=0 && $data3[0]==0 && $data2[0]==0)
		 {		  
			 $verifpass=password_verify($_GET['passwd1'], $data1['mdp']);
			 if($verifpass)
			 {
			 	 $table="clients";
				 $_SESSION['table']=$table;
				 $_SESSION['nom']=$nom1;
				 $_SESSION['id']=$id1;
				 header("Location: ../index.php");
				 exit();

			 }
			 else
			 {
				 $erreur="Compte non reconu, verifier votre e-mail ou votre mot de passe";
			 }
		 }
		 else
		 {
			if ($data3[0]==0 && $data2[0]!=0 ) {
				 $verifpass=password_verify($_GET['passwd'], $data2['mdp']);
				 if($verifpass)
				 {
					$table= "restaurateurs";
					$_SESSION['nom']=$nom2;
					$_SESSION['id']=$id2;
					$_SESSION['table']=$table;
					header("Location:../index.php");
					exit();
				 }
				 else
				 {
					 $erreur="Compte nom reconu, verifier votre e-mail ou votre mot de passe";
				 }
			}else{
				$verifpass=password_verify($_GET['passwd'], $data3['mdp']);
				 if($verifpass)
				 {
					$table= "livreur";
					$_SESSION['nom']=$nom3;
					$_SESSION['id']=$id3;
					$_SESSION['table']=$table;
					header("Location:../index.php");
					exit();
				 }
				 else
				 {
					 $erreur="Compte nom reconu, verifier votre e-mail ou votre mot de passe";
				 }
			}
			  
			
		 }
	 }
	 else
	 {
		 $erreur="Veillez remplir tous les champs";
	 }
}



?>
<!--Welcome-->
<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/connexion.css">
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
					<li><a href="inscription.php"><i class="fas fa-user-plus"></i> Inscription</a></li>
					<li><a href="livreur.php"><i class="fas fa-bicycle"></i> Easy Livreur</a></li>
					<li><a href="restaurant.php"><i class="fas fa-concierge-bell"></i> Zone Restaurant</a></li>
				</ul>
			</nav>
		</header>
		<section class="boxes">
			<h2>Connexion</h2>
			<form method="post">
				<label><i class="fas fa-user"></i> Email:</label>
				<input type="mail" name="mail" placeholder="Entrer votre email"  value="<?php if(isset($_GET['mail'])) echo $_GET['mail']; ?>" required>
				<label><i class="fas fa-lock"></i> Mot de passe:</label>
				<input type="password" name="passwd" placeholder="Votre mot de passe" required>
					<?php
						if (isset($erreur))
						{
							echo "<p class=\"erreur\">".$erreur."</p>" ;
						}
					?>
				<input type="submit" class="btn" name="connexion" value="Se connecter">
			</form>

			<div class="cgu">
				<p><a href="mdpoublie.php">Mot de passe oublié?</a> Je n'ai pas de compte. <a href="inscription.php">S'inscrire?</a></p>
			</div>
		</section>
		<?php require '../include/footer.php';?>
	</body>
</html>