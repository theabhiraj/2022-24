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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

  <title>Welcome - <?php $_SESSION['$username'] ?> </title>
  <link rel="stylesheet" href="style.css">
  <!-- <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script> -->
</head>

<body>
  <?php require 'partials/_nav.php' ?>
  <header class="hero">
    <div class="container">
      <h1>Welcome to BGMI Tourney !</h1>
      <p>Your gateway to epic battles and great prizes</p>
    </div>
  </header>

  <main>
    <section id="tournaments">
      <div class="container">
        <div class="swiper-container-wrapper">
          <div class="swiper-container" style="max-width: 100%; margin: 0 auto;">

            <div class="swiper-wrapper">
              <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                <!-- Adjusted maximum width for smaller card -->
                <div class="x-text">
                  <img src="img/tdm-2.jpg" alt="Tournament 1" style="max-width: 100%; height: auto;">
                  <p></p>
                  <h3 style="font-size: 16px;">Tournament 1 : Price ₹50</h3>
                  <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                  <a href="tournament/t1.php" class="register-link">Register Now</a>
                </div>
              </div>
              <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                <!-- Adjusted maximum width for smaller card -->
                <div class="x-text">
                  <img src="img/tdm-2.jpg" alt="Tournament 2">
                  <!-- Use the same image for Tournament 2 -->
                  <p></p>
                  <h3 style="font-size: 16px;">Tournament 2 : Price ₹100</h3>
                  <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                  <a href="tournament/t2.php" class="register-link">Register Now</a>
                </div>
              </div>
              <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                <!-- Adjusted maximum width for smaller card -->
                <div class="x-text">
                  <img src="img/tdm-2.jpg" alt="Tournament 3">
                  <!-- Use the same image for Tournament 3 -->
                  <p></p>
                  <h3 style="font-size: 16px;">Tournament 3 : Price ₹500 </h3>
                  <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                  <a href="tournament/t3.php" class="register-link">Register Now</a>
                </div>
              </div>
              <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                <!-- Adjusted maximum width for smaller card -->
                <div class="x-text">
                  <img src="img/tdm-2.jpg" alt="Tournament 4">
                  <!-- Use the same image for Tournament 4 -->
                  <p></p>
                  <h3 style="font-size: 16px;">Tournament 4 : Price ₹1,000 </h3>
                  <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                  <a href="tournament/t4.php" class="register-link">Register Now</a>
                </div>
              </div>
              <!--<div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                                <-- Adjusted maximum width for smaller card --
                                <div class="x-text">
                                    <img src="img/tdm-2.jpg" alt="Tournament 5">
                                    <-- Use the same image for Tournament 5 --
                                    <p></p>     <h3 style="font-size: 16px;">Tournament 5 : Price ₹100</h3>
                                    <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM </h5>
                                    <a href="tournament/t5.php" class="register-link">Register Now</a>
                                </div>
                            </div> -->
              <!-- Add more swiper-slide elements as needed -->
            </div>
            <p class="guide"> Swipe LEFT to EXPLORE MORE Tournaments </p>
          </div>

        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="fcontainer">
      <p>&copy; 2023 PUBG Tournament Website</p>
    </div>
  </footer>


  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    const mySwiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      spaceBetween: 20,
      // Add additional options as needed
    });

    mySwiper.on('slideChange', () => {
      document.querySelector('.swiper-container').style.overflow = 'hidden';
    });

    mySwiper.on('slideChangeTransitionEnd', () => {
      document.querySelector('.swiper-container').style.overflow = 'auto';
    });
  </script>
  
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
  

  

</body>

</html>
<!--
<div class="container my-1">
    <div class="alert alert-success" role="alert" id="message">
      <h4 class="alert-heading">Welcome < ?php echo '@' . $_SESSION['$username'] ?>!</h4>
      <p>How are you doing? Welcome to Tourney. You're logged in as @< ?php echo $_SESSION['$username'] ?>.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php">using this link.</a></p>
    </div>
  </div> 
<script>
    // JavaScript to hide the message after 5 seconds
    setTimeout(function () {
        document.getElementById('message').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
-->

<!-- 
<script>
    window.addEventListener('load', function() {
      var message = "Welcome <  ?php echo '@' . $_SESSION['$username'] ?>!\nHow are you doing ? Welcome to Tourney. You're logged in as @<  ?php echo $_SESSION['$username'] ?>.\nWhenever you need to, be sure to logout using this link.";
      window.alert(message);
    });
  </script>
-->