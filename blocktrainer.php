<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
}
require_once "connection.php";

$id = $_POST['trainer_id'];
$name = $_POST['name'];
$email = $_POST['trainer_email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$yoe = $_POST['yoe'];
$target = $_POST['image'];



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE trainer SET approved='3' , join_date= NOW()  WHERE trainer_id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);

// Redirect the user back to the original page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;






?>