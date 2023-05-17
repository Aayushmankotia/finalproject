<?php session_start(); ?>
<!doctypehtml>

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet">
        <link href="style/cart.css" rel="stylesheet">
        <link href="style/myntra.css" rel="stylesheet">
        <link rel="Website Icon" type="png" href="images/deku.png">
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>CART</title>
    </head>

    <body>
        <?php require 'configer.php';
        echo $_SESSION['u_id'];
        echo $phone = $_SESSION['phone'];
        if (!isset($phone)) {
            header('location:logoutscreen.php');
        }
        @include 'navigationbar.php';
        if (isset($_GET['cart_id'])) {
            $cart_id = mysqli_real_escape_string($conn, $_GET['cart_id']);
            $sql = "DELETE FROM cart WHERE cart_id = '$cart_id'";
            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error deleting record: ";
            }
        }
        $u_id = $_SESSION['u_id'];
        $_SESSION['user_name'];
        $_SESSION['phone'];
        $_SESSION['registered']; ?>
        <div class="big_box_flex">
            <div class="big_box">
                <div class="maincontainer">
                    <?php $sql = "SELECT * FROM cart WHERE u_id = '$u_id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_num_rows($result);
                    if ($row >= 1) {
                        while ($row = mysqli_fetch_array($result)) {
                            $_SESSION['cart_id '] = $cart_id = $row['cart_id '];
                            $_SESSION['product_id'] = $product_id = $row['product_id'];
                            $_SESSION['product_name'] = $product_name = $row['product_name'];
                            $_SESSION['product_price'] = $product_price = $row['product_price'];
                            $_SESSION['product_image'] = $product_image = $row['product_image'];
                            $_SESSION['product_category'] = $product_category = $row['product_category'];
                            $_SESSION['product_quantity'] = $product_quantity = $row['product_quantity'];
                            $total = $_SESSION['product_price'] * $_SESSION['product_quantity'];
                            $total_sum += $total;
                            $product_qty += $product_quantity; ?>
                            <section class="box1 container_boxes">
                                <form action="" class="" method="POST"><img class="productimage"
                                        src="uploads/<?php echo $row['product_image']; ?>" alt="">
                                    <div class="price">
                                        <h3>
                                            <?php echo $row['product_name']; ?>
                                            <?php echo $_SESSION['product_id']; ?>
                                        </h3><b>₹:
                                            <?php echo $row['product_price']; ?>
                                        </b>
                                        <?php echo "<span class='green'>(" . $row['product_quantity'] . ")</span>";
                                        echo "<div class = 'red'>" . '<a href="cart.php?cart_id=' . $row['cart_id'] . '" > DELETE </a>' . "</div>"; ?>
                                    </div>
                                </form>
                            </section>
                        <?php }
                    } else {
                        if (empty($cart_items)) {
                            echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
                            echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
                            echo '<div class="modal-content">';
                            echo '<div class="modal-header">';
                            echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel">CART IS EMPTY</h3>';
                            echo '</div>';
                            echo '<div class="poppara modal-body">';
                            echo 'Your cart is currently empty. Please add items to your cart to continue.';
                            echo '</div>';
                            echo '<div class="modal-footer">';
                            echo '<a class= "closebtn btn btn-primary" href="myntra.php" role="button">Go to Myntra</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<script>$("#emptyCartModal").modal("show");</script>';
                        }
                    } ?>
                </div>
            </div>
            <div class="total"><img class="shopcart" src="images/bag.jpg">
                <h3 class="grand_total">GRAND TOTAL</h3>
                <hr>
                <div class="productnum">NUMBERS OF PRODUCT
                    <?php echo "<span class='green'>(" . $product_qty . ")</span>"; ?>
                </div>
                <div class="productnum">TOTAL PRICE :
                    <?php echo "<span class='green'>(" . $total_sum . ")</span>"; ?>
                </div><a class="continuebtn" href="contactdetails.php">CONTINUE</a>
            </div>
        </div>
    </body>