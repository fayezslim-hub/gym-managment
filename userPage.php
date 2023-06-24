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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo+Play:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Sports Booking</title>
    <link rel="stylesheet" href="user.css">

</head>


<style>
.card-img-top {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    transition: transform 0.3s;
}

.card-img-top:hover {
    transform: scale(1.1);
}

.same-size-container {
    display: flex;
    flex-wrap: wrap;
    margin: -0.5rem;
}

.same-size-card {
    flex-wrap: wrap;
    display: flex;
    padding: 1rem;
}

.glow {
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
}

.glow:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.title1 {
    font-size: 32px;
    font-weight: bold;
    letter-spacing: 2px;
    line-height: 1.2;
    font-family: 'Cairo Play', sans-serif;
}
</style>

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

    <div class="section-1">
        <h1 id="welcome" class="animate__animated">Welcome
            <?php echo $_SESSION["name"]; ?> to our club !!
        </h1>
    </div>

    <div class="class-offers">
        <h1 class="title">Your Journey to Fitness Starts Here: Choose Your Class with Our Pro Trainer</h1>
        <div class="kickboxing-class">
            <h1 class="title1">Kickboxing Classes:</h1>

            <?php
require_once "connection.php";
?>
            <?php
$sql = "SELECT trainer.*, sport.*, class_request.*
FROM trainer
INNER JOIN sport ON trainer.trainer_id = sport.trainer_id
INNER JOIN class_request ON sport.level = class_request.class_level
WHERE trainer.approved = 1 AND sport.sport_name='kickboxing' AND sport.class_approve='1' AND sport.sport_name = class_request.sport_name AND sport.level = class_request.class_level AND sport.start_date > NOW() AND sport.start_date <= DATE_ADD(NOW(), INTERVAL 1 WEEK)
GROUP BY trainer.trainer_id";

$result = $conn->query($sql);
if ($result && mysqli_num_rows($result) > 0) {
?>
            <div class="same-size-container">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="same-size-card">
                    <div class="glow card p-3 mb-3">
                        <img src="<?php echo $row['image']; ?>" alt="" class="card-img-top"><br>
                        <div class="card-body">
                            <h3 class="card-title">Name:
                                <?php echo $row['trainer_name']; ?>
                            </h3>
                            <h3 class="card-title">Years Of Experience:
                                <?php echo $row['yoe']; ?>
                            </h3>
                            <?php
$class_dates_sql = "SELECT sport.class_date, sport.sport_id, sport.end_date
FROM sport
INNER JOIN class_request
ON sport.level = class_request.class_level
WHERE sport.sport_name='kickboxing' AND sport.class_approve='1'  AND sport.sport_name = class_request.sport_name  AND sport.start_date > NOW() AND sport.start_date <= DATE_ADD(NOW(), INTERVAL 1 WEEK)   AND class_request.client_id='$client_id' AND sport.trainer_id = " . $row['trainer_id'] . "
ORDER BY sport.class_time ASC";
$class_dates_result = $conn->query($class_dates_sql);
if ($class_dates_result && mysqli_num_rows($class_dates_result) > 0) {
?>
                            <?php 
// Assuming the $row and other variables are defined and connected to the database correctly
?>
<form class="booking-form" id="booking-form-<?php echo $row['trainer_id']; ?>" method="post"
      action="addSession.php">
    <input type="hidden" name="client_id" value="<?php echo $_SESSION["client_id"]; ?>">
    <input type="hidden" name="name" value="<?php echo $row['trainer_name']; ?>">
    <input type="hidden" name="sport_name" value="<?php echo $row['sport_name']; ?>">
    <input type="hidden" name="trainer_id" value="<?php echo $row['trainer_id']; ?>">
    <h4 class="card-title">Select class date(s):</h4>
    <select name="class_dates[]" id="class_dates-<?php echo $row['trainer_id']; ?>" multiple class="form-control">
        <?php while ($class_date_row = mysqli_fetch_assoc($class_dates_result)) : ?>
            <option value="<?php echo $class_date_row['class_date']; ?>"
                    data-sport-id="<?php echo $class_date_row['sport_id']; ?>">
                <?php echo $class_date_row['class_date']; ?></option>
        <?php endwhile; ?>
    </select>
    <input type="hidden" name="sport_ids[]"
           id="sport_ids-<?php echo $row['trainer_id']; ?>">
    <input type="hidden" name="start_dates[]"
           id="start_dates-<?php echo $row['trainer_id']; ?>">
    <button type="submit" name="submit" class="btn btn-primary mt-2">Book</button>
</form>

<script>
    document.querySelector('#booking-form-<?php echo $row['trainer_id']; ?>').addEventListener(
        'submit',
        function (e) {
            var selectedOptions = document.querySelectorAll(
                '#booking-form-<?php echo $row['trainer_id']; ?> .form-control option:checked'
            );
            var sportIds = Array.from(selectedOptions).map(function (option) {
                return option.getAttribute('data-sport-id');
            });
            document.querySelector('#sport_ids-<?php echo $row['trainer_id']; ?>').value =
                sportIds.join(',');
        });

    // Add this section for restriction
    var ua = window.navigator.userAgent;
    var isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(ua);
    if (!isMobile) {
        document.querySelector('#class_dates-<?php echo $row['trainer_id']; ?>').multiple = false;
    }
</script>

                            <?php
} else {
    echo "No classes available for this trainer";
    }
    ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php } else {
    echo "No trainers right now";
} ?>


            <div class="Gym-class">
                <h1 class="title1">Zumba classes:</h1>
                <div class="same-size-container">

                    <?php
