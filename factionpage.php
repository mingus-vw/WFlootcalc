<?php

$host = 'localhost';
$db   = 'wflootcalc';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $db = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Handle form submissions for adding and deleting enemies
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_enemy'])) {
        // Add enemy
        $name = $_POST['enemy_name'];
        $stats = $_POST['enemy_stats'];
        $faction_id = $_POST['faction_id'];

        $stmt = $db->prepare("INSERT INTO enemy (name, stats, faction_id) VALUES (?, ?, ?)");
        $stmt->execute([$name, $stats, $faction_id]);
    } elseif (isset($_POST['delete_enemy'])) {
        // Delete enemy
        $enemy_id = $_POST['enemy_id'];

        // Delete enemy loot associations first
        $stmt = $db->prepare("DELETE FROM enemy_loot WHERE enemy_id = ?");
        $stmt->execute([$enemy_id]);

        // Delete enemy
        $stmt = $db->prepare("DELETE FROM enemy WHERE id = ?");
        $stmt->execute([$enemy_id]);
    }
}

// Fetch faction names
$factions_stmt = $db->query("SELECT id, name FROM faction");
$factions = $factions_stmt->fetchAll();

// Fetch loot items
$loot_stmt = $db->query("SELECT id, name FROM loot");
$loot_items = $loot_stmt->fetchAll();

// Fetch enemies for display
$enemies_stmt = $db->query("
    SELECT enemy.id, enemy.name, enemy.stats, faction.name AS faction_name
    FROM enemy
    INNER JOIN faction ON enemy.faction_id = faction.id
");
$enemies = $enemies_stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Factions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styles" href="style.css">
</head>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-100 pb-3">
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
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                            aria-current="page">Home</a>
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

    <div id="default-carousel" class="relative w-full mt-10" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Grineer">
                    <img src="img/FactionsGrineer.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="grineer">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Grineer</h2>
                        <p>The Grineer are a race of militarized clones that seek to dominate the origin system.</p>
                    </div>
                </a>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Corpus">
                    <img src="img/FactionsCorpus.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="corpus">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Corpus</h2>
                        <p>The Corpus are a technologically advanced faction fueled by greed and profit.</p>
                    </div>
                </a>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Infested">
                    <img src="img/FactionsInfested.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="infested">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Infested</h2>
                        <p>A terrifying, parasitic hivemind of creatures seeking to consume anything that it finds.</p>
                    </div>
                </a>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Orokin">
                    <img src="img/FactionsOrokin.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="orokin">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Orokin</h2>
                        <p>The highly revered Orokin civilization built sovereignty on a culture of art, technology and architecture.</p>
                    </div>
                </a>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Tenno">
                    <img src="img/FactionsTenno.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="tenno">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Tenno</h2>
                        <p>Awakening from a deep slumber to a hostile world, the Tenno know little of themselves.</p>
                    </div>
                </a>
            </div>
            <!-- Item 6 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Sentient">
                    <img src="img/FactionsSentient.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="sentient">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Sentient</h2>
                        <p>Whispers from the Old War have begun to escape the deepest shadows. What terrible secret calls out to be discovered?</p>	
                    </div>
                </a>
            </div>
            <!-- Item 7 -->
            <div class="hidden duration-800 ease-in-out" data-carousel-item>
                <a href="https://warframe.fandom.com/wiki/Narmer">
                    <img src="img/FactionsNarmer.webp"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="narmer">
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white font-bold text-lg">
                        <h2>The Narmer</h2>
                        <p>All... as one.</p>
                    </div>
                </a>
            </div>




            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6"
                    data-carousel-slide-to="5"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7"
                    data-carousel-slide-to="6"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
<!-- Navigation omitted for brevity -->

<h1 class="text-xl font-semibold mb-10 mt-10 text-center">Manage Enemies</h1>

<!-- Form to add new enemy -->
<form action="factionpage.php" method="post" class="max-w-md mx-auto p-6 bg-gray-100 shadow-md rounded-lg border border-gray-300">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Add New Enemy</h2>
    
    <div class="mb-6">
        <label for="enemy_name" class="block text-sm font-medium text-gray-800">Enemy Name</label>
        <input type="text" id="enemy_name" name="enemy_name" required 
            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-150 ease-in-out">
    </div>
    
    <div class="mb-6">
        <label for="enemy_stats" class="block text-sm font-medium text-gray-800">Enemy Stats</label>
        <input type="text" id="enemy_stats" name="enemy_stats" required 
            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-150 ease-in-out">
    </div>
    
    <div class="mb-6">
        <label for="faction_id" class="block text-sm font-medium text-gray-800">Faction</label>
        <select id="faction_id" name="faction_id" required 
            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 bg-white text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-150 ease-in-out">
            <option value="" disabled selected>Select a faction</option>
            <?php foreach ($factions as $faction) : ?>
                <option value="<?= htmlspecialchars($faction['id']) ?>"><?= htmlspecialchars($faction['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" name="add_enemy" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition duration-150 ease-in-out">
        Add Enemy
    </button>
</form>




<!-- Display existing enemies -->
<h2 class="text-xl font-semibold mb-10 mt-10 text-center">Existing Enemies</h2>
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stats</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Faction</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ($enemies as $enemy) : ?>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['id']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['name']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['stats']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['faction_name']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <?php if ($enemy['is_favored']) : ?>
                        <form action="factionpage.php" method="post" class="inline">
                            <input type="hidden" name="enemy_id" value="<?= htmlspecialchars($enemy['id']) ?>">
                            <button type="submit" name="unfavorite_enemy" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Unfavorite</button>
                            <button type="submit" name="delete_enemy" class="px-4 py-2 bg-red-500 text-white rounded-md" disabled>Delete</button>
                        </form>
                    <?php else : ?>
                        <form action="factionpage.php" method="post" class="inline">
                            <input type="hidden" name="enemy_id" value="<?= htmlspecialchars($enemy['id']) ?>">
                            <button type="submit" name="favorite_enemy" class="px-4 py-2 bg-blue-500 text-white rounded-md">Favorite</button>
                            <button type="submit" name="delete_enemy" class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
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

</html>
