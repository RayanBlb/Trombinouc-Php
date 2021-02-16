<?php
include'liste-document.php';
include('../config/connexionBdD.php');
session_start();
$i=0;
$dossier = '../img/Couverture-image/';
$fichier = basename($_FILES['couverture']['name']);
$taille_maxi = 3000000;
$taille = filesize($_FILES['couverture']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['couverture']['name'], '.'); 
//Début des vérifications de sécurité...
if(empty($fichier)) //Si l'extension n'est pas dans le tableau
{
     header("location:../page_parametre.php?message=4");
     exit();
}
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 3;
}
if($taille>$taille_maxi)
{
     $erreur = 2;
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{

     //On formate le nom du fichier ici...
     $recuperation_de_extention =explode(".",$_FILES['couverture']['name']);
     $nom_fichier = 'couverture-'.$_SESSION['id_utilisateur'].'.'.$recuperation_de_extention[1];
     $fichier = basename($nom_fichier);


     $Liste_repertoire=listeRep($dossier);
     foreach ($Liste_repertoire as $place => $Nom_elements){
          $liste_element_repertoire[$i]=$Nom_elements;
          $i++;
     }

     $nombre_element= count($liste_element_repertoire);
     for ($i=0; $i < $nombre_element ; $i++){
          if(strstr($liste_element_repertoire[$i], '.', true) == 'couverture-'.$_SESSION['id_utilisateur']){
               unlink($dossier.$liste_element_repertoire[$i]);
          }
     }

     if(move_uploaded_file($_FILES['couverture']['tmp_name'],$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          $sql = 'UPDATE utilisateurs SET photo_couverture=:photo_couverture WHERE id_utilisateur=:id_utilisateur';
          $req = $bd->prepare($sql);
          $marqueurs=array('photo_couverture' => $fichier, 'id_utilisateur' => $_SESSION['id_utilisateur']);
          $req->execute($marqueurs);
          $req->closeCursor();

          header("location:../page_parametre.php?message=1");
     }
}
else
{
     header('location:../page_parametre.php?message='.$erreur.'');
}
?>