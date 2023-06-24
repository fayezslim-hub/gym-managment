<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: signin.php");
  exit;
}

require_once "connection.php";
if (isset($_POST['weight'])) {
    require_once "connection.php";
    require_once "validate.php";
    $weight = validate($_POST['weight']);
    $height =  validate($_POST['height'])/100;
    $client_id= $_SESSION["client_id"];
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO bmi VALUES ('','$client_id', '$height',  '$weight', NOW())";

if (mysqli_query($conn, $sql)) {
    $flag = 1;
    // echo "<script>alert('form is sent!')</script>";
} else {
    echo "<script>alert('Something went wrong')</script>";
}

mysqli_close($conn);
header('Location: allBmi.php');
exit;
?>
