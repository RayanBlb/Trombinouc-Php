<?php
include('./outils/liste-document.php');
include('./config/connexionBdD.php');

$dossier = './img/Galerie-image';
$i=0;

$Liste_repertoire=listeRep($dossier);

foreach ($Liste_repertoire as $place => $Nom_elements){
     $liste_element_repertoire[$i]=$Nom_elements;
     $i++;
}

$nombre_element= count($liste_element_repertoire);

if($nombre_element!=2){
	for ($i=2; $i < $nombre_element ; $i++){
		echo'<section  class="formulaire-connexion">';
		echo'<div class="wallPro">';
		echo'<img style="width: 100%; border-radius: 10px;" src="./img/Galerie-image/'.$liste_element_repertoire[$i].'" alt="Photo de la galerie commune"/>';
		echo'</div>';
		echo'</section>';
	}

}else{
	echo "<section class=\"publication\">\n
          <div class= \"information-publication\">\n
            <h2>Pas encore de photo dans la galerie commune !</h2>\n
            <br>
            <br>
          </div>\n
          </section>";
}

?>