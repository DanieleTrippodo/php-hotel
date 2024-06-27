<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel PHP</title>

    <!-- Collegamento Bootstrap -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>





<body>



    <h1 class="my-4">Elenco</h1>

    <!-- Collegamento alla nostra array fornita -->
    <?php  require_once __DIR__ . "/src/hotels.php"   ?>



    <?php

    foreach ($hotels as $hotel) {
        echo "<h2>{$hotel['name']}</h2>";
        echo "<p>{$hotel['description']}</p>";
        echo "<p>Parking: " . ($hotel['parking'] ? 'Yes' : 'No') . "</p>";
        echo "<p>Vote: {$hotel['vote']}</p>";
        echo "<p>Distance to Center: {$hotel['distance_to_center']} km</p>";
        echo "<hr>";
    }
    ?>
</body>
</html>