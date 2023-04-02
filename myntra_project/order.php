 <?php
 session_start();
 echo $_SESSION['a_id'];
       echo $_SESSION['name'] ;
       echo  $_SESSION['phone'];;
        echo $_SESSION['pincode'];
        echo $_SESSION['address'];
     echo $_SESSION['city'];
      echo   $_SESSION['state'];

      $sql = "SELECT * FROM cart WHERE phone = '$phone'";
      echo $sql;

    
      $result = mysqli_query($conn, $sql);
      $row = mysqli_num_rows($result);
     
      
      if($row === 1){
          while ($row = mysqli_fetch_array($result)) {
           
           
          $_SESSION['id'] = $id = $row['u_id'];
          $_SESSION['role_id'] = $role_id = $row['role_id'];
          $_SESSION['name'] =  $name = $row['user_name'];
          $_SESSION['email'] = $email = $row['email'];
          $_SESSION['pass'] = $pass = $row['pass'];
          $_SESSION['phone'] = $phone = $row['phone'];
          $_SESSION['registered'] = $id;

        
          }
          if($_SESSION['role_id'] == 1){
            $_SESSION['admin'] = 'admin';
            header("Location:admin_page.php");
          }
          else{
            header("Location:myntra.php");
          }
        }


        ?>