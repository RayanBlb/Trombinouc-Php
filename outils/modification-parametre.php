<?php

include('../config/connexionBdD.php');

$test_changement=false;

 if (!empty($_POST['prenom_modifier']))
 {
 	session_start();
 	$prenom_modifier = htmlspecialchars($_POST['prenom_modifier']);
 	$sql = 'UPDATE utilisateurs SET prenom=:prenom_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'prenom_modifier' => $prenom_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }

  if (!empty($_POST['nom_modifier']))
 {
 	session_start();
 	$nom_modifier = htmlspecialchars($_POST['nom_modifier']);
 	$sql = 'UPDATE utilisateurs SET nom=:nom_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'nom_modifier' => $nom_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }


if (!empty($_POST['date_de_naissance_modifier']))
 {
 	session_start();
 	$date_de_naissance_modifier = htmlspecialchars($_POST['date_de_naissance_modifier']);
 	$sql = 'UPDATE utilisateurs SET date_de_naissance=:date_de_naissance_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'date_de_naissance_modifier' => $date_de_naissance_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }

 if (!empty($_POST['lieu_de_residence_modifier']))
 {
 	session_start();
 	$lieu_de_residence_modifier = htmlspecialchars($_POST['lieu_de_residence_modifier']);
 	$sql = 'UPDATE utilisateurs SET lieu_de_residence=:lieu_de_residence_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'lieu_de_residence_modifier' => $lieu_de_residence_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }

 if (!empty($_POST['travail_actuel_modifier']))
 {
 	session_start();
 	$travail_actuel_modifier = htmlspecialchars($_POST['travail_actuel_modifier']);
 	$sql = 'UPDATE utilisateurs SET travail_actuel=:travail_actuel_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'travail_actuel_modifier' => $travail_actuel_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }


 if (!empty($_POST['description_modifier']))
 {
 	session_start();
 	$description_modifier = htmlspecialchars($_POST['description_modifier']);
 	$sql = 'UPDATE utilisateurs SET description=:description_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'description_modifier' => $description_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }

 if (!empty($_POST['adresse_email_modifier']))
 {
 	session_start();
 	$adresse_email_modifier = htmlspecialchars($_POST['adresse_email_modifier']);
 	$sql = 'UPDATE utilisateurs SET adresse_email=:adresse_email_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'adresse_email_modifier' => $adresse_email_modifier);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }

 if (!empty($_POST['mot_de_passe_de_verification']) && !empty($_POST['mot_de_passe_modifier']))
 {
 	session_start();

 	$mot_de_passe_de_verification = htmlspecialchars($_POST['mot_de_passe_de_verification']);
 	$mot_de_passe_modifier = htmlspecialchars($_POST['mot_de_passe_modifier']);

 	$sql = 'SELECT mot_de_passe FROM utilisateurs WHERE id_utilisateur =:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur']);
	$req->execute($marqueurs);
	$resultat = $req->fetch();
	$req->closeCursor();

	if($resultat['mot_de_passe'] == md5($mot_de_passe_de_verification)){

 	$mot_de_passe_modifier_crypter = md5($mot_de_passe_modifier);
 	$sql = 'UPDATE utilisateurs SET mot_de_passe=:mot_de_passe_modifier WHERE id_utilisateur=:id_utilisateurs_online';
 	$req = $bd->prepare($sql);
 	$marqueurs=array('id_utilisateurs_online' => $_SESSION['id_utilisateur'], 'mot_de_passe_modifier' => $mot_de_passe_modifier_crypter);
 	$req->execute($marqueurs);
 	$req->closeCursor();
 	$test_changement=true;
 }else{
 	header("location:../page_parametre.php?message=7");
 	exit();
 }
}

if($test_changement == false){
	header("location:../page_parametre.php?message=5");
}else{
	header("location:../page_parametre.php?message=6");
}


 ?>