$sql = "SELECT trainer.*, sport.*, class_request.*
FROM trainer
INNER JOIN sport ON trainer.trainer_id = sport.trainer_id
INNER JOIN class_request ON sport.level = class_request.class_level
WHERE trainer.approved = 1 AND sport.sport_name='zumba' AND sport.class_approve='1' AND sport.sport_name = class_request.sport_name AND sport.level = class_request.class_level AND sport.start_date > NOW() AND sport.start_date <= DATE_ADD(NOW(), INTERVAL 1 WEEK)
GROUP BY trainer.trainer_id";

$result = $conn->query($sql);
if ($result && mysqli_num_rows($result) > 0) {
?>
                    <div class="same-size-container">
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <div class="same-size-card">
                            <div class="glow card p-3 mb-3">
                                <img src="<?php echo $row['image']; ?>" alt="" class="card-img-top"><br>
                                <div class="card-body">
                                    <h3 class="card-title">Name:
                                        <?php echo $row['trainer_name']; ?>
                                    </h3>
                                    <h3 class="card-title">Years Of Experience:
                                        <?php echo $row['yoe']; ?>
                                    </h3>
                                    <?php
$class_dates_sql = "SELECT sport.class_date, sport.sport_id, sport.end_date
FROM sport
INNER JOIN class_request
ON sport.level = class_request.class_level
WHERE sport.sport_name='zumba' AND sport.class_approve='1'  AND sport.sport_name = class_request.sport_name  AND sport.start_date > NOW() AND sport.start_date <= DATE_ADD(NOW(), INTERVAL 1 WEEK)   AND class_request.client_id='$client_id' AND sport.trainer_id = " . $row['trainer_id'] . "
ORDER BY sport.class_time ASC";

$class_dates_result = $conn->query($class_dates_sql);
if ($class_dates_result && mysqli_num_rows($class_dates_result) > 0) {
?><?php 
// Assuming the $row and other variables are defined and connected to the database correctly
?>
<form class="booking-form" id="booking-form-<?php echo $row['trainer_id']; ?>-zumba" method="post"
      action="addSession.php">
    <input type="hidden" name="client_id" value="<?php echo $_SESSION["client_id"]; ?>">
    <input type="hidden" name="name" value="<?php echo $row['trainer_name']; ?>">
    <input type="hidden" name="sport_name" value="<?php echo $row['sport_name']; ?>">
    <input type="hidden" name="trainer_id" value="<?php echo $row['trainer_id']; ?>">
    <h4 class="card-title">Select class date(s):</h4>
    <select name="class_dates[]" id="class_dates-<?php echo $row['trainer_id']; ?>-zumba" multiple class="form-control">
        <?php while ($class_date_row = mysqli_fetch_assoc($class_dates_result)) : ?>
            <option value="<?php echo $class_date_row['class_date']; ?>"
                    data-sport-id="<?php echo $class_date_row['sport_id']; ?>">
                <?php echo $class_date_row['class_date']; ?></option>
        <?php endwhile; ?>
    </select>
    <input type="hidden" name="sport_ids[]"
           id="sport_ids-<?php echo $row['trainer_id']; ?>-zumba">
    <input type="hidden" name="start_dates[]"
           id="start_dates-<?php echo $row['trainer_id']; ?>">
    <button type="submit" name="submit" class="btn btn-primary mt-2">Book</button>
</form>

<script>
    document.querySelector('#booking-form-<?php echo $row['trainer_id']; ?>-zumba').addEventListener(
        'submit',
        function (e) {
            var selectedOptions = document.querySelectorAll(
                '#booking-form-<?php echo $row['trainer_id']; ?>-zumba .form-control option:checked'
            );
            var sportIds = Array.from(selectedOptions).map(function (option) {
                return option.getAttribute('data-sport-id');
            });
            document.querySelector('#sport_ids-<?php echo $row['trainer_id']; ?>-zumba').value =
                sportIds.join(',');
        });

    // Add this section for restriction
    var ua = window.navigator.userAgent;
    var isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(ua);
    if (!isMobile) {
        document.querySelector('#class_dates-<?php echo $row['trainer_id']; ?>-zumba').multiple = false;
    }
</script>

                                    <?php
} else {
    echo "No classes available for this trainer";
    }
    ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php } else {
    echo "No trainers right now";
} ?>
                </div>
            </div>
        </div>
    </div>



    <script>
    $(document).ready(function() {
        $(".booking-form").submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting the normal way

            let form = $(this);
            let url = form.attr('action');


            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize the form data
                dataType: 'json',
                success: function(response) {
                    let message = '';

                    if (response.errors) {
                        message += "Errors:\n";
                        response.errors.forEach(function(errorMessage) {
                            message += errorMessage + "\n";
                        });
                    }

                    if (response.success) {
                        message += "Success:\n";
                        response.success.forEach(function(successMessage) {
                            message += successMessage + "\n";
                        });
                    }

                    alert(message);
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                        let data = JSON.parse(xhr.responseText);
                        let message = '';

                        if (Array.isArray(data)) {
                            message += "Errors:\n";
                            data.forEach(function(errorMessage) {
                                message += errorMessage + "\n";
                            });
                        } else {
                            message = data; // Show a single error message
                        }

                        alert(message);
                    } else {
                        alert(
                            'An error occurred while processing the request. Please try again.'
                        );
                    }
                }
            });
        });
    });
    </script>

</body>


</html>