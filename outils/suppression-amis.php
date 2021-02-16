<?php 

if(ISSET($_GET['id_suppression'])){
  include('../config/connexionBdD.php');
  session_start();

  $id_a_supprimer = $_GET['id_suppression'];
  $etat_de_la_relation = 2;
  $sql = 'DELETE FROM relation_utilisateur WHERE (id_emetteur=:id_utilisateur_online AND id_receveur=:id_amis_a_supprimer) OR (id_emetteur=:id_amis_a_supprimer AND id_receveur=:id_utilisateur_online) AND etat_de_la_relation=:etat_de_la_relation';
        $req = $bd->prepare($sql);
        $marqueurs=array('id_amis_a_supprimer' => $id_a_supprimer,'id_utilisateur_online' => $_SESSION['id_utilisateur'],'etat_de_la_relation' => $etat_de_la_relation);
        $req->execute($marqueurs);
        $resultat = $req->fetchall();
        $req->closeCursor();
        header("location:../page_amis.php?message=1");
  }
?>