<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="myntra.css">
    <title>men</title>
</head>

<body>


    <?php

    require 'configer.php';
    // navigationbar.php file is include here for navigation bar 
    @include 'navigationbar.php';



    $phone = $_SESSION['phone'];

    if (!isset($phone)) {
        header('location:logoutscreen.php');
    }
    ;

    echo $_SESSION['phone'];
    echo $_SESSION['name'];


    $sql = "SELECT * FROM users WHERE phone = '$phone'";



    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);


    if ($row === 1) {
        while ($row = mysqli_fetch_array($result)) {

            echo "<br>";
            $_SESSION['u_id'] = $id = $row['u_id'];

            echo $_SESSION['role_id'] = $role_id = $row['role_id'];
            echo $_SESSION['u_name'] = $u_name = $row['user_name'];
            echo $_SESSION['email'] = $email = $row['email'];
            $_SESSION['pass'] = $pass = $row['pass'];
            $_SESSION['phone'] = $phone = $row['phone'];
            $_SESSION['registered'] = $id;

            echo "dtfyghjk" . $_SESSION['u_name'];
        }

    }

    ?>
    <div class="big_box_flex">
        <div class="big_box">

            <!-- container grid -->
            <div class="maincontainer">

                <?php
                $sql = "SELECT * FROM cart WHERE u_id = '$id'";



                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);


                if ($row >= 1) {
                    while ($row = mysqli_fetch_array($result)) {

                        echo "<br>";
                        $_SESSION['cart_id '] = $cart_id = $row['cart_id '];
                        $_SESSION['u_id'] = $id = $row['u_id'];

                        $_SESSION['product_id'] = $product_id = $row['product_id'];
                        $_SESSION['product_name'] = $product_name = $row['product_name'];
                        $_SESSION['product_price'] = $product_price = $row['product_price'];
                        $_SESSION['product_image'] = $product_image = $row['product_image'];
                        $_SESSION['product_category'] = $product_category = $row['product_category'];
                        $_SESSION['product_quantity'] = $product_quantity = $row['product_quantity'];

                        $total = $_SESSION['product_price'] * $_SESSION['product_quantity'];
                        // print_r($arr) = array('$total');
                        $total_sum += $total;
                        $product_qty += $product_quantity;

                        if (isset($_POST['DELETE'])) {
                            echo$_SESSION['product_id'] ;
        
                            $query = "DELETE FROM cart WHERE product_id = '$product_id'";
                            echo $query;
                            // Execute query
                            if ($conn->query($query) === TRUE) {
                                echo "Record deleted successfully";
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }

                        ?>

                        <section class="container_boxes box1">
                            <!-- product container   -->
                            <!--  form to add the item in the cart -->
                            <form action="" method="POST" class="">

                                <!-- fetch image and show here   -->
                                <img src="uploads/<?php echo $row['product_image']; ?>" alt="" class="productimage">
                                <div class="price">

                                    <h3>
                                        <!-- fetch the product name  -->
                                        <?php echo $row['product_name']; ?>
                                        <?php echo $_SESSION['product_id']; ?>
                                    </h3>
                                    <b>₹:
                                        <!-- fetch the product price -->
                                        <?php echo $row['product_price']; ?>
                                    </b>
                                    <?php echo "<span class='green'>(" . $row['product_quantity'] . ")</span>";
                                    echo "<input type='submit' value='DELETE' name='DELETE'>";


                                    ?>




                        </section>


                        <?php
                    }
                } else {

                    echo '<p class="empty">no products added yet!</p>';
                }

                echo $total_sum;

               
                ?>


            </div>
        </div>
        <div class="total">
            <h3 class='grand_total'> GRAND TOTAL</h3>
            <HR>
            <div class="productnum"> WELCOME
                <?php echo "<span class='green'>(" . $_SESSION['phone'] . ")</span>"; ?>
            </div>
            <div class="productnum"> NUMBERS OF PRODUCT
                <?php echo "<span class='green'>(" . $product_qty . ")</span>"; ?>
            </div>
            <a href='contactdetails.php'><button>CONTINUE</button></a>


        </div>

    </div>


</body>

</html>