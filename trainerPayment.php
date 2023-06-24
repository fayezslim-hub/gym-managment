<?php
session_start();
if (!isset($_SESSION["trainer_email"])) {
    header("Location: signin.php");
    exit;
}
$trainer_id = $_SESSION["trainer_id"];
$email = $_SESSION["trainer_email"];
require_once "connection.php";
require_once "validate.php";
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
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Offering Available</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="table.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="trainerPage.php">Tiger House</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <li><a class="dropdown-item" href="trainerChangePassword.php">Change password</a></li>
                                <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                                <li><a class="dropdown-item" href="trainerPayment.php">Payments</a></li>

                            </ul>
                        </div>
                </li>


        </div>


</nav>

<div class="container no-margin-top">
    <h1 class="heading-primary">Payment History</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <?php
        require_once "connection.php";
        $sql = "SELECT * FROM tpayment WHERE trainer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $trainer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          // if there are rows, show the table header
          echo '<table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Payment</th>
                <th>Date</th>
               
            </tr>
        </thead>
        <tbody>';
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>$" . htmlspecialchars($row['amount']) . "</td>
                <td>" . htmlspecialchars(date("m/d/Y", strtotime($row['tpayment_date']))) . "</td>
               
            </tr>";
          }
          echo "</tbody></table>";

        } else {
          echo "<p class='text-muted'>There are no inactive payments.</p>";
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>


    </body>

</html>