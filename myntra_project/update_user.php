<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="myntra.css">
</head>
<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}
		
		.containergg {
			margin: 90px auto;
			max-width: 80%;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		.headingtwo{
			margin-bottom: 20px;
			text-align: center;
		}
		
		form {
			width: 80%;
			margin: 0 auto;
		}
		
		label {
			display: block;
			margin-bottom: 5px;
			font-size: 16px;
			font-weight: bold;
		}
		
		input[type="text"],
		input[type="email"],
		select {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			border: none;
			border-radius: 3px;
			background-color: #f5f5f5;
			color: #333;
			font-size: 16px;
		}
		
		select {
			appearance: none;
			-webkit-appearance: none;
			background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill="%23333" d="M14.6 5.6L8 12.2 1.4 5.6c-.8-.8-.8-2 0-2.8.8-.8 2-.8 2.8 0L8 7.6l3.8-3.8c.8-.8 2-.8 2.8 0 .8.8.8 2 0 2.8z"/></svg>');
			background-repeat: no-repeat;
			background-position: right 10px center;
			background-size: 16px 16px;
			padding-right: 40px;
		}
		
		input[type="submit"] {
			display: block;
			margin: 20px auto;
			padding: 10px 20px;
			background-color: #00bcd4;
			color: #fff;
			border: none;
			border-radius: 3px;
			font-size: 16px;
			cursor: pointer;
		}
		
		input[type="submit"]:hover {
			background-color: #007a8c;
		}
		
		.error {
			color: red;
			font-size: 14px;
			margin-bottom: 10px;
		}
        </style>
<body>
    <?php 
        // Connect to database
        include 'configer.php';
        @include 'admin_header.php';

        // Check if form was submitted
        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $role_id = $_POST['role_id'];
            $phone = $_POST['phone'];
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];

            // Update user data in database
            $sql = "UPDATE users SET role_id='$role_id', phone='$phone', user_name='$user_name', email='$email' WHERE u_id='$id'";
            $result = mysqli_query($conn, $sql);

            // Check if update was successful
            if($result) {
                
                echo "<script> alert('USER UPDATED SUCESSFULLY'); 

	window.location.href = 'admin_users.php';
	</script>";
            } else {
                echo "<script>alert('Error updating user data');</script>";
            }

            // Close database connection
            mysqli_close($conn);
        } else {
            // Fetch user data from database
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE u_id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            // Close database connection
            mysqli_close($conn);
        }
    ?>

    <div class="containergg">
        <h1 class="headingtwo">Update User</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['u_id']; ?>">
            <div class="form-group">
                <label for="role_id">Role ID</label>
                <input type="text" name="role_id" id="role_id" value="<?php echo $row['role_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name" value="<?php echo $row['user_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <button type="submit" name="submit">Update</button>
        </form>
    </div>

</body>
</html>
