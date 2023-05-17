<?php session_start();
@include 'configer.php';
@include 'admin_header.php'; ?>
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
        <title>Edit-Category</title>
    </head>
    <?php $admin = $_SESSION['admin'];
    if (!isset($admin)) {
        header('location:login.php');
    }
    ;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM categories WHERE c_id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $category = $row['category'];
            $category_type = $row['category_type'];
            $category_name = $row['category_name'];
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        header('location:categories.php');
    }
    if (isset($_POST['update'])) {
        $category = $_POST['category'];
        $category_type = $_POST['category_type'];
        $category_name = $_POST['category_name'];
        $sql = "UPDATE categories SET category = '$category', category_type = '$category_type', category_name = '$category_name' WHERE c_id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
            echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel"> CATEGORY UPDATED </h3>';
            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<a class= "closebtn btn btn-primary" href="admin_page.php" role="button">OK</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<script>$("#emptyCartModal").modal("show");</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } ?>

    <body>
        <div class="add_product_div">
            <div class="add_product">Edit Category</div>
            <form action="#" class="mainform" method="POST"><label for="category">Category:</label><br><input
                    class="productinput" name="category" value="<?php echo $category; ?>" id="category"
                    required><br><br><label for="category_type">Category Type:</label><br><input class="productinput"
                    name="category_type" value="<?php echo $category_type; ?>" id="category_type"
                    required><br><br><label for="category_name">Category Name:</label><br><input class="productinput"
                    name="category_name" value="<?php echo $category_name; ?>" id="category_name"
                    required><br><br><input class="productinput" name="update" value="Update" type="submit"></form>
    </body>

    </html>