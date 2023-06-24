<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz@8..144&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Gym</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index-animation.css">
</head>
<style>
    @media (max-width: 768px) {
  /* Disable animation classes from animate.css */
  .animated {
    animation-duration: 0s !important;
    animation-delay: 0s !important;
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
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="section-1 container">

        <div class="row">
            <div class="col-lg-6">
                <div class="titles">
                    <h1 class="t1">Tiger House</h1>
                    <h2 class="t2">The Best Kickboxing Gym You Can Find!</h2>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <img id="bu" src="pics/obesity.png" alt="" class="img-fluid">
                <h2 id="ht">if you want to change your life style to a better way click on the button</h2>
                <button id="clicked" type="button" class="btn btn-outline-dark">See The Result!!</button>
            </div>
        </div>



    </div>
    <div class="section-2">
        <div class="container">
            <h2 class="offer">
                What We Offer
            </h2>
            <div class="row">
                <div class="col-sm-4 weDo">
                    <img src="pics/program.png" alt=""
                        style="background-color: aliceblue; border-radius:20%; width: 40%;">
                    <h3 class="ic">Building your own program </h3>
                </div>
                <div class="col-sm-4 weDo">
                    <img src="pics/healthcare.png" alt=""
                        style="background-color: aliceblue; border-radius: 20%; width: 40%;">
                    <h3 class="ic">Health care </h3>
                </div>
                <div class="col-sm-4 weDo">
                    <img src="pics/barbell.png" alt=""
                        style="background-color: aliceblue; border-radius: 20%; width: 40%;">
                    <h3 class="ic">Best equipments </h3>
                </div>
            </div>
        </div>
    </div>


    <div class="section-3">
        <div class="container">
            <h1>Who We Are?</h1>
            <div class="gr">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>As a professional kickboxing
                            trainer, we believe in individualized training for each client. We assess their capabilities
                            and work closely with them to understand their goals and aspirations in kickboxing. From
                            there, we create a tailored training plan that incorporates their strengths and helps to
                            improve their weaknesses. With a combination of expert techniques and personalized
                            strategies, we strive to provide each client with the best possible training experience,
                            empowering them to achieve their full potential in kickboxing.
                        </h3>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid" style="padding-left: 1rem;padding-top: 1rem; border-radius: 15%;"
                            src="pics/gettyimages4.jpg" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div style="z-index: 0;" class="section-4">
        <div style="z-index: 0;" id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="images" src="pics/istockphoto1.jpg" class="d-block w-100" alt="...">
                    <h2 class="gr">"Martial arts is ultimately a path to finding one's own inner peace." - Jet Li</h2>
                </div>
                <div class="carousel-item">
                    <img class="images" src="pics/istockphoto2.jpg" class="d-block w-100" alt="...">
                    <h2 class="gr">"Martial arts is not just about physical ability, it's about mental toughness and the
                        will to never give up." - Jackie Chan</h2>
                </div>
                <div class="carousel-item">
                    <img class="images" src="pics/gettyimages.jpg" class="d-block w-100" alt="...">
                    <h2 class="gr">"Martial arts is not just a sport, it's a way of life that teaches discipline,
                        respect, and humility." - Chuck Norris</h2>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




    <div class="bmi">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title-box text-center">
                        <h2 class="custom-swing">
                            <img src="pics/bmi.png" alt="" class="icon-bmi">
                            BMI Calculator
                        </h2>
                    </div>


                    <div class="my-form">
                        <form action="">
                            <div class="form-group">
                                <label class="custom-swing-label" for="height">
                                    <img src="pics/height.png" alt="" class="icon-height">
                                    <span class="label-text-height">Height (centimeters)</span>
                                </label>
                                <input type="number" step="0.01" class="form-control" id="height" name="height"
                                    placeholder="Enter your height" oninput="updateImage()" required>
                            </div>

                            <div class="form-group">
                                <label class="custom-swing-label" for="weight">
                                    <img src="pics/weight-loss.png" alt="" class="icon-weight-loss">
                                    <span class="label-text-weight"> Weight (kg)</span>
                                </label>
                                <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                                    placeholder="Enter your weight" oninput="updateImage()" required>
                            </div>

                            <div class="form-group gender-group">
                                <label class="custom-swing-label">
                                    <img src="pics/equality.png" alt="" class="icon-equality">
                                    <span class="label-text-gender"> Gender</span>
                                </label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="male"
                                        checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="female" name="gender"
                                        value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="custom-swing-label" for="bmi">
                                    <img src="pics/bmi-result.png" alt="" class="icon-bmi-result">
                                    <span class="label-text-bmi"> BMI</span>
                                </label>
                                <input type="number" step="0.01" class="form-control" id="bmi" name="bmi"
                                    placeholder="Your BMI will be calculated automatically" oninput="updateImage()"
                                    required readonly>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <img class="img-fluid" id="man" src="pics/man1-removebg-preview (1).png" alt="">
                </div>
            </div>
        </div>
    </div>


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
                        <h5 class="contact-info mb-4">gymmanagment1@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script>
    document.getElementById("clicked").addEventListener("click", function() {

        document.getElementById("bu").src = "pics/shredded.png";
        document.getElementById("ht").textContent = "Hooreeeyyy I Kneww You Cann Doo Itt!!";
        document.getElementById("clicked").style.display = "none";

    });
    </script>
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


</body>

</html>