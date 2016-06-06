<?php
  /**
   * @author Oleksandr, Axum, Ramona
   * @version 2.0
   * @filename sectionList.php
   */
  //Start a session
  session_start();
  // Start the buffer
  ob_start();
   
    if(empty($_SESSION["myemail"])){
      session_unset();
      header("location:index.php");
    }

    //Connect to the database
    require "../db.php";

?>

<h2>Sections:</h2>
<br>

<!--  Shows existing Sections added -->
 <table width="100%" class="display" id="table" cellspacing="0">
        <thead>
            <tr>
                <th>Section</th>
                <th>Locked</th>
            </tr>
        </thead>
 
        <tfoot>
             <tr>
                <th>Section</th>
                <th>Locked</th>
            </tr>
        </tfoot>
        <tbody>
            
            <?php

                //Display contacts from database
                $sql = "SELECT sectitle, locked FROM Section ORDER BY secid";
                $result = $dbh->query($sql);
                foreach ($result as $row) {
                    printf("<tr><td>%s</td>", $row['sectitle']);
                    if ($row['locked'] == 0){
                        printf("<td>%s</td></tr>", "Unlocked");
                    }else if ($row['locked'] == 1){
                        printf("<td>%s</td></tr>", "Locked");
                    }
                    

                }
            ?>
        </tbody>
    </table>

<?php
 //Flush buffer
 ob_flush();
?>