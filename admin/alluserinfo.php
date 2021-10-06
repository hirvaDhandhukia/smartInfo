<?php 

  if(!isset($_POST['submit-aadh'])) {
    header("location: index-admin.php");
    exit;
  }


  session_start();
  require_once "includes/config.php"; 
  require_once "../users/includes/functions.inc.php";

  $adminaadh = $_SESSION["adminaadh"];
  $useraadh = $_POST["useraadh"];

$bloodgroup = printUserBloodGroup($conn, $useraadh);
$allergies = printUserAllergies($conn, $useraadh);
$med_hist = printUserMedHistory($conn, $useraadh);
$age = printUserAge($conn, $useraadh);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title> All User Info</title>
  </head>
  <body>
    

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index-admin.php">Smart Info</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php"> About Us </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php"> Contact Us </a>
      </li>
    </ul>
    
    <ul class="nav navbar-nav ml-auto">
      <?php
        // check if the user is loggedin or not
        if(isset($_SESSION['adminaadh'])) {
          echo '<li class="nav-item"><a class="nav-link" href="profile-admin.php"> Profile </a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="logout-admin.php"> Log Out </a></li>';
        } else {
          echo '<li class="nav-item"><a class="nav-link" href="register-admin.php"> Register </a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="login-admin.php"> Log In </a></li>';
        }
      ?>
    </ul>
  </div>
  </nav>



<br>
<br>
<div class="container">
<!-- <form class="form-inline my-2 my-lg-0">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button name="submit" class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form> -->
<!-- <br>


<br> -->
<div class="card text-dark bg-light mb-3">
  <div class="card-header bg-dark text-light">
    User Info
  </div>
  <div class="card-body">

<dl class="row">
  <dt class="col-sm-3">Name</dt>
  <dd class="col-sm-9">
    <?php
      printUserName($conn, $useraadh);
    ?>
  </dd>

  <dt class="col-sm-3">DOB</dt>
  <dd class="col-sm-9">
    <span type="date">
    <?php
      printUserDOB($conn, $useraadh);
    ?>
  </span>
    
  </dd>

  <dt class="col-sm-3">Email</dt>
  <dd class="col-sm-9">
    <?php
      printUserEmail($conn, $useraadh);
    ?>
  </dd>

  <dt class="col-sm-3">Aadhar Number</dt>
  <dd class="col-sm-9">
    <?php
      printUserAadh($conn, $useraadh);
    ?>
  </dd>

    </dl>
  </dd>
</dl>
</div>
</div>


<br>
<div class="card text-dark bg-light mb-3">
  <div class="card-header bg-dark text-light">
    Medical Report
  </div>
  <div class="card-body">

<dl class="row">
  <dt class="col-sm-3">Age</dt>
  <dd name="age" class="col-sm-9">
    <?php
      echo $age;
    ?>
  </dd>

  <dt class="col-sm-3">Blood Group</dt>
  <dd name="bloodgroup" class="col-sm-9">
    <?php
      echo $bloodgroup;
    ?>
  </dd>

  <dt class="col-sm-3">Allergies/Genetic Disorder</dt>
  <dd name="allergies" class="col-sm-9">
    <?php
      echo $allergies;
    ?>

  </dd>

  <dt class="col-sm-3">Medical History</dt>
  <dd class="col-sm-9">
    <?php
      echo $med_hist;
    ?>
  </dd>

  

    </dl>
  </dd>
</dl>
</div>
</div>

<?php
  echo "<a class='btn btn-primary' href='editmedicalreport.php?useraadh=$useraadh&age=$age&bloodgroup=$bloodgroup&allergies=$allergies&med_hist=$med_hist' role='button'>Edit Medical Report</a>";
?>

<!-- <a class="btn btn-primary" href="editmedicalreport.php" role="button">Edit Medical Report</a> -->

</div>
  </div>
<br>



<!-- FOOTER -->
<footer>
  <div class="p-3 mb-2 bg-dark text-white">  
  <div class="text-monospace">
  <p class="text-center">Created by</p>

  <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="https://github.com/hirvaDhandhukia">Hirva</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://github.com/maitrakhatri">Maitra</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://github.com/siddharth1332">Siddharth</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://github.com/luciferwrath21">Swapnil</a>
  </li>
  </ul>
  </div>
  </div>
  </footer> 














    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
