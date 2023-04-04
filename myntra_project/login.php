<?php

session_start();
include 'configer.php';
if (isset($_SESSION['registered']) || $_SESSION['registered']) {
    header('Location: myntra.php');
    exit;
}


$phoneerr = null;
$flag = TRUE;

if (isset($_POST['submit'])) {


    //     // Retrieve the form data using the POST method


    if (!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
        $phoneerr = "INVALID PHONE NUMBER ";
        $flag = false;
    } else {
        $phone = $_POST['phone'];
    }

    echo $_SESSION['phone'] = $phone;
    echo "<br>";
    if ($flag) {
        $sql = "SELECT * FROM users WHERE phone = '$phone'";
        echo $sql;


        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);


        if ($row === 1) {
            while ($row = mysqli_fetch_array($result)) {

echo "<br>";

                echo $_SESSION['u_id'] = $u_id = $row['u_id'];
               echo  $_SESSION['user_name'] = $user_name = $row['user_name'];
               echo $_SESSION['phone'] = $phone = $row['phone'];
               echo $_SESSION['registered'] = $u_id;
              echo $_SESSION['role_id']= $row['role_id'];

            }
            if ($_SESSION['role_id'] == 1) {
                $_SESSION['admin'] = 'admin';
                header("Location:admin_page.php");
            } else {
                header("Location:myntra.php");
            }


        } else {
            echo "<script> alert('COMPLETED YOUR SIGNUP'); 
  window.location.href = 'registration.php';
  </script>";

        }

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
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/login .css">
    <title>login/signup</title>
</head>

<body>

    <?php
    // @include 'navigationbar.php';
    ?>
    <!-- header section ends  -->
    <!-- html form is created below -->

    <!-- main section  -->
    <section class="center">
        <div class='myntraimg'>
            <img class='loginimage'
                src='https://static.vecteezy.com/system/resources/thumbnails/003/440/464/small_2x/empty-shopping-bag-for-advertising-and-branding-free-vector.jpg'
                alt='##'>
        </div>

        <!-- from is created -->
        <form class="order" action="#" method="POST">

            <!-- labels and input field are used in this form   -->
            <div class="inputdivision">
                <label class="firstlabel" for="">LOGIN OR SIGNUP</label>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" type="tel" name="phone" placeholder="+91 | Mobile Number*">
                <?php echo "<span>" . $phoneerr . "<span>"; ?>

            </div>

            <div class="inputdivision">
                <small>By Continuing, I agree to the <a class='colorred' href='#'>Terms of Use</a> &<a class='colorred'
                        href='#'> Privacy Policy</a></small>
            </div>

            <div class="inputdivision  textcenter">
                <input class="input redbackground" type="submit" name="submit" value="CONTINUE">
            </div>


        </form>
        <!-- form tag closing -->


    </section>
    <!-- main section close  -->





</body>

</html>