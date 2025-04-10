
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management WebApp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js"></script>

</head>

<body>
    <?php require '../__connect/nav.php' ?>

    <header>
        <h1>Shop Management WebApp</h1>
    </header>


    <main>
        <div id="itemList">
            <h2>Available Items</h2>
            <div class="item" data-name="Coffee" data-price="20">
                <input type="checkbox" class="itemCheckbox"> Coffee - ₹20
            </div>
            <div class="item" data-name="Tea" data-price="10">
                <input type="checkbox" class="itemCheckbox"> Tea - ₹10
            </div>
        </div>

        <button onclick="openSelectedItemsPage()">Review Selected Items</button>
    </main>


    <footer>
        <p>&copy; 2023 Shop Management WebApp</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>