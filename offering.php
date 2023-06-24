<?php
session_start();
if (!isset($_SESSION["trainer_email"])) {
    header("Location: signin.php");
    exit;
}
$email = $_SESSION["trainer_email"];
require_once "connection.php";
require_once "validate.php";
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
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Offering Available</title>
    <link rel="stylesheet" href="user.css">
</head>
<style>
body {
    background-color: #f8f9fa;
}

.form-container {
    background-color: white;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    margin-top: -80px;
    /* add a negative margin-top value to move the container up */
}

.form-title {
    font-weight: bold;
    margin-top: 40px;
    color: black;
    font-size: 1.8rem;
    line-height: 1.6rem;
    letter-spacing: 0.1rem;
    font-family: 'Bungee Spice', cursive;
    display: inline-block;


}

/* Apply the animation to the form title on hover */
.form-title:hover {
    animation-name: pulse;
    animation-duration: 1s;
}

.btn-submit {
    width: 25%;
}

.btn-primary {
    background-color: coral;
    border-color: coral;
}

/* Keep the same color on hover */
.btn-primary:hover,
.btn-primary:focus {
    background-color: coral;
    border-color: coral;
}

/* Keep the same color when button is active */
.btn-primary:active {
    background-color: coral;
    border-color: coral;
}

/* Keep the same color when button is disabled */
.btn-primary:disabled {
    background-color: coral;
    border-color: coral;
}

/* Optional: Add a slight opacity change for the hover effect */
.btn-primary:hover,
.btn-primary:focus {
    opacity: 0.9;

}

.form-select:focus {
    border-color: coral;
    box-shadow: 0 0 0 0.2rem rgba(255, 127, 80, 0.25);
}
</style>

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
                        <a style="padding: 2rem ;" class="nav-link" href="scheduleTrainer.php">My Schedule</a>
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



    </div>
    </nav>

    </head>

    <body>
        <center>
            <h2 class="form-title text-center">Please Choose Your Session</h2>
        </center>


        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-container">
                        <form id="offerForm" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="courses">Course:</label>
                                <select name="courses" id="courses" class="form-select" required>
                                    <option value="kickboxing">Kickboxing</option>
                                    <option value="zumba">Zumba</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="courselevel">Course Level:</label>
                                <select name="courselevel" id="courselevel" class="form-select" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="days">Class Day:</label>
                                <select name="days" id="days" class="form-select" required>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="hours">Class hours:</label>
                                <select class="form-select" name="hours" id="hours" required>
                                    <option value="8:00:00">8:00-9:30 AM</option>
                                    <option value="9:30:00">9:30-11:00 AM</option>
                                    <option value="17:00:00">5:00-6:30 PM</option>
                                    <option value="18:30:00">6:30-8:00 PM</option>
                                    <option value="20:00:00">8:00-9:30 PM</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="start_date">Start Date:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                                <span class="text-danger" id="start_date_error" style="display:none;">Please select a
                                    start date.</span>
                            </div>



                            <div class="form-group">
                                <button type="button" class="btn btn-primary submit-button" onclick="handleSubmit()"><i
                                        class="fas fa-paper-plane"></i> Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
        async function handleSubmit() {
            const form = document.getElementById("offerForm");
            const formData = new FormData(form);

            const startDate = formData.get("start_date");

            const startDateError = document.getElementById("start_date_error");

            if (!startDate) {
                startDateError.style.display = "inline";
                startDateError.innerText = "Select a date";
                return;
            } else {
                startDateError.style.display = "none";
            }

            try {
                const response = await fetch("offer.php", {
                    method: "POST",
                    body: formData,
                });

                if (response.ok) {
                    const result = await response.json();

                    if (result.status === "success") {
                        alert("You have successfully registered.");
                    } else if (result.status === "conflict") {
                        alert("There is a time conflict.");
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                } else {
                    alert("An error occurred. Please try again.");
                }
            } catch (error) {
                alert("An error occurred. Please try again.");
            }
        }
        </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentDate = new Date();
        var year = currentDate.getFullYear();

        // add one day to current date
        currentDate.setDate(currentDate.getDate() + 1);
        var minDate = currentDate.toISOString().split("T")[0];

        // set last day of the current year
        var maxDate = year + '-12-31';

        document.getElementById("start_date").setAttribute("min", minDate);
        document.getElementById("start_date").setAttribute("max", maxDate);

        document.getElementById("start_date").addEventListener("change", function() {
            var selectedDate = new Date(this.value);
            if (selectedDate.getFullYear() !== year) {
                document.getElementById("start_date_error").style.display = "block";
                this.value = '';
            } else {
                document.getElementById("start_date_error").style.display = "none";
            }
        });
    });
</script>

    </body>

</html>