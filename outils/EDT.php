<?php
  session_start();
  session_destroy();//Destruction de la session
  header("location:http://iutsa.unice.fr/gpushow2/?dept=RT&interactive");//Redirection avec message de confirmation
 ?>