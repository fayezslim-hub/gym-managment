<?php
session_start();
if (!isset($_SESSION["trainer_email"])) {
  header("Location: signin.php");
  exit;
}
$email = $_SESSION["trainer_email"];
$trainer_id = $_SESSION["trainer_id"];



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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Change Password</title>
    <link rel="stylesheet" href="user.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="trainerPage.php">Tiger House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="offering.php">Offering</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="scheduleTrainer.php">My Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="trainertable.php">All Schedule</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle profile-logo" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="<?php echo $_SESSION["image"]; ?>">
                                </button>
                                <h2>Welcome Trainer
                                    <?php echo "{$_SESSION["name"]}"; ?>
                                </h2>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="trainerPage.php">My account</a></li>
                                    <li><a class="dropdown-item" href="trainerChangePassword.php">Change password</a>
                                    </li>
                                    <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                                    <li><a class="dropdown-item" href="trainerPayment.php">Payments</a></li>

                                </ul>
                            </div>
                    </li>


            </div>


    </nav>



    <div class="container">
        <div class="form-container">
            <h1 class="text-center mb-4">Profile image:<img src="<?php echo  $_SESSION["image"] ; ?>" alt=""></h1>
            <form action="#" method="POST" onsubmit="return validatePassword();">
                <div class="mb-3">
                    <label for="CPassword" class="form-label">Current Password:</label>
                    <div class="input-group">
                        <img src="pics/password.png" alt="" class="icon-password">
                        <input type="password" class="form-control" id="CPassword" name="CPassword"
                            placeholder="Please Enter Your Current Password" required>
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="togglePasswordVisibility('CPassword', 'CPasswordToggleIcon')">
                            <i class="far fa-eye" id="CPasswordToggleIcon" style="color: #ff7f50;"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="NPassword" class="form-label">New Password:</label>
                    <div class="input-group">
                    <img src="pics/security.png" alt="" class="icon-security">
                        <input type="password" class="form-control" id="NPassword" name="NPassword"
                            placeholder="Please Enter Your New Password" required>
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="togglePasswordVisibility('NPassword', 'NPasswordToggleIcon')">
                            <i class="far fa-eye" id="NPasswordToggleIcon" style="color: #ff7f50;"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Check" class="form-label">Re-type Password:</label>
                    <div class="input-group">
                    <img src="pics/security.png" alt="" class="icon-security">
                        <input type="password" class="form-control" id="Check" name="Check"
                            placeholder="Please Re-type Your New Password" required>
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="togglePasswordVisibility('Check', 'CheckToggleIcon')">
                            <i class="far fa-eye" id="CheckToggleIcon" style="color: #ff7f50;"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-coral submit-button"><i class="fas fa-paper-plane"></i>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function togglePasswordVisibility(passwordFieldId, toggleIconId) {
        var passwordField = document.getElementById(passwordFieldId);
        var toggleIcon = document.getElementById(toggleIconId);

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("far", "fa-eye");
            toggleIcon.classList.add("far", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("far", "fa-eye-slash");
            toggleIcon.classList.add("far", "fa-eye");
        }
    }
    </script>
    <script>
    function validatePassword() {
        var newPassword = document.getElementById("NPassword").value;
        var check = document.getElementById("Check").value;

        // check if passwords match
        if (newPassword != check) {
            alert("Passwords do not match.");
            return false;
        }

        // check password strength (at least 8 characters, at least 1 uppercase letter, at least 1 lowercase letter, and at least 1 number)


        return true;
    }
    </script>

<?php
    require_once "connection.php";
    require_once "validate.php";
    if (isset($_POST['CPassword'])) {

        $CPassword = validate($_POST['CPassword']);
        $NPassword = validate($_POST['NPassword']);
        $hashedPassword = password_hash($NPassword, PASSWORD_DEFAULT);

        $trainer_id = $_SESSION['trainer_id']; // Assuming you have set the trainer_id in the session

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $select = "SELECT * FROM trainer WHERE trainer_id='$trainer_id'";
        $result = $conn->query($select);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($CPassword, $row['password'])) {
                $sql = "UPDATE trainer SET password = '$hashedPassword' WHERE trainer_id='$trainer_id' ";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Your Password Have Changed')</script>";
                } else {
                    echo "<script>alert('Your Password Haven\'t Changed There Is An Error Please Try Again')</script>";
                }
            } else {
                echo "<script>alert('The Password You Entered Is Not Correct')</script>";
            }
        } else {
            echo "<script>alert('Trainer not found')</script>";
        }

        mysqli_close($conn);

        // Redirect the user back to the original page

        exit;
    }
?>






</body>

</html>