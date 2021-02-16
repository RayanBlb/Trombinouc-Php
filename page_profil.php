<?php
session_start();
include './outils/recup-info.php';
if (isset($_SESSION['id_utilisateur']))
{
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Fakebook - Profil de <?php print_r(recupprenom($_SESSION['id_utilisateur'])); ?>  <?php print_r(recupnom($_SESSION['id_utilisateur'])); ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bienvenue sur Fakebook !">
	<link rel="stylesheet" type="text/css" href="./css/profil.css">
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

				<section class="profil">
					<section class="photo-profil">
						<div class="wallPro">
							<div class="wallpaper">
								<img class="wallpaper" width="1600" height="300" <?php echo'src="./img/Couverture-image/'.recupphotocouvert($_SESSION['id_utilisateur']).'" alt="photo de couverture de '.recupprenom($_SESSION['id_utilisateur']).' '.recupnom($_SESSION['id_utilisateur']).'" '; ?> />
							</div>
							<div class="profil-image">
								<?php echo'<img width="250" height="250" src="./img/Profil-image/'.recupphoto($_SESSION['id_utilisateur']).'" alt="Photo de profil de '.recupprenom($_SESSION['id_utilisateur']).' '.recupnom($_SESSION['id_utilisateur']).'"';?> />
							</div>
						</div>
						</section>
						
						<section class="info-profil">
							<div class="menu-sidebar">
								<ul class="menu">
									<li class="menu-item-has-children"><i style="margin-right:5px;" class="fas fa-address-card"></i><a href="#">Informations personnel</a><span class="sidebar-menu-arrow"></span>
										<ul class="sub-menu">
											<li class="info-p"><p>Nom: <?php print_r(recupnom($_SESSION['id_utilisateur'])); ?></p></li>
											<li class="info-p"><p>Prenom: <?php print_r(recupprenom($_SESSION['id_utilisateur'])); ?></p></li>
											<li class="info-p"><p>Date de naissance : <?php print_r(recupdate($_SESSION['id_utilisateur'])); ?></p></li>
											<li class="info-p"><p>Habite à: <?php print_r(recuplieu($_SESSION['id_utilisateur'])); ?></p></li>
											<li class="info-p"><p>Travail à: <?php print_r(recuptravail($_SESSION['id_utilisateur'])); ?></p></li>
										</ul>
									</li>
									<li class="menu-item-has-children"><i style="margin-right:5px;" class="fas fa-comment-alt"></i><a href="#">Description</a><span class="sidebar-menu-arrow"></span>
										<ul class="sub-menu">
											<li class="descri-p"><p><?php print_r(recupdescription($_SESSION['id_utilisateur'])); ?></p></li>
										</ul>
									</li>
								</ul>
							</div>
						</section>

					</section>

					<?php if(recupdescription($_SESSION['id_utilisateur']) == 'Aucune description pour l\'instant.' && !isset($_GET['close'])){
					 echo "<section class=\"publication\">\n
					 <div class= \"information-publication\">\n
					 <h2>N'oublier pas de remplir votre description !!! <a href=\"./page_profil.php?close=1\" style=\" color: black;\">(fermer)</a></h2>\n
					 </div>\n
					 </section>";}
					 ?>

				<section class="form-publication">
					<div class="formulaire-publication">
					<form action="./outils/add-publication.php" method="POST">
						<label for="publication">Exprimez-vous, <?php print_r(recupprenom($_SESSION['id_utilisateur'])); ?></label>
						<br>
						<br>
						<textarea id="publication" name="user_publication"></textarea>
						<br>
						<button>Partager</button>
				</form>
				</div>
				</section>

				<?php include('./outils/publication-utlisateurs.php'); ?>

			</article>
	</body>
</html> 
<?php
}
else{
header("location:./page_connexion.php?message=3");
}
?>