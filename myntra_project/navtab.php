<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="style/myntra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>navigation</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  * {
    margin: 0;
    box-sizing: border-box;
  }

  .asidenavigationbar {
    width: 20%;
    height: 92vh;
    background-color: red;
    display: inline-block;
  }

  .hamburgernav {
    width: 100%;
    background-color: gray;
    height: 70px;
  }

  .asidebox {
    display: flex;
    height: 60px;
    background-color: white;
    border: solid black 2px;
    align-items: center;
    justify-content: center;

  }

  .mensection:hover {


    border-right-color: rgb(111, 243, 111);
    border-right-width: 5px;
    /* font-weight:900; */
  }

  .womensection:hover {

    border-right-color: rgb(232, 245, 52);
    border-right-width: 5px;
    font-weight: 900;
  }

  .kidsection:hover {

    border-right-color: rgb(51, 235, 189);
    border-right-width: 5px;
    font-weight: 900;
  }

  .inpsearch {
    width: 100%;
    border-radius: 20px;
    height: 30px;
    border: solid blue 1px;
    padding: 15px;
  }

  .mainsearch {
    display: flex;
    align-items: center;

  }

  .fasearch {
    margin-right: 38px;
    color: blue;
    z-index: 2;
    margin-top: 1px;
  }

  .searchsection {
    border: none;
    margin: 5px;

  }

  .asidegreen {

    top: 12%;
  }

  .asideorange {

    top: 18%;

  }

  .asideyellow {


    top: 24%;

  }

  .drop_menue {
    background-color: whitesmoke;
    position: absolute;
    left: 20%;
    display: none;
  }

  .mensection:hover>.asidegreen {
    display: block;
  }

  .womensection:hover>.asideorange {
    display: block;
  }

  .kidsection:hover>.asideyellow {
    display: block;
  }
  .aside_drop_profile{
    background-color: greenyellow;
    position: absolute;
    left:20%;
    
  }
</style>

<?php

session_start();



include "configer.php";

$u_id = $_SESSION['u_id'];
$phone = $_SESSION['phone'];
?>

