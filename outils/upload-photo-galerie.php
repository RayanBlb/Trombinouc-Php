<?php
include'liste-document.php';
include('../config/connexionBdD.php');
session_start();
$i=0;
$dossier = '../img/Galerie-image/';
$fichier = basename($_FILES['couverture']['name']);
$taille_maxi = 3000000;
$taille = filesize($_FILES['couverture']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['couverture']['name'], '.'); 
//Début des vérifications de sécurité...
if(empty($fichier)) //Si l'extension n'est pas dans le tableau
{
     header("location:../page_galerie.php?message=4");
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
      $Liste_repertoire=listeRep($dossier);
     foreach ($Liste_repertoire as $place => $Nom_elements){
          $liste_element_repertoire[$i]=$Nom_elements;
          $i++;
     }

     $nombre_element= count($liste_element_repertoire)+1;

     $recuperation_de_extention =explode(".",$_FILES['couverture']['name']);
     $nom_fichier = 'galerie-'.$nombre_element.'.'.$recuperation_de_extention[1];
     $fichier = basename($nom_fichier);

     if(move_uploaded_file($_FILES['couverture']['tmp_name'],$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          header("location:../page_galerie.php?message=1");
     }
}
else
{
     header('location:../page_galerie.php?message='.$erreur.'');
}
?>