<?php
  
session_start();

// Establish a connection to the database

// $xyz= $_SESSION['phone'] = "58649";
// echo $xyz;
include 'configer.php';

if (isset($_POST['submit'])){

    

//     // Retrieve the form data using the POST method
//     $name = $_POST["name"];
    $phone = $_POST["phone"];
    echo $_SESSION['phone'] = $phone;
    echo "<br>";
    
//     $pincode = $_POST["pincode"];
//     $address = $_POST["address"];
//     $city = $_POST["city"];
//     $state = $_POST["state"];
        $sql = "SELECT * FROM users WHERE phone = '$phone'";
        echo $sql;


        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        echo $row;
       
        if($row === 1){
            while ($row = mysqli_fetch_array($result)) {
             

               echo $id = $row['user_id'];
               echo $name = $row['user_name'];
               echo $email = $row['email'];
               echo $pass = $row['pass'];
                echo $phone = $row['phone'];
              

            }
            header("Location:registration.php");
          
        }
        else{
          header("Location:registration.php");  
          echo "comp your registration";
          echo"<br>";
          echo $_SESSION['phone'];
          

        }
        

       
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="myntra.css">
    <link rel="stylesheet" href="login .css">
    <title>login/signup</title>
</head>
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
                    <li><a href="men.html">T-Shirts</a></li>
                    <li><a href="men.html">Casual Shirts</a></li>
                    <li><a href="men.html">Formal Shirts</a></li>
                    <li><a href="men.html">Jackets</a></li>
                    <li><a href="men.html">Rain Jackets</a></li>
                    <li><a href="men.html">Jackets</a></li>
                  </ul>
                </span>
                <span class='dropspan'>
                  <ul class="dropdown-menu">
                    <h5 class="green_heading">Bottomwear</h5>
                    <li><a href="men.html">Jeans</a></li>
                    <li><a href="men.html">Casual Trousers</a></li>
                    <li><a href="men.html">Formal Trousers</a></li>
                    <li><a href="men.html">Jeans</a></li>
                    <li><a href="men.html">Shorts</a></li>
                    <li><a href="men.html">Track Pants & Joggers</a></li>

                  </ul>
                </span>
                <span class='dropspan'>
                  <ul class="dropdown-menu">
                    <h5 class="green_heading">Footwear</h5>
                    <li><a href="men.html">Formal Shoes</a></li>
                    <li><a href="men.html">Sports Shoes</a></li>
                    <li><a href="men.html">Sneakers</a></li>
                    <li><a href="men.html">Sandals & Floaters</a></li>
                    <li><a href="men.html">Flip Flops</a></li>
                    <li><a href="men.html">Socks</a></li>

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
                    <li><a href="women.html">Kurtas & Suits</a></li>
                    <li><a href="women.html">Kurtis, Tunics & Tops</a></li>
                    <li><a href="women.html">Sarees</a></li>
                    <li><a href="women.html">Ethnic Wear</a></li>
                    <li><a href="women.html">Skirts & Palazzos</a></li>
                    <li><a href="women.html">Jackets</a></li>
                  </ul>
                </span>

                <span class='dropspan'>
                  <ul class="dropdown-menu">
                    <h5 class="yellow_heading">Western Wear</h5>
                    <li><a href="women.html">Dresses</a></li>
                    <li><a href="women.html">Tops</a></li>
                    <li><a href="women.html">Tshirts</a></li>
                    <li><a href="women.html">Jeans</a></li>
                    <li><a href="women.html">Jackets & Coats</a></li>
                    <li><a href="women.html">Sweaters</a></li>
                  </ul>
                </span>

              </section>
            </div>
            <!-- yellow dropdown ends -->

            <!-- orange dropdown section  -->
            <div class="orange">
              <a class='link orangedrop' href="kids.html">KIDS</a>

              <section class="hidden_menu_orange hidden_menu">
                <span class='dropspan'>
                  <ul class="dropdown-menu">
                    <h5 class="orange_heading">boys cloths</h5>
                    <li><a href="kids.html">T-Shirts</a></li>
                    <li><a href="kids.html">Casual Shirts</a></li>
                    <li><a href="kids.html">Jeans</a></li>
                    <li><a href="kids.html">pent</a></li>
                    <li><a href="kids.html">Casual Trousers</a></li>
                    <li><a href="kids.html">Formal Trousers</a></li>
                  </ul>
                </span>

                <span class='dropspan'>
                  <ul class="dropdown-menu">
                    <h5 class="orange_heading">girls cloths</h5>
                    <li><a href="kids.html">Dresses</a></li>
                    <li><a href="kids.html">Tops</a></li>
                    <li><a href="kids.html">Tshirts</a></li>
                    <li><a href="kids.html">Jeans</a></li>
                    <li><a href="kids.html">Shrugs</a></li>
                    <li><a href="kids.html">Sweaters</a></li>
                  </ul>
                </span>

                <span class='dropspan'>
                  <ul class="dropdown-menu">
                    <h5 class="orange_heading">footware</h5>
                    <li><a href="kids.html">Casual Shoes</a></li>
                    <li><a href="kids.html">Formal Shoes</a></li>
                    <li><a href="kids.html">Sports Shoes</a></li>
                    <li><a href="kids.html">heels</a></li>
                    <li><a href="kids.html">sandels</a></li>
                    <li><a href="kids.html">school shoes</a></li>
                  </ul>
                </span>
              </section>
            </div>
            <!-- orange section ends  -->
          </div>
          <div class="container2"><!--this container using flex box-->

            <!-- search bar section  -->
            <div class="searchBox">
              <input class="searchInput" type="text" name=""
              placeholder="SEARCH FOR PRODUCTS ">
              <button class="searchButton" href="#">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>

            </div>
            <a class="anchor_padding" href="#profile">profile</a>
            <a class="anchor_padding" href="#CART">CART</a>
          </div>
        </div>
      </nav>
      <!-- navigation section ends  -->


    </header>


<!-- html form is created below -->

    <!-- main section  -->
    <section class="center">
        <div class='myntraimg'>
            <img class='loginimage' src='https://static.vecteezy.com/system/resources/thumbnails/003/440/464/small_2x/empty-shopping-bag-for-advertising-and-branding-free-vector.jpg' alt= '##'>
        </div>

    <!-- from is created -->
        <form class="order" action="" method="POST"> 

        <!-- labels and input field are used in this form   -->
            <div class="inputdivision">
                <label class="firstlabel" for="">LOGIN OR SIGNUP</label>
            </div>

            <div class="inputdivision textcenter">    
                <input class="input" type="tel" name="phone" placeholder="+91 | Mobile Number*" >  
            </div>

            <div class="inputdivision">
               <small>By Continuing, I agree to the  <a class='colorred' href ='#'>Terms of Use</a> &<a class='colorred' href ='#'> Privacy Policy</a></small> 
            </div>

            <div class="inputdivision  textcenter">
                <input class="input redbackground" type="submit" name="submit" value="CONTINUE" >    
            </div>
            

        </form>
        <!-- form tag closing -->


    </section>
    <!-- main section close  -->




    
</body>
</html>