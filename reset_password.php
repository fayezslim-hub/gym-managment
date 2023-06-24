<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
    header("Location: signin.php");
    exit;
}

require_once "connection.php";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the form input
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $admin_email = $_SESSION["admin_email"];

    $sql = "SELECT * FROM admin WHERE admin_email = '$admin_email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($current_password, $row['password'])) {
            if ($new_password === $confirm_password) {
                // Hash the new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the admin's password in the database
                $sql = "UPDATE admin SET password = '$hashed_new_password' WHERE admin_email = '$admin_email'";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Your password has been updated successfully.')</script>";
                } else {
                    echo "<script>alert('An error occurred while updating your password. Please try again.')</script>";
                }
            } else {
                echo "<script>alert('The new password and confirm password fields do not match. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('The current password you entered is incorrect. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('An error occurred. Please try again.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <title>Reset Password</title>
</head>
<style>
.heading-primary {
    font-size: 50px;
    font-weight: bold;
    font-family: "Bungee Spice", cursive;
    animation-name: bounce;
    animation-duration: 1s;
    animation-iteration-count: 1;
    animation-timing-function: ease-out;
}

/* Style the form container */
.form-container {
    max-width: 500px;
    width: 100%;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* Added subtle shadow for depth */
}

/* Style the reset password form */
form {
    max-width: 500px;
    margin: auto;
    background-color: #f8f9fa;
    padding: 40px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* Added subtle shadow for depth */
}

label {
    font-weight: bold;
    color: #495057;
    /* Darkened the label color for better contrast */
}

/* Style password input */
input[type="password"] {
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ced4da;
    /* Added light border for definition */
}

/* Style submit button */
button[type="submit"] {
    font-size: 16px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* Added subtle shadow for depth */
}

button[type="submit"]:hover {
    background-color: #0069d9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    /* Darkened the shadow on hover */
}
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tiger House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary logout-btn" href="index.php">Logout</a>
                        <!-- Add "btn" and "btn-primary", remove "nav-link" -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="sidebar">

            <ul>
                <li>
                    <a class="btn btn-secondary btn-dashboard" href="admin.php">
                        <img src="pics/dashboard.png" alt="Dashboard" width="40" height="40" class="me-2">
                        Dashboard
                    </a>
                </li>

                <div class="dropdown"><br>
                    <button class="btn btn-secondary dropdown-toggle btn-clients" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="pics/client.png" alt="client" width="40" height="40" class="me-2">Clients
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminClient.php">Clients Requests</a></li>
                        <li><a class="dropdown-item" href="adminClientActive.php">Active Clients</a></li>
                        <li><a class="dropdown-item" href="adminClientInActive.php">In Active Clients</a></li>
                        <li><a class="dropdown-item" href="adminClientBlock.php">Blocked Clients</a></li>
                        <li><a class="dropdown-item" href="adminClientReject.php">Rejected Clients</a></li>
                        <li><a class="dropdown-item" href="clientClassRequest.php">Skill Approve</a></li>
                    </ul>
                </div>

                <div class="dropdown"><br><br>
                    <button class="btn btn-secondary dropdown-toggle btn-trainers" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="pics/trainer.png" alt="trainer" width="40" height="40" class="me-2">Trainers
                    </button>


                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminTrainer.php">Trainers Requests</a></li>
                        <li><a class="dropdown-item" href="adminTrainerActive.php">Active Trainers</a></li>
                        <li><a class="dropdown-item" href="adminTrainerInActive.php">In Active Trainers</a></li>
                        <li><a class="dropdown-item" href="adminTrainerBlock.php">Blocked Trainers</a></li>
                        <li><a class="dropdown-item" href="adminTrainerReject.php">Rejected Trainer</a></li>
                        <li><a class="dropdown-item" href="adminClassApprove.php">Class Approve</a></li>
                    </ul>
                </div>

                <li><br><br>
                    <a class="btn btn-secondary btn-schedules" href="allSchedule.php">
                        <img src="pics/schedule.png" alt="trainer" width="40" height="40" class="me-2">
                        Schedules
                    </a>
                </li>

                <li><br>
                    <a class="btn btn-secondary btn-reset" href="reset_password.php">
                        <img src="pics/reset-password.png" alt="password" width="40" height="40" class="me-2">
                        Password Reset
                    </a>
                </li>

            </ul>
        </div>
        <div class="main-content">
            <h1 class="heading-primary">Reset Password</h1>
            <div class="form-container">
                <form action="reset_password.php" method="POST">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" required>

                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" required>

                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>

                    <button type="submit">Reset Password</button>
                </form>
</body>

</html>