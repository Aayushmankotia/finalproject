<?php
 include 'configer.php';
@include 'admin_header.php'; 

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

    <title>UPLOADS</title>
   
</head>
<style>
    table {
        margin-top:90px; 
  border-collapse: collapse;
  width: 100%;
}

thead {
  background-color: #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

.actions a {
  color: #333;
  text-decoration: none;
  margin-right: 10px;
}

.actions a:hover {
  color: #f00;
}

    </style>
    
<table>
  <thead>
    <tr>
      <th>Order ID</th>
      <th>User ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Pincode</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Product Names</th>
      <th>Product Quantities</th>
      <th>Total Price</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
      // Connect to database
   
      // Select all orders from the table
      $sql = "SELECT * FROM orders";
      $result = mysqli_query($conn, $sql);

      // Loop through each row in the table and display the data
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["order_id"] . "</td>";
          echo "<td>" . $row["u_id"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["phone"] . "</td>";
          echo "<td>" . $row["pincode"] . "</td>";
          echo "<td>" . $row["address"] . "</td>";
          echo "<td>" . $row["city"] . "</td>";
          echo "<td>" . $row["state"] . "</td>";
          echo "<td>" . $row["product_names"] . "</td>";
          echo "<td>" . $row["product_quantities"] . "</td>";
          echo "<td>" . $row["total_price"] . "</td>";
         
         
        }
      } else {
        echo "<tr><td colspan='13'>No orders found</td></tr>";
      }

      // Close database connection
      mysqli_close($conn);
    ?>
  </tbody>
</table>   
</body>
</html> 