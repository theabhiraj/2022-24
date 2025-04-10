<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  
  

  <title>Welcome - <?php $_SESSION['$username'] ?> </title>
</head>

<body>
  <?php require 'partials/_nav.php' ?>
  <header class="hero text-center py-5">
    <div class="container">
      <h1 class="display-4">Welcome to BGMI Tourney!</h1>
      <p class="lead">Your gateway to epic battles and great prizes</p>
    </div>
  </header>

  <main>
    <section id="tournaments" class="py-4">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <div class="card mb-4">
              <img src="img/tdm-2.jpg" class="card-img-top" alt="Tournament 1">
              <div class="card-body">
                <h5 class="card-title">Tournament 1 : Price ₹50</h5>
                <p class="card-text">Date: 2023-11-22 Time: 12:00 PM</p>
                <a href="tournament/t1.php" class="btn btn-primary">Register Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-4">
              <img src="img/tdm-2.jpg" class="card-img-top" alt="Tournament 1">
              <div class="card-body">
                <h5 class="card-title">Tournament 2 : Price ₹50</h5>
                <p class="card-text">Date: 2023-11-22 Time: 12:00 PM</p>
                <a href="tournament/t1.php" class="btn btn-primary">Register Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-4">
              <img src="img/tdm-2.jpg" class="card-img-top" alt="Tournament 1">
              <div class="card-body">
                <h5 class="card-title">Tournament 3 : Price ₹50</h5>
                <p class="card-text">Date: 2023-11-22 Time: 12:00 PM</p>
                <a href="tournament/t1.php" class="btn btn-primary">Register Now</a>
              </div>
            </div>
          </div>

          <!-- Repeat the same structure for other tournaments -->

        </div>
      </div>
    </section>
  </main>

  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2023 PUBG Tournament Website</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
