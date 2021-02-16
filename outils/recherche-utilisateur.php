<?php

include('./outils/recup-info.php');

if(!empty($_GET['nom_recherche']) || !empty($_GET['prenom_recherche'])){

  include('./config/connexionBdD.php');
  
  $prenom_recherche = $_GET['prenom_recherche'];
  $nom_recherche = $_GET['nom_recherche'];

  $sql = 'SELECT prenom,nom FROM utilisateurs WHERE prenom =:prenom AND nom =:nom';
  $req = $bd->prepare($sql);
  $marqueurs=array('nom' => $nom_recherche , 'prenom' => $prenom_recherche );
  $req->execute($marqueurs);
  $resultat = $req->fetchall();
  $req->closeCursor();

  if(count($resultat) != 0){

    $sql3 = 'SELECT id_utilisateur,prenom, nom,date_de_naissance,description,lieu_de_residence,travail_actuel,photo_profil  FROM utilisateurs WHERE prenom =:prenom AND nom =:nom';
    $req3 = $bd->prepare($sql3);
    $marqueurs3=array('nom' => $nom_recherche , 'prenom' => $prenom_recherche );
    $req3->execute($marqueurs3);
    while ($resultat3 = $req3->fetch()){

      if(empty($resultat3['description'])){
        $resultat3['description'] = "Aucun description pour l'instant.";
      }

      echo "<section class=\"publication\">\n
      <div class= \"information-publication\">\n
      <img width=\"70\" height=\"70\" src=\"./img/Profil-image/".recupphoto($resultat3['id_utilisateur'])."\" alt=\"Photo de profil de ".recupprenom($resultat3['id_utilisateur'])." ".recupnom($resultat3['id_utilisateur'])."\"/>\n
      <h2>{$resultat3['prenom']} {$resultat3['nom']}</h2>\n
      <p>Description : {$resultat3['description']}</p>\n
      </div>\n
      <div class=\"text-publication\">\n
      <ul>
      <li><p>Date de naissance : {$resultat3['date_de_naissance']}</p></li>\n
      <li><p>Lieu de residence : {$resultat3['lieu_de_residence']}</p></li>\n
      <li><p>Travail actuel : {$resultat3['travail_actuel']}</p></li>\n
      </ul>
      </div><div>";

      if($_SESSION['id_utilisateur'] == $resultat3['id_utilisateur']){
        echo '<a  href="./page_profil.php"><input style="float:right; margin-right: 50px; margin-bottom: 50px; border-radius: 4px; padding: 10px 20px; background-color: #008cc7; color:white; " type="submit" class="btn btn-social" value="Votre profil"></a>';
    }else{
           $sql_verification = 'SELECT id_emetteur,id_receveur,etat_de_la_relation FROM relation_utilisateur WHERE (id_receveur =:id_utilisateur_online AND id_emetteur =:id_utilisateur_rechercher) OR (id_receveur =:id_utilisateur_rechercher AND id_emetteur =:id_utilisateur_online)'; 

      $req_verification = $bd->prepare($sql_verification);
      $marqueurs_verification=array('id_utilisateur_online' => $_SESSION['id_utilisateur'] , 'id_utilisateur_rechercher' => $resultat3['id_utilisateur'] );
      $req_verification->execute($marqueurs_verification);
      $resultat_verification = $req_verification->fetchall();

      $tableau_resultat_verification=count($resultat_verification);

      if($tableau_resultat_verification == 0){echo '<a  href="./outils/amis.php?ajouter='.$resultat3['id_utilisateur'].'"><input style="float:right; margin-right: 50px; margin-bottom: 50px; border-radius: 4px; padding: 10px 20px; background-color: #008cc7; color:white; " type="submit" class="btn btn-social" value="Ajouter en Ami"></a>';}else{

      for ($i=0; $i < $tableau_resultat_verification ; $i++) { 

      if($resultat_verification[$i]['etat_de_la_relation'] == 2){
        echo '<p style="float:right; margin-right: 50px; margin-bottom: 50px; color: grey; font-style: italic;">Vous êtes deja amis</p>';
      }elseif($resultat_verification[$i]['etat_de_la_relation'] == 1 ){
        echo '<p style="float:right; margin-right: 50px; margin-bottom: 50px; color: grey; font-style: italic;">En attente</p>';
      }
    }
}
      echo "</div>\n
      </section>";

        }
    }
    $req3->closeCursor();
  }else{
    header("Location:page_recherche.php?message=3");
  }
}

?>
