<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: signin.php");
  exit;
}

require_once "connection.php";

// Prepare the SQL statement with a parameterized placeholder for the email
$sql = "SELECT * FROM client WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();

if ($result = $stmt->get_result()) {
  // Retrieve the data from the first row
  $row = $result->fetch_assoc();

  $_SESSION["client_id"] = $row['client_id'];
  $_SESSION["name"] = $row['name'];
  $_SESSION["phone"] = $row['phone'];
  $_SESSION["join_date"] = $row['join_date'];
  $_SESSION["image"] = $row['image'];
  $_SESSION["gender"] = $row['gender'];
  $_SESSION["address"] = $row['address'];
  $_SESSION["client_dob"] = $row['client_dob'];
}
$client_id = $_SESSION["client_id"];
require_once "connection.php";
$sql = "SELECT * FROM bmi WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["client_id"]);
$stmt->execute();

if ($result = $stmt->get_result()) {
  // Retrieve the data from the first row
  $row = $result->fetch_assoc();
  $_SESSION["bmi_id"] = $row['bmi_id'];
  $_SESSION["height"] = $row['height'];
  $_SESSION["weight"] = $row['weight'];
}

// Close the prepared statement and database connection
$stmt->close();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Payment History</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="table.css">

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
    <div class="container no-margin-top">
        <h1 class="heading-primary">Payment History</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <?php
        require_once "connection.php";
        $sql = "SELECT * FROM payment WHERE client_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          // if there are rows, show the table header
          echo '<table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Payment</th>
                <th>Purchase Date</th>
                <th>Session</th>
            </tr>
        </thead>
        <tbody>';
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>$" . htmlspecialchars($row['amount']) . "</td>
                <td>" . htmlspecialchars(date("m/d/Y", strtotime($row['payment_date']))) . "</td>
                <td>" . htmlspecialchars($row['class_name']) . "</td>
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