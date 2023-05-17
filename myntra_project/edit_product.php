<?php session_start();
$admin = $_SESSION['admin'];
echo $p_id = $_SESSION['p_id']; ?>
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
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <title>PRODUCT</title>
        </head>

        <body>
                <?php @include 'admin_header.php';
                echo $_SESSION['u_id'];
                include 'configer.php';
                if (isset($_GET['p_id'])) {
                        $p_id = $_GET['p_id'];
                        $sql = "SELECT * FROM product WHERE p_id= '$p_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo '<div class="add_product_div">
        <div class="add_product"> Edit Category</div>';
                                echo "<form class='mainform' action='#' method='POST' enctype='multipart/form-data'>";
                                echo "<label for='p_name'>Product Name:</label>";
                                echo "<input class='productinput' type='text' id='p_name' name='p_name' value='" . $row["p_name"] . "' required><br><br>";
                                echo "<label for='category'>Product Category:</label>";
                                echo "<select id='category' name='p_category'>";
                                echo "<option value='KID'" . ($row["p_category"] == "KID" ? " selected" : "") . ">KIDS</option>";
                                echo "<option value='MEN'" . ($row["p_category"] == "MEN" ? " selected" : "") . ">MEN</option>";
                                echo "<option value='WOMEN'" . ($row["p_category"] == "WOMEN" ? " selected" : "") . ">WOMEN</option>";
                                echo "</select>";
                                echo "<label for='p_price'>Product Price:</label>";
                                echo "<input class='productinput' type='text' id='p_price' name='p_price' value='" . $row["p_price"] . "' required><br><br>";
                                echo "<label for='avatar'>Avatar:</label>";
                                echo "<img src='uploads/" . $row["avatar"] . "' width='100' height='100'><br>";
                                echo "<input class='productinput' type='file' placeholder='IMAGE URL' name='avatar' id='avatar' value='" . $row["avatar"] . "'><br><br>";
                                echo "<input class='btn' type='submit' name='submit' value='UPDATE'>";
                                echo "</form>";
                                echo "</div>";
                                echo "</div>";
                        } else {
                                echo "Product not found.";
                        }
                        echo "</div>";
                }
                $_SESSION['avatar'] = $row["avatar"];
                if (isset($_POST['submit'])) {
                        $p_name = $_POST['p_name'];
                        $p_category = $_POST['p_category'];
                        $p_price = $_POST['p_price'];
                        if (!empty($avatar = $_FILES["avatar"]["name"])) {
                                $flag = true;
                                $target_dir = "uploads/";
                                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                                $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                                if ($check === false) {
                                        $imgerror = "File is not an avatar.";
                                        $flag = false;
                                }
                                if (file_exists($target_file)) {
                                        $imgerror = "IMAGE IS ALREADY EXIST";
                                        $flag = false;
                                }
                                if ($_FILES["avatar"]["size"] > 15000000) {
                                        $imgerror = "TOO LARGE FILE";
                                        $flag = false;
                                }
                                if ($avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg" && $avatarFileType != "gif") {
                                        $imgerror = "ONLY JPG, JPEG, PNG & GIF IMAGES ";
                                        $flag = false;
                                }
                                if ($flag) {
                                        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                                        } else {
                                                $imgerror = "SORRY, ERROR IN UPLOADING";
                                                $flag = false;
                                        }
                                }
                        } else {
                                $avatar = $_SESSION['avatar'];
                        }
                        $sql = "UPDATE product SET p_name = '$p_name', p_category = '$p_category', p_price = '$p_price', avatar = '$avatar' WHERE p_id = '$p_id' ";
                        echo $sql;
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                                echo '<div class="modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
                                echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
                                echo '<div class="modal-content">';
                                echo '<div class="modal-header">';
                                echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel"> PRODUCT UPDATED </h3>';
                                echo '</div>';
                                echo '<div class="modal-footer">';
                                echo '<a class= "closebtn btn btn-primary" href="admin_product.php" role="button">OK</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<script>$("#emptyCartModal").modal("show");</script>';
                        } else {
                                echo "error";
                                echo "Error: " . $sql . ":-" . mysqli_error($conn);
                        }
                } ?>
        </body>

        </html>