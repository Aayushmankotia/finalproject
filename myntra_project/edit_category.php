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
	.add_product_div {
		margin: 90px auto;
		width: 500px;
		font-size: 30px;


	}

	.add_product {
		text-align: center;
		color: #e51a3e;
	}

	.mainform {
		width: 500px;
		margin: 50px auto;
		font-family: Arial, sans-serif;
		font-size: 16px;
		border: solid black 2px;
		padding: 20px;
	}

	label {
		display: block;
		margin-bottom: 10px;
		font-weight: bold;
	}

	.productinput {
		padding: 10px;
		border-radius: 5px;
		border: none;
		width: 100%;
		margin-bottom: 20px;
		box-sizing: border-box;
		background-color: #f4f4f4;
	}

	select {
		padding: 10px;
		border-radius: 5px;
		border: none;
		width: 100%;
		margin-bottom: 20px;
		box-sizing: border-box;
		background-color: #f4f4f4;
	}

	.sub {
		text-align: center;
		margin-top: 30px;
	}

	.btn {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		font-size: 16px;
	}

	.btn:hover {
		background-color: #3e8e41;
	}

	table {
		border-collapse: collapse;
		width: 70%;
		margin: 0px auto;
	}

	h2 {
		width: 100%;
		text-align: center;
	}

	th,
	td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	th {
		background-color: #4CAF50;
		color: white;
	}

	button {
		background-color: #008CBA;
		color: white;
		padding: 8px 16px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	button:hover {
		background-color: #006080;
	}
</style>
<body>
<div class="add_product_div">
<div class="add_product"> Edit Category</div>
 
  <form  class="mainform" action="#" method="POST">
    <label for="category">Category:</label><br>
    <input class="productinput" type="text" id="category" name="category" value="<?php echo $category; ?>"><br><br>
    <label for="category_type">Category Type:</label><br>
    <input class="productinput" type="text" id="category_type" name="category_type" value="<?php echo $category_type; ?>"><br><br>
    <label for="category_name">Category Name:</label><br>
    <input class="productinput" type="text" id="category_name" name="category_name" value="<?php echo $category_name; ?>"><br><br>
    <input class="productinput" type="submit" value="Update">
  </form>
</body>
</html>
