<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="howWeHire-animation.css">


    <title>How We Hire</title>
</head>

<style>
/* adjust font sizes and spacing for smaller screens */
@media (max-width: 768px) {
    .navbar-brand {
        font-size: 1.5rem;
        margin-right: 0 !important;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: center;
        margin-top: 1rem;
    }

    .nav-item {
        margin-right: 0 !important;
        margin-bottom: 0.5rem;
    }

    .my-heading {
        font-size: 2rem;
    }

    .l {
        margin-bottom: 2rem;
    }

    .m {
        margin-bottom: 1rem;
    }

    .submit-button {
        margin-top: 1rem;
    }
}
</style>



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
                        <a class="nav-link" href="signup.php">sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>


    <div class="hire">
        <div class="container">
            <div class="header-container">
                <img src="pics/announcement.png" alt="" class="icon-announcement">
                <h1 class="my-heading">How We Hire</h1>
            </div>
            <div class="l">
                <ol>
                    <li class="m">
                        <h2 class="rules">At least 4 years of experience as a personal trainer</h2>
                    </li>
                    <li class="m">
                        <h2 class="rules">Strong communication skills to effectively work with clients</h2>
                    </li>
                    <li class="m">
                        <h2 class="rules">Positive and friendly demeanor, always with a smile</h2>
                    </li>
                    <li class="m">
                        <h2 class="rules">Extensive knowledge of kickboxing techniques and strikes</h2>
                    </li>
                    <li class="m">
                        <h2 class="rules">Ability to design and deliver effective training programs for clients with
                            different goals
                            and abilities</h2>
                    </li>
                </ol>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="#" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm() && validateFileType()">
                            <div class="form-group">
                                <label for="name" class="bounce">Full Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/id-card.png" alt="" class="icon-id-card">
                                    </div>
                                    <input type="text" class="form-control" id="name" name="fname"
                                        placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="bounce">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/gmail.png" alt="" class="icon-gmail">
                                    </div>
                                    <input type="email " class="form-control" id="trainer_email" name="trainer_email"
                                        placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="bounce">Phone Number:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/phone.png" alt="" class="icon-phone">
                                    </div>
                                    <input type="number" class="form-control" id="phone" name="phone" pattern="[0-9]{8}"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob" class="bounce">Date of Birth:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/birthday.png" alt="" class="icon-birthday">
                                    </div>
                                    <input type="date" class="form-control" id="dob" name="trainer_dob"
                                        placeholder="YYYY-MM-DD" required max="" min="" onkeydown="return false">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="Specialization" class="bounce">Specialization:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/suitcase.png" alt="" class="icon-suitcase">
                                    </div>

                                    <select class="form-control" id="Specialization" name="Specialization" required>
                                        <option value="">Select Specialization</option>
                                        <option value="Zumba">Zumba</option>
                                        <option value="Kickboxing">Kickboxing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ex" class="bounce">Years of Experience:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/experience.png" alt="" class="icon-experience">
                                    </div>
                                    <input type="number" class="form-control" id="ex" name="ex"
                                        placeholder="Years of Experience" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="bounce">Profile Picture:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/avatar.png" alt="" class="icon-avatar">
                                    </div>
                                    <input type="file" class="form-control image-valid" id="image" name="image" required
                                        accept="image/png, image/jpeg" onchange="validateImage()">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="cover-letter-container">
                                    <img src="pics/letter.png" alt="" class="icon-letter">
                                    <label for="weight" class="bounce">Cover Letter:</label>
                                </div>
                                <textarea name="cover" class="form-control" id="weight" rows="5"
                                    placeholder="Cover Letter" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="resume" class="bounce">Resume:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <img src="pics/cv.png" alt="" class="icon-cv">
                                    </div>
                                    <input type="file" class="form-control custom-file-input" id="resume" name="resume"
                                        accept=".pdf" required onchange="validatePDF()">
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary submit-button"><i
                                        class="fas fa-paper-plane "></i>Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function validateFileType() {
        const resumeInput = document.getElementById("resume");
        const file = resumeInput.files[0];
        const fileType = file.type;

        if (fileType !== "application/pdf") {
            alert("Please upload a PDF file.");
            resumeInput.value = "";
            return false;
        }
        return true;
    }
    </script>
    <script>
    function generatePassword(length) {
        // Define all possible characters that can be used in the password
        const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_";

        let password = "";
        for (let i = 0; i < length; i++) {
            // Pick a random character from the chars string
            const randomIndex = Math.floor(Math.random() * chars.length);
            const randomChar = chars.charAt(randomIndex);

            // Add the random character to the password
            password += randomChar;
        }

        return password;
    }

    document.addEventListener("DOMContentLoaded", () => {
        const passwordInput = document.getElementById("password");
        const password = generatePassword(10); // Generate a password with 10 characters
        passwordInput.value =
            password; // Set the value of the hidden input element to the generated password
    });
    </script>


    </center>



    <div class="section-6 bg-black py-5">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <img src="pics/contact-us.png" alt="" class="icon-contact-us">
                <h4 class="contact-heading text-center ml-3" style="color: white; text-transform: uppercase;">Feel free
                    to
                    contact us!</h4>
            </div>
            <div class="row">
                <div class="col-sm-6 text-center">
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="pics/phone-call.png" alt="" class="icon-phone-call">
                        <h5 class="contact-info ml-2">+961/70545492</h5>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="pics/phone-call.png" alt="" class="icon-phone-call">
                        <h5 class="contact-info ml-2">+961/70820049</h5>
                    </div>
                </div>

                <div class="col-sm-6 text-center">
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="pics/mail.png" alt="" class="icon-mail">
                        <h5 class="contact-info mb-4">GYMMANAGMENT1@GMAIL.COM</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(1).padStart(2, '0'); //! Set the month to 1
  var yyyy = today.getFullYear();

  var maxDate = (yyyy - 18) + '-12-' + dd; //! Last day of December, 18 years before current date
  var minDate = '1970-01-01'; //! Start year is 1970

  document.getElementById("dob").setAttribute("max", maxDate);
  document.getElementById("dob").setAttribute("min", minDate);
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

    <?php

