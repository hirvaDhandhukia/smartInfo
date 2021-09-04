<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title> Log In </title>
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

  <br><div class="container">
    <h1> Log In </h1>
  </div><br>
    


<?php
  if(isset($_GET['error'])) {
    if($_GET['error'] == 'emptyinput') {
      echo '<p>Fill in all fields</p>';
    }
    else if ($_GET['error'] == 'wronglogin') {
      echo '<p>Incorrect login information, try again!</p>';
    }
  }
?>







<!-- LOG IN FORM -->

<div class="container">
<div class="card text-dark bg-light mb-3" style="max-width: 75rem">
  <div class="card-header">Fill your details</div>
  <div class="card-body">

<div class="container">


<form action="includes/login.inc.php" method="post" class="needs-validation" novalidate>
  <div class="form-group">
    <label>Email Address/Aadhar Card</label>
    <input name="email" class="form-control" id="validationCustom01"  required>
    <div class="invalid-feedback"> Enter a valid Email Id or Aadhar Number</div>
    <small id="emailHelp" class="form-text text-muted">Enter your Registered Email address or Aadhar Number</small>
  </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
    <div class="invalid-feedback"> Please enter your password</div>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <button name="submit" class="btn btn-primary" type="submit">Log In</button>

  

</form>
</div>
</div>
</div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>






















































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
