<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title> Contact Us </title>
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
      <li class="nav-item active">
        <a class="nav-link" href="contactus.php"> Contact Us </a>
      </li>
    </ul>
    
    <ul class="nav navbar-nav ml-auto">
      <?php
        // check if the user is loggedin or not
        if(isset($_SESSION['adminaadh'])) {
          echo '<li class="nav-item"><a class="nav-link" href="profile-admin.php"> Profile </a></li>';
          echo '<li class="nav-item">
        <a class="nav-link" href="alluserinfo.php"> All user info </a>
      </li>';
          echo '<li class="nav-item"><a class="nav-link" href="logout-admin.php"> Log Out </a></li>';
        } else {
          echo '<li class="nav-item"><a class="nav-link" href="register-admin.php"> Register </a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="login-admin.php"> Log In </a></li>';
        }
      ?>
    </ul>
  </div>
  </nav>


    <?php
  if(isset($_GET['error'])) {
    if($_GET['error'] == 'emptyinput') {
      echo '<p>Fill in all fields</p>';
    }
    else if ($_GET['error'] == 'stmtfailedsendmsg') {
      echo '<p>Failed to send msg, there was an error with system. Try again.</p>';
    }
    else if ($_GET['error'] == 'invalidemail') {
      echo '<p>Fill in correct email</p>';
    }
    else if ($_GET['error'] == 'none') {
      echo '<p>Message sent successfully! We will contact you shortly.</p>';
    }
  }
?>




<br>
<div class="container">

  <h1>Write to us</h1><br>
  <h5>We are always open for your suggestions and make our user experience as smooth as possible.</h5>
  <br>








<div class="card bg-light text-dark">
  <div class="card-header bg-dark text-light">
    Contact Us
  </div>

 <div class="card-body">
<form action="includes/contactus.inc.php" method="post">
  
  <div class="form-row">
    <div class="col">
      <input name="fname" type="text" class="form-control" placeholder="First name" required>
      <div class="invalid-feedback"> Please enter your name</div>
    </div>
    <div class="col">
      <input name="lname" type="text" class="form-control" placeholder="Last name" required>
      <div class="invalid-feedback"> Please enter your name</div>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
  </div>

  <div class="mb-3">
    <label for="validationTextarea">Message for us</label>
    <textarea name="message" class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    <div class="invalid-feedback">
      Please enter a message here
    </div>
  </div>
</div>
 <button name="submit" type="submit" class="btn btn-outline-primary">Submit</button>

</form>
</div>
</form>
</div>
<br>
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
