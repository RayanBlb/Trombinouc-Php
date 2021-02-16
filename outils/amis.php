<?php
  //Traitement demande ami
  include("../config/connexionBdD.php");

  if(ISSET($_GET['ajouter'])){
      session_start();
  $idreceveur = $_GET['ajouter'];
  $iddemandeur = $_SESSION['id_utilisateur'];
  $etat = 1;
  $sql = 'INSERT INTO relation_utilisateur(id_emetteur, id_receveur, etat_de_la_relation) VALUES(:id_emetteur, :id_receveur, :etat_de_la_relation)';
        $req = $bd->prepare($sql);
        $marqueurs=array('id_emetteur' => $iddemandeur,'id_receveur' => $idreceveur,'etat_de_la_relation' => $etat);
        $req->execute($marqueurs);
        $resultat = $req->fetch();
        $req->closeCursor();
        header("location:../page_recherche.php?message=2");
  }

  if(ISSET($_GET['ajout'])){
      session_start();
  $iddemandeur = $_GET['ajout'];
  $idreceveur = $_SESSION['id_utilisateur'];
  $etat = 2;
  $sql = 'UPDATE relation_utilisateur SET etat_de_la_relation =:etat_de_la_relation WHERE id_emetteur=:id_emetteur AND id_receveur=:id_receveur';
        $req = $bd->prepare($sql);
        $marqueurs=array('id_emetteur' => $iddemandeur,'id_receveur' => $idreceveur,'etat_de_la_relation' => $etat);
        $req->execute($marqueurs);
        $resultat = $req->fetch();
        $req->closeCursor();
        header("location:../page_demande_amis.php?message=1");
  }


  
  ?>
