<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
		}

		.container {
			margin: 50px auto;
			max-width: 600px;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			font-size: 36px;
			margin-bottom: 20px;
			color: #007bff;
			text-align: center;
		}

		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		label {
			font-size: 18px;
			margin-bottom: 10px;
			color: #444;
			display: block;
			width: 100%;
		}

		input[type="text"],
		input[type="email"],
		input[type="password"] {
			font-size: 18px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
			width: 100%;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			font-size: 18px;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-right: 10px;
			transition: background-color 0.2s;
		}

		input[type="submit"]:hover {
			background-color: #0062cc;
		}

		a {
			color: #007bff;
			font-size: 18px;
			text-decoration: none;
			margin-bottom: 20px;
			transition: color 0.2s;
		}

		a:hover {
			color: #0056b3;
		}
	</style>
    
</head>
<body>
	<div class="container">
		<h1>Edit User</h1>
		<form method="POST">
			<input type="hidden" name="u_id" value="<?php echo $row['u_id']; ?>">
			<label for="user_name">User Name:</label>
			<input type="text" name="user_name" value="<?php echo $row['user_name']; ?>">
			<label for="email">Email:</label>
			<input type="email" name="email" value="<?php echo $row['email']; ?>">
			<label for="pass">Password:</label>
			<input type="password" name="pass" value="<?php echo $row['pass']; ?>">
			<div>
				<input type="submit" value="Save">
				<a href="index.php">Cancel</a>
			</div>
		</form>
	</div>
</body>
</html>
