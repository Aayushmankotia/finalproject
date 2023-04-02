<?php
session_start();
include "configer.php";

$u_id = $_SESSION['u_id'];

$_SESSION['user_name'];

$_SESSION['phone'];

$_SESSION['registered'];



$_SESSION['u_id'];


$_SESSION['pincode'];
$_SESSION['address'];
$_SESSION['city'];
$_SESSION['state'];

$sql = "SELECT * FROM cart WHERE u_id = '$u_id'";



$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);


if ($row >= 1) {
    while ($row = mysqli_fetch_array($result)) {

        $_SESSION['u_id'] = $u_id = $row['u_id'];

        $product_ids .= $row['product_id'] . ',';

        $product_names .= $row['product_name'] . ',';

        $total_price += $row['product_price'];

        $product_quantities += $row['product_quantity'];


    }

}

$_SESSION['product_quantity'] = $product_quantities;

$_SESSION['total_price'] = $total_price;

$_SESSION['product_ids'] = $product_ids;

$_SESSION['product_names'] = $product_names;

$_SESSION['u_id'];

$_SESSION['product_quantities'] = $product_quantities;

if (isset($_POST['order'])) {

    $quary ="DELETE * FROM cart WHERE u_id = '$u_id'";
    if (mysqli_query($conn, $sql)){
        echo" your order is on your way ";

    }
    // Get the values from the form
    $u_id = $_SESSION['u_id'];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $pincode = $_POST["pincode"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $product_names = $_POST["products"];
    $product_quantities = $_POST["quantity"];
    $total_price = $_POST["price"];

    // Construct the SQL query to insert the data
    $sql = "INSERT INTO orders (u_id, name, phone, pincode, address, city, state, product_names, product_quantities, total_price) 
            VALUES ('$u_id', '$name', '$phone', '$pincode', '$address', '$city', '$state', '$product_names', '$product_quantities', '$total_price')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        
        echo "<script> alert('Order placed successfully'); 
  window.location.href = 'logout.php';
  </script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="hidden"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0069d9;
        }

        .full_div {
            width: 420px;

            padding: 20px;
            margin: 110px auto 20px auto;
        }

        .blue {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="flex_div">
        <div class="full_div">
            <h1 class=blue> WELCOME
                <?php echo $_SESSION['user_name']; ?></h1>
            <h3>YOUR ADDRESS</h3>
            <b> PHONE </b> =
            <?php echo $_SESSION['phone']; ?>
            PIN_CODE :
            <?php echo $_SESSION['pincode']; ?>
            ADDRESS :
            <?php echo $_SESSION['address']; ?>
            CITY :
            <?php echo $_SESSION['city']; ?>
            STATE :
            <?php echo $_SESSION['state']; ?>



        </div>


        <div class="container">
            <h1>PLACE ORDER</h1>
            <form action="#" method="post">


                <input value="<?php echo $_SESSION['user_name']; ?>" type="hidden" id="name" name="name" required>



                <input value="<?php echo $_SESSION['phone']; ?>" type="hidden" id="phone" name="phone" required>



                <input value="<?php echo $_SESSION['pincode']; ?>" type="hidden" id="pincode" name="pincode" required>



                <input value="<?php echo $_SESSION['address']; ?>" type="hidden" id="address" name="address" required>



                <input value="<?php echo $_SESSION['city']; ?>" type="hidden" id="city" name="city" required>



                <input value="<?php echo $_SESSION['state']; ?>" type="hidden" id="state" name="state" required>



                <input value="<?php echo $_SESSION['product_names']; ?>" type="hidden" id="product" name="products"
                    required>



                <input value="<?php echo $_SESSION['product_quantities']; ?>" type="hidden" id="quantity"
                    name="quantity" required>



                <input value="<?php echo $_SESSION['total_price']; ?>" type="hidden" id="price" name="price" required>

                <input type="submit" name="order" value=" ORDER">
            </form>
        </div>
    </div>
</body>

</html>
<?php
// Check if the form is submitted

?>