<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Fakebook - inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bienvenue sur Fakebook !">
	<link rel="stylesheet" type="text/css" href="./css/accueil.css">
	<link rel="stylesheet" type="text/css" href="./css/base.css">
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
				<li class="Bouton-right">
					<a title="Bouton actualites" href="./page_connexion.php">Connexion</a>
				</li>
			</ul>
		</nav>
	</header>

	<?php // Apparait uniquement lorsqu'il y a une variable dans l'url
	if (isset($_GET['message'])){
		if($_GET['message'] == 1 ){
			$msg = "Il manque une/des données !";
		}elseif($_GET['message'] == 2 ){
			$msg = "Veuiller cocher toutes les cases du contrat de confidentialité";
		}elseif($_GET['message'] == 3 ){
			$msg = "Les mots de passes ne sont pas identiques !";
		}elseif($_GET['message'] == 4 ){
			$msg = "Le mot de passe doit faire au moins 8 caractères !";
		}elseif($_GET['message'] == 5 ){
			$msg = "Cet email est déjà utilisé !";
		}elseif($_GET['message'] == 6 ){
			$msg = "Votre compte a bien été créé !";
		}elseif($_GET['message'] == 7 ){
			$msg = "Vous avez bien été déconnecter !";
		}

		echo"<script language=\"javascript\">";
		echo"swal(\"{$msg}\");";
		echo"</script>";
	};?>

 			<article>
				<section id="presentation">
					 <div class="content">
					 	<img src="./img/Logo-site.png" alt="Logo du site" >
					 	<br>
					 	<p>Bienvenue sur Fakebook, la contrefacon officiel de Facebook !</p>
					 	<br>
					 	<p>Ici tu pourras trouver toutes les fonctionnalités de Facebook mais en moins biens faite.</p> 
					 	<br>
      					</div>
				</section>

				<section id="Inscription">
					<div class="content">
						<h1>Inscription</h1>
						<p>Pour vous inscrire, rien de plus simple, il suffit de remplir ce petit formulaire !</p>
					</div>
						<form action="./outils/inscriptions.php" method="POST">

								<h2>Informations personnelles</h2>

								<div class="content">

								<label for="nom">Nom :</label>
								<br>
								<br>
								<input type="text" id="nom" name="user_nom">
								<br>

								<label for="prenom">Prénom : </label>
								<br>
								<br>
								<input type="text" id="prenom" name="user_prenom">
								<br>

								<label for="Date_de_naissance">Date de naissance : </label>
								<br>
								<br>
								<input type="date" id="Date_de_naissance" name="user_date_de_naissance">
							<br>
							<label for="lieu_de_residence">Lieu de résidence : </label>
							<br>
							<br>
							<input type="text" id="lieu_de_residence" name="user_lieu_de_residence">
							<br>

							<label for="travail_actuel">Le Travail actuel : </label>
							<br>
							<br>
							<input type="text" id="travail_actuel" name="user_travail_actuel">
							<br>

						</div>

						<h2>Mes identifiants de connexion</h2>
						
						<div class="content" >

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

							<label for="re_mot_de_passe">Retaper le mot de passe : </label>
							<br>
							<br>
							<input type="password" id="re_mot_de_passe" name="user_re_mot_de_passe">
							<br>
						</div>

						<h2>Confidentialité</h2>

						<div class="content-case">
								<input type="checkbox" id="autorisation-photo" name="case-photo">
								<label for="autorisation-photo">Autoriser tout le monde à voir vos photos ?</label>
								<br>

								<input type="checkbox" id="autorisation-publication" name="case-publication">
								<label for="autorisation-publication">Autoriser tout le monde à voir vos publications sur votre mur ?</label>
								<br>

								<input type="checkbox" id="autorisation-info-perso" name="case-info-perso">
								<label for="autorisation-info-perso">Autoriser tout le monde à voir vos informations personnelles (âge, lieu de résidence, travail...) sur votre mur ?</label>
								<br>

								<input type="checkbox" id="autorisation-blague" name="case-blague">
								<label for="autorisation-blague">Autoriser la vente de vos informations personnel au gouvernement russes ?</label>
								<br>

							</div>
							<button>Envoyer</button>
						</form>
				</section>
			</article>

		<footer class="Pied-content">
				<p>© 2019 - B.Rayan - Tous droits réservés </p>
		</footer>
	</body>
</html> 