<!DOCTYPE html>
<html>

<head>
    <title>Buy Smartphones</title>
    <style>
        .brand-section {
            margin-bottom: 40px;
        }

        .brand-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .model-container {
            display: flex;
            flex-wrap: wrap;
        }

        .model-card {
            width: 200px;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        .model-card img {
            width: 100%;
            height: auto;
        }

        .model-card .model-name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .model-card .model-details {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
    <script>
        function redirectToDetails(modelName) {
            window.location.href = 'modelDetails.php?model=' + modelName;
        }
    </script>
</head>

<body>
    <?php
    include 'tials/_con.php';

    // Fetch all brands
    $brandQuery = "SELECT * FROM BrandSAvail";
    $brandResult = $conn->query($brandQuery);

    while ($brandRow = $brandResult->fetch_assoc()) {
        $brandID = $brandRow['ID_No'];
        $brandName = $brandRow['BrandName'];
        // $brandPicture = $brandRow['pictures'];

        echo '<div class="brand-section">';
        // echo '<div class="brand-title"><img src="images/brand/'.$brandPicture.'.jpg" alt="'.$brandName.'" style="height: 50px;"> '.$brandName.'</div>';
        echo '<div class="brand-title">' . $brandName . '</div>';

        // Fetch models for each brand
        $modelQuery = "SELECT * FROM ModelSAvail WHERE ID_No = $brandID";
        $modelResult = $conn->query($modelQuery);

        echo '<div class="model-container">';
        while ($modelRow = $modelResult->fetch_assoc()) {
            $modelName = $modelRow['modelsName'];
            $modelLaunchDate = $modelRow['launchDate'];
            $modelLaunchPrice = $modelRow['launchPrice'];
            $modelCurrentPrice = $modelRow['currentPrice'];
            $modelPicture = strtolower(str_replace(' ', '-', $brandName)) . '-' . strtolower(str_replace(' ', '-', $modelName));

            echo '<div class="model-card" onclick="redirectToDetails(\'' . $modelName . '\')">';
            // echo '<img src="images/'.$modelPicture.'.jpg" alt="'.$modelName.'">';
            // echo '<img src="images/'.$modelName.'.webp"">';
            echo '<img src="images/' . $modelName . '.jpg"">';
            echo '<div class="model-name">' . $modelName . '</div>';
            echo '<div class="model-details">Launch Date: ' . $modelLaunchDate . '</div>';
            echo '<div class="model-details"><s style="color:red;">$' . $modelLaunchPrice . '</s><b><mark style="background-color: yellow;color: black; margin: auto auto auto 10px">$' . $modelCurrentPrice . '</mark></b></div>';
            // echo '<div class="model-details">Current Price: $'.$modelCurrentPrice.'</div>';
            echo '</div>';
        }
        echo '</div>'; // .model-container
        echo '</div>'; // .brand-section
    }

    ?>
</body>

</html>