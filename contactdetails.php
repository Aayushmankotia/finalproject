<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="contact.css">
    <title>DETAILS</title>
</head>
<body>


<?php
// Establish a connection to the database
include 'configer.php';

if (isset($_POST['submit'])){

    

    // Retrieve the form data using the POST method
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $pincode = $_POST["pincode"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];

    // sql query to insert location data into table
    $sql = "INSERT INTO addresses (name, phone, pincode, address, city, state)
            VALUES ('$name', '$phone', '$pincode', '$address', '$city', '$state')";

// Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!-- html form is created below -->

    <!-- main section  -->
    <section class="center">

    <!-- from is created -->
        <form class="order" action="#" method="POST"> 

        <!-- labels and input field are used in this form   -->
            <div class="inputdivision">
                <label class="firstlabel" for="">CONTECT DETAILS</label>
            </div>
            <div class="inputdivision textcenter"> 
                <input class="input" type="text" name="name" placeholder="Name*" >
            </div>

            <div class="inputdivision textcenter">    
                <input class="input" type="tel" name="phone" placeholder="Mobile No*" >  
            </div>

            <div class="inputdivision">
                <label class="secondlabel" for="">ADDRESS</label>   
            </div>

            <div class="inputdivision  textcenter">   
                <input class="input" type="text" name="pincode" placeholder="Pin Code*" >
            </div>

            <div class="inputdivision  textcenter">
                <input class="input" type="text" name="address" placeholder="address*" >
            </div>

            <div class="inputdivision textcenter">
                <input class="input" type="text" name="city" placeholder="City" > 
            </div>

            <div class="inputdivision textcenter">
                <input class="input" type="text" name="state" placeholder="State" > 
            </div>

            <div class="inputdivision  textcenter">
                <input class="input redbackground" type="submit" name="submit" value="ADD ADDRESS" >    
            </div>


        </form>
        <!-- form tag closing -->


    </section>
    <!-- main section close  -->


    
</body>
</html>