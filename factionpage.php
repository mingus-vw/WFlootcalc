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

$stmt = $db->prepare("
    SELECT `faction`.name as 'faction', `enemy`.name as 'enemy', `loot`.name as 'loot', `enemy_loot`.chance, `enemy_loot`.amount
    FROM `WFlootcalc`.`faction`
    INNER JOIN `WFlootcalc`.`enemy` ON `faction`.`id` = `enemy`.`faction_id`
    INNER JOIN `WFlootcalc`.`enemy_loot` ON `enemy`.`id` = `enemy_loot`.`enemy_id`
    INNER JOIN `WFlootcalc`.`loot` ON `enemy_loot`.`loot_id` = `loot`.`id`
    WHERE `faction`.id = :id;
");

$stmt->execute(['id' => 1]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factions</title>
</head>
<body>
<button onclick="location.href='index.php'">Go to main page</button>
    <h1>Factions:</h1>
    <table>
        <thead>
            <tr>
                <th>Faction</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="?id=1">Grineer</a></td>
            </tr>
            <tr>
                <td><a href="?id=2">Corpus</a></td>
            </tr>
            <tr>
                <td><a href="?id=3">Infested</a></td>
            </tr>
        </tbody>
    </table>
