<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Fakebook - Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bienvenue sur Fakebook !">
	<link rel="stylesheet" type="text/css" href="./css/connexion.css">
	<link rel="icon" type="image/png" href="./img/favicon.ico">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
	<header>
		<nav>
			<ul class="MenuResponsive">
				<li class="Bonton-left">
					<a title="Bouton accueil" href="./index.php">Fakebook</a>
				</li>
			</ul>
		</nav>
	</header>

	<?php // Apparait uniquement lorsqu'il y a une variable dans l'url
	if (isset($_GET['message'])){
		if($_GET['message'] == 1 ){
			$msg = "Il manque une/des données !";
		}elseif($_GET['message'] == 2 ){
			$msg = "Mot de passe ou adresse email incorrecte !";
		}elseif($_GET['message'] == 3 ){
			$msg = "Veuillez vous connecter !";
		}

		echo"<script language=\"javascript\">";
		echo"swal(\"{$msg}\");";
		echo"</script>";
	};?>

 			<article>
 				<section class="formulaire-connexion">
 					<form action="./outils/connexion.php" method="POST">

								<h2>Se connecter à Fakebook</h2>

								<div class="content">
								<br>
								<label for="email">Adresse email : </label>
								<br>
								<br>
								<input type="email" id="email" name="user_email">
								<br>

								<label for="mot_de_passe">Mot de passe : </label>
								<br>
								<br>
								<input type="password" id="mot_de_passe" name="user_mot_de_passe">
								<br>
							</div>
							<button>Connexion</button>
						</form>
				</section>
			</article>

		<footer class="Pied-content">
				<p>© 2019 - B.Rayan - Tous droits réservés </p>
		</footer>
	</body>
</html> 