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



<div class="container">
        <h1 class="my-4">Lista degli Hotel</h1>
        
        <!-- Form di filtro -->
        <form method="GET" action="">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parking" id="parking" <?php echo isset($_GET['parking']) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="parking">
                    Solo hotel con parcheggio
                </label>
            </div>
            <div class="form-group">
                <label for="vote">Voto minimo</label>
                <input type="number" class="form-control" name="vote" id="vote" value="<?php echo isset($_GET['vote']) ? $_GET['vote'] : ''; ?>" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>
        

        <!-- Collegamento a Hotels.php -->
        <?php include __DIR__ . '/src/hotels.php'; ?>



        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal Centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Filtra gli hotel in base alla disponibilità del parcheggio e al voto
                $filteredHotels = $hotels;

                if (isset($_GET['parking'])) {
                    $filteredHotels = array_filter($filteredHotels, function($hotel) {
                        return $hotel['parking'];
                    });
                }

                if (isset($_GET['vote']) && is_numeric($_GET['vote'])) {
                    $minVote = intval($_GET['vote']);
                    $filteredHotels = array_filter($filteredHotels, function($hotel) use ($minVote) {
                        return $hotel['vote'] >= $minVote;
                    });
                }

                foreach ($filteredHotels as $hotel) {
                    echo "<tr>";
                    echo "<td>{$hotel['name']}</td>";
                    echo "<td>{$hotel['description']}</td>";
                    echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>{$hotel['vote']}</td>";
                    echo "<td>{$hotel['distance_to_center']} km</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div> <!-- Chiusura del div iniziale! -->


</body>
</html>