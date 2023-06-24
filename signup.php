<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tiger House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="howWeHire.php">How we hire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="join-container">
        <h2 class="signup-title">Join Our Gym Today</h2>
        <img src="pics/join.png" alt="" class="icon-join">
    </div>








    <div style="margin-bottom: 4rem; margin-top:4rem;" class="section-7">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="my-form">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <img src="pics/name.png" alt="" class="icon-name">
                                <label>Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <img src="pics/email.png" alt="" class="icon-email">
                                <label>Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <img src="pics/number.png" alt="" class="icon-number">
                                <label> Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone number" required>
                            </div>

                            <div class="mb-3">
                                <img src="pics/address.png" alt="" class="icon-address">
                                <label> Address </label>
                                <select class="form-select" id="address" name="address" required>
                                    <option value="" selected disabled>Select your governorate</option>
                                    <option value="Akkar Governorate (Halba)">Akkar Governorate (Halba)</option>
                                    <option value="Baalbek-Hermel Governorate (Baalbek)">Baalbek-Hermel Governorate
                                        (Baalbek)</option>
                                    <option value="Beirut Governorate (Beirut)">Beirut Governorate (Beirut)</option>
                                    <option value="Beqaa Governorate (Zahlé)">Beqaa Governorate (Zahlé)</option>
                                    <option value="Keserwan-Jbeil Governorate (Jounieh)">Keserwan-Jbeil Governorate
                                        (Jounieh)</option>
                                    <option value="Mount Lebanon Governorate (Baabda)">Mount Lebanon Governorate
                                        (Baabda)</option>
                                    <option value="Nabatieh Governorate (Nabatieh)">Nabatieh Governorate (Nabatieh)
                                    </option>
                                    <option value="North Governorate (Tripoli)">North Governorate (Tripoli)</option>
                                    <option value="South Governorate (Sidon)">South Governorate (Sidon)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <img src="pics/gender.png" alt="" class="icon-gender">
                                <label>Gender:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                        checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <img src="pics/tall.png" alt="" class="icon-tall">
                                <label> Height in
                                    centimeters:</label>
                                <input type="number" step="0.01" class="form-control" id="height" name="height"
                                    placeholder="Enter your height" oninput="updateImage()" required>
                            </div>
                            <div class="mb-3">
                                <img src="pics/lose-weight.png" alt="" class="icon-lose-weight">
                                <label> Weight in KG:</label>
                                <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                                    placeholder="Enter your weight" oninput="updateImage()" required>
                            </div>
                            <div class="mb-3">
                                <img src="pics/calc.png" alt="" class="icon-calc">
                                <label>BMI:</label>
                                <input type="number" step="0.01" class="form-control" id="bmi" name="bmi"
                                    placeholder="Your BMI will be calculated automatically" oninput="updateImage()"
                                    required readonly>

                            </div>
                            <div class="mb-3">
                                <img src="pics/calendar.png" alt="" class="icon-calendar">
                                <label>Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    placeholder="Enter your date of birth" required max="" onkeydown="return false">
                            </div>

                            <div class="mb-3">
                                <img src="pics/user.png" alt="" class="icon-user">
                                <label> Profile picture:</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                    required onchange="validateImageFile(this)">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                    Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img id="man" src="pics/man1-removebg-preview (1).png" alt="" class="img-fluid">
                </div>

            </div>
        </div>

        <script>
        document.getElementById("bmi").addEventListener("click", function() {
            this.blur();
        });

        document.getElementById("male").addEventListener("click", function() {
            updateImage();
        });

        document.getElementById("female").addEventListener("click", function() {
            updateImage();
        });

        function updateImage() {
            var height = (document.getElementById("height").value) / 100;
            var weight = document.getElementById("weight").value;
            var bmi = weight / (height * height);
            var z = document.getElementById("bmi");
            z.value = bmi.toFixed(2);

            var maleChecked = document.getElementById("male").checked;
            var femaleChecked = document.getElementById("female").checked;

            if (maleChecked) {
                if (bmi > 25) {
                    document.getElementById("man").src = "pics/man1.png";
                } else {
                    document.getElementById("man").src = "pics/man2.png";
                }
            } else if (femaleChecked) {
                if (bmi > 24) {
                    document.getElementById("man").src = "pics/woman1.png";
                } else {
                    document.getElementById("man").src = "pics/woman2.png";
                }
            }
        }
        </script>

        <script>
        const input = document.getElementById("phone");
        input.addEventListener("input", function() {
            const pattern = /^[0-9]{8}$/;
            if (!input.value.match(pattern)) {
                input.setCustomValidity("Please enter 8 digits");
            } else {
                input.setCustomValidity("");
            }
        });
        </script>
      <script>
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    // set the maxDate to end of this year
    var maxDate = yyyy + '-12-31';
    var minDate = '1960-01-01';

    document.getElementById("dob").setAttribute("max", maxDate);
    document.getElementById("dob").setAttribute("min", minDate);
</script>


        <?php
    if (isset($_POST['name'])) {
        require_once "connection.php";
        require_once "validate.php";
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $password = "";
        $phone = validate($_POST['phone']);
        $address = validate($_POST['address']);
        $dob = $_POST['dob'];
        $mysql_dob = date('Y-m-d', strtotime($dob));
        $target = "userimage/";
        $target_file = $target . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
        $gender = validate($_POST['gender']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $check = "SELECT email, phone FROM client WHERE email='$email' OR phone='$phone'
        UNION
        SELECT trainer_email, phone FROM trainer WHERE trainer_email='$email' ";


        $result = mysqli_query($conn, $check);
        $flag = 0;
        if (!$result) {
            die("Error in query: " . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('The Email address or phone number is already used')</script>";
        } else {
            $sql = "INSERT INTO client VALUES ('', '$name', '$email', '$password', '$phone', '$address', NOW(), '0', '$image_path', '$gender', '$mysql_dob')";
            if (mysqli_query($conn, $sql)) {
                $flag = 1;
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
            $select = "SELECT client_id FROM client WHERE email='$email'";
            $result = $conn->query($select);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $client_id = $row["client_id"];
                }
            } else {
                echo "No results found.";
            }
            $height =( validate($_POST['height']))/100;
            $weight = validate($_POST['weight']);
            $sql = "INSERT INTO bmi VALUES ('', '$client_id', '$height', '$weight', NOW())";
            if (mysqli_query($conn, $sql)) {
                $flag = 1;
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
        }

        if ($flag == 1) {
            echo "<script>alert('Your Registration Form Is Sent Successfully')</script>";
        }
        mysqli_close($conn);
    }

?>

    </div>
    <script>
    function validateImageFile(input) {
        const file = input.files[0];
        const allowedExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.bmp', '.tiff', '.svg'];
        const fileExtension = '.' + file.name.split('.').pop().toLowerCase();

        if (!allowedExtensions.includes(fileExtension)) {
            // Invalid file selected, clear the file input
            input.value = '';
            alert('Please select an image file.');
        }
    }
    </script>
</body>

</html>