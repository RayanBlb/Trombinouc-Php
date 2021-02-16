<?php

include('../config/connexionBdD.php');

 if (!empty($_GET['supprimer']))
 {
   $publication_supprimer = $_GET['supprimer'];

   $sql = 'DELETE FROM publication WHERE id_publication=:id_publication_a_supprimer';
   $req = $bd->prepare($sql);
   $marqueurs=array('id_publication_a_supprimer' => $publication_supprimer);
   $req->execute($marqueurs);
   $resultat = $req->fetchall();
   $req->closeCursor();
   header("location:../page_profil.php?message=1") ;
 }
 else
 {
   header("location:../page_profil.php") ;
 }
 ?>