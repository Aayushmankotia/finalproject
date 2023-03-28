<?php
session_start();
// echo $_SESSION['phone'];
// Establish a connection to the database 
include 'configer.php';



//  echo $_SESSION['phone'] = $phone;



if (isset($_POST['create'])){
//  $xx = $_SESSION['phone'];
// session_destroy();
// Retrieve the form data using the POST method
$role_id = 2;
$phone = $_SESSION['phone'] ;  // Enclose phone number in quotes to make it a string value
$user_name = $_POST["user_name"];

$email = $_POST["email"];
$password = $_POST['pass'];
// $password = "#" . password_hash($_POST["pass"], PASSWORD_DEFAULT);

// SQL query to insert user data into table
$sql = "INSERT INTO users (role_id, phone, user_name, email, pass, created, updated) VALUES ('$role_id', '$phone', '$user_name', '$email', '$password', NOW(), NOW())";
 
// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
  echo "<script> alert('INFORMATION COMPLETED'); 
  window.location.href = 'myntra.html';
  </script>";
    // header ("location:myntra.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myntra.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>firstpage</title>

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
              <a href="#CART">CART</a>
            </div>
          </div>
        </nav>
        <!-- navigation section ends  -->
  
  
      </header>
      <!-- header section ends  -->

      <!-- <div class="maindivisionforcentertheform">


      </div>
     

      <section class="center"> -->


        <section class="center" >
        <!-- from is created -->
            <form class="order" action="#" method="POST"> 
    
            <!-- labels and input field are used in this form   -->
                <div class="inputdivision">
                    <label class="firstlabel" for=""> <b class="fontsize">Complete your sign up</b></label>
                </div>
                <div class="inputdivision">
                    <label class="firstlabel" for="">Mobile Number</label>
                    <div class="numbersession"> 
                    <?php echo $_SESSION['phone'];?>
                       <!-- <input type="hidden" name ="phone" value="session ki value" placeholder="session bnana pdega ">                  -->
                    </div>
                </div>

                <div class="inputdivision textcenter"> 
                    <input class="input" type="password" name="pass" placeholder="Create Password*" >
                </div>

                <div class="inputdivision textcenter"> 
                    <input class="input" type="text" name="user_name" placeholder="Name*" >
                </div>
    
                <div class="inputdivision textcenter">    
                    <input class="input" type="email" name="email" placeholder="Email(optional)" >  
                </div>
    
                <div class="inputdivision">
                    <label class="secondlabel" for="gender">Select Gender: 
                    <input class="radiobuttons" type="radio" name="gender" value="Male" id="gender">Male
                    <input class="radiobuttons" type="radio" name="gender" value="Female" id="gender" > Female
                </label>  
                </div>
    
    
                <div class="inputdivision  textcenter">
                    <input class="input redbackground" type="submit" name="create" value="CREATE ACCOUNT" >    
                </div>
    
    
            </form>
            <!-- form tag closing -->
    
    
        </section>
        <!-- main section close  -->
    
</body>
</html>