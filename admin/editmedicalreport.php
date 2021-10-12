<?php
  session_start();

  require_once "includes/config.php"; 
  require_once "../users/includes/functions.inc.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

<br><br>
  <div class="container">
    <div class="card text-dark bg-light mb-3" style="max-width: 75rem">
    <div class="card-header text-light bg-dark">Fill your details</div>
    <div class="card-body">

      <div class="container">

<form action="" method="post">
  <div class="form-group">

<?php
if(isset($_GET['useraadh'])) {
  $useraadh = $_GET['useraadh'];
    // echo '<div class="form-group">
    //       <label>User Aadhar Number Authentication: </label>
    //       <input name="useraadh" class="form-control mr-sm-2" type="text" placeholder="Patient Aadhar Number" aria-label="Search" value="'.$useraadh.'" required>
    //     </div>';
}

if(isset($_GET['age'])) {
    $age = $_GET['age'];
    echo '<div class="form-group">
          <label for="exampleFormControlTextarea0">Age</label>
          <input name="age" type="text" class="form-control" id="exampleFormControlTextarea0" required value="'.$age.'">
        </div>';
}

if(isset($_GET['bloodgroup'])) {
    $bloodgroup = $_GET['bloodgroup'];
    echo '<div class="form-group">
          <label for="exampleFormControlTextarea1">Blood Group</label>
          <input name="bloodgroup" type="text" class="form-control" id="exampleFormControlTextarea1" required value="'.$bloodgroup.'">
        </div>';
}

if(isset($_GET['allergies'])) {
    $allergies = $_GET['allergies'];
    echo '<div class="form-group">
          <label for="exampleFormControlTextarea2">Allergies/Genetic Disorder</label>
          <input name="allergies" class="form-control" id="exampleFormControlTextarea2" required value="'.$allergies.'">
        </div>';
}

if(isset($_GET['med_hist'])) {
    $med_hist = $_GET['med_hist'];
    echo '<div class="form-group">
          <label for="exampleFormControlTextarea3">Medical History</label>
          <input name="med_hist" class="form-control" id="exampleFormControlTextarea3" required value="'.$med_hist.'">
        </div>';
}

  ?>
      <button class="btn btn-primary" type="submit" name="submit-medhist">Submit</button>
      </form>

  </div>
</div>
</div>
</div>
</div>



<?php
// if(isset($_POST['submit-medhist'])) {
//     // $useraadh = $GET['useraadh'];
//   $age = $_POST['age'];
//     $bloodgroup = $_POST['bloodgroup'];
//     $allergies = $_POST['allergies'];
//     $med_hist = $_POST['med_hist'];

//     $sql = "UPDATE med_history SET age='$age',
//                                   bloodgroup='$bloodgroup',
//                                   allergies='$allergies',
//                                   med_hist='$med_hist' 
//                               WHERE aadharno='$useraadh';";
//     $request = mysqli_query($conn, $sql);
//     if($request) {
//         header("location: index-admin.php?edit=success");
//         // echo "Record Updated!";
//     } else {
//         echo "Failed. Try again";
//     }

// }
?>

<?php
if(isset($_POST['submit-medhist'])) {
    // $useraadh = $GET['useraadh'];
  $age = $_POST['age'];
    $bloodgroup = $_POST['bloodgroup'];
    $allergies = $_POST['allergies'];
    $med_hist = $_POST['med_hist'];

    $sql = "INSERT INTO med_history (age, bloodgroup, allergies, med_hist) VALUES  ('$age',
                                     '$bloodgroup',
                                      '$allergies',
                                      '$med_hist') 
                              WHERE aadharno='$useraadh';";
    $request = mysqli_query($conn, $sql);
    if($request) {
        // header("location: index-admin.php?edit=success");
        echo "Record Updated!";
    } else {
        echo "Failed. Try again";
    }

}
?>


<br>


<!-- FOOTER -->

<?php
    if(isset($_SESSION["adminaadh"])) {

echo '<footer style="bottom: 0; position: ; width: 100%">
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
  </footer>';
  }

  else {

    echo '<footer style="bottom: 0; position: ; width: 100%">
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
    </footer>';


  }
  ?>






    

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
