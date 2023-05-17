<?php session_start();
@include 'configer.php';
@include 'admin_header.php';
$admin = $_SESSION['admin'];
if (!isset($admin)) {
    header('location:login.php');
}
;
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
$sql = "SELECT * FROM users WHERE u_id = $user_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_name = $row['user_name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $created = $row['created'];
    $updated = $row['updated'];
} else {
    echo "User not found";
}
mysqli_close($conn); ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="style/myntra.css" rel="stylesheet">
        <link href="style/admin_style.css" rel="stylesheet">
        <link rel="Website Icon" type="png" href="images/deku.png">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <title>PROFILE</title>
    </head>

    <body>
        <div class="main_division_profile">
            <div class="blackdivision">ADMIN-PROFILE</div>
        </div>
        <div class="admincenter admininfo">
            <div class="admincenter adminimage"><img alt="avatar" class="imgz" src="images/Z"></div>
            <div class="admincenter">
                <?php echo $user_name; ?>
            </div>
            <div class="admincenter">PHONE :
                <?php echo $phone; ?>
            </div>
            <div class="admincenter">EMAIL :
                <?php echo $email; ?>
            </div>
            <div class="admincenter"><a class="logoutbtn" href="logout.php">" LOGOUT "</a></div>
        </div>
        <div class="flexclass">
            <div class="flexcontainerbox">
                <div class="flexboxes cyanneon">
                    <?php echo $usercount; ?>
                </div>
                <div class="cont_div">TOTAL USERS</div>
            </div>
            <div class="flexcontainerbox">
                <div class="flexboxes orangeneon">
                    <?php echo $productcount; ?>
                </div>
                <div class="cont_div">TOTAL PRODUCTS</div>
            </div>
            <div class="flexcontainerbox orangeneon">
                <div class="flexboxes">
                    <?php echo $ordercount; ?>
                </div>
                <div class="cont_div">TOTAL ORDERS</div>
            </div>
            <div class="flexcontainerbox orangeneon">
                <div class="flexboxes">
                    <?php echo $cartcount; ?>
                </div>
                <div class="cont_div">ITEMS IN CART</div>
            </div>
        </div>
    </body>

    </html>