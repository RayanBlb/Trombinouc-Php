<?php 

include('./config/connexionBdD.php');

$sql = 'SELECT id_utilisateur FROM publication WHERE id_utilisateur =:id_utilisateur';
        $req = $bd->prepare($sql);
        $marqueurs=array('id_utilisateur' => $_SESSION['id_utilisateur']);
        $req->execute($marqueurs);
        $resultat = $req->fetchall();
        $req->closeCursor();

        if(count($resultat) == 0){
        echo "<section class=\"publication\">\n
          <div class= \"information-publication\">\n
            <h2>Vous n'avais enregister aucune publication a votre nom...</h2>\n
            <br>
            <br>
          </div>\n
          </section>";

        }else{

        $sql = 'SELECT id_publication,texte, date FROM publication WHERE id_utilisateur =:id_utilisateur';
        $req = $bd->prepare($sql);
        $marqueurs=array('id_utilisateur' => $_SESSION['id_utilisateur']);
        $req->execute($marqueurs);
        while ($resultat = $req->fetch()){

          echo "<section class=\"publication\">\n
          <div class= \"information-publication\">\n
            <img width=\"70\" height=\"70\" src=\"./img/Profil-image/".recupphoto($_SESSION['id_utilisateur'])."\" alt=\"Photo de profil de ".recupprenom($_SESSION['id_utilisateur'])." ".recupnom($_SESSION['id_utilisateur'])."\"/>\n
            <h2>".recupprenom($_SESSION['id_utilisateur'])." ".recupnom($_SESSION['id_utilisateur'])."</h2>\n
            <p>{$resultat['date']}</p>\n
          </div>\n
          <div class=\"text-publication\">\n
            <p>{$resultat['texte']}</p>\n";
            echo"</div>\n
          <div class=\"option-publication\">\n";

           echo '<a  href="./outils/supprimer-publication.php?supprimer='.$resultat['id_publication'].'"><input style="float:left; margin-top: 20px;margin-bottom: 30px; margin-left:30px; border-radius: 4px; padding: 10px 20px; background-color: #B22222; color:white; " type="submit" class="btn btn-social" value="supprimer cette publication"></a>';

          echo"</div>";

          echo"</section>";

        }
        $req->closeCursor();
      }
        ?>