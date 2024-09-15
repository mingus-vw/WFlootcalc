
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
    <!-- Navigation omitted for brevity -->

    <h1 class="text-2xl font-bold mt-8 mb-4">Manage Enemies</h1>

    <!-- Form to add new enemy -->
    <form action="factionpage.php" method="post" class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Add New Enemy</h2>
        <div class="mb-4">
            <label for="enemy_name" class="block text-sm font-medium text-gray-700">Enemy Name</label>
            <input type="text" id="enemy_name" name="enemy_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="enemy_stats" class="block text-sm font-medium text-gray-700">Enemy Stats</label>
            <input type="text" id="enemy_stats" name="enemy_stats" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="faction_id" class="block text-sm font-medium text-gray-700">Faction</label>
            <select id="faction_id" name="faction_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <?php foreach ($factions as $faction): ?>
                    <option value="<?= htmlspecialchars($faction['id']) ?>"><?= htmlspecialchars($faction['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="add_enemy" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Enemy</button>
    </form>

    <!-- Display existing enemies -->
    <h2 class="text-xl font-semibold mb-2">Existing Enemies</h2>
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
            <?php foreach ($enemies as $enemy): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['id']) ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['name']) ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['stats']) ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($enemy['faction_name']) ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="factionpage.php" method="post" class="inline">
                            <input type="hidden" name="enemy_id" value="<?= htmlspecialchars($enemy['id']) ?>">
                            <button type="submit" name="delete_enemy" class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800 fixed bottom-0 w-full">
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