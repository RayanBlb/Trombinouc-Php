<?php 
session_start();
include('recup-info.php');
include('../config/connexionBdD.php');

$sql = 'SELECT photo_profil FROM utilisateurs WHERE id_utilisateur=:id_utilisateur_online';
$req = $bd->prepare($sql);
$marqueurs=array('id_utilisateur_online' => $_SESSION['id_utilisateur']);
$req->execute($marqueurs);
$resultat = $req->fetch();
$req->closeCursor();

if(!empty($resultat['photo_profil'])){
unlink('../img/Profil-image/'.$resultat['photo_profil']);

  $sql2 = 'UPDATE utilisateurs SET photo_profil =:test WHERE id_utilisateur=:id_utilisateur_online';
        $req2 = $bd->prepare($sql2);
        $marqueurs2=array('id_utilisateur_online' => $_SESSION['id_utilisateur'], 'test' => '');
        $req2->execute($marqueurs2);
        $req2->closeCursor();
        header('location:../page_parametre.php?message=8');
      }else{
         header('location:../page_parametre.php?message=9');
      }

?>