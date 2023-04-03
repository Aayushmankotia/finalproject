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
    

    echo $_SESSION['u_id'];

    echo $phone = $_SESSION['phone'];

    if (!isset($phone)) {
        header('location:logoutscreen.php');


    }
    @include 'navigationbar.php';


    if (isset($_GET['product_id'])) {
        $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

        $sql = "DELETE FROM cart WHERE product_id = '$product_id'";

        if ($conn->query($sql) === TRUE) {
            // deletion successful
        } else {
            echo "Error deleting record: ";
        }


    }

    // if (isset($_POST['DELETE'])) {
    //     echo$_SESSION['product_id'] ;
    
    //     $query = "DELETE FROM cart WHERE product_id = '$product_id'";
    //     echo $query;
    //     // Execute query
    //     if ($conn->query($query) === TRUE) {
    //         echo "Record deleted successfully";
    //     } else {
    //         echo "Error deleting record: " . $conn->error;
    //     }
    // }
    
    $u_id = $_SESSION['u_id'];
    // echo "<br>";
    $_SESSION['user_name'];
    // echo "<br>";
    $_SESSION['phone'];
    // echo "<br>";
    $_SESSION['registered'];
    // echo "<br>";
    



    ?>
    <div class="big_box_flex">
        <div class="big_box">

            <!-- container grid -->
            <div class="maincontainer">

                <?php
                $sql = "SELECT * FROM cart WHERE u_id = '$u_id'";



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
                        // print_r($arr) = array('$total');
                        $total_sum += $total;
                        $product_qty += $product_quantity;



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
                                        <?php echo $row['product_price'];

                                        ?>
                                    </b>
                                    <?php echo "<span class='green'>(" . $row['product_quantity'] . ")</span>";
                                    // echo "<input type='submit' value='DELETE' name='DELETE'>";
                            


                                    echo "<div class = 'red'>" . '<a href="cart.php?product_id=' . $row['product_id'] . '" > DELETE </a>' . "</div>";


                                    ?>

                        </section>


                        <?php
                    }
                } else {

                    echo "<script> alert('CART IS EMPTY '); 

                        window.location.href = 'myntra.php';
                        </script>";


                }

                // echo $total_sum;
                

                ?>


            </div>
        </div>
        <div class="total">
            <img class="shopcart" src="images/bag.jpg">
            <h3 class='grand_total'> GRAND TOTAL</h3>
            <HR>
            <!-- <div class="productnum"> WELCOME and HERE IS YOUR GRAND TOTAL
                
            </div> -->
            <div class="productnum"> NUMBERS OF PRODUCT
                <?php echo "<span class='green'>(" . $product_qty . ")</span>"; ?>
            </div>
            <div class="productnum"> TOTAL PRICE :
                <?php echo "<span class='green'>(" . $total_sum . ")</span>"; ?>
            </div>
            <a class="continuebtn" href='contactdetails.php'>CONTINUE</a>


        </div>

    </div>


</body>

</html>