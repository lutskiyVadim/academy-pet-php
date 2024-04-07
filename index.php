<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons of PHP</title>

    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/global.css">
    <link rel="stylesheet" href="./style/container.css">
</head>

<body>
    <?php include "./components/headerCpmponent.php"; ?>

    <main class="container">
        <form method="post">
            <?php
            $products = [
                ['name' => 'Футболка', 'price' => 20],
                ['name' => 'Джинси', 'price' => 50],
                ['name' => 'Кросівки', 'price' => 80]
            ];

            for ($i = 0; $i < count($products); $i++) {
                echo "<label class='label'>{$products[$i]['name']} ({$products[$i]['price']} грн):</label>";
                echo "<input type='number' name='{$products[$i]['name']}' min='0' value='0'><br>";
            }
            ?>

            <button type="submut">Розрахувати</button>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $totalCost = 0;
                for ($i = 0; $i < count($products); $i++) {
                    $quaontity = isset($_POST[$products[$i]['name']]) ? (int)$_POST[$products[$i]['name']] : 0;
                    $totalCost += $products[$i]['price'] * $quaontity;
                }

                echo "<p class='total__cost'>Загальна вартість замовлення: $totalCost грн</p>";
            }
            ?>
        </form>
        <?php

        ?>
    </main>

    <?php include "./components/footerComponent.php"; ?>
</body>

</html>