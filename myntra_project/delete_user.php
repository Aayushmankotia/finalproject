<?php include 'configer.php'; ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="style/myntra.css" rel="stylesheet">
        <link href="style/edit.css" rel="stylesheet">

        <link rel="Website Icon" type="png" href="images/deku.png">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>delete user</title>
    </head>
    <?php if (!isset($_GET['id'])) {
        echo "No user ID provided";
        exit();
    }
    $user_id = $_GET['id'];
    $sql = "DELETE FROM users WHERE u_id = $user_id";
    if (mysqli_query($conn, $sql)) {
        echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
        echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel"> USER DELETED SUCESSFULLY </h3>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<a class= "closebtn btn btn-primary" href="admin_users.php" role="button">OK</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<script>$("#emptyCartModal").modal("show");</script>';
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
    mysqli_close($conn); ?>