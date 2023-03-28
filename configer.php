 <?php
 
        // servername => localhost
        // username => admin
        // password => admin
        // database name => project
        $conn = mysqli_connect("localhost", "admin", "admin", "project");
       
        // Check connection
        if(!$conn){

          echo "disconeected";
          // die('Could not Connect MySql Server:' .mysql_error());
        }
        else{
          echo '';
        }

         
        ?>