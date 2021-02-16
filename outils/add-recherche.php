<?php

session_start();


 if(!empty($_POST['prenom_recherche']) || !empty($_POST['nom_recherche']))

 {

   $nom_recherche= htmlspecialchars($_POST['nom_recherche']);
   $prenom_recherche = htmlspecialchars($_POST['prenom_recherche']);

   header('Location: ../page_recherche.php?prenom_recherche='.$prenom_recherche.'&nom_recherche='.$nom_recherche.'');


}else{

   header('Location: ../page_recherche.php?message=1');

}
 ?>




