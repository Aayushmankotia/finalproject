<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
</head>
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h2 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			margin: auto;
			width: 50%;
			background-color: white;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px grey;
		}
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=file] {
			margin-bottom: 10px;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
		img {
			margin-bottom: 10px;
		}
	</style>
<body>
	<h2>Edit Product</h2>
	<?php
		// Connect to databas
        include 'configer.php';
		// Get product ID from URL parameter
		$p_id = $_GET["p_id"];

		// Fetch data for the product with the specified ID
		$sql = "SELECT * FROM product WHERE p_id=" . $p_id;
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Output form with data for the product
			$row = mysqli_fetch_assoc($result);
			echo "<form action='update_product.php' method='POST' enctype='multipart/form-data'>";
			echo "<input type='hidden' name='p_id' value='" . $row["p_id"] . "'>";
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
			echo "<img src='" . $row["avatar"] . "' width='100' height='100'><br>";
			echo "<input class='productinput' type='file' placeholder='IMAGE URL' name='avatar' id='avatar'><br><br>";
			echo "<input class='btn' type='submit' name='submit' value='UPDATE'>";
			echo "</form>";
		} else {
			echo "Product not found.";
		}

		mysqli_close($conn);
	?>
</body>
</html>