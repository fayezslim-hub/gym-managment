<?php

session_start();

// Unset all of the session variables
$_SESSION = array();
$_SESSION = array(); // clear all session variables

session_unset(); 

// If the user has a session cookie, force it to expire
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Destroy the session
session_destroy();

// Redirect the user to the home page or any other desired page
header('Location: signin.php');
exit;

?>
