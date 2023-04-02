<?php
session_start();
@include 'configer.php';

 @include 'admin_header.php'; 

$admin = $_SESSION['admin'];

if(!isset($admin)){
   header('location:login.php');
};

// Check if the category ID is provided in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch the category from the database
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
  // Redirect back to the categories page if no category ID is provided
  header('location:categories.php');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category = $_POST['category'];
  $category_type = $_POST['category_type'];
  $category_name = $_POST['category_name'];

  // Update the category in the database
  $sql = "UPDATE categories SET category = '$category', category_type = '$category_type', category_name = '$category_name' WHERE c_id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect back to the categories page after successful update
    header('location:categories.php');
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="myntra.css">
    <!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <title>Edit Category</title>
</head>
<style>
    /* Style the form elements */
form {
  max-width: 500px;
  margin: 40px auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  display: block;
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

/* Style the heading */
h2 {
  text-align: center;
  margin-top: 150px;
  margin-bottom: 30px;
}

    </style>
<body>
  <h2>Edit Category</h2>
  <form method="POST">
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" value="<?php echo $category; ?>"><br><br>
    <label for="category_type">Category Type:</label><br>
    <input type="text" id="category_type" name="category_type" value="<?php echo $category_type; ?>"><br><br>
    <label for="category_name">Category Name:</label><br>
    <input type="text" id="category_name" name="category_name" value="<?php echo $category_name; ?>"><br><br>
    <input type="submit" value="Update">
  </form>
</body>
</html>
