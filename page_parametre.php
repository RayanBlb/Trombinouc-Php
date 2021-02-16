<?php
session_start();
include './outils/recup-info.php';
if (isset($_SESSION['id_utilisateur']))
{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Fakebook - Rechercher un autre utilisateur</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bienvenue sur Fakebook !">
	<link rel="stylesheet" type="text/css" href="./css/profil.css">
	<link rel="stylesheet" type="text/css" href="./css/recherche.css">
	<link rel="stylesheet" type="text/css" href="./css/base.css">
	<link rel="stylesheet" type="text/css" href="./css/styleMenuOption.css">
	<link rel="icon" type="image/png" href="./img/favicon.ico">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
	<script src="./js/scriptMenuOption.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
	<header>
		<nav>
			<ul class="MenuResponsive">
				<li class="Bonton-left">
					<a title="Bouton accueil" href="./page_profil.php">Fakebook</a>
				</li>
				<li class="Bouton-right">
					<a title="Bouton actualites" href="./outils/deconnexion.php">Deconnexion</a>
				</li>
			</ul>
		</nav>
	</header>

 			<article>
 				<section class="gauche">
 						<div class="menu-sidebar">
 							<ul class="menu">
								<li><i style="margin-right:5px;" class="fas fa-home"></i><a href="./page_timeline.php">Accueil</a></li>
								<li><i style="margin-right:5px;" class="fas fa-user"></i><a href="./page_profil.php">Profil</a></li>
								<li><i style="margin-right:5px;" class="fas fa-images"></i><a href="./page_galerie.php">Galerie</a></li>
								<li class="menu-item-has-children"><i style="margin-right:5px;" class="fas fa-bell"></i><a href="#">Activité</a>
									<span class="sidebar-menu-arrow"></span>
									<ul class="sub-menu">
										<li><a href="./page_demande_amis.php">Demande d'amis (<?php include("./outils/notification-demande-amis.php"); ?>)</a></li>
									</ul>
								</li>
								<li class="menu-item-has-children"><i style="margin-right:5px;" class="fas fa-rocket"></i><a href="#">Applications</a>
									<span class="sidebar-menu-arrow"></span>
									<ul class="sub-menu">
										<li><a href="./outils/EDT.php">EDT</a></li>
										<li><a href="./outils/ENT.php">ENT</a></li>
									</ul>
								</li>
								<li><i style="margin-right:5px;" class="fas fa-users"></i><a href="./page_amis.php">Amis</a></li>
								<li><i style="margin-right:5px;" class="fas fa-search"></i><a href="./page_recherche.php">Recherche</a></li>
								<li><i style="margin-right:5px;" class="fas fa-cogs"></i><a href="./page_parametre.php">Paramètre</a></li>
							</ul>			
						</div>
				</section>

				<?php // Apparait uniquement lorsqu'il y a une variable dans l'url
	if (isset($_GET['message'])){
		if($_GET['message'] == 1 ){
			$msg = "Votre photo de profil a bien été mis a jour !";
		}elseif($_GET['message'] == 2 ){
			$msg = "Le fichier est trop gros...";
		}elseif($_GET['message'] == 3 ){
			$msg = "Seule les images du type .jpg, .gif, .png ou .jpeg sont accepter !";
		}elseif($_GET['message'] == 4 ){
			$msg = "Veuiller mettre une fichier afin de changer de photo de profil !";
		}elseif($_GET['message'] == 5 ){
		$msg = "Erreur, le champs est vide !";
		}elseif($_GET['message'] == 6 ){
		$msg = "Votre modification a bien été prise en compte !";
		}elseif($_GET['message'] == 7 ){
		$msg = "Erreur, votre ancien mot de passe est incorrecte !";
		}elseif($_GET['message'] == 8 ){
		$msg = "Votre photo de profil a bien été supprimer !";
	}elseif($_GET['message'] == 9 ){
		$msg = "Vous n'avez pas de photo de profil !";
	}elseif($_GET['message'] == 10 ){
		$msg = "Votre photo de couverture a bien été supprimer !";
	}elseif($_GET['message'] == 11 ){
		$msg = "Vous n'avez pas de photo de couverture !";
	}




		echo"<script language=\"javascript\">";
		echo"swal(\"{$msg}\");";
		echo"</script>";
	};?>

				<section class="formulaire-connexion">
 					<form action="./outils/modification-parametre.php" method="POST">

								<h2>Modification de votre prenom</h2>

								<div class="content">
								<h3>Votre prenom actuel : <?php print_r(recupprenom($_SESSION['id_utilisateur']));  ?></h3>
								<label for="prenom">nouveau prenom : </label>
								<br>
								<br>
								<input type="text" id="prenom" name="prenom_modifier">
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre nom</h2>

								<div class="content">
								<h3>Votre nom actuel : <?php print_r(recupnom($_SESSION['id_utilisateur']));  ?></h3>
								<label for="nom">nouveau nom : </label>
								<br>
								<br>
								<input type="text" id="nom" name="nom_modifier">
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre date de naissance</h2>

								<div class="content">
								<h3>Votre date de naissance actuel : <?php print_r(recupdate($_SESSION['id_utilisateur'])); ?></h3>
								<label for="Date_de_naissance">nouvelle date de naissance : </label>
								<br>
								<br>
								<input type="date" id="Date_de_naissance" name="date_de_naissance_modifier">

							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre lieu de résidence</h2>

								<div class="content">
								<h3>Votre lieu de résidence actuel : <?php print_r(recuplieu($_SESSION['id_utilisateur'])); ?></h3>
								<label for="lieu_de_residence">nouveau lieu de résidence : </label>
								<br>
								<br>
								<input type="text" id="lieu_de_residence" name="lieu_de_residence_modifier">
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre travail actuel</h2>

								<div class="content">
								<h3>Votre travail actuel : <?php print_r(recuptravail($_SESSION['id_utilisateur'])); ?></h3>
								<label for="travail_actuel">nouveau travail actuel : </label>
								<br>
								<br>
								<input type="text" id="travail_actuel" name="travail_actuel_modifier">
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre description</h2>

								<div class="content">
								<h3>Votre description actuel : <?php print_r(recupdescription($_SESSION['id_utilisateur']));  ?></h3>
								<label for="description">Nouvelle description : (250 Caractères max)</label>
								<br>
								<br>
								<textarea style="margin: auto;height: 70px;width: 90%;display: block;border: 1px solid #ccc;border-radius: 4px;"  id="description" name="description_modifier" maxlength="250"></textarea>
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre adresse email</h2>

								<div class="content">
								<h3>Votre adresse email actuel : <?php print_r(recupemail($_SESSION['id_utilisateur'])); ?></h3>
								<label for="adresse_email">Nouvelle adresse email : </label>
								<br>
								<br>
								<input type="email" id="adresse_email" name="adresse_email_modifier">
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/modification-parametre.php" method="POST">
							<h2>Modification de votre mot de passe</h2>

								<div class="content">

								<label for="mot_de_passe">Ancien mot de passe : </label>
								<br>
								<br>
								<input type="password" id="mot_de_passe" name="mot_de_passe_de_verification">
								<br>
								<label for="mot_de_passe_modifier">Nouveau mot de passe : </label>
								<br>
								<br>
								<input type="password" id="mot_de_passe_modifier" name="mot_de_passe_modifier">
								<br>
							</div>
							<button>Appliquer</button>
						</form>

						<form action="./outils/upload-photo-profil.php" method="POST" enctype="multipart/form-data">
							<h2>Modification de votre photo de profil</h2>

								<div class="content">
									<br>
									<br>
									<input type="hidden" name="MAX_FILE_SIZE" value="3000000">Nouvelle photo de profil :
									<br>
									<br>
									<input type="file" name="avatar">
									<br>
									<br>
							</div>
							<button>Appliquer</button>
						</form>

						<div class="content" style="margin: auto; width: 100%;">

						<?php echo '<a  href="./outils/suppression-photo-profil.php"><p style="margin-left: 30px; width: 50%;">supprimer votre photo de profil actuel</p></a>'; ?>
					</div>

						<form action="./outils/upload-photo-couverture.php" method="POST" enctype="multipart/form-data">
							<h2>Modification de votre photo de profil</h2>

								<div class="content">
									<input type="hidden" name="MAX_FILE_SIZE" value="3000000">Nouvelle photo de couverture :
									<br>
									<br>
									<input type="file" name="couverture">
									<br>
									<br>
							</div>
							<button>Appliquer</button>
						</form>
						<div class="content" style="margin: auto; width: 100%; margin-bottom: 30px;">

						<?php echo '<a  href="./outils/suppression-photo-couverture.php"><p style="margin-left: 30px; width: 50%;" >supprimer votre photo de couverture actuel</p></a>'; ?>
					</div>

				</section>
			</article>
	</body>
</html> 

<?php
}
else{
header("location:./page_connexion.php?message=3");
}
?>
