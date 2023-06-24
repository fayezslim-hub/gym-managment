<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
}

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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="admin.css">

    <title>Dashboard</title>
</head>
<style>
.heading-primary {
    font-size: 50px;
    font-weight: bold;
    font-family: "Bungee Spice", cursive;
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
    border: 3px solid #5C6BC0;
    border-radius: 20px;
    box-shadow: 0px 10px 20px rgba(92, 107, 192, 0.4);
    color: #FAFAFA;
    padding: 30px;
    text-align: center;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    height: 250px;
    max-width: 300px;
    margin: 20px auto;
    background: #673AB7;
    font-size: 1.2em;
    box-sizing: border-box;
}

.card1 {
    background-color: #b30000;
    font-family: 'Reem Kufi Fun', sans-serif;
}

.card2 {
    background-color: #7c1158;
    font-family: 'Reem Kufi Fun', sans-serif;
}

.card3 {
    background-color: #4421af;
    font-family: 'Reem Kufi Fun', sans-serif;
}

.card4 {
    background-color: #1a53ff;
    font-family: 'Reem Kufi Fun', sans-serif;
}

.card5 {
    background-color: #0d88e6;
    font-family: 'Reem Kufi Fun', sans-serif;
}

.card6 {
    background-color: #00b7c7;
    font-family: 'Reem Kufi Fun', sans-serif;
}

label[for="year"],
label[for="month"] {
    font-family: 'Reem Kufi Fun', sans-serif;
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 10px;
    display: inline-block;
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
        <h1 class="heading-primary">Welcome Admin</h1>
        <div class="row">

            <div class="box card1 col-md-4">
                <?php

		require_once "connection.php";
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM trainer where approved=1";
		$result = mysqli_query($conn, $sql);
		$num_trainers = mysqli_num_rows($result);
       

        echo '<img src="pics/admin-trainer.png" alt="" class="icon-admin-trainer"> Number of Trainers: ' . $num_trainers;
		?>
                <a class="beautiful-button" href="trainerAdmin.php">Show More</a>

            </div>



            <div class="box card2 col-md-4">
                <?php
		require_once "connection.php";
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql1 = "SELECT * FROM client where approved=1";
		$result1 = mysqli_query($conn, $sql1);
		$num_client = mysqli_num_rows($result1);
        echo '<img src="pics/admin-client.png" alt="" class="icon-admin-client"> Number of Clients: ' . $num_client;;
		?>
                <a class="beautiful-button" href="clientAdmin.php">Show More</a>

            </div>

            <div class="box card3 col-md-4">
                <img src="pics/map.png" alt="" class="icon-map">
                <p>Addresses of the clients</p>
                <a class="button" href="addressAdmin.php">Show more</a>


            </div>
        </div>

        <h1 class="heading-primary">Monthly Earning</h1>

        <div class="row">

            <div class="box card4 col-md-4">

                <?php
    require_once "connection.php";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $selected_year = isset($_POST['year']) ? intval($_POST['year']) : (isset($_COOKIE['selectedYear']) ? $_COOKIE['selectedYear'] : date('Y'));
    $selected_month = isset($_POST['month']) ? intval($_POST['month']) : (isset($_COOKIE['selectedMonth']) ? $_COOKIE['selectedMonth'] : date('m'));
    

    // Select total amount for the selected month and year
    $sql = "SELECT 
        YEAR(payment_date) AS year,
        MONTH(payment_date) AS month,
        SUM(amount) AS total_amount
    FROM
        payment
    WHERE
        YEAR(payment_date) = $selected_year AND MONTH(payment_date) = $selected_month
    GROUP BY
        YEAR(payment_date),
        MONTH(payment_date)";
    $result = mysqli_query($conn, $sql);

    // Display the total amount for the selected month
    echo '<img src="pics/money-bag.png" alt="" class="icon-money-bag"><p>Total Amount gained per Month:</p>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo  " Gained: $" . $row['total_amount'] . "<br>";
        }
    } else {
        echo "No data is found";
    }

    // Close the MySQL connection
   
    ?>
                <form action="clientPaymentAdmin.php" method="post">
                    <input type="hidden" name="year" value="<?php echo $selected_year; ?>">
                    <input type="hidden" name="month" value="<?php echo $selected_month; ?>">

                    <button type="submit" class="detail-button">View Details</button>
                </form>
            </div>

            <div class="box card5 col-md-4">
                <?php
    // Connect to the MySQL database
    require_once "connection.php";

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $selected_year = isset($_POST['year']) ? intval($_POST['year']) : (isset($_COOKIE['selectedYear']) ? $_COOKIE['selectedYear'] : date('Y'));
    $selected_month = isset($_POST['month']) ? intval($_POST['month']) : (isset($_COOKIE['selectedMonth']) ? $_COOKIE['selectedMonth'] : date('m'));
    

    // Select total amount paid for trainers for the selected month and year
    $sql = "SELECT 
        YEAR(tpayment_date) AS year,
        MONTH(tpayment_date) AS month,
        SUM(amount) AS total_amount
    FROM
        tpayment
    WHERE
        YEAR(tpayment_date) = $selected_year AND MONTH(tpayment_date) = $selected_month
    GROUP BY
        YEAR(tpayment_date),
        MONTH(tpayment_date)";
    $result = mysqli_query($conn, $sql);

    // Display the total amount paid for trainers for the selected month
    echo '<img src="pics/pay.png" alt="" class="icon-pay"><p>Total Amount Paid for Trainers per Month:</p>';
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo  " Paid: $" . $row['total_amount'] . "<br>";
    }
    } else {
    echo "No data is found";
    }

