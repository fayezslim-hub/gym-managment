<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "gymmanagment"; 

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (mysqli_connect_errno())
{
echo mysqli_connect_error();
}
  ?>
  