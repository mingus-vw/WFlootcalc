</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WF CALC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styles" href="style.css">
</head>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-100">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="img/logo.png" class="h-6 mr-3 sm:h-9"
                    alt="wflogo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Warframe
                    Calculator</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white aria-current=page">Home</a>
                    </li>
                    <li>
                        <a href="factionpage.php"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Factions</a>
                    </li>
                    <li>
                        <a href="about.php"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="login.php"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login/Sign up</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex justify-around">
        <form method="post">
            <label for="enemy1">Select enemy 1:</label>
            <select name="enemy1"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">Lancer</option>
                <option value="2">Trooper</option>
                <option value="3">Heavy Gunner</option>
                <option value="4">Shield Osprey</option>
                <option value="5">Crewman</option>
                <option value="6">Tech</option>
                <option value="7">Charger</option>
                <option value="8">Ancient Disruptor</option>
                <option value="9">Juggernaut</option>
            </select>
            <label for="enemy2">Select enemy 2:</label>
            <select name="enemy2"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">Lancer</option>
                <option value="2">Trooper</option>
                <option value="3">Heavy Gunner</option>
                <option value="4">Shield Osprey</option>
                <option value="5">Crewman</option>
                <option value="6">Tech</option>
                <option value="7">Charger</option>
                <option value="8">Ancient Disruptor</option>
                <option value="9">Juggernaut</option>
            </select>
            <label for="enemy3">Select enemy 3:</label>
            <select name="enemy3"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
                <option value="1">Lancer</option>
                <option value="2">Trooper</option>
                <option value="3">Heavy Gunner</option>
                <option value="4">Shield Osprey</option>
                <option value="5">Crewman</option>
                <option value="6">Tech</option>
                <option value="7">Charger</option>
                <option value="8">Ancient Disruptor</option>
                <option value="9">Juggernaut</option>
            </select>
            
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer"></input>
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Randomized Enemies</span>
            </label>

            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" id="doubleDropsToggle" value="" class="sr-only peer"></input>
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Show Double Drops</span>
            </label>
    </div>

    <div class="flex justify-center pt-3">
        <input type="submit" name="submit" value="Calculate loot"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"></input>
    </div>

    <!-- Normal drop chart --> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart" height="50"></canvas>

    <!-- Double drop chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myDoubledChart" height="50"></canvas>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800 sticky bottom-0 w-full">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/"
                    class="hover:underline">Flowbite™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

    <?php
    $host = 'localhost';
    $db   = 'wflootcalc';
    $user = 'bit_academy';
    $pass = 'bit_academy';
    $charset = 'utf8mb4';

// Set up the database connection
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $conn = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }



// Check if the form was submitted
    $enemy_names = [];
    $loot_amount = [];
    if (isset($_POST["submit"])) {
        // Get the selected enemy IDs
        $enemy1_id = $_POST["enemy1"];
        $enemy2_id = $_POST["enemy2"];
        $enemy3_id = $_POST["enemy3"];

        // Build a comma-separated string of enemy IDs
        $enemy_ids = implode(',', [$enemy1_id, $enemy2_id, $enemy3_id]);

        // Select the items dropped by the enemies
        $sql = "SELECT l.id, l.name, l.description, el.amount, el.chance FROM loot l JOIN enemy_loot el ON l.id = el.loot_id WHERE el.enemy_id IN (:enemy1, :enemy2, :enemy3)";

        // Prepare the query
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bindParam(':enemy1', $enemy1_id);
        $stmt->bindParam(':enemy2', $enemy2_id);
        $stmt->bindParam(':enemy3', $enemy3_id);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $result = $stmt->fetchAll();

        if ($result) {
            // Print the table of dropped items
            $total_loot_amount = 0;
            for ($i = 0; $i < 3; $i++) {
                foreach ($result as $row) {
                    $enemy_names[] = $row["name"];
                    $random_getal_tussen_0_en_100 = rand(0, 100);
                    if ($random_getal_tussen_0_en_100 <= $row["chance"]) {
                        $loot_amount[] = $row["amount"];
                        $total_loot_amount += $row["amount"]; // add the amount to the total
                    } else {
                        $loot_amount[] = 0;
                    }
                }
            }
            if (count($enemy_names) >= 3 && count(array_unique($enemy_names)) == 1) {
                $total_loot_amount *= count($enemy_names);
            }
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
    ?>
<script src="script.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    const doubledCtx = document.getElementById('myDoubledChart');
    const doubleDropsToggle = document.getElementById('doubleDropsToggle');

    const data = [<?= implode(',', $loot_amount) ?>];
    const doubledLootAmount = data.map(value => value * 2); // Create a new array with doubled values

    if (data.length == 0) {
        ctx.style.display = 'none';
        doubledCtx.style.display = 'none';
    }

    // Generate the original chart
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo "'" . implode("','", array_unique($enemy_names)) . "'" ?>],
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

    // Function to generate the second chart (doubled loot)
    function createDoubledChart() {
        new Chart(doubledCtx, {
            type: 'bar',
            data: {
                labels: [<?php echo "'" . implode("','", array_unique($enemy_names)) . "'" ?>],
                datasets: [{
                    label: 'Doubled Amount of loot',
                    data: doubledLootAmount,
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 178, 0, 0.43)', // Different color for differentiation
                    borderColor: 'rgba(255, 155, 0, 1)',       // Different color for the border
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
    }

    // Toggle the visibility of the second chart based on the checkbox state
    doubleDropsToggle.addEventListener('change', function() {
        if (this.checked) {
            doubledCtx.style.display = 'block'; // Show the canvas
            createDoubledChart(); // Generate the second chart when toggled on
        } else {
            doubledCtx.style.display = 'none';  // Hide the canvas when unchecked
            doubledCtx.getContext('2d').clearRect(0, 0, doubledCtx.width, doubledCtx.height); // Clear the canvas when hidden
        }
    });

    function randomizeEnemies() {
        // get all select elements
        const selectElements = document.querySelectorAll('select');

        // loop through each select element
        selectElements.forEach(select => {
            // get all options in the select element
            const options = select.querySelectorAll('option');

            // create an array of indices and shuffle it using the Fisher-Yates algorithm
            const indices = [...Array(options.length).keys()];
            for (let i = indices.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [indices[i], indices[j]] = [indices[j], indices[i]];
            }

            // remove all existing options from the select element
            while (select.firstChild) {
                select.removeChild(select.firstChild);
            }

            // add the shuffled options back to the select element
            for (let i = 0; i < 3; i++) {
                const optionIndex = indices[i];
                const option = options[optionIndex];
                select.appendChild(option.cloneNode(true));
            }
        });
    }

    const checkbox = document.querySelector('input[type="checkbox"]');
    checkbox.addEventListener('change', () => {
        console.log(checkbox);
        if (checkbox.checked) {
            randomizeEnemies();
        }
    });

    function toggleForms() {
        document.getElementById('loginForm').classList.toggle('active');
        document.getElementById('signupForm').classList.toggle('active');
    }
</script>


</body>

</html>