?>
                <form action="trainerPaymentAdmin.php" method="post">
                    <input type="hidden" name="year" value="<?php echo $selected_year; ?>">
                    <input type="hidden" name="month" value="<?php echo $selected_month; ?>">
                    <button type="submit" class="detail-button">View Details</button>
                </form>
            </div>
            <div class="box card6 col-md-4">
                <?php
    // Connect to the MySQL database
    require_once "connection.php";
    // Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$selected_year = isset($_POST['year']) ? intval($_POST['year']) : (isset($_COOKIE['selectedYear']) ? $_COOKIE['selectedYear'] : date('Y'));
$selected_month = isset($_POST['month']) ? intval($_POST['month']) : (isset($_COOKIE['selectedMonth']) ? $_COOKIE['selectedMonth'] : date('m'));


$sql = "SELECT
            p.year,
            p.month,
            p.total_amount AS total_amount1,
            t.total_amount AS total_amount2
        FROM (
            SELECT
                YEAR(payment_date) AS year,
                MONTH(payment_date) AS month,
                SUM(amount) AS total_amount
            FROM
                payment
            WHERE
                YEAR(payment_date) = $selected_year AND MONTH(payment_date) = $selected_month
            GROUP BY
                YEAR(payment_date),
                MONTH(payment_date)
        ) AS p
        LEFT JOIN (
            SELECT
                YEAR(tpayment_date) AS year,
                MONTH(tpayment_date) AS month,
                SUM(amount) AS total_amount
            FROM
                tpayment
            WHERE
                YEAR(tpayment_date) = $selected_year AND MONTH(tpayment_date) = $selected_month
            GROUP BY
                YEAR(tpayment_date),
                MONTH(tpayment_date)
        ) AS t ON p.year = t.year AND p.month = t.month";

$result = mysqli_query($conn, $sql);

// Display the net payment for the selected month
echo  '<img src="pics/income.png" alt="" class="icon-income"><p>Net Payment per Month:</p>';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $net_payment = $row['total_amount1'] - $row['total_amount2'];
        echo  " Net Payment: $" . $net_payment . "<br>";
    }
} else {
    echo "No data is found";
}

// Close the MySQL connection

?>
            </div>
            <h1 class="heading-primary">Yearly Earning</h1>
        </div>
        <div class="row">

            <div class="box card4 col-md-4">

                <?php
require_once "connection.php";
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$selected_year = isset($_POST['year']) ? intval($_POST['year']) : (isset($_COOKIE['selectedYear']) ? $_COOKIE['selectedYear'] : date('Y'));



// Select total amount for the selected month and year
$sql = "SELECT 
YEAR(payment_date) AS year,

SUM(amount) AS total_amount
FROM
payment
WHERE
YEAR(payment_date) = $selected_year 
GROUP BY
YEAR(payment_date)
";
$result = mysqli_query($conn, $sql);

// Display the total amount for the selected month
echo '<img src="pics/money-bag.png" alt="" class="icon-money-bag"><p>Total Amount gained per Year:</p>';
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo  " Gained: $" . $row['total_amount'] . "<br>";
}
} else {
echo "No data is found";
}

// Close the MySQL connection

?>
                <form action="clientPaymentAdminY.php" method="post">
                    <input type="hidden" name="year" value="<?php echo $selected_year; ?>">


                    <button type="submit" class="detail-button">View Details</button>
                </form>
            </div>

            <div class="box card5 col-md-4">
                <?php
