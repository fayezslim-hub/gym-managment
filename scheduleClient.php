<?php
session_start();
if (!isset($_SESSION["email"])) {
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
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Weekly Schedule</title>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container no-margin-top">
        <h1 class="heading-primary">Active Schedule</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Sport</th>
                        <th>Trainer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        foreach ($days as $day) {
            $sql = "SELECT sport_client.*, trainer.*, sport.*
            FROM sport_client
            INNER JOIN trainer ON trainer.trainer_id = sport_client.trainer_id
            INNER JOIN sport ON sport.trainer_id = trainer.trainer_id AND sport.sport_id = sport_client.sport_id
            WHERE sport_client.client_id = '{$_SESSION['client_id']}'AND sport.end_date>NOW() AND sport_client.class_date LIKE '%$day%'
            ORDER BY sport.class_time";
            $result = $conn->query($sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $day . "</td>";
                    echo "<td>" . $row['class_time'] . "</td>";
                    echo "<td>" . $row['sport_name'] . "</td>";
                    echo "<td>" . $row['trainer_name'] . "</td>";
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
</body>

</html>