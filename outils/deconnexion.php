<?php
  session_start();
  session_destroy();//Destruction de la session
  header("location:../index.php?message=7");//Redirection avec message de confirmation
 ?>