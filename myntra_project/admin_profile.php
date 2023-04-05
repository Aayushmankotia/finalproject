<?php

session_start();
@include 'configer.php';

@include 'admin_header.php';

// $admin = $_SESSION['admin'];

// if (!isset($admin)) {
//    header('location:login.php');
// }
// ;


// Get the user's ID from the URL parameter
$user_id = 1;


$result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `users`");
$row = mysqli_fetch_array($result);
$usercount = $row['count'];

$_SESSION['usercount'] = $usercount;

$result = mysqli_query($conn, "SELECT COUNT(*) AS `product` FROM `product`");
$row = mysqli_fetch_array($result);
$productcount = $row['product'];

$_SESSION['productcount'] = $productcount;

$result = mysqli_query($conn, "SELECT COUNT(*) AS `orders` FROM `orders`");
$row = mysqli_fetch_array($result);
$ordercount = $row['orders'];

$_SESSION['ordercount'] = $ordercount;

$result = mysqli_query($conn, "SELECT COUNT(*) AS `cart` FROM `cart`");
$row = mysqli_fetch_array($result);
$cartcount = $row['cart'];

$_SESSION['cartcount'] = $cartcount;

// $_SESSION['user_id'];

// Query the database for the user's information
$sql = "SELECT * FROM users WHERE u_id = $user_id";
$result = mysqli_query($conn, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Fetch the user's information
    $row = mysqli_fetch_assoc($result);
    $user_name = $row['user_name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $created = $row['created'];
    $updated = $row['updated'];
} else {
    echo "User not found";
}

// 
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/admin_style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>PROFILE</title>

</head>

<style>

</style>


<body>
    <div class="main_division_profile">
        <div class="blackdivision">
            ADMIN-PROFILE
        </div>
    </div>

    <div class="flexclass">
        <div class="flexcontainerbox">
            <div class="flexboxes">
                <?php echo $usercount; ?>
            </div>
            <div class="cont_div">
                TOTA USERS
            </div>
        </div>

        <div class="flexcontainerbox">
            <div class="flexboxes">
                <?php echo $productcount; ?>
            </div>
            <div class="cont_div">
                TOTAL PRODUCTS
            </div>
        </div>

        <div class="flexcontainerbox">
            <div class="flexboxes">
                <?php echo $ordercount; ?>
            </div>
            <div class="cont_div">
                TOTAL ORDERS
            </div>
        </div>

        <div class="flexcontainerbox">
            <div class="flexboxes">
                <?php echo $cartcount; ?>
            </div>
            <div class="cont_div">
                ITEMS IN CART
            </div>
        </div>
    </div>


</body>

</html>