<body>
  <div class="hamburgernav ">
    <a href="logout.php"><img class="logoimg aa"
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-eqlSHJPKwe1riVNwVsJh_2e6KsKBmEmOX87ht807tQ&s"
        alt="LOGO"></a>

  </div>

  <div class="asidenavigationbar">

    <div class="searchsection ">
      <form class="" action="search.php" method="GET">
        <div class="mainsearch">

          <input class="inpsearch" type="text" name="search" placeholder="SEARCH FOR PRODUCTS ">
          <button class="searchButton" href="#">
            <i class="fasearch fa fa-search " aria-hidden="true"></i>
          </button>

        </div>
      </form>

    </div>

    <div class="mensection asidebox">
      <a class="asidemen" href="men.php">MEN</a>
      <section class="asidegreen drop_menue">

        <!-- //sxdfcgvbhjnkmljnhbgvfcdx -->
        <?php

        include 'configer.php';
        $sql = "SELECT * FROM categories WHERE category = 'MEN'";
        $result = mysqli_query($conn, $sql);

        // Group categories by category type and name
        $grouped_categories = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $category_type = $row['category_type'];
          $category_name = $row['category_name'];
          if (!isset($grouped_categories[$category_type])) {
            $grouped_categories[$category_type] = array();
          }
          $grouped_categories[$category_type][] = $category_name;
        }
        ?>

        <span class="dropspan">
          <ul class="dropdown-menus">

            <?php
            // Display categories in a table grouped by category type and name
            echo "<table >";
            echo '<tr>';
            foreach ($grouped_categories as $category_type => $category_names) {
              echo "<td class='tabledata'>";
              echo "<h5 class='green_heading'>" . $category_type . '</h5><br>';
              foreach ($category_names as $category_name) {
                echo '<a class="aa" href="men.php?name=' . $category_name . '">' . $category_name . '</a><br>';
              }
              echo '</td>';
            }
            echo '</tr>';
            echo '</table>';
            ?>
          </ul>
        </span>
      </section>
    </div>
    <!-- green dropdown ends  -->


    <div class="womensection asidebox">
      <a class='asidewomen' href="women.php">WOMEN</a>
      <section class="asideorange drop_menue">

        <?php


        $sql = "SELECT * FROM categories WHERE category = 'WOMEN'";


        $result = mysqli_query($conn, $sql);

        // Group categories by category type and name
        $grouped_categories = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $category_type = $row['category_type'];
          $category_name = $row['category_name'];
          if (!isset($grouped_categories[$category_type])) {
            $grouped_categories[$category_type] = array();
          }
          $grouped_categories[$category_type][] = $category_name;
        }
        ?>



        <span class='dropspan'>
          <ul class="dropdown-menus">



            <?php
            // Display categories in a table grouped by category type and name
            echo "<table>";
            echo '<tr>';
            foreach ($grouped_categories as $category_type => $category_names) {
              echo "<td class='tabledata'>";
              echo "<h5 class='yellow_heading'>" . $category_type . '</h5><br>';
              foreach ($category_names as $category_name) {
                echo '<a class="aa" href="women.php?name=' . $category_name . '">' . $category_name . '</a><br>';
              }
              echo '</td>';
            }
            echo '</tr>';
            echo '</table>';
            ?>
          </ul>


      </section>
    </div>

    <div class="kidsection asidebox">
      <a class='asidekids' href="kids.php">KIDS</a>
      <section class="asideyellow drop_menue">
        <?php

        $sql = "SELECT * FROM categories WHERE category = 'KIDS'";

        $result = mysqli_query($conn, $sql);


        // Group categories by category type and name
        $grouped_categories = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $category_typey = $row['category_type'];
          $category_namey = $row['category_name'];
          if (!isset($grouped_categories[$category_typey])) {
            $grouped_categories[$category_typey] = array();
          }
          $grouped_categories[$category_typey][] = $category_namey;
        }
        ?>
        <span class='dropspan'>
          <ul class="dropdown-menus">
            <?php
            // Display categories in a table grouped by category type and name
            echo "<table>";
            echo '<tr>';
            foreach ($grouped_categories as $category_typey => $category_names) {
              echo "<td class='tabledata'>";
              echo "<h5 class='orangee_heading'>" . $category_typey . '</h5><br>';
              foreach ($category_names as $category_namey) {
                echo '<a class="aa" href="kids.php?name=' . $category_namey . '">' . $category_namey . '</a><br>';
              }
              echo '</td>';
            }
            echo '</tr>';
            echo '</table>';
            ?>
          </ul>

      </section>

    </div>

    <div class="profilesection asidebox">
      <a class="" href="#profile" alt='PROFILE'>
        <i class="fa fa-user-circle-o "></i>
      </a>

      <div class="aside_drop_profile">
        <?php
        if (!isset($u_id)) {
          echo "<h6 class='orange_heading'>WELCOME</h6>
                  <p class='drop_info'>To access account and manage orders</p><br>
                  <a class='login_button' href='login.php'> LOGIN/SIGNUP</a>";
          // echo"<div class='profile_button' ><a class='login_button' href='logout.php'> LOGOUT</a></div>";
        
        } else {
          $sql = "SELECT * FROM users WHERE u_id= '$u_id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_num_rows($result);
          echo "<span class='cyantext'>" . "WELCOME-USER" . "<span>" . "<br>" . "<br>";

          if ($row == 1) {
            while ($row = mysqli_fetch_array($result)) {



              echo "ID : " . $_SESSION['u_id'] = $u_id = $row['u_id'];
              echo "<br>";
              echo "NAME : " . $_SESSION['user_name'] = $user_name = $row['user_name'];
              echo "<br>";
              echo "PHONE : " . $_SESSION['phone'] = $phone = $row['phone'];
              echo "<br>";
              echo "EMAIL : " . $_SESSION['email'] = $row['email'];
              echo "<br>";
              echo "<section class='flexbutton'>";
              echo "<div class='profile_button' ><a class='login_button' href='my_orders.php'>ORDERS</a></div>";
              echo "<div class='profile_button' ><a class='login_button' href='user_update.php'>UPDATE</a></div>";
              echo "<div class='profile_button' ><a class=' profile_button_red login_button' href='logout.php'> LOGOUT</a></div>";
              echo "</section>";
            }
          }
        }


        ?>


      </div>



    </div>
    <div class="cartsection asidebox">
      cart

    </div>
    <div class="daynightsection asidebox">
      daynight

    </div>
  </div>

  <div>

  </div>

</body>

</html>