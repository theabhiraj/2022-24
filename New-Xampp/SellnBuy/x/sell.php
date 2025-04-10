<!DOCTYPE html>
<html>

<head>
    <title>Sell n Buy</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="tials/style.css">
    <script src="script.js"></script>
    <script></script>
</head>

<body>
    <form action="submit.php" method="POST">
        <label for="brandName">Brand Name:</label>
        <select id="brandName" name="brandName" required>
            <option value="">Select Brand</option>
            <?php
            include 'tials/_con.php';
            $query = "SELECT * FROM BrandSAvail";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['ID_No'] . '">' . $row['BrandName'] . '</option>';
            }
            ?>
        </select>

        <label for="modelName">Model Name:</label>
        <select id="modelName" name="modelName" required>
            <option value="">Select Model</option>
        </select>

        <label for="purchaseDate">Date of Purchase:</label>
        <input type="date" id="purchaseDate" name="purchaseDate" required>

        <label for="condition">Condition:</label>
        <select id="condition" name="condition" required>
            <option value="">Select Condition</option>
            <option value="Like New">Like New</option>
            <option value="good">Good</option>
            <option value="fair">Fair</option>
            <option value="bad">Bad</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>

</html>