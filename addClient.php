<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
}
require_once "connection.php";

$id = $_POST['client_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];


$target = $_POST['image'];


function generatePassword($length) {
    // Define all possible characters that can be used in the password
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@";
  
    $pass = "";
    for ($i = 0; $i < $length; $i++) {
      // Pick a random character from the chars string
      $randomIndex = rand(0, strlen($chars) - 1);
      $randomChar = $chars[$randomIndex];
    
      // Add the random character to the password
      $pass .= $randomChar;
    }
  
    return $pass;
  }
  
  $password = generatePassword(10); // Generate a password with 10 characters
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
 


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE client SET password = '$hashedPassword', approved='1' , join_date= NOW()  WHERE client_id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);

require_once 'vendor/autoload.php';

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

// Set your Gmail username and password
$gmailUsername = 'gymmanagment1@gmail.com';
$gmailPassword = 'cwusyuxhefvunerg';

// Create the Transport
$transport = Transport::fromDsn("smtp://$gmailUsername:$gmailPassword@smtp.gmail.com:587?encryption=tls");

// Create the Mailer using your created Transport
$mailer = new Mailer($transport);

// Create a message
$message = (new Email())
    ->from('gymmanagment1@gmail.com')
    ->to($email)
    ->subject('Verification Code')
    ->text('Your password is ' . $password . ' don\'t share it with anyone');

// Send the message
try {
    $mailer->send($message);
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Error sending email: ' . $e->getMessage();
}

// Redirect the user back to the original page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;






?>