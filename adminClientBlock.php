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
    <link rel="stylesheet" href="table.css">
    <title>Client Block</title>
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

            <h1 class="heading-primary">Blocked Clients</h1>


            <div class="table-responsive">
                <table class="table table-striped table-bordered">


                    <!-- Use a loop to iterate over the result set and display each row in a table row -->
                    <?php

          $sql = "SELECT * FROM client where approved = 3";
          $result = $conn->query($sql);
          if ($result && mysqli_num_rows($result) > 0) {
            // if there are rows, show the table header
            echo "<thead>
           <tr>
               <th>Image</th>
               <th>User ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Address</th>
               <th>Join Date</th>
               <th>Approved</th>
               <th>Gender</th>
           
           </tr>
         </thead>";
          } else {
            echo "<p class='no-clients'>There are no blocked clients right now</p>";
          } ?>

                    <tbody>
                        <?php
            foreach ($result as $row) : ?>
                        <tr>
                            <td><img src="<?php echo $row['image']; ?>" alt="" class="img-thumbnail"> </td>
                            <td><?php echo $row['client_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['join_date']; ?></td>
                            <td><?php echo $row['approved']; ?></td>
                            <td><?php echo $row['gender']; ?></td>


                            <td>
                                <form method="post" action="activeClient.php">

                                    <input type="hidden" name="client_id" value="<?php echo $row['client_id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                                    <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
                                    <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">

                                    <input type="hidden" name="approved" value="<?php echo $row['approved']; ?>">
                                    <input type="hidden" name="join_date" value="<?php echo $row['join_date']; ?>">
                                    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                                    <button type="submit" name="submit" class="btn btn-primary">activate</button>
                                </form>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>

        </div>

</body>

</html>