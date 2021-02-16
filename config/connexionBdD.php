<?php
// Connexion à la base de donnée
try {
  $bd = new PDO('mysql:host=localhost;dbname=','','');
  $bd->exec('SET NAMES utf8');
} catch (Exception $e){
  die("Erreur: Connexion à la base de donnée impossible");
}
?>