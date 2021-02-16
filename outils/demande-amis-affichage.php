<?php

  include('./config/connexionBdD.php');
  include './outils/recup-info.php';

  $id_receveur = $_SESSION['id_utilisateur'];
  $etat_de_la_relation = 1;

  $sql = 'SELECT id_emetteur,id_receveur,etat_de_la_relation FROM relation_utilisateur WHERE id_receveur =:id_receveur AND etat_de_la_relation =:etat_de_la_relation';
  $req = $bd->prepare($sql);
  $req2 = $bd->prepare($sql);
  $marqueurs=array('id_receveur' => $id_receveur , 'etat_de_la_relation' => $etat_de_la_relation );
  $req->execute($marqueurs);
  $req2->execute($marqueurs);
  $resultat_verification = $req->fetchall();

  if(!empty($resultat_verification)){


    while($resultat = $req2->fetch()){


    $sql3 = 'SELECT id_utilisateur,prenom, nom,date_de_naissance,description,lieu_de_residence,travail_actuel  FROM utilisateurs WHERE id_utilisateur =:id_du_demandeur';

    $req3 = $bd->prepare($sql3);
    $marqueurs3=array('id_du_demandeur' => $resultat['id_emetteur']);
    $req3->execute($marqueurs3);

    while ($resultat3 = $req3->fetch()){
      if(empty($resultat3['description'])){
        $resultat3['description'] = "Aucun description pour l'instant.";
      }
      echo "<section class=\"publication\">\n
      <div class= \"information-publication\">\n
      <img width=\"70\" height=\"70\" src=\"./img/Profil-image/".recupphoto($resultat3['id_utilisateur'])."\" alt=\"Photo de profil de ".recupprenom($resultat3['id_utilisateur'])." ".recupnom($resultat3['id_utilisateur'])."\"/>
      <h2>{$resultat3['prenom']} {$resultat3['nom']}</h2>\n
      <p>Description : {$resultat3['description']}</p>\n
      </div>\n
      <div class=\"text-publication\">\n
      <ul>
      <li><p>Date de naissance : {$resultat3['date_de_naissance']}</p></li>\n
      <li><p>Lieu de residence : {$resultat3['lieu_de_residence']}</p></li>\n
      <li><p>Travail actuel : {$resultat3['travail_actuel']}</p></li>\n
      </ul>";
//$resultat3['id_utilisateur'] id du demandeur d'amis
      echo '<a  href="./outils/amis.php?ajout='.$resultat3['id_utilisateur'].'"><input style="float:right; margin-right: 50px; border-radius: 4px; padding: 10px 20px; background-color: #008cc7; color:white; " type="submit" class="btn btn-social" value="Accepter la demande d\'ami"></a>';

      echo "</div>\n
      </section>";
    }
    $req3->closeCursor();
}
  }else{
     echo "<section class=\"publication\">\n
      <div class= \"information-publication\">\n
      <h2>Vous n'avais aucune demande d'amis...</h2>\n";

      echo "</div>\n
      </section>";
  }

$req->closeCursor();

?>
