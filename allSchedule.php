<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
}
require_once "connection.php";
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="table.css">
    <title>Schedule</title>
   
</head>

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
            <h1 class="heading-primary">Active Schedule for member</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Sport name</th>
                        <th>Client</th>
                        <th>Trainer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        foreach ($days as $day) {
            $sql = "SELECT sport_client.*, client.*, sport.*, trainer.*
                    FROM sport_client
                    INNER JOIN client ON client.client_id = sport_client.client_id
                    INNER JOIN sport ON sport.class_date = sport_client.class_date AND sport.trainer_id = sport_client.trainer_id
                    INNER JOIN trainer ON trainer.trainer_id = sport_client.trainer_id
                    WHERE sport.end_date>NOW() AND sport_client.class_date LIKE '%$day%'
                    ORDER BY sport.class_time";
            $result = $conn->query($sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $groupedData = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $key = $row['class_date'] . '-' . $row['sport_name'];
                    $groupedData[$key][] = $row;
                }
                foreach ($groupedData as $key => $rows) {
                    $firstRow = $rows[0];
                    echo "<tr>";
                    echo "<td>" . $firstRow['class_date'] . "</td>";
                    echo "<td>" . $firstRow['start_date'] . "</td>";
                    echo "<td>" . $firstRow['end_date'] . "</td>";
                    echo "<td>" . $firstRow['sport_name'] . "</td>";
                    echo "<td>";
                    echo '<select class="form-control">';
    foreach ($rows as $row) {
        echo '<option>' . $row['name'] . '</option>';
    }
    echo '</select>';
                    echo "</td>";
                    echo "<td>" . $firstRow['trainer_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td>" . $day . "</td>";
                echo "<td colspan='3'>No classes scheduled</td>";
                echo "</tr>";
            }
        }
    ?>
                </tbody>
            </table>
            <h1 class="heading-primary">Inactive Schedule for member</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Sport name</th>
                        <th>Client</th>
                        <th>Trainer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        foreach ($days as $day) {
            $sql = "SELECT sport_client.*, client.*, sport.*, trainer.*
                    FROM sport_client
                    INNER JOIN client ON client.client_id = sport_client.client_id
                    INNER JOIN sport ON sport.class_date = sport_client.class_date AND sport.trainer_id = sport_client.trainer_id
                    INNER JOIN trainer ON trainer.trainer_id = sport_client.trainer_id
                    WHERE sport.end_date<NOW() AND sport_client.class_date LIKE '%$day%'
                    ORDER BY sport.class_time";
            $result = $conn->query($sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $groupedData = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $key = $row['class_date'] . '-' . $row['sport_name'];
                    $groupedData[$key][] = $row;
                }
                foreach ($groupedData as $key => $rows) {
                    $firstRow = $rows[0];
                    echo "<tr>";
                    echo "<td>" . $firstRow['class_date'] . "</td>";
                    echo "<td>" . $firstRow['start_date'] . "</td>";
                    echo "<td>" . $firstRow['end_date'] . "</td>";
                    echo "<td>" . $firstRow['sport_name'] . "</td>";
                    echo "<td>";
                    echo '<select class="form-control">';
    foreach ($rows as $row) {
        echo '<option>' . $row['name'] . '</option>';
    }
    echo '</select>';
                    echo "</td>";
                    echo "<td>" . $firstRow['trainer_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td>" . $day . "</td>";
                echo "<td colspan='3'>No classes scheduled</td>";
                echo "</tr>";
            }
        }
    ?>
                </tbody>
            </table>

        </div>

    </div>


</body>

</html>