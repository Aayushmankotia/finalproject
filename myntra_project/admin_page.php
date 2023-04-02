<?php

session_start();
@include 'configer.php';

@include 'admin_header.php';

$admin = $_SESSION['admin'];

if (!isset($admin)) {
   header('location:login.php');
}
;



// Check if form was submitted
if (isset($_POST['submit'])) {
   // Get values from form
   $category = mysqli_real_escape_string($conn, $_POST['category']);
   $category_type = mysqli_real_escape_string($conn, $_POST['category_type']);
   $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);

   // Insert data into table
   $sql = "INSERT INTO categories (category, category_type, category_name) VALUES ('$category', '$category_type', '$category_name')";
   if (mysqli_query($conn, $sql)) {
      echo "Category added successfully";
   } else {
      echo "Error adding category: " . mysqli_error($conn);
   }

   // Close database connection
   mysqli_close($conn);
}

?>


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="myntra.css">

</head>
<style>
   form {
      width: 400px;
      margin: auto;
      padding: 20px;
      background-color: #f4f4f4;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
   }

   h2 {
      margin-top:140px;
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
      color: #333;
   }

   label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
   }

   input[type="text"],
   select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: none;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
   }

   input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
   }

   input[type="submit"]:hover {
      background-color: #3e8e41;
   }

   /* Style for the table */
table {
  border-collapse: collapse;
  width: 60%;
  margin: 0px auto;

}

th, td {
  text-align: left;
  padding: 1rem;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

/* Style for the edit and delete icons */
a {
  color: #666;
  font-size: 1.2rem;
  text-decoration: none;
  margin-right: 1rem;
}

a:hover {
  color: #333;
}

i {
  margin-right: 0.5rem;
}

</style>

<body>




   <h2>Add Category</h2>
   <form action="#" method="post">
      <label for="category">Category:</label>

      <select name="category" id="category" required>
         <option value="kids">KIDS</option>
         <option value="women">WOMEN</option>
         <option value="men">MEN</option>


      </select>

      <label for="category_type">Category Type:</label>
      <input type="text" id="category_type" name="category_type"><br><br>

      <label for="category_name">Category Name:</label>
      <input type="text" id="category_name" name="category_name"><br><br>

      <input type="submit" name="submit" value="Add">
   </form>







<?php



// Fetch categories from database
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);

?>




	<h2>Categories</h2>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Category</th>
				<th>Category Type</th>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Loop through each category and display it in a table row
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['c_id'] . "</td>";
					echo "<td>" . $row['category'] . "</td>";
					echo "<td>" . $row['category_type'] . "</td>";
					echo "<td>" . $row['category_name'] . "</td>";
					echo "<td><a href='edit_category.php?id=" . $row['c_id'] . "'><i class='fas fa-edit'></i></a> <a href='delete_category.php?id=" . $row['c_id'] . "'><i class='fas fa-trash'></i></a></td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
   </body>

</html>


