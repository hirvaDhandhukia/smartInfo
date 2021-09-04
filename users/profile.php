<?php
  session_start();
  require_once "includes/config.php";
  $useraadh = $_SESSION['useraadh'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title> Profile </title>
  </head>
  <body>

    <!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Smart Info</a>
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
        if(isset($_SESSION['useraadh'])) {
          echo '<li class="nav-item"><a class="nav-link" href="profile.php"> Profile </a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="logout.php"> Log Out </a></li>';
        } else {
          echo '<li class="nav-item"><a class="nav-link" href="register.php"> Register </a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="login.php"> Log In </a></li>';
        }
      ?>
    </ul>
  </div>
  </nav>


    


<div class="container">
  <h2>Profile</h2>
<br>
<div class="card text-dark bg-light mb-3">
  <div class="card-header bg-dark text-light">
    User Info
  </div>
  <div class="card-body">

<dl class="row">
  <dt class="col-sm-3">Name</dt>
  <dd class="col-sm-9">
    <?php
      $sqlfname = "SELECT * FROM users WHERE aadharno='$useraadh';";
      $resultfname = mysqli_query($conn, $sqlfname);
      if(mysqli_num_rows($resultfname)>0) {
          $rowfname = mysqli_fetch_assoc($resultfname);
          echo $rowfname['fname'] . ' ' . $rowfname['lname'];
      } else {
          echo "Row not found";
      }
    ?>
    </dd>

  <dt class="col-sm-3">DOB</dt>
  <dd class="col-sm-9">
    <span type="date">
      <?php
      $sqldob = "SELECT * FROM users WHERE aadharno='$useraadh';";
      $resultdob = mysqli_query($conn, $sqldob);
      if(mysqli_num_rows($resultdob)>0) {
          $rowdob = mysqli_fetch_assoc($resultdob);
          echo $rowdob['dob'];
      } else {
          echo "Row not found";
      }
    ?>
    </span>
    
  </dd>

  <dt class="col-sm-3">Email</dt>
  <dd class="col-sm-9">
    <?php
      $sqlemail = "SELECT * FROM users WHERE aadharno='$useraadh';";
      $resultemail = mysqli_query($conn, $sqlemail);
      if(mysqli_num_rows($resultemail)>0) {
          $rowemail = mysqli_fetch_assoc($resultemail);
          echo $rowemail['email'];
      } else {
          echo "Row not found";
      }
    ?>
  </dd>

  <dt class="col-sm-3">Aadhar Number</dt>
  <dd class="col-sm-9"><?php echo $_SESSION["useraadh"]; ?></dd>

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
  <dt class="col-sm-3">Blood Group</dt>
  <dd class="col-sm-9">O+</dd>

  <dt class="col-sm-3">Allergies/Genetic Disorder</dt>
  <dd class="col-sm-9">
    <p>Penut Butter</p>
    <p>Dust</p>
    <p>Thelesemia Minor</p>

  </dd>

  <dt class="col-sm-3">Medical History</dt>
  <dd class="col-sm-9">Lactose Intolerant</dd>

  

    </dl>
  </dd>
</dl>
</div>
</div>
</div>

    


















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
