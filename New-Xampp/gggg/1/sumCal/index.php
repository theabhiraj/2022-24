<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Addition</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="button"] {
            background-color: #dc3545;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            opacity: 0.9;
        }

        h2 {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Number Addition</h1>
        <form method="post">
            <input type="text" id="numbers" name="numbers" value="<?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers']) : ''; ?>" placeholder="e.g., 10 + 20, 30 - 10 _ 40 or 10i10i10">
            <br>
            <input type="submit" value="Calculate Sum">
            <input type="button" value="Clear" onclick="document.getElementById('numbers').value='';">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["numbers"])) {
            $input = $_POST["numbers"];

            // Replace non-numeric characters (except delimiters) with spaces
            $cleaned_input = preg_replace('/[^0-9,\s\+\-_]+/', ' ', $input);

            // Replace delimiters (commas, whitespace, plus signs, minus signs, underscore signs) with plus signs
            $cleaned_input = preg_replace('/[,\s\+\-_]+/', '+', $cleaned_input);

            // Remove any trailing plus signs or spaces
            $cleaned_input = rtrim($cleaned_input, '+ ');

            // Convert to an array of numbers
            $numbers_array = preg_split('/\s*\+\s*/', $cleaned_input);

            // Calculate the sum
            $sum = array_sum($numbers_array);

            // Display the sum
            echo "<h2>The sum is: $sum</h2>";
        }
        ?>
    </div>
</body>

</html>