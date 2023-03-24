<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WF CALC</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <button onclick="location.href='factionpage.php'">Go to Faction Page</button>

    <div>
  


<?php

$host = 'localhost';
$db   = 'wflootcalc';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';

// Establish a connection to the database
$conn = mysqli_connect($host, $user, $pass, $db);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Get the selected enemy IDs
    $enemy1_id = $_POST["enemy1"];
    $enemy2_id = $_POST["enemy2"];
    $enemy3_id = $_POST["enemy3"];
    
    // Build a comma-separated string of enemy IDs
    $enemy_ids = implode(',', [$enemy1_id, $enemy2_id, $enemy3_id]);
    
    // Select the items dropped by the enemies
    $sql = "SELECT l.id, l.name, l.description, el.amount, el.chance FROM loot l JOIN enemy_loot el ON l.id = el.loot_id WHERE el.enemy_id IN ($enemy_ids)";
    
    // Execute the query
    $result = mysqli_query($conn, $sql);
    $enemy_names = [];
    $loot_amount = [];
    
    // Check if the query was successful
    if ($result) {
        // Print the table of dropped items
        while ($row = mysqli_fetch_assoc($result)) {
            $enemy_names[] = $row["name"];
            $random_getal_tussen_0_en_100 = rand(0, 100);
            if ($random_getal_tussen_0_en_100 <= $row["chance"]) {
                $loot_amount[] = $row["amount"];
            } else {
                $loot_amount[] = 0;
            }
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" height="50"></canvas>

<script>
  const ctx = document.getElementById('myChart');
  const data = [<?= implode(',', $loot_amount) ?>];

  
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels:  [<?php echo "'" . implode("','", $enemy_names) . "'"; ?>],
      datasets: [{
        label: 'Amount of loot',
        data: data,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<!-- HTML form to select the enemies and submit the form -->
<form method="post">
    <div class="enemy1">
    <label for="enemy1">Select enemy 1:</label>
    <select name="enemy1">
        <option value="1">Lancer</option>
        <option value="2">Heavy Gunner</option>
        <option value="3">Shield Lancer</option>
        <option value="4">Crewman</option>
        <option value="5">Machinist</option>
        <option value="6">Elite Crewman</option>
        <option value="7">Charger</option>
        <option value="8">Ancient Disruptor</option>
        <option value="9">Juggernaut</option>
    </select>
    </div>
    <br>
    <div class="enemy2">
    <label for="enemy2">Select enemy 2:</label>
    <select name="enemy2">
        <option value="1">Lancer</option>
        <option value="2">Heavy Gunner</option>
        <option value="3">Shield Lancer</option>
        <option value="4">Crewman</option>
        <option value="5">Machinist</option>
        <option value="6">Elite Crewman</option>
        <option value="7">Charger</option>
        <option value="8">Ancient Disruptor</option>
        <option value="9">Juggernaut</option>
    </select>
    </div>
    <br>
    <div class="enemy3">
    <label for="enemy3">Select enemy 3:</label>
    <select name="enemy3">
        <option value="1">Lancer</option>
        <option value="2">Heavy Gunner</option>
        <option value="3">Shield Lancer</option>
        <option value="4">Crewman</option>
        <option value="5">Machinist</option>
        <option value="6">Elite Crewman</option>
        <option value="7">Charger</option>
        <option value="8">Ancient Disruptor</option>
        <option value="9">Juggernaut</option>
    </select>
    </div>
    <br>
<input type="submit" name="submit" value="Calculate loot">

</form>
    </body>
</html>
