<?php

include('../config/connexionBdD.php');

 if (isset($_POST['user_publication']))
 {
   session_start();
   $id = $_SESSION['id_utilisateur'] ;
   $texte = htmlspecialchars($_POST['user_publication']);

   $sql = 'INSERT INTO publication (id_utilisateur, texte, date) VALUES(:id_utilisateur, :texte, NOW())';
   $req = $bd->prepare($sql);
   $marqueurs=array('id_utilisateur' => $id, 'texte' => $texte);
   $req->execute($marqueurs);
   $resultat = $req->fetchall();
   $req->closeCursor();
   header("location:../page_profil.php") ;
 }
 else
 {
   header("location:../page_profil.php") ;
 }
 ?>