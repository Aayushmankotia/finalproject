<?php

@include 'configer.php';

session_start();

$admin = $_SESSION['admin'];

if(!isset($admin)){
   header('location:login.php');
};

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
<body>

<?php
 @include 'admin_header.php'; 
 ?>

<section class="dashboard">

   <h1 class="title">dashboard</h1>


</section>

<script src="js/admin_script.js"></script>

</body>
</html>
