<?php
 session_start();
  unset($_SESSION['username']); 
  unset($_SESSION['status']); 
   $_SESSION = array();
    session_destroy();
     header("location: http://shreyaset.com/Shreyas/index.php");

   
  
   

   ?>
   
