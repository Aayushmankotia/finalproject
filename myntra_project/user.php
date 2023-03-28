<!-- CREATE TABLE users (
  u_id INT NOT NULL AUTO_INCREMENT,
  u_name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (u_id)
); -->

<!DOCTYPE html>
<html>
<head>
  <title>User Registration Form</title>
</head>
<body>
  <h1>User Registration Form</h1>
  <form action="insert_user.php" method="post">
    <label for="u_name">Name:</label>
    <input type="text" id="u_name" name="u_name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass" required><br><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>

<?php
session_start();
 echo $_SESSION['phone'];
// Get the user's details from the HTML form
$u_name = $_POST['u_name'];
$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hash the user's password for security purposes

// Connect to the database
$host = 'localhost'; // Replace with your database host
$username = 'your_username'; // Replace with your database username
$password = 'your_password'; // Replace with your database password
$database = 'your_database'; // Replace with your database name
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert the user's details into the users table
$sql = "INSERT INTO users (u_name, email, pass) VALUES ('$u_name', '$email', '$pass')";
if (mysqli_query($conn, $sql)) {
  echo "New user created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
