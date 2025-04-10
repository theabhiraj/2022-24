<!DOCTYPE html>
<html>

<head>
    <title>PUBG Tournament Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Added viewport meta tag for responsiveness -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        @media (max-width: 768px) {
            .swiper-slide h3 {
                font-size: 14px;
            }

            .swiper-slide h5 {
                font-size: 11px;
            }
        }

        body {
            font-family: 'Arial', sans-serif;
            /*  background-color: rgba(255, 255, 255, 10); 
            background-color:black;  */
            background-image: url('img/i4.jpg');
            color: #333;
            margin: 0;
            padding: 0;
            font-size: 16px;
            /* Increased font size for mobile readability */
            padding: 80px 0;
            position: relative;
            /* Add this to make it a reference for absolute positioning */

            /* Add a semi-transparent background overlay with a blur effect */
            &::before {
                content: "";
                background-image: url('img/i1.jpg');
                /* Add the overlay image */
                background-size: cover;
                background-position: center;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                opacity: 0.1;
                /* Adjust the opacity as needed */
                backdrop-filter: blur(1px);
                /* Add a blur effect and adjust the value as needed */
            }


        }

        .container {
            max-width: 100%;
            max-height: 200%;
            /* Adjusted max-width for mobile screens */
            padding: 20px;
        }

        .hero {
            background-color: rgba(255, 255, 255, 0.8)
                /* mY iMAGE path */
                background-size: cover;
            background-position: center;
            text-align: center;
            /* padding: 80px 0;
            padding: 10px 0;    */
            padding-top: 0%;
            padding-bottom: 1%;
            /* Adjusted padding for mobile screens */
        }

        .hero h1 {
            font-family: 'Helvetica Neue', sans-serif;
            font-size: 25px;
            /* Reduced font size for mobile screens */
            color: red;
            margin: 0;
        }

        .hero p {
            padding:10px;
            font-weight: 500;
            font-family: cursive;
            color: #b8aeae;
            font-size: 14px;
            /* Reduced font size for mobile screens */
        }

        .swiper-container-wrapper {
            overflow: hidden;
        }

        .swiper-container {
            width: 70%;
            padding: 20px;
            overflow: auto;
        }

        .swiper-slide {
    text-align: center;
   /* background-image: url('img/i5.jpg'); */
    background-color: rgba(0, 0, 0, 0.7); /* Adjust the alpha (0.7) for the desired opacity */
    color: #fff;
    border: 1px solid #007BFF;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
    padding: 20px;
    margin: 10px 0;
    /* Added margin for separation on mobile screens */
}

        .swiper-slide img {
            max-width: 100%;
            height: auto;
        }

        .x-text {
            padding: 20px;
            padding-top: 10px;
        }

        .register-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            background: #0056b3;
            color: #fff;
            padding: 10px;
            margin: 0% 0% 0%;
            text-decoration: none;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            font-size: 14px;
            padding: 0px 0;
            margin-top: 10%;
            margin-bottom: 0%;
        }

        .fcontainer {
            max-width: 100%;
            /* Adjusted max-width for mobile screens */
            padding: 5px;
            /* Adjusted padding for mobile screens */
        }
    
    .guide{
        color: rgb(255, 0, 0);
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        padding: 0%;
        margin: 0%;
    }
</style>
</head>

<body>

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
                                <p></p>    <h3 style="font-size: 16px;">Tournament 1 : Price ₹50</h3>
                                    <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                                    <a href="tournament/t1.php" class="register-link">Register Now</a>
                                </div>
                            </div>
                            <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                                <!-- Adjusted maximum width for smaller card -->
                                <div class="x-text">
                                    <img src="img/tdm-2.jpg" alt="Tournament 2">
                                    <!-- Use the same image for Tournament 2 -->
                                    <p></p>  <h3 style="font-size: 16px;">Tournament 2 : Price ₹100</h3>
                                    <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                                    <a href="tournament/t2.php" class="register-link">Register Now</a>
                                </div>
                            </div>
                            <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                                <!-- Adjusted maximum width for smaller card -->
                                <div class="x-text">
                                    <img src="img/tdm-2.jpg" alt="Tournament 3">
                                    <!-- Use the same image for Tournament 3 -->
                                    <p></p>    <h3 style="font-size: 16px;">Tournament 3 : Price ₹500 </h3>
                                    <h5 style="font-size: 12px;">Date: 2023-11-22 Time: 12:00 PM</h5>
                                    <a href="tournament/t3.php" class="register-link">Register Now</a>
                                </div>
                            </div>
                            <div class="swiper-slide" style="max-width: 100%; margin: 0 auto;">
                                <!-- Adjusted maximum width for smaller card -->
                                <div class="x-text">
                                    <img src="img/tdm-2.jpg" alt="Tournament 4">
                                    <!-- Use the same image for Tournament 4 -->
                                    <p></p>    <h3 style="font-size: 16px;">Tournament 4 : Price ₹1,000 </h3>
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

</body>

</html>