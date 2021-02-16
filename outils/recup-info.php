<?php
function recupprenom($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT prenom FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
return $resultat['prenom'];
}
function recupnom($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT nom FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
return $resultat['nom'];
}
function recupdate($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT date_de_naissance FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
return $resultat['date_de_naissance'];
}
function recuplieu($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT lieu_de_residence FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
return $resultat['lieu_de_residence'];
}
function recuptravail($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT travail_actuel FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
return $resultat['travail_actuel'];
}
function recupdescription($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT description FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
if(empty($resultat['description'])){
     return $resultat['description'] = 'Aucune description pour l\'instant.';
}else{
	return $resultat['description'];
}
}
function recupemail($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT adresse_email FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
return $resultat['adresse_email'];
}
function recupphoto($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT photo_profil FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
if(empty($resultat['photo_profil'])){
     return $resultat['photo_profil'] = 'base.jpg';
}else{
return $resultat['photo_profil'];
}
}
function recupphotocouvert($user_id)
{//Récupération description à partir du nom d'utilisateur
include('./config/connexionBdD.php');
$sql = 'SELECT photo_couverture FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $user_id);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();
if(empty($resultat['photo_couverture'])){
     return $resultat['photo_couverture'] = 'base.jpg';
}else{
return $resultat['photo_couverture'];
}
}
?>