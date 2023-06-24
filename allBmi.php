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
   <title>Check Your Progress</title>
   <link rel="stylesheet" href="user.css">
   <link rel="stylesheet" href="animation_user.css">


</head>
<style>
   /* CSS for New BMI form */
   .page-title2 {
      text-align: center;
      margin-top: 30px;
      font-size: 2rem;
      color: coral;
      line-height: 1.6rem;
      letter-spacing: 0.1rem;
      font-weight: bold;
      font-family: 'Bungee Spice', cursive;
   }

   .container-new-weight {
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
      margin-top: 20px;
      margin-bottom: 10px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
   }

   .custom-input-animation input {
      padding: 10px;
      display: block;
      border: none;
      border-bottom: 1px solid #ccc;
      width: 100%;
      margin-bottom: 30px;
   }

   .custom-input-animation input:focus {
      outline: none;
      border-bottom: 1px solid #5b9bd5;
   }

   .form-group {
      margin-bottom: 20px;
   }

   .form-control {
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      display: block;
      font-size: 16px;
      padding: 10px;
      width: 100%;
      background-color: #fff;
      transition: border-color 0.2s ease-in-out;
   }

   .form-control:focus {
      border: 1px solid #5b9bd5;
   }

   .btn-primary {
      position: absolute;
      right: 20px;
      top: 160px;
      background-color: coral;
      border: none;
      color: white;
      font-size: 1rem;
      padding-top: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 93%;
   }


   @media screen and (max-width: 768px) {
      .container-new-weight {
         max-width: 100%;
         padding: 10px;
      }

      .custom-input-animation input {
         margin-bottom: 20px;
      }

      .form-control {
         font-size: 14px;
      }

      .btn-primary {
         font-size: 1rem;
      }
   }


   #myTable {
      font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
      border-collapse: collapse;
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   #myTable td,
   #myTable th {
      border: solid 1px #C9C9C9;
      padding: 10px;
      font-size: 16px;
      text-align: center;
   }

   #myTable tr:nth-child(even) {
      background-color: #f2f2f2;
   }

   #myTable tr:hover {
      background-color: #FFFFFF;
      color: #000000;
   }

   #myTable th {
      border: solid 1px #BFBFBF;
      padding: 10px;
      color: #474646;
      background-color: #D4D4D4;
      text-align: center;
      font-size: 16px;
      position: sticky;
      top: 0;
      z-index: 1;
   }

   #myTable th:first-child {
      left: 0;
      z-index: 2;
   }

   #myTable td:first-child {
      text-align: left;
   }

   @media screen and (max-width: 600px) {
      #myTable {
         font-size: 14px;
      }

      #myTable td,
      #myTable th {
         padding: 5px;
      }
   }
</style>


<body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="userPage.php">Tiger House</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

   <div class="table-responsive">
      <table class="table table-striped table-bordered" id="myTable">
         <tbody>
            <?php
            require_once "connection.php";
            $sql = "SELECT * FROM bmi where client_id='$client_id'";
            $result = $conn->query($sql);
            if ($result && mysqli_num_rows($result) > 0) {
               // if there are rows, show the table header
               echo "<thead>
            <tr>
            <th>Height(cm)</th>
            <th>Weigh(kg)</th>
            <th>BMI</th>
            <th>Date</th>
            
            </tr>
          </thead>";
            } else {
               echo '<p class="no-bmi">There is no recorded BMI at the moment</p>';
            } ?>

         <tbody>
            <?php
            foreach ($result as $row): ?>
               <tr>

                  <td>
                     <?php echo $row['height'] * 100; ?>
                  </td>
                  <td>
                     <?php echo $row['weight']; ?>
                  </td>
                  <td>
                     <?php echo number_format($row['weight'] / ($row['height'] * $row['height']), 2); ?>
                  </td>
                  <td>
                     <?php echo $row['date']; ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>



   <?php
   $sql = "SELECT * FROM bmi WHERE client_id='$client_id' ORDER BY date DESC LIMIT 1";
   $result = $conn->query($sql);
   ?>

   <h1 class="page-title2">New BMI:</h1>
   <div class="card container-new-weight">
      <form id="bmi-form" method="post" action="addBmi.php">
         <div class="form-group custom-input-animation">
            <input type="decimal" class="form-control custom-input" id="height" name="height"
               placeholder="Please enter your height in (cm)" required>

            <input type="number" class="form-control custom-input" id="weight" name="weight"
               placeholder="Please enter your weight in (kg)" required>

         </div>

         <br><button type="submit" class="btn btn-primary">Add</button>
      </form>
   </div>


</body>

</html>