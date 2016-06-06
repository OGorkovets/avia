<?php
/**
   * @author Oleksandr, Axum, Ramona
   * @version 2.0
   * @filename session_admin.php
   */
  //Start a session
  session_start();
  // Start the buffer
  ob_start();
   
    if(empty($_SESSION["myemail"])){
      session_unset();
      header("location:index.php");
    }

?>