<!DOCTYPE html>
<html>

<head>
    <title>Tournament 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Added viewport meta tag for responsiveness -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000000;
            color: #f1f1f1;
            font-size: 16px;
            font-weight: lighter;
            margin: 0;
            padding: 0;
            background-image: url('img/i4.jpg'); /* Updated background image */
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 100%;
            text-align: center;
            margin: 0;
            padding: 5% 3%;
            margin-top: 10%;
            /* Adjusted padding for mobile screens */
            border: 1px solid #ffffff;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.7);
        }

         .register-link {
            display: block;
            text-align: center;
            background: #fff;
            color: #000;
            padding: 10px;
            text-decoration: none;
            border-style: solid;
            border-color: #007BFF;
            border-radius: 5px;
            font-size: 20px; /* Increased font size for better visibility */
            margin: 20px 150px 10px; /* Added margin for spacing */
        }
        .register-link:hover {
                 background-color: #000; /* Black background on hover */
                color: #fff; /* White text on hover */
                border-style: solid;
            border-color: #007BFF;
        }


        .bordered-image {
            border: 1px solid #ffffff;
            border-radius: 25px;
            max-width: 80%; /* Adjusted image size for mobile screens */
            max-height: auto;
            display: block;
            margin: 0 auto;
            
        }

        
        .whatsappLink {
            
            display: flex ;
            text-align: center;
            text-align: center;
            background: #25d366;
            color: #000000;
            font-weight: bolder;
            padding: 3px 10px;
            text-decoration: none;
            border-radius: 1px;
            font-size: 18px; /* Increased font size for better visibility */
            margin: 1% 125px 1% ; /* Added margin for spacing */
        }

        h3 {
            font-size: 30px;
            font-weight: 100;
            padding: 0;
            margin: 20px 0; /* Added margin for spacing */
        }

        h5 {
            font-size: 15px;
            font-weight: 70;
            padding-top: 0;
            margin: 10px 0; /* Added margin for spacing */
        }

        .rules {
            background-color: #000000;
            color: #ffffff;
            font-size: 12px; /* Increased font size for better visibility */
            padding: 2px;
            border-radius: 10px;
            margin: 20px 20px; /* Added margin for spacing */
        }

        .prize {
            background-color: #ffdb58;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }
        
        .prize h3 {
            font-size: 24px;
            color: #333;
            margin: 0px 100px 1px;
            background-color: #23272c; /* Background color to highlight the heading */
            color: #fff; /* Text color for the highlighted heading */
            padding: 10px; /* Padding to increase the heading's visibility */
            border-radius: 5px; /* Rounded corners for the highlighted heading */
            border-width: 1px;
        }
        
        .prize-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 5px 50px 0;
        }
        
        .prize-item {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            margin: 5px 50px 0;
            padding-top: 5px;
        }
        
        .prize-item span {
            padding: 3px 5px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 0px;
            margin: 0 0px 0;
        }
        
        

    </style>
</head>

<body>
<?php require '_nav2.php' ?>
    <div class="container">
        <img src="img/tdm-1.jpg" alt="Tournament 1" class="bordered-image">
        <h3>Tournament 1 : Price 100₹ </h3>
        <h5>Date: 2023-10-22</h5> <h5> Time: 12:00 PM </h5>
        <h5 style="color:#ff0000b3"> ONLY M24 and KAR98 </h5>
        <a class="register-link" href="xyz/scan.png">Join Now</a>
    </div>

    <div class="prize">
        <h3>🏆 PRIZE POOL</h3>
        <div class="prize-list">
            <div class="prize-item">
                <span>1st Place:</span>
                <span>₹400</span>
            </div>
            <div class="prize-item">
                <span>2nd Place:</span>
                <span>₹150</span>
            </div>
            <div class="prize-item">
                <span>3rd Place:</span>
                <span>₹100</span>
            </div>
        </div>
    </div>

    <div class="rules">
        <p><strong>Rules for Playing : </strong></p>
        <ol>
            <li>Don't use any AUTO Guns and any other weapons except <strong>KAR98 and M24</strong>.</li>
            <li>Don't use GRENADE or STUNT GRENADE.</li>
        </ol>
        <p><strong>Results and Prizes:</strong> Tournament results, prize, and any other post-tournament information will be communicated on WhatsApp. Winners will be rewarded with their respective prize shares.</p>
        <p><strong>Registration:</strong> To participate in this tournament, click the <strong>"Join Now"</strong> button on the site. Make sure to complete your registration before the specified date and time to secure your spot.</p>
        <p><strong>Fair Play:</strong> All participants are expected to exhibit fair play and good sportsmanship. Cheating, exploiting, or any form of unfair play will result in disqualification.</p>
        
        
        <p><strong>Contact:</strong> For updates and any queries or assistance, click on : </p><br> 
        <a href="whatsapp://wa.me/message/9373467948" class="whatsappLink" target="_blank" style="text-align: center;" > Message Now </a>
    </div>
</body>

</html>
