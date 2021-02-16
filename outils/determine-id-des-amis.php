<?php

  include('./config/connexionBdD.php');

  $id_utilisateur_online = $_SESSION['id_utilisateur'];
  $etat_de_la_relation = 2;

  $sql = 'SELECT id_emetteur,id_receveur,etat_de_la_relation FROM relation_utilisateur WHERE (id_receveur =:id_utilisateur_online OR id_emetteur =:id_utilisateur_online) AND etat_de_la_relation=:etat_de_la_relation'; 

  $req = $bd->prepare($sql);
  $marqueurs=array('id_utilisateur_online' => $id_utilisateur_online , 'etat_de_la_relation' => $etat_de_la_relation );
  $req->execute($marqueurs);
  $resultat_tableau_amis = $req->fetchall();
  
   $nombre_amis = count($resultat_tableau_amis);

   for ($i=0; $i < $nombre_amis ; $i++) { 
    if($resultat_tableau_amis[$i]['id_emetteur'] == $id_utilisateur_online){
      $id_amis_de_lutilisateur = $resultat_tableau_amis[$i]['id_receveur'];
    }else{
      $id_amis_de_lutilisateur = $resultat_tableau_amis[$i]['id_emetteur'];
    } 

    $amis_de_lutilisateur[$i]=$id_amis_de_lutilisateur;

   }

?>