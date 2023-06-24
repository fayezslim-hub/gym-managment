<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: signin.php");
    exit;
}
require_once "connection.php";
error_reporting(0);

header('Content-Type: application/json');

$name = $_POST['trainer_name'];
$client_id = $_POST['client_id'];
$trainer_id = $_POST['trainer_id'];
$class_dates = $_POST['class_dates'];
$sport_ids = $_POST['sport_ids'];
$start_dates = $_POST['start_dates'];
$sport_name = $_POST['sport_name'];

$currentTimestamp = time();

$errors = array(); // Initialize an empty array to hold error messages
$success = array(); // Initialize an empty array to hold success messages

$data = array_map(function ($class_date, $sport_id, $start_date) {
    return array(
        'class_dates' => $class_date,
        'sport_ids' => $sport_id,
        'start_dates' => $start_date
    );
}, $class_dates, $sport_ids, $start_dates);

foreach ($data as $row) {
    $class_date = $row['class_dates'];
    $sport_id = $row['sport_ids'];
    $start_date = $row['start_dates'];

    // Rest of your code here
}

    // Check if the client is already registered for this sport
    $sql1 = "SELECT sc.*, sp.* FROM sport_client sc 
         JOIN sport sp ON sc.sport_id = sp.sport_id 
         WHERE sc.client_id = $client_id 
         AND sc.class_date = '$class_date' 

         AND sp.end_date>'$start_date'";
         
    $result1 = $conn->query($sql1);
    if ($result1 && mysqli_num_rows($result1) > 0) {
        

        $errors[] = "You can't register for the same class twice";
    } else {
        // Check if the selected class date is already full
        $sql2 = "SELECT * FROM sport_client WHERE class_date = '$class_date' AND sport_id='$sport_id' ";
        $result2 = $conn->query($sql2);
        if ($result2 && mysqli_num_rows($result2) >= 5) { 
            $errors[] = "Sorry, the class on $class_date is already full";
        } else {
            $sql = "INSERT INTO sport_client VALUES ('', '$client_id', '$sport_id', '$class_date', '$trainer_id','1')";
            if (mysqli_query($conn, $sql)) {
                $success[] = "You have successfully booked the class on $class_date ";

                // Insert into payment table
                $payment_sql = "INSERT INTO payment  VALUES ('','$client_id', '100', NOW(),'$sport_name')";
                if (mysqli_query($conn, $payment_sql)) {
                    $success[] = "Payment has been added for the class on $class_date";
                } else {
                    $errors[] = "An error occurred while adding payment for $class_date";
                }
                
            } else {
                $errors[] = "An error occurred while registering for $class_date";
            }
        }
    }



$response = array();

// Print the success messages
if (!empty($success)) {
    $unique_success = array_unique($success); // Remove duplicate success messages
    $response['success'] = $unique_success;
}

// Print the error messages
if (!empty($errors)) {
    $unique_errors = array_unique($errors); // Remove duplicate error messages
    $response['errors'] = $unique_errors;
}

echo json_encode($response);
mysqli_close($conn);
?>
