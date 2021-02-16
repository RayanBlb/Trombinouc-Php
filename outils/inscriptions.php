<?php
if(empty($_POST['user_nom']) || empty($_POST['user_prenom']) || empty($_POST['user_date_de_naissance']) || empty($_POST['user_lieu_de_residence']) || empty($_POST['user_travail_actuel']) || empty($_POST['user_email'])|| empty($_POST['user_mot_de_passe'])|| empty($_POST['user_re_mot_de_passe']) ){

	header('Location: ../index.php?message=1');

}else{

	if(empty($_POST['case-photo']) || empty($_POST['case-publication']) || empty($_POST['case-info-perso']) || empty($_POST['case-blague']) ){
		header('Location: ../index.php?message=2');
	}else{

		include('../config/connexionBdD.php');

		$nom = htmlspecialchars($_POST['user_nom']);
		$prenom = htmlspecialchars($_POST['user_prenom']);
		$lieu_de_residence = htmlspecialchars($_POST['user_lieu_de_residence']);
		$travail_actuel = htmlspecialchars($_POST['user_travail_actuel']);
		$email =htmlspecialchars( $_POST['user_email']);
		$mot_de_passe = htmlspecialchars($_POST['user_mot_de_passe']);
		$mot_de_passe_test = htmlspecialchars($_POST['user_re_mot_de_passe']);
		$mot_de_passe_crypter = md5($mot_de_passe);

		if($mot_de_passe == $mot_de_passe_test){
			if(strlen($mot_de_passe) >=8){
				$sql = 'SELECT adresse_email FROM utilisateurs WHERE adresse_email =:email';
				$req = $bd->prepare($sql);
				$marqueurs=array('email' => $email);
				$req->execute($marqueurs);
				$resultat = $req->fetchall();
				$req->closeCursor();
				if(count($resultat) == 0){

					$sql = 'INSERT INTO utilisateurs (prenom, nom, date_de_naissance, lieu_de_residence, travail_actuel, adresse_email, mot_de_passe) VALUES(:prenom, :nom, :date_de_naissance, :lieu_de_residence, :travail_actuel, :adresse_email, :mot_de_passe)';
					$req = $bd->prepare($sql);
					$marqueurs=array('prenom' => $prenom, 'nom' => $nom, 'date_de_naissance' => $_POST['user_date_de_naissance'], 'lieu_de_residence' => $lieu_de_residence,'travail_actuel' => $travail_actuel, 'adresse_email' => $email, 'mot_de_passe' => $mot_de_passe_crypter );
					$req->execute($marqueurs);
					$resultat = $req->fetchall();
					$req->closeCursor();

					header('Location: ../index.php?message=6');
				}else{

					header('Location: ../index.php?message=5');

				}

			}else{
				header('Location: ../index.php?message=4');
			}

		}else{
			header('Location: ../index.php?message=3');

		}
	}
}

?>