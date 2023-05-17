<?php session_start();
include 'configer.php';
@include 'admin_header.php';
$admin = $_SESSION['admin'];
if (!isset($admin)) {
    header('location:login.php');
}
;
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "No users found";
    exit();
}
mysqli_close($conn); ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="style/myntra.css" rel="stylesheet">
        <link href="style/admin_style.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="Website Icon" type="png" href="images/deku.png">
        <title>User List</title>
    </head>

    <body>
        <h2 class="margin-top_table">USER's LIST</h2>
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
                        <td>
                            <?php echo $row['u_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['role_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>
                        <td>
                            <?php echo $row['user_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['created']; ?>
                        </td>
                        <td>
                            <?php echo $row['updated']; ?>
                        </td>
                        <td><a href="update_user.php?id=<?php echo $row['u_id']; ?>">Update</a> <a
                                href="delete_user.php?id=<?php echo $row['u_id']; ?>">Delete</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>

    </html>