<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title> Register </title>
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
      <li class="nav-item">
        <a class="nav-link" href="profile-admin.php"> Profile </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alluserinfo.php"> All user info </a>
      </li>
    </ul>
    
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="register-admin.php"> Register </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login-admin.php"> Log In </a>
      </li>
    </ul>
  </div>
  </nav>



    <br>
    <div class="container">
      <h1> Register Youself </h1>
    </div><br>





<!-- REGISTRATION FORM -->

<div class="container">
<div class="card text-dark bg-light mb-3" style="max-width: 75rem">
  <div class="card-header">Fill your details</div>
  <div class="card-body">

<div class="container">

<!-- Password Validation -->
<form class="needs-validation" novalidate  oninput='up2.setCustomValidity(up2.value != up.value ? "Passwords do not match." : "")'>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" class="form-control" id="validationCustom01"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" id="validationCustom02"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="validationCustom03">Registration Number</label>
    <input type="" class="form-control" id="validationCustom03"  required>
    <div class="invalid-feedback"> Enter valid Registration Number</div>
    <div class="valid-feedback">
      Looks good!
    </div>
    <small class="form-text text-muted"> You're account will be created once we verify your Registration Number</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div class="invalid-feedback"> Enter a valid Email Id</div>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" required name="up" pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Must contain at least one number and lowercase letter, and at least 6 or more characters">
    <div class="invalid-feedback"> Must contain at least one number and lowercase letter, and at least 6 or more characters</div>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

<div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" required name="up2">
    <div class="invalid-feedback">Password does not match</div>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  

<button class="btn btn-primary" type="submit">Register</button>
</form>

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
</div>
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
