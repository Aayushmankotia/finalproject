<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/myntra.css">
    <!-- two files are used to style this page  -->
    <link rel="stylesheet" href="style/update.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="Website Icon" type="png" href="images/deku.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update User</title>
</head>
<?php

session_start();

include "configer.php";

 $u_id = $_SESSION['u_id'];

if (!isset($u_id)) {

    header("Location: login.php");
}

$u_id = $_SESSION['u_id'];
$user_name = $_SESSION['user_name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];




// Get the form data
if (isset($_POST['update'])) {
    $phone =  $_POST['phone'];
    $user_name =$_POST['user_name'];
    $email =  $_POST['email'];

    // Update the user in the database
   $sql = "UPDATE users SET phone='$phone', user_name='$user_name', email='$email' WHERE u_id = '$u_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User updated successfully!";

        echo '<div class=" modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
        echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h3 class="bigtext modal-title" id="adminModalLabel">USER UPDATED SUCESSFULLY</h3>';

        echo '</div>';
        echo '<div class="poppara modal-body">';
        echo 'OK to go back'."<br>";
        echo 'CENCEL to continue updation';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<a class="closebtn btn btn-primary" href="myntra.php" role="button">OK</a>';
        echo '<a class="closebtn btn btn-primary" href="user_update.php" role="button">BACK</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    
        // Show the modal popup using JavaScript
        echo '<script>$("#adminModal").modal("show");</script>';



    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<body>
    <div class="containergg">
        <h1 class="headingtwo">Update User</h1>
        <form class='updateform' method="post" action="#">

            <label for="phone">Phone:</label>
            <input type="text" value="<?php echo $phone; ?>" name="phone" required><br>

            <label for="user_name">User Name:</label>
            <input type="text" value="<?php echo $user_name; ?> " name="user_name" required><br>

            <label for="email">Email:</label>
            <input type="email" value=" <?php echo $email; ?>" name="email" required><br>

            <input type="submit" value="Update User" name="update">
            <input type="button" onclick="window.location.href='myntra.php';" value="back" >
        </form>
    </div>
</body>

</html>