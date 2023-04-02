<?php
// Connect to database
include 'configer.php';
@include 'admin_header.php';
// Fetch users data from database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if users were found
if (mysqli_num_rows($result) == 0) {
	echo "No users found";
	exit();
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myntra.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<title>User List</title>
	<style>
	
	body {
	    background-color: #f5f5f5;
	    font-family: Arial, sans-serif;
	   ; /* Add a margin of 100px from the top */
	}

	.container {
	     /* Remove the margin from the top and add a margin of 0 from the sides */
	    max-width: 80%;
	    padding: 20px;
	    background-color: #fff;
	    border-radius: 5px;
	    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	.user_list {
	    font-size: 36px;
	
	    text-align: center;
	}

	table {
	    border-collapse: collapse;
	    width: 100%;
	    margin: 100px auto;
	    background-color: #fff;
	    border-radius: 5px;
	    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	th,
	td {
	    padding: 12px 15px;
	    text-align: left;
	    border-bottom: 1px solid #ddd;
	}

	th {
	    background-color: #f5f5f5;
	    font-weight: bold;
	    color: #333;
	    text-transform: uppercase;
	    font-size: 14px;
	}

	tr:nth-child(even) {
	    background-color: #f5f5f5;
	}

	tr:hover {
	    background-color: #f2f2f2;
	}

	td {
	    color: #666;
	}

	td a {  
	    display: inline-block;
	    padding: 6px 12px;
	    background-color: #00bcd4;
	    color: #fff;
	    text-decoration: none;
	    border-radius: 3px;
	    font-size: 14px;
	}

	td a:hover {
	    background-color: #007a8c;
	}
</style>


</head>
<body>

	<div class="container">
    <div class="user_list">user_list</div>
    <table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Role ID</th>
            <th>Phone</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['u_id']; ?></td>
            <td><?php echo $row['role_id']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['created']; ?></td>
            <td><?php echo $row['updated']; ?></td>
            <td>
                <a href="update_user.php?id=<?php echo $row['u_id']; ?>">Update</a>
                <a href="delete_user.php?id=<?php echo $row['u_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

	</div>
</body>
</html>
