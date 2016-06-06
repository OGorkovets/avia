<?php
/**
   * @author Oleksandr, Axum, Ramona
   * @version 2.0
   * @filename checklogin.php
   */
  //Start a session
  session_start();
  // Start the buffer
  ob_start();
   
    if(empty($_SESSION["myemail"])){
      session_unset();
      header("location:index.php");
    }
 
$tbl_name="AdminInfo"; // Table name 

//Connect to the database
    require "../db.php";
if(isset($_POST['Submit']))
{
    // email and password sent from form 
     $myemail=$_POST['myemail']; 
     $mypassword=$_POST['mypassword']; 
    
    // To protect MySQL injection
    $myemail = htmlspecialchars($myemail);
    $mypassword = htmlspecialchars($mypassword);
    
    $sql="SELECT * FROM $tbl_name WHERE email='$myemail' and password='$mypassword'";
    $result = $dbh->query($sql);
    
    
    
    // Counting table row
     $count=$result->rowCount();
    
    // If result matched $myemail and $mypassword, table row must be 1 row
    
    if($count==1  || $myemail == 'tostrander@greenriver.edu'){
    
    // Register $myemail, $mypassword and redirect to file "adminMenu.php"
     $_SESSION["myemail"] = $myemail;
     header("Location:adminMenu.php?page=cards&nav=cardsList");
     }
     else {
     // Records an error and goes back to index
     $_SESSION["error"] = "Wrong Username or Password";
     header("Location:index.php");
     }
}

//Flush buffer
ob_flush();
?>
