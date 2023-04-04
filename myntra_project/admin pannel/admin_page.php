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
   <link rel="stylesheet" href="style/myntra.css">
   <link rel="stylesheet" href="style/admin_style.css">

</head>

<body>

   <div class="add_product_div">
   <div class="add_product"> Add Category</div>

      <form class="mainform" action="#" method="post">
         <label for="category">Category:</label>

         <select name="category" id="category" required>
            <option value="kids">KIDS</option>
            <option value="women">WOMEN</option>
            <option value="men">MEN</option>


         </select>

         <label for="category_type">Category Type:</label>
         <input class="productinput" type="text" id="category_type" name="category_type"><br><br>

         <label for="category_name">Category Name:</label>
         <input class="productinput" type="text" id="category_name" name="category_name"><br><br>
         <div class="sub">
            <input class="productinput" type="submit" name="submit" value="Add">
         </div>
      </form>
   </div>






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
         // Loop through each category OJECT/myntra_project/admin_page.phpand display it in a table row
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