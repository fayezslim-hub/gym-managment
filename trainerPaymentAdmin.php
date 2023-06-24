<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
}
$year = $_POST['year'];
$month = $_POST['month'];
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
        <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="admin.css">

    <title>Dashboard</title>
</head>
<style>
.back-link {
    display: inline-block;
    padding: 5px 10px;
    font-size: 1.2rem;
    font-weight: bold;
    color: #fff;
    background-color: #333;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.back-link:hover {
    background-color: #555;
}

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

.img-thumbnail {
    max-width: 100px;
    max-height: 100px;
}

/* Remove border on top of the button */
.table td .btn {
    border-top: none !important;
}

.no-clients {
    text-align: center;
    font-size: 24px;
    color: black;
    font-family: 'Aref Ruqaa Ink', serif;
    animation-name: bounce;
    animation-duration: 1s;
    animation-iteration-count: 1;
    animation-timing-function: ease-out;
}
.heading-primary {
    font-size: 50px;
    font-weight: bold;
    color: coral;
    margin-top: 30px;
    margin-bottom: 10px;
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

.box {
    border: 1px solid #333;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: white;
    padding: 20px;
    text-align: center;

    transition: all 0.2s ease-in-out;
    height: 200px;
    max-width: 400px;
    margin: 20px auto;

}

.card1 {
    background-color: #b30000;
}

.card2 {
    background-color: #7c1158;
}

.card3 {
    background-color: #4421af;
}

.card4 {
    background-color: #1a53ff;
}

.card5 {
    background-color: #0d88e6;
}

.card6 {
    background-color: #00b7c7;
}




.box h2 {
    margin-top: 0;
}

.box p {
    font-size: 18px;
    margin: 10px 0 0;
}

.styled-form label {
    display: inline-block;
    margin-bottom: 5px;
}

.styled-form select {
    display: block;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 15px;
    width: 100%;
    max-width: 200px;
}

.styled-form input[type="submit"] {
    background-color: #1F51FF;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.styled-form input[type="submit"]:hover {
    background-color: #1F51FF;
    opacity: 0.5;
}
</style>

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
                    <img src="pics/client.png" alt="client" width="40" height="40" class="me-2"> Clients
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="adminClient.php">Clients requests</a></li>
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
                    <li><a class="dropdown-item" href="adminTrainer.php">Trainers requests</a></li>
                    <li><a class="dropdown-item" href="adminTrainerActive.php">Active Trainers</a></li>
                    <li><a class="dropdown-item" href="adminTrainerInActive.php">In Active Trainers</a></li>
                    <li><a class="dropdown-item" href="adminTrainerBlock.php">Blocked Trainers</a></li>
                    <li><a class="dropdown-item" href="adminTrainerReject.php">Rejected Trainer</a></li>
                    <li><a class="dropdown-item" href="adminClassApprove.php">Class approve</a></li>
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
        <a class="back-link" href="admin.php">Back</a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tbody>
                    <!-- Use a loop to iterate over the result set and display each row in a table row -->
                    <?php
require_once "connection.php";
$sql = "SELECT tpayment.*, trainer.* 
FROM tpayment 
JOIN trainer ON tpayment.trainer_id = trainer.trainer_id 
WHERE YEAR(tpayment_date) = $year AND MONTH(tpayment_date) = $month";
$result = mysqli_query($conn, $sql);

$totalAmountSql = "SELECT SUM(amount) as totalAmount
FROM tpayment 
WHERE YEAR(tpayment_date) = $year AND MONTH(tpayment_date) = $month";
$totalAmountResult = mysqli_query($conn, $totalAmountSql);
$totalAmountRow = mysqli_fetch_assoc($totalAmountResult);
$totalAmount = $totalAmountRow['totalAmount'];

if ($result && mysqli_num_rows($result) > 0) {
    // if there are rows, show the table header
    echo "<thead>
            <tr>
            <th>Name</th>
            <th>class name</th>
            <th>payment date</th>
            <th>amount</th>
            </tr>
          </thead>";
}
else{
    echo"<p class='no-clients'>Payment information currently unavailable.</p>";
}?>

            <tbody>
                <?php 
foreach($result as $row): ?>
                <tr>
                    <td><?php echo $row['trainer_name']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td><?php echo $row['tpayment_date']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                </tr>
                <?php endforeach; ?>

                <!-- Add one more row for total -->
                <?php if ($totalAmount > 0): ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td><?php echo $totalAmount; ?></td>
                </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>









</body>

</html>