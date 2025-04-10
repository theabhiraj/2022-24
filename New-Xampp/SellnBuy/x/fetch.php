<?php
include 'tials/_con.php';

if(isset($_POST['brand_id'])){
    $brand_id = $_POST['brand_id'];
    $query = "SELECT modelsName, launchDate FROM ModelSAvail WHERE ID_No = $brand_id";
    $result = $conn->query($query);

    $models = array();
    while($row = $result->fetch_assoc()){
        $models[] = $row;
    }

    echo json_encode($models);
}
?>
