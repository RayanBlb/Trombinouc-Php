<?php
if(empty($_POST['user_email']) || empty($_POST['user_mot_de_passe']) ){

	header('Location: ../page_connexion.php?message=1');

}else{

	include('../config/connexionBdD.php');

	$email = htmlspecialchars($_POST['user_email']);
	$mot_de_passe = htmlspecialchars($_POST['user_mot_de_passe']);

	$sql = 'SELECT id_utilisateur, prenom, nom, date_de_naissance, lieu_de_residence, travail_actuel, adresse_email, description, mot_de_passe FROM utilisateurs WHERE adresse_email =:email';
				$req = $bd->prepare($sql);
				$marqueurs=array('email' => $email);
				$req->execute($marqueurs);
				$resultat = $req->fetch();
				$req->closeCursor();

				if ($resultat['mot_de_passe'] == md5($mot_de_passe) && $resultat['adresse_email'] == $email ){
					session_start();
					$_SESSION['id_utilisateur']=$resultat['id_utilisateur'];
					$_SESSION['prenom'] = $resultat['prenom'];
					$_SESSION['nom'] = $resultat['nom'];
					$_SESSION['date_de_naissance'] = $resultat['date_de_naissance'];
					$_SESSION['lieu_de_residence'] = $resultat['lieu_de_residence'];
					$_SESSION['travail_actuel'] = $resultat['travail_actuel'];
					$_SESSION['adresse_email'] = $resultat['adresse_email'];
					$_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];

					if(!isset($resultat['description'])){
						$_SESSION['description'] = 'Aucun description pour l\'instant.';
					}else{
						$_SESSION['description'] = $resultat['description'];
					}
					
					header("location:../page_profil.php");
				}else{
					header('Location: ../page_connexion.php?message=2');
				}
			}

?>