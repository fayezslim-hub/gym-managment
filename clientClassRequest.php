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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <title>Client Class Request</title>
    <style>
      
        table {
            border-collapse: separate;
            border-spacing: 0;
            /* Add space between rows */
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #dee2e6;
            /* Add border to table cells */
        }

        thead {
            background-color: #6c757d;
            color: white;
        }

        tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #dee2e6;
        }

        .table {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .main-content {
            margin-top: 50px;
        }

        .img-thumbnail {
            max-width: 100px;
            max-height: 100px;
        }

        /* Remove border on top of the button */
        .table td .btn {
            border-top: none !important;
        }

        .heading-primary {
        font-size: 50px;
        font-weight: bold;
        font-family: "Bungee Spice", cursive;
        animation-name: bounce;
        animation-duration: 1s;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
    }

    .no-clients {
        text-align: center;
        font-size: 24px;
        color: black;
        font-family: 'Reem Kufi Fun', sans-serif;
        animation-name: bounce;
        animation-duration: 1s;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
    }


        @keyframes bounce {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            50% {
                transform: translateY(20px);
                opacity: 0.8;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
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
    <button class="btn btn-secondary dropdown-toggle btn-clients" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
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
    <button class="btn btn-secondary dropdown-toggle btn-trainers" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
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
            <h1 class="heading-primary">Skill Approve</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <?php

                    $sql = "SELECT class_request.*, client.*
        FROM class_request
        INNER JOIN client ON client.client_id = class_request.client_id
        where class_request.class_level = 0";
                    $result = $conn->query($sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        // if there are rows, show the table header
                        echo "<table>
          <thead>
            <tr>
              <th>name</th>
              <th>sport</th>
              <th>played</th>
              <th>goal</th>
              <th>disabilities</th>
              <th>years</th>
              <th>desired level</th>
            </tr>
          </thead>
          <tbody>";
                        foreach ($result as $row): ?>
                            <tr>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['sport_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['played']; ?>
                                </td>
                                <td>
                                    <?php echo $row['goal']; ?>
                                </td>
                                <td>
                                    <?php echo $row['disability']; ?>
                                </td>
                                <td>
                                    <?php echo $row['years']; ?>
                                </td>

                                <td>
                                    <form method="post" action="addLevel.php">
                                        <input type="hidden" name="class_request_id"
                                            value="<?php echo $row['class_request_id']; ?>">
                                            <select name="class_level" style="width: 200px;">
                                            <option value="1" <?php if ($row['class_level'] == 1)
                                                echo "selected"; ?>>Level 1
                                            </option>
                                            <option value="2" <?php if ($row['class_level'] == 2)
                                                echo "selected"; ?>>Level 2
                                            </option>
                                            <option value="3" <?php if ($row['class_level'] == 3)
                                                echo "selected"; ?>>Level 3
                                            </option>
                                        </select>

                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="removeRequest.php">
                                        <input type="hidden" name="class_request_id"
                                            value="<?php echo $row['class_request_id']; ?>">

                                        <button type="submit" name="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;
                        // Close the table body and table
                        echo "</tbody>
        </table>";
                    } else {
                        echo "<p class='no-clients'>There are no skill requests right now</p>";
                    }
                    ?>
                    </tbody>
                </table>





            </div>

        </div>

    </div>

</body>

</html>