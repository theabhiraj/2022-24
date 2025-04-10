<!DOCTYPE html>
<html>

<head>
    <title>Model Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .details-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .details-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .model-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .model-details {
            font-size: 18px;
            margin: 5px 0;
        }

        .model-details b {
            font-weight: bold;
            color: #333;
        }

        .model-details p {
            font-size: 18px;
            color: #666;
        }

        .get-now-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .get-now-button:hover {
            background-color: #0056b3;
        }

        .sticky-message {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px;
            font-size: 18px;
            color: #fff;
            background-color: #28a745;
            border-radius: 5px;
            z-index: 1000;
            display: none;
        }

        .error-message {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px;
            font-size: 18px;
            color: #fff;
            background-color: #dc3545;
            border-radius: 5px;
            z-index: 1000;
            display: none;
        }
    </style>
    <script>
        function showMessage(message, isSuccess) {
            var messageElement = document.createElement('div');
            messageElement.className = isSuccess ? 'sticky-message' : 'error-message';
            messageElement.textContent = message;
            document.body.appendChild(messageElement);

            setTimeout(function() {
                messageElement.style.display = 'block';
            }, 100);

            setTimeout(function() {
                messageElement.style.display = 'none';
                window.location.href = 'index.php';
            }, 2000);
        }
    </script>
</head>

<body>
    <?php
    include 'tials/_con.php';

    if (isset($_GET['model'])) {
        $modelName = $_GET['model'];

        // Fetch model details based on the model name
        $modelQuery = "SELECT * FROM ModelSAvail WHERE modelsName = '$modelName'";
        $modelResult = $conn->query($modelQuery);

        if ($modelResult->num_rows > 0) {
            $modelRow = $modelResult->fetch_assoc();
            $modelLaunchDate = $modelRow['launchDate'];
            $modelLaunchPrice = $modelRow['launchPrice'];
            $modelCurrentPrice = $modelRow['currentPrice'];

            // Get brand name for image and title
            $brandQuery = "SELECT BrandName FROM BrandSAvail WHERE ID_No = " . $modelRow['ID_No'];
            $brandResult = $conn->query($brandQuery);
            $brandRow = $brandResult->fetch_assoc();
            $brandName = $brandRow['BrandName'];
            $modelPicture = strtolower(str_replace(' ', '-', $brandName)) . '-' . strtolower(str_replace(' ', '-', $modelName));

            echo '<div class="details-container">';
            echo '<img src="images/' . $modelName . '.jpg"">';
            echo '<div class="model-name">' . $modelName . ' by ' . $brandName . '</div>';
            echo '<div class="model-details">Launch Date: ' . $modelLaunchDate . '</div>';
            echo '<div class="model-details">Launch Price: $' . $modelLaunchPrice . '</div>';
            echo '<div class="model-details"><b>Current Price: $' . $modelCurrentPrice . '</b></div>';
            echo '<a href="modelDetails.php?model=' . urlencode($modelName) . '&action=getNow" class="get-now-button">Get Now</a>';
            echo '</div>';

            // Handle "Get Now" action
            if (isset($_GET['action']) && $_GET['action'] == 'getNow') {
                $currentDate = date('Y-m-d');
                $insertQuery = "INSERT INTO getNow (brandName, modelName, requestDate) VALUES ('$brandName', '$modelName', '$currentDate')";
                if ($conn->query($insertQuery) === TRUE) {
                    echo '<script>showMessage("Order placed successfully! We will contact you for confirmation via call.", true);</script>';
                } else {
                    echo '<script>showMessage("Error: ' . $conn->error . '", false);</script>';
                }
            }
        } else {
            echo '<div class="details-container"><p>Model not found.</p></div>';
        }
    } else {
        echo '<div class="details-container"><p>No model selected.</p></div>';
    }

    $conn->close();
    ?>
</body>

</html>