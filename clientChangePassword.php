<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: signin.php");
    exit;
}
$client_id = $_SESSION["client_id"];
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <a class="navbar-brand" href="userPage.php">Tiger House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="allBmi.php">Check Your Progress</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="myskills.php">My Skills</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="scheduleClient.php">Active Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 2rem ;" class="nav-link" href="alltable.php">All Schedule</a>
                    </li>


                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle profile-logo" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="<?php echo $_SESSION["image"]; ?>">
                            </button>
                            <h2>Welcome
                                <?php echo "{$_SESSION["name"]}"; ?>
                            </h2>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="userAccount.php">My account</a></li>
                                <li><a class="dropdown-item" href="clientChangePassword.php">Change password</a></li>
                                <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                                <li><a class="dropdown-item" href="clientPayment.php">Payments</a></li>
                            </ul>
                        </div>
                    </li>
            </div>


    </nav>



    <div class="container">
        <div class="form-container">
            <h1 class="text-center mb-4">Profile image:<img src="<?php echo $_SESSION["image"]; ?>" alt=""></h1>
            <form action="#" method="POST" onsubmit="return validatePassword();">

                <div class="mb-3">
                    <label for="cPassword" class="form-label">Current Password:</label>
                    <div class="input-group">
                    <img src="pics/password.png" alt="" class="icon-password">
                        <input type="password" class="form-control" id="cPassword" name="cPassword"
                            placeholder="Please Enter Your Current Password" required>
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="togglePasswordVisibility('cPassword', 'cPasswordToggleIcon')">
                            <i class="far fa-eye" id="cPasswordToggleIcon" style="color: #ff7f50;"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nPassword" class="form-label">New Password:</label>
                    <div class="input-group">
                    <img src="pics/security.png" alt="" class="icon-security">
                        <input type="password" class="form-control" id="nPassword" name="nPassword"
                            placeholder="Please Enter Your New Password" required>
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="togglePasswordVisibility('nPassword', 'nPasswordToggleIcon')">
                            <i class="far fa-eye" id="nPasswordToggleIcon" style="color: #ff7f50;"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="check" class="form-label">Re-type Password:</label>
                    <div class="input-group">
                    <img src="pics/security.png" alt="" class="icon-security">
                        <input type="password" class="form-control" id="check" name="check"
                            placeholder="Please Re-type Your New Password" required>
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="togglePasswordVisibility('check', 'checkToggleIcon')">
                            <i class="fa-solid fa-eye fa-beat-fade" id="checkToggleIcon" style="color: #ff7f50;"></i>
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

    </div>
    <script>
    function validatePassword() {
        var newPassword = document.getElementById("nPassword").value;
        var check = document.getElementById("check").value;

        // check if passwords match
        if (newPassword != check) {
            alert("Passwords does not match.");
            return false;
        }

        // check password strength (at least 8 characters, at least 1 uppercase letter, at least 1 lowercase letter, and at least 1 number)


        return true;
    }
    </script>

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

<?php
    require_once "connection.php";
    require_once "validate.php";
    if (isset($_POST['cPassword'])) {

        $cPassword = validate($_POST['cPassword']);
        $nPassword = validate($_POST['nPassword']);
        $hashedPassword = password_hash($nPassword, PASSWORD_DEFAULT);

        $client_id = $_SESSION['client_id']; // Assuming you have set the client_id in the session

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $select = "SELECT * FROM client WHERE client_id='$client_id'";
        $result = $conn->query($select);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($cPassword, $row['password'])) {
                $sql = "UPDATE client SET password = '$hashedPassword' WHERE client_id='$client_id' ";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Your Password Have Changed')</script>";
                } else {
                    echo "<script>alert('Your Password Haven\'t Changed There Is An Error Please Try Again')</script>";
                }
            } else {
                echo "<script>alert('The Password You Entered Is Not Correct')</script>";
            }
        } else {
            echo "<script>alert('Client not found')</script>";
        }

        mysqli_close($conn);

        // Redirect the user back to the original page

        exit;
    }
?>





 
</body>

</html>