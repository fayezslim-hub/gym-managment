<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: signin.php");
  exit;
}
require_once "connection.php";
require_once "validate.php";

// Retrieve the current client's ID from the session
$client_id = $_SESSION["client_id"];

// Retrieve and validate the form inputs
$price = validate($_POST['price']);
$sessions = validate($_POST['sessions']);
$package_id = validate($_POST['package_id']);
$oneMonthFromNow = date('Y-m-d', strtotime('+1 month'));

// Retrieve the payment records for the current client with remaining sessions
// Check if the client has any existing payment records
$sql = "SELECT * FROM payment WHERE client_id = '$client_id' AND payment_active='1' ORDER BY payment_id desc limit 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    // Insert the payment data into the database
    $sql = "INSERT INTO payment VALUES ('', '$client_id', '$price', NOW(), '$sessions', '$sessions', '$package_id','$oneMonthFromNow','1')";
    if (mysqli_query($conn, $sql)) {
       
       
            // Show a success alert and redirect to clientPackages.php
            echo "<script>alert('Purchase successful!'); window.location.href='clientPackages.php';</script>";
        }
     else {
        // Show a failure alert and redirect to clientPackages.php
        echo "<script>alert('Purchase failed! Please try again.'); window.location.href='clientPackages.php';</script>";
    }
} else {
    // Check if the client has any remaining sessions
    $row = mysqli_fetch_assoc($result);
    $drop_sessions = $row['drop_sessions'];
    if ($drop_sessions <= 0) {
        // Show an alert for no remaining sessions and redirect to clientPackages.php
        echo "<script>alert('You can\'t register until the package expires.'); window.location.href='clientPackages.php';</script>";
    } else {
        // Show an alert for existing payment records and redirect to clientPackages.php
        echo "<script>alert('You already have an existing payment record.'); window.location.href='clientPackages.php';</script>";
    }
}


// Do not use header() function here, as we're using JavaScript for redirection

?>
