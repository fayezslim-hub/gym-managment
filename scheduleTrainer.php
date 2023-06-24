<?php
session_start();
if (!isset($_SESSION["trainer_email"])) {
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Schedule Trainer</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="table.css">
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
                        <a style="padding: 2rem ;" class="nav-link" href="scheduleTrainer.php">Active Schedule</a>
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
    <div class="container no-margin-top">
        <h1 class="heading-primary">Weekly Schedule</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date and Time</th>
                        <th>Sport Name</th>
                        <th>Client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                foreach ($days as $day) {
                    $sql = "SELECT sport_client.*, client.*, sport.*
                            FROM sport_client
                            INNER JOIN client ON client.client_id = sport_client.client_id
                            INNER JOIN sport ON sport.class_date = sport_client.class_date AND sport.trainer_id = sport_client.trainer_id
                            WHERE sport_client.trainer_id = '{$_SESSION['trainer_id']}' AND sport.end_date>NOW() AND sport_client.class_date LIKE '%$day%'
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
                            echo "<td>" . $firstRow['sport_name'] . "</td>";
                            echo "<td>";
                            echo '<select class="form-control">';
foreach ($rows as $row) {
    echo '<option>' . $row['name'] . '</option>';
}
echo '</select>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td>" . $day . "</td>";
                        echo "<td colspan='2'>No classes scheduled</td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>





        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
</body>

</html>