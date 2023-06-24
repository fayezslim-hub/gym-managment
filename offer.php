<?php 
session_start();
if (!isset($_SESSION["trainer_email"])) {
header("Location: signin.php");
exit;
}
require_once "connection.php";
require_once"validate.php";
$courses = validate($_POST['courses']);
$courselevel = validate($_POST['courselevel']);
$days = validate($_POST['days'])." ".validate($_POST['hours']) ;
$time=validate($_POST['hours']);
$start_date = validate($_POST['start_date']);

$trainer_id=$_SESSION['trainer_id'];
$nextMonth = strtotime('+1 month', strtotime($start_date)); 

$dateAfterOneMonth = date('Y-m-d', $nextMonth);

$sql = "SELECT * FROM sport WHERE trainer_id = $trainer_id AND class_date = '$days' and end_date>='$start_date'";

$result = $conn->query($sql);

header("Content-Type: application/json");

if ($result->num_rows > 0) {
// Time conflict
echo json_encode(["status" => "conflict"]);
} else {
   
$sql = "INSERT INTO sport VALUES ('', '$courses', '$courselevel', '$days', '$trainer_id', '$time', '0', '$start_date', '$dateAfterOneMonth')";



if (mysqli_query($conn, $sql)) {
   
    echo json_encode(["status" => "success"]);
    
   
} else {
    // Error
    echo json_encode(["status" => "error"]);
}


}
mysqli_close($conn);
?>