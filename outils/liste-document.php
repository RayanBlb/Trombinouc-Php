<?php function listeRep($unRep) {
         $allFic=array();
         if (is_dir($unRep) == FALSE) {
             echo "{$unRep} n'est pas un répertoire !";
         }
         else {
          $rep = opendir($unRep);
          if ($rep == FALSE) {
              echo "Impossible d'ouvrir le répertoire {$unRep}";
          }
          else {
              while (($fic = readdir($rep)) == TRUE) {
                  $allFic[]=$fic;
              }
              closedir($rep);
              sort($allFic);
          }
         }
         return $allFic;
     }?>
