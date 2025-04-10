<?php
include 'tials/_con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandName = $_POST['brandName'];
    $modelName = $_POST['modelName'];
    $purchaseDate = $_POST['purchaseDate'];
    $condition = $_POST['condition'];

    $sql = "INSERT INTO userCheckPrice (brandName, modelName, purchaseDate, `condition`) VALUES ('$brandName', '$modelName', '$purchaseDate', '$condition')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>