<?php
  session_start();
  session_destroy();//Destruction de la session
  header("location:https://login.unice.fr/login?service=http://ent.unice.fr/uPortal/Login");//Redirection avec message de confirmation
 ?>