if (isset($_POST['fname'])) {
    require_once "connection.php";
    require_once "validate.php";
    $name = validate($_POST['fname']);
    $email = validate($_POST['trainer_email']);
    $phone = validate($_POST['phone']);
    $specialization = validate($_POST['Specialization']);
    $yoe = validate($_POST['ex']);
    $coverletter = validate($_POST['cover']);
    $password = "";

    $target = "trainerpic/";
    $target_file = $target . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $image_path = $target_file;

    $target1 = "resume/";
    $target_file1 = $target1 . basename($_FILES["resume"]["name"]);
    move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file1);
    $image_path1 = $target_file1;

    $dob = $_POST['trainer_dob'];
    $mysql_dob = date('Y-m-d', strtotime($dob));

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $escaped_name = mysqli_real_escape_string($conn, $name);
    $escaped_email = mysqli_real_escape_string($conn, $email);
    $escaped_specialization = mysqli_real_escape_string($conn, $specialization);
    $escaped_coverletter = mysqli_real_escape_string($conn, $coverletter);
    $escaped_image_path1 = mysqli_real_escape_string($conn, $image_path1);
    $escaped_image_path = mysqli_real_escape_string($conn, $image_path);

    $select = " SELECT trainer_email, phone FROM trainer WHERE trainer_email='$escaped_email' OR phone='$phone'
    UNION
    SELECT email, phone FROM client WHERE email='$escaped_email' ";
    $result = $conn->query($select);
    $flag = 0;

    if ($result->num_rows > 0) {
        echo "<script>alert('The Email address or phone is already in use')</script>";
        exit;
    }

    $sql = "INSERT INTO trainer VALUES (' ','$escaped_name', '$escaped_email',  '$password','$escaped_specialization', '0','$yoe',  '$escaped_coverletter','$escaped_image_path1','$escaped_image_path','$phone', NOW(),'$mysql_dob')";

    if (mysqli_query($conn, $sql)) {
        $flag = 1;
        echo "<script>alert('Your Registration Form Is Sent Successfully')</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }

    mysqli_close($conn);
}

?>

<script>
    function validatePDF() {
        const fileInput = document.getElementById('resume');
        const file = fileInput.files[0];
        const fileExtension = '.' + file.name.split('.').pop().toLowerCase();

        // Only allow PDF extension
        const allowedExtensions = ['.pdf'];

        if (!allowedExtensions.includes(fileExtension)) {
            // Invalid file selected, clear the file input
            fileInput.value = '';
            alert('Please select a PDF file.');
        }
    }
</script>
    <script>
    function validateImage() {
        const fileInput = document.getElementById('image');
        const file = fileInput.files[0];
        const fileExtension = '.' + file.name.split('.').pop().toLowerCase();

        // List of allowed extensions
        const allowedExtensions = ['.jpg', '.jpeg', '.png'];

        if (!allowedExtensions.includes(fileExtension)) {
            // Invalid file selected, clear the file input
            fileInput.value = '';
            alert('Please select an image file.');
        }
    }
    </script>
</body>

</html>