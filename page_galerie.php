<?php
session_start();
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
	<link rel="stylesheet" type="text/css" href="./css/galerie.css">
	<link rel="stylesheet" type="text/css" href="./css/base.css">
	<link rel="stylesheet" type="text/css" href="./css/styleMenuOption.css">
	<link rel="icon" type="image/png" href="./img/favicon.ico">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
	<script src="./js/scriptMenuOption.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="./js/scriptGalerie.js"></script>


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

	<?php // Apparait uniquement lorsqu'il y a une variable dans l'url
	if (isset($_GET['message'])){
		if($_GET['message'] == 1 ){
			$msg = "L'image a bien été enregister !";
		}elseif($_GET['message'] == 2 ){
			$msg = "Le fichier est trop gros...";
		}elseif($_GET['message'] == 3 ){
			$msg = "Seule les images du type .jpg, .gif, .png ou .jpeg sont accepter !";
		}elseif($_GET['message'] == 4 ){
			$msg = "Veuiller mettre une fichier !";
		}


		echo"<script language=\"javascript\">";
		echo"swal(\"{$msg}\");";
		echo"</script>";
	};?>

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

				<section class="formulaire-connexion">
 					<form action="./outils/upload-photo-galerie.php" method="POST" enctype="multipart/form-data">
							<h2>Ajouter une nouvelle photo a la galerie commune</h2>

								<div class="content">
									<input type="hidden" name="MAX_FILE_SIZE" value="3000000">Entrer la photo ici :
									<br>
									<br>
									<input type="file" name="couverture">
									<br>
									<br>
							</div>
							<button>Appliquer</button>
						</form>
				</section>

				<?php include('./outils/recup-galerie.php'); ?>
			</article>
	</body>
</html> 

<?php
}
else{
header("location:./page_connexion.php?message=3");
}
?>