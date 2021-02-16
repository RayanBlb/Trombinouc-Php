<?php 

include("./config/connexionBdD.php");

$notre_id_utilisateur = $_SESSION['id_utilisateur'];
$etat_de_la_relation = 1;

$sql = 'SELECT id_receveur,etat_de_la_relation FROM relation_utilisateur WHERE id_receveur =:notre_id_utilisateur and etat_de_la_relation =:etat_de_la_relation' ;
        $req = $bd->prepare($sql);
        $marqueurs=array('notre_id_utilisateur' => $notre_id_utilisateur,'etat_de_la_relation' => $etat_de_la_relation);
        $req->execute($marqueurs);
        $resultat = $req->fetchall();
        $req->closeCursor();
        print_r(count($resultat));
?>