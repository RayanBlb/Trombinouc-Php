<?php

 if (isset($_GET['id_publication']))
 {
   session_start();
   include('../config/connexionBdD.php');
   $id = $_SESSION['id_utilisateur'] ;
   $texte = htmlspecialchars($_POST['user_commentaire']);

   $sql = 'INSERT INTO commentaire (id_utilisateur_poste, texte, date,id_publication_com) VALUES(:id_utilisateur_poste, :texte, NOW(),:id_publication_com)';
   $req = $bd->prepare($sql);
   $marqueurs=array('id_utilisateur_poste' => $id, 'texte' => $texte, 'id_publication_com'=> $_GET['id_publication']);
   $req->execute($marqueurs);
   $resultat = $req->fetchall();
   $req->closeCursor();
   header("location:../page_timeline.php") ;
 }
 else
 {
   header("location:../page_timeline.php") ;
 }
 ?>