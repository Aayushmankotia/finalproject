<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="myntra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>firstpage</title>

</head>
<?php
include "configer.php";

$u_id = $_SESSION['u_id'];
$phone = $_SESSION['phone']; 
?>

<body>
  <header>
    <!-- navigation section start -->
    <nav>
      <!-- main division  -->
      <div class="container1">
        <div class="container">
          <div>
            <!-- logo image  -->
            <a href=""><img class="logoimg"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-eqlSHJPKwe1riVNwVsJh_2e6KsKBmEmOX87ht807tQ&s"
                alt="LOGO"></a>
          </div>
          <!-- green background dropdown  -->
          <div class="green">

            <a class="link greendrop" href="#MEN">MEN</a>
            <section class="hidden_menu_green hidden_menu">
              <span class="dropspan">
                <ul class="dropdown-menu">
                  <h5 class="green_heading">Topwear</h5>
                  <li><a href="men.php">T-Shirts</a></li>
                  <li><a href="men.php">Casual Shirts</a></li>
                  <li><a href="men.php">Formal Shirts</a></li>
                  <li><a href="men.php">Jackets</a></li>
                  <li><a href="men.php">Rain Jackets</a></li>
                  <li><a href="men.php">Jackets</a></li>
                </ul>
              </span>
              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="green_heading">Bottomwear</h5>
                  <li><a href="men.php">Jeans</a></li>
                  <li><a href="men.php">Casual Trousers</a></li>
                  <li><a href="men.php">Formal Trousers</a></li>
                  <li><a href="men.php">Jeans</a></li>
                  <li><a href="men.php">Shorts</a></li>
                  <li><a href="men.php">Track Pants & Joggers</a></li>

                </ul>
              </span>
              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="green_heading">Footwear</h5>
                  <li><a href="men.php">Formal Shoes</a></li>
                  <li><a href="men.php">Sports Shoes</a></li>
                  <li><a href="men.php">Sneakers</a></li>
                  <li><a href="men.php">Sandals & Floaters</a></li>
                  <li><a href="men.php">Flip Flops</a></li>
                  <li><a href="men.php">Socks</a></li>

                </ul>
              </span>
            </section>
          </div>
          <!-- green dropdown ends  -->

          <!-- yellow dropdown section -->
          <div class="yellow">
            <a class='link yellowdrop ' href="#WOMEN">WOMEN</a>
            <section class="hidden_menu_yellow hidden_menu">
              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="yellow_heading">Indian & Fusion Wear</h5>
                  <li><a href="women.php">Kurtas & Suits</a></li>
                  <li><a href="women.php">Kurtis, Tunics & Tops</a></li>
                  <li><a href="women.php">Sarees</a></li>
                  <li><a href="women.php">Ethnic Wear</a></li>
                  <li><a href="women.php">Skirts & Palazzos</a></li>
                  <li><a href="women.php">Jackets</a></li>
                </ul>
              </span>

              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="yellow_heading">Western Wear</h5>
                  <li><a href="women.php">Dresses</a></li>
                  <li><a href="women.php">Tops</a></li>
                  <li><a href="women.php">Tshirts</a></li>
                  <li><a href="women.php">Jeans</a></li>
                  <li><a href="women.php">Jackets & Coats</a></li>
                  <li><a href="women.php">Sweaters</a></li>
                </ul>
              </span>

            </section>
          </div>
          <!-- yellow dropdown ends -->

          <!-- orange dropdown section  -->
          <div class="orange">
            <a class='link orangedrop' href="kids.php">KIDS</a>

            <section class="hidden_menu_orange hidden_menu">
              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="orange_heading">boys cloths</h5>
                  <li><a href="kids.php">T-Shirts</a></li>
                  <li><a href="kids.php">Casual Shirts</a></li>
                  <li><a href="kids.php">Jeans</a></li>
                  <li><a href="kids.php">pent</a></li>
                  <li><a href="kids.php">Casual Trousers</a></li>
                  <li><a href="kids.php">Formal Trousers</a></li>
                </ul>
              </span>

              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="orange_heading">girls cloths</h5>
                  <li><a href="kids.php">Dresses</a></li>
                  <li><a href="kids.php">Tops</a></li>
                  <li><a href="kids.php">Tshirts</a></li>
                  <li><a href="kids.php">Jeans</a></li>
                  <li><a href="kids.php">Shrugs</a></li>
                  <li><a href="kids.php">Sweaters</a></li>
                </ul>
              </span>

              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <h5 class="orange_heading">footware</h5>
                  <li><a href="kids.php">Casual Shoes</a></li>
                  <li><a href="kids.php">Formal Shoes</a></li>
                  <li><a href="kids.php">Sports Shoes</a></li>
                  <li><a href="kids.php">heels</a></li>
                  <li><a href="kids.php">sandels</a></li>
                  <li><a href="kids.php">school shoes</a></li>
                </ul>
              </span>
            </section>
          </div>
          <!-- orange section ends  -->
        </div>
        <div class="container2"><!--this container using flex box-->

          <!-- search bar section  -->
           <form  class="marginauto" action="search.php" method="GET">
            <div class="searchBox">
             
              <input class="searchInput" type="text" name="search" placeholder="SEARCH FOR PRODUCTS ">
              <button class="searchButton" href="#">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            
            </div>
              </form>
        

          <div class="profile_div">
            <a class="profile anchor_margin" href="#profile" alt='PROFILE'>
              <i class="fa fa-user-circle-o "></i>
            </a>

            <div class="drop_profile">
                <?php
                if(!isset($u_id)){
                  echo "<h6 class='orange_heading'>WELCOME</h6>
                  <p class='drop_info'>To access account and manage orders</p><br>
                  <a class='login_button' href='login.php'> LOGIN/SIGNUP</a>";
                  // echo"<div class='profile_button' ><a class='login_button' href='logout.php'> LOGOUT</a></div>";
                  
                }
                else{
                    $sql="SELECT * FROM users WHERE phone= '$phone'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_num_rows($result);
                  echo "<span class='cyantext'>"."WELCOME-USER"."<span>"."<br>"."<br>";
            
                    if($row == 1) {
                        while ($row = mysqli_fetch_array($result)) {
            
          
            
                            echo "ID : ".$_SESSION['u_id'] = $u_id = $row['u_id']; 
                            echo"<br>";
                           echo  "NAME : ".$_SESSION['user_name'] = $user_name = $row['user_name'];
                           echo"<br>";
                           echo "PHONE : ".$_SESSION['phone'] = $phone = $row['phone'];
                           echo"<br>";
                          echo "EMAIL : ".$_SESSION['email']= $row['email'];
                          echo"<br>";

                          echo "<div class='profile_button' ><a class='login_button' href='logout.php'> LOGOUT</a></div>";
                        }
                        }
                }
                
                
                ?>

              
            </div>

          </div>

          <div class="cart_div">
            <a class="cart anchor_margin" href="cart.php" alt='CART'>
              <i class="fa fa-cart-plus "></i></a>
          </div>
        </div>
      </div>
    </nav>
    <!-- navigation section ends  -->


  </header>
  <!-- header section ends  -->
</body>

</html>