// Connect to the MySQL database
require_once "connection.php";

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$selected_year = isset($_POST['year']) ? intval($_POST['year']) : (isset($_COOKIE['selectedYear']) ? $_COOKIE['selectedYear'] : date('Y'));



// Select total amount paid for trainers for the selected month and year
$sql = "SELECT 
YEAR(tpayment_date) AS year,

SUM(amount) AS total_amount
FROM
tpayment
WHERE
YEAR(tpayment_date) = $selected_year 
GROUP BY
YEAR(tpayment_date)
";
$result = mysqli_query($conn, $sql);

// Display the total amount paid for trainers for the selected month
echo '<img src="pics/pay.png" alt="" class="icon-pay"><p>Total Amount Paid for Trainers per Year:</p>';
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo  " Paid: $" . $row['total_amount'] . "<br>";
}
} else {
echo "No data is found";
}

?>
                <form action="trainerPaymentAdminY.php" method="post">
                    <input type="hidden" name="year" value="<?php echo $selected_year; ?>">
                    <button type="submit" class="detail-button">View Details</button>
                </form>
            </div>
            <div class="box card6 col-md-4">
                <?php
// Connect to the MySQL database
require_once "connection.php";
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$selected_year = isset($_POST['year']) ? intval($_POST['year']) : (isset($_COOKIE['selectedYear']) ? $_COOKIE['selectedYear'] : date('Y'));



$sql = "SELECT
    p.year,
    p.total_amount1,
    t.total_amount2
FROM (
    SELECT
        YEAR(payment_date) AS year,
        SUM(amount) AS total_amount1
    FROM
        payment
    WHERE
        YEAR(payment_date) = $selected_year 
    GROUP BY
        YEAR(payment_date)
) AS p
LEFT JOIN (
    SELECT
        YEAR(tpayment_date) AS year,
        SUM(amount) AS total_amount2
    FROM
        tpayment
    WHERE
        YEAR(tpayment_date) = $selected_year
    GROUP BY
        YEAR(tpayment_date)
) AS t ON p.year = t.year";

$result = mysqli_query($conn, $sql);

// Display the net payment for the selected year

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $net_payment = $row['total_amount1'] - $row['total_amount2'];
        echo '<div class="income-display">';
        echo '<div class="icon-income2"></div>';
        echo '<div> Net Payment for Year: ' . $row['year'] ."<br>". " $" . $net_payment . '</div>'; 
        echo '</div><br>';       
    }
} else {
    echo '<div class="income-display">';
    echo '<div class="icon-income2"></div>';
    echo '<div>Net Payment Per Year:</div>'; 
    echo '<div>No data is found</div>'; 
    echo '</div><br>'; 
}



// Close the MySQL connection
mysqli_close($conn);
?>
            </div>
        </div>

        <center>
            <form method="post" action="" class="styled-form" id="year-month-form">
                <label for="year">Year:</label>
                <select name="year" id="year">
                    <!-- Year options will be populated via JavaScript -->
                </select>
                <label for="month">Month:</label>
                <select name="month" id="month">
                    <!-- Month options will be populated via JavaScript -->
                </select>
                <input type="submit" value="Submit">
            </form>

        </center>


    </div>


    <script>
    function populateYearAndMonth() {
        const yearSelect = document.getElementById('year');
        const monthSelect = document.getElementById('month');
        const selectedYear = localStorage.getItem('selectedYear') || new Date().getFullYear();
        const selectedMonth = localStorage.getItem('selectedMonth') || new Date().getMonth() + 1;

        for (let i = new Date().getFullYear(); i >= 2020; i--) {
            const option = document.createElement('option');
            option.value = i;
            option.text = i;
            option.selected = i == selectedYear;
            yearSelect.add(option);
        }

        for (let i = 1; i <= 12; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.text = i;
            option.selected = i == selectedMonth;
            monthSelect.add(option);
        }
    }

    document.getElementById('year-month-form').addEventListener('submit', function(event) {
        const yearSelect = document.getElementById('year');
        const monthSelect = document.getElementById('month');
        const selectedYear = yearSelect.options[yearSelect.selectedIndex].value;
        const selectedMonth = monthSelect.options[monthSelect.selectedIndex].value;

        localStorage.setItem('selectedYear', selectedYear);
        localStorage.setItem('selectedMonth', selectedMonth);

        // Set cookies for the selected year and month
        document.cookie = "selectedYear=" + selectedYear + ";path=/";
        document.cookie = "selectedMonth=" + selectedMonth + ";path=/";
    });

    populateYearAndMonth();
    </script>







</body>

</html>