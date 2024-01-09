<?php
    // variabile che contiene le info sugli hotel
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    // variabili che salvano i valori inseriti dall'utente per filtrare gli hotel
    $parking = $_GET['parking'] ?? 'all';
    $vote = $_GET['vote'] ?? 'nobody';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center my-3">Hotels Description</h1>
    <form action="index.php" method="GET">
        <label for="parking">Parking:</label>
        <select id="parking" name="parking">
            <option selected="selected" value="all">All</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <label for="vote">Vote:</label>
        <input type="number" name="vote" id="vote" min="0" max="5">
        <button type="submit">Filtra</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <?php 
                foreach($hotels[0] as $key => $value){
                    echo "<th scope=\"col\">$key</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            // per ogni hotel
            foreach($hotels as $hotel){
                echo '<tr>';
                if(($hotel['parking'] === true && $parking === 'yes') || ($hotel['parking'] === false && $parking === 'no') || $parking === 'all'){
                    if($vote === '' || $vote === 'nobody' || ($hotel['vote'] === 0 && $vote === '0') || ($hotel['vote'] === 1 && $vote === '1') || ($hotel['vote'] === 2 && $vote === '2') || ($hotel['vote'] === 3 && $vote === '3') || ($hotel['vote'] === 4 && $vote === '4') || ($hotel['vote'] === 5 && $vote === '5')){
                    // per ogni coppia chiave valore di ciascun hotel che soddisfa una delle condizioni
                    foreach($hotel as $key => $value){
                        if($key === 'parking' && $value === true){
                            echo "<td>yes</td>";
                        } elseif ($key === 'parking' && $value === false) {
                            echo "<td>no</td>";
                        } elseif ($key === 'vote'){
                            echo "<td>$value/5</td>";
                        } elseif ($key === 'distance_to_center'){
                            echo "<td>$value km</td>";
                        } else {
                            echo "<td>$value</td>";
                        }
                    }
                    }
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>