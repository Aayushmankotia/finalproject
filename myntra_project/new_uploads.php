<?php

include 'configer.php';

if (isset($_POST['submit'])) {

    $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $p_category = mysqli_real_escape_string($conn, $_POST['p_category']);
    $p_price = mysqli_real_escape_string($conn, $_POST['p_price']);

    if (!empty($avatar = $_FILES["avatar"]["name"])) {

        $flag = true;
        $target_dir = "uploads/"; // directory where the image will be uploaded
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // full path of the uploaded file
        $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension

        // Check if the file is an avatar
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            $imgerror = "File is not an avatar.";
            $flag = false;
        }

        // Check if the file already exists in the directory
        if (file_exists($target_file)) {
            $imgerror = "IMAGE IS ALREADY EXIST";
            $flag = false;
        }

        // Check file size
        if ($_FILES["avatar"]["size"] > 15000000) {
            $imgerror = "TOO LARGE FILE";
            $flag = false;
        }

        // Allow certain file formats
        if (
            $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
            && $avatarFileType != "gif"
        ) {
            $imgerror = "ONLY JPG, JPEG, PNG & GIF IMAGES ";
            $flag = false;
        }

        // Upload the file
        if ($flag) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                // echo "The file ". ($_FILES["avatar"]["name"]). " has been uploaded.";
            } else {
                $imgerror = "SORRY, ERROR IN UPLOADING";
                $flag = false;
            }
        }

    }
    // display piture using url 
    elseif (!empty($file_url = $_POST['avatar'])) {
        // $imgname =(END(explode('/',$avatar)));
        $target_dir = "uploads/";


        $avatar = basename($file_url);
        $folder_path = $target_dir . basename($file_url);


        if (file_put_contents($folder_path, file_get_contents($file_url))) {
            echo "";
        } else {
            $imgerror = "File can't be moved!";
        }
    } else {
        $avatar = "person-gb066ca900_640.png";

        // $imgerror= "*IMAGE IS REQUIRED ";
        // $flag= false;
    }

    if ($flag) {


        $sql = "INSERT INTO product (p_name, p_category, p_price, avatar)
                 VALUES ('$p_name','$p_category','$p_price','$avatar')";


        if (mysqli_query($conn, $sql)) {

            echo "sussesful";


            // die();
        } else {
            echo "error";
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        // header("Location: login.php");
        mysqli_close($conn);
    }

}

function test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subb.css">
    <title>registeration form</title>
    <script src="jsvalidation.js"></script>
</head>

<body>

    <form class="mainform" action="#" method="POST" id="forms" name="myForm" enctype="multipart/form-data">
        <label for="p_name">Product Name:</label>
        <input type="text" id="p_name" name="p_name" required><br><br>


        <label for="category">Product Category:</label>
        <select id="category" name="p_category">
            <option value="KID">KIDS</option>
            <option value="MEN">MEN</option>
            <option value="WOMEN">WOMEN</option>

        </select>

        <label for="p_price">Product Price:</label>
        <input type="text" id="p_price" name="p_price" required><br><br>


        <tr>
            <td>
                <label for="avatar"> AVATAR </label>
            </td>
            <td>
                <input class='file' type="file" placeholder="IMAGE URL" name="avatar" id="avatar">

                <?php echo "<span>" . $imgerror . "</span>"; ?>
            </td>

        </tr>
        <div class="sub">
            <input class="btn" type="submit" name="submit" value="SUBMIT">
        </div>

</body>

</html>