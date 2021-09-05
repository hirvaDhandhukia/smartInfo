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

    <title> Doctor Homepage </title>
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
        // check if admin is logged in or not
        if(isset($_SESSION['adminaadh'])) {
          echo '<li class="nav-item">
        <a class="nav-link" href="profile-admin.php"> Profile </a>
      </li>';
          echo '<li class="nav-item">
        <a class="nav-link" href="alluserinfo.php"> All user info </a>
      </li>';
          echo '<li class="nav-item"><a class="nav-link" href="logout-admin.php"> Log Out </a></li>';
        } else {
          echo '<li class="nav-item">
        <a class="nav-link" href="register-admin.php"> Register </a>
      </li>';
          echo '<li class="nav-item">
        <a class="nav-link" href="login-admin.php"> Log In </a>
      </li>';
        }
      ?>
    </ul>
  </div>
  </nav>









<!-- Photo with Card -->

<br><br>
<div class="container">
<div class="card">
      <h1 class="card-header bg-light text-dark"> Smart Info Admin</h1>
      <div class="card-body">
        <?php
        if(isset($_SESSION['adminaadh'])) {
          echo '<p>Welcome, you are signed in with aadhar number: ' . $_SESSION["adminaadh"] . '</p>';
        } else {
          echo '<p>Please login or register to start your account</p>';
        }
      ?>
        <p class="card-text">Our Smart Info is a powerful tool for all doctors who use it. With your fingertips, you can access all of the patients medical history. The database will also store their retina and fingerprint information for extra security. Our unique technology combines the accuracy and security of fingerprint scanning with a patients existing identity documents such as an Aadhar Card to create an unparalleled way to store and share patient information. The result is an automated, paperless system that frees up doctors to spend more time with each patient – hearing their stories, learning about their lives, and connecting on a personal level.</p>
        <p class="card-text"><small class="text-muted"></small></p>
      </div>
      <img src="https://scopeblog.stanford.edu/wp-content/uploads/2020/05/shutterstock_1155379972-1152x578.jpg" alt="">
    </div>
    </div>
  </div>
</div>
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
