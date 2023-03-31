<?php
session_start();
 
require_once "configer.php";

if (!isset($_SESSION['phone']) || !$_SESSION['phone']) {
    header('Location: login.php');
    exit;
}
echo "hello ";

echo $_SESSION['id'];
echo $_SESSION['name'];
echo $_SESSION['email'];
echo $_SESSION['pass'];
?>