<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
    header("Location: signin.php");
    exit;
}
require_once "connection.php";

$class_request_id = $_POST['class_request_id'];
$class_level = $_POST['class_level'];




if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE class_request SET  class_level = '$class_level' WHERE class_request_id = $class_request_id";

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