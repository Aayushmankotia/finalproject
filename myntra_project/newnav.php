<?php
session_start();
include "configer.php";

$u_id = $_SESSION['u_id'];

$sql = "SELECT COUNT(*) as count_value FROM cart WHERE u_id = '$u_id'";

// execute the query
$result = mysqli_query($conn, $sql);

// fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// get the count value from the array
$count_value = $row['count_value'];

// display the count value
echo "The count value is: " . $count_value;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="style/myntra.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>firstpage</title>

</head>

<body>
 
          </div>
              

          <div class="cart_div" >
          <span><?php echo $count_value; ?></span>
            <a class="cart anchor_margin" href="cart.php" alt='CART'>
              <i class="fa fa-cart-plus "></i></a>
          </div>
        </div>
     
</body>

</html>