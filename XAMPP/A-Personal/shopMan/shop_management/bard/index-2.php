<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .item {
            display: inline-block;
            margin: 10px;
            width: 200px;
            text-align: center;
        }

        .item img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .item button {
            padding: 5px 10px;
            background-color: #fff;
            border: none;
            cursor: pointer;
        }

        .error {
            color: #f00;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($errors)): ?>
            <ul class="error">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h1>Shop Items</h1>
        <p>Select the items you want to purchase:</p>

        <form method="post">
            <?php require_once 'item_data.php'; ?>
            <?php foreach ($items as $item): ?>
                <div class="item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    <h3><?php echo $item['name']; ?></h3>
                    <p><?php echo $item['price']; ?></p>
                    <input type="checkbox" name="items[]" value="<?php echo $item['id']; ?>">
                    <label for="items[]">Add to Cart</label>
                </div>
            <?php endforeach; ?>
            <br>
            <button type="submit">Proceed to Cart</button>
        </form>
    </div>
</body>
</html>
