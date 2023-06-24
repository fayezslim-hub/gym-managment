<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
}
require_once "connection.php";

$sport_id = $_POST['sport_id'];
$trainer_id = $_POST['trainer_id'];
$end_date = $_POST['end_date'];
$class_name = $_POST['sport_name'];



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE sport SET  class_approve = '1' WHERE sport_id = $sport_id";

if (mysqli_query($conn, $sql)) {
    $sql = "INSERT INTO tpayment  VALUES ('','$trainer_id', '100', '1','$end_date','$class_name')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('You are registered')</script>";
    }else {
        echo "<script>alert('The email or the phone number is already used')</script>";
    }
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);

// Redirect the user back to the original page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;






?>