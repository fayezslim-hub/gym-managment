<?php
session_start();

if (isset($_POST['email'])) {
    require_once "connection.php";
    require_once "validate.php";
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $flagEmail = false;
    $flagPassword = false;

    $sqlAdmin = "SELECT * FROM admin WHERE admin_email='$email'";
    $result = $conn->query($sqlAdmin);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $flagEmail = true;
        if (password_verify($password, $row['password'])) {
            $_SESSION["admin_email"] = $email;
            header("Location: admin.php");
            exit;
        } else {
            $flagPassword = true;
        }
    }

    $sqlt = "SELECT * FROM trainer WHERE trainer_email='$email' AND approved='1'";
    $result = $conn->query($sqlt);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $flagEmail = true;
        if (password_verify($password, $row['password'])) {
            $_SESSION["trainer_email"] = $email;
            header("Location: trainerPage.php");
            exit;
        } else {
            $flagPassword = true;
        }
    }

    $sql = "SELECT * FROM client WHERE email='$email' AND approved='1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $flagEmail = true;
        if (password_verify($password, $row['password'])) {
            $_SESSION["email"] = $email;
            header("Location: userPage.php");
            exit;
        } else {
            $flagPassword = true;
        }
    }

    if ($flagEmail && $flagPassword) {
        echo "<script>alert('Your password or email is wrong ')</script>";
    } elseif (!$flagEmail) {
        echo "<script>alert('Your password or email is wrong ')</script>";
    }
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="signup.css">
    <title>Login</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tiger House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="howWeHire.php">How we hire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="signup-title">Access Your Gym Account</h1>
    <div class="login">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 order-md-1">
                    <div class="my-form">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <img src="pics/gmail.png" alt="" class="icon-gmail">
                                <label>Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <img src="pics/padlock.png" alt="" class="icon-padlock">
                                <label>Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter your password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text password-toggle-icon"
                                            onclick="togglePasswordVisibility()">
                                            <i class="far fa-eye" style="color: #ff7f50;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <input class="sub btn btn-primary" type="submit" value="LOG IN">
                        </form>

                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-2">
                    <img class="img-login" src="pics/dumbbell.png" alt="Boxing gloves icon">
                </div>
            </div>
        </div>
    </div>


    <script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var passwordToggleIcon = document.querySelector(".password-toggle-icon i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggleIcon.classList.remove("far", "fa-eye");
            passwordToggleIcon.classList.add("far", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            passwordToggleIcon.classList.remove("far", "fa-eye-slash");
            passwordToggleIcon.classList.add("far", "fa-eye");
        }
    }
    </script>
</body>

</html>