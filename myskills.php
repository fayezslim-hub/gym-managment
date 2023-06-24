<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: signin.php");
    exit;
}

require_once "connection.php";

function get_submission_data($client_id, $conn)
{
    $sql = "SELECT COUNT(*) as submission_count, COUNT(DISTINCT sport_name) as unique_courses, GROUP_CONCAT(DISTINCT sport_name) as sports FROM class_request WHERE client_id = '$client_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $row['sports'] = explode(',', $row['sports']);
    return $row;
}

$submission_data = get_submission_data($_SESSION["client_id"], $conn);
$submission_count = $submission_data['submission_count'];
$unique_courses = $submission_data['unique_courses'];
$sports = $submission_data['sports'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "connection.php";
    require_once "validate.php";
    $courses = validate($_POST['courses']);
    $play = validate($_POST['play']);
    $years = validate($_POST['years']);
    $goal = validate($_POST['goal']);
    $dis = validate($_POST['dis']);
    $client_id = $_SESSION["client_id"];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($submission_count >= 2 || $unique_courses >= 2 || in_array($courses, $sports)) {
        echo "<script>alert('You cannot submit the form for the same sport twice or for more than two sports.');</script>";
    } else {
        $sql = "INSERT INTO class_request (sport_name, played, goal, disability, client_id, years, class_level) VALUES ('$courses','$play','$goal','$dis','$client_id','$years','0')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('The form is sent')</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }
    }

    mysqli_close($conn);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>My Skill</title>
    <link rel="stylesheet" href="user.css">

</head>
<style>
.container-form h1 {
    font-weight: bold;
    text-align: left;
    color: black;
    margin-top: 20px;
    margin-bottom: 20px;
    font-family: 'Aref Ruqaa Ink', serif;
    font-size: 1.5rem;
    line-height: 1.6rem;
    transform-origin: center;
    letter-spacing: 0.1rem;
}

label[for="courses"],
label[for="years"],
label[for="goal"] {
    display: block;
    font-size: 1.2rem;
    line-height: 1.6rem;
    letter-spacing: 0.1rem;
    font-family: 'Aref Ruqaa Ink', serif;
    font-weight: bold;
    color: black;
    margin-bottom: 10px;
}

label[for="question"] {
    font-size: 1.2rem;
    color: black;
    margin-bottom: 10px;
    line-height: 1.6rem;
    transform-origin: center;
    letter-spacing: 0.1rem;
    font-weight: bold;
    font-family: 'Aref Ruqaa Ink', serif;
}


/* Apply the animation to the "container-form h1" element when it is hovered */
.container-form h1:hover,
label:hover,
label:hover[for="courses"],
label:hover[for="years"],
label:hover[for="goal"],
label:hover[for="question"] {
    animation: pulse 1s ;
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
    <center>
        <h2 style="font-family: 'Bungee Spice', cursive;">Welcome
            <?php echo "{$_SESSION["name"]}"; ?>
        </h2>
    </center>

    <div class="container-form">
    <h1>Fill the form below to help you in choosing your level:</h1>
    <div class="my-form">
        <form id="my-form" action="myskills.php" method="POST">
            <div class="form-group">
                <label for="courses">Name of Sport you want to register:</label>
                <select name="courses" id="courses" class="form-control" required>
                    <option value="kickboxing">Kickboxing</option>
                    <option value="zumba">Zumba</option>
                </select>
            </div>

            <div class="form-group">
                <label for="question">Have you ever played this sport before?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="play" value="yes" id="option1" required>
                    <label class="form-check-label" for="option1">yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="play" value="no" id="option2" required>
                    <label class="form-check-label" for="option2">no</label>
                </div>
            </div>

            <div class="form-group">
                <label for="years">If yes, how many years have you been playing?</label>
                <input type="number" class="form-control" id="years" name="years">
            </div>

            <div class="form-group">
                <label for="goal">What is your primary goal for playing this sport?</label>
                <select name="goal" id="goal" class="form-control" required>
                    <option value="fitness">fitness</option>
                    <option value="competitive">competitive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="question">Do you have any injuries or health conditions that may affect your ability to
                    play this sport?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dis" value="yes" id="option3" required>
                    <label class="form-check-label" for="option3">yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dis" value="no" id="option4" required>
                    <label class="form-check-label" for="option4">no</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary submit-button" <?php if ($submission_count >= 2)
                    echo 'disabled'; ?>><i class="fas fa-paper-plane"></i>Submit</button>
            </div>
        </form>
    </div>
</div>

</body>

</html>