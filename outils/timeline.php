<?php 

include('./config/connexionBdD.php');
include('determine-id-des-amis.php');
include('recup-info.php');

$test_publication_afficher = 0;

$sql = 'SELECT id_utilisateur,texte,date,id_publication FROM publication ORDER BY date DESC';
$req = $bd->prepare($sql);
$req->execute();
while ($resultat1 = $req->fetch()){

  if(isset($amis_de_lutilisateur)){
    if(count($amis_de_lutilisateur) == 0){
      $nombre_amis = 1;
    }else{
      $nombre_amis=count($amis_de_lutilisateur);
    }
  for ($i=0; $i < $nombre_amis; $i++) { 
    if($resultat1['id_utilisateur'] == $amis_de_lutilisateur[$i] || $resultat1['id_utilisateur'] == $_SESSION['id_utilisateur']){
      $sql2 = 'SELECT prenom, nom,id_utilisateur FROM utilisateurs WHERE id_utilisateur =:id_utilisateur';
      $req2 = $bd->prepare($sql2);
      $marqueurs2=array('id_utilisateur' => $resultat1['id_utilisateur']);
      $req2->execute($marqueurs2);
      $resultat2 = $req2->fetch();
      $req2->closeCursor();

      echo'<section class="publication">';

      echo'<div class= "information-publication">';

      echo'<img width="70" height="70" src="./img/Profil-image/'.recupphoto($resultat2['id_utilisateur']).' " alt="photo de profil de'.$resultat2['prenom'].' '.$resultat2['nom'].'" />';

      echo'<h2>'.$resultat2['prenom'].' '.$resultat2['nom'].'</h2>';
      echo'<p>'.$resultat1['date'].'</p>';

      echo'</div>';

      echo'<div class="text-publication">';

      echo'<p>'.$resultat1['texte'].'</p>';

      echo'</div>';

      echo'<div class= "information-publication">';
      echo'<h2>Commentaire</h2>';
      echo'</div>';

      $sql_recup_com = 'SELECT texte,date,id_utilisateur_poste FROM commentaire WHERE id_publication_com =:id_publication_commenter';
      $req_recup_com = $bd->prepare($sql_recup_com);
      $marqueurs_com=array('id_publication_commenter' => $resultat1['id_publication']);
      $req_recup_com->execute($marqueurs_com);
      $resultat_com = $req_recup_com->fetchall();
      $req_recup_com->closeCursor();

      if(empty($resultat_com)){
        echo" <div class=\"option-publication\">\n";
        echo"<h2 style=\"margin-left: 30px;\" >Aucun commentaire pour l'instant</h2>";
        echo"</div>";

      }else{

        for ($i=0; $i <count($resultat_com) ; $i++) { 
          echo '<div class="information-publication" style="border" >';

          echo'<img width="70" height="70" src="./img/Profil-image/'.recupphoto($resultat_com [$i]['id_utilisateur_poste']).'" alt="photo de profil de" />';

          echo'<h2>'.recupprenom($resultat_com[$i]['id_utilisateur_poste']).' '.recupnom($resultat_com[$i]['id_utilisateur_poste']).'</h2>';

          echo'<p>';
          print_r($resultat_com[$i]['date']);
          echo'</p>';

          echo '<div class="text-publication">';

          echo'<p>'.$resultat_com[$i]['texte'].'</p>';

          echo'</div>';

          echo'</div>';
        }
      }

      echo'<div class="option-publication">';

      echo'<div class="formulaire-publication">';

      echo'<form action="./outils/add-commentaire.php?id_publication='.$resultat1['id_publication'].' " method="POST">';
      echo'<label for="publication">Exprimez-vous,</label>';
      echo'<br>';
      echo'<br>';
      echo'<textarea id="publication" name="user_commentaire"></textarea>';
      echo'<br>';
      echo'<button>Publier</button>';
      echo'</div>';
      echo'</form>';
      echo'</div>';

      echo'</section>';

      $test_publication_afficher = 1;
    }
  }
}
}

$req->closeCursor();

if($test_publication_afficher == 0){

  echo'<section class="publication">';
  echo'<div class="information-publication">';;
  echo'<h2>Il n\'a pas encore d\'activité sur votre TimeLine...</h2>';
  echo'</div>';
  echo'</section>';

}
?>