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
    WHERE `enemy`.id = :id;
");

$stmt->execute(['id' => $_GET['id']]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enemy: <?= $_GET['id']?></title>
</head>
<body>
    <h1>Enemy: <?= $_GET['id'] ?></h1>
    <table>
        <thead>
            <tr>
                <th>Faction</th>
                <th>Enemy</th>
                <th>Loot</th>
                <th>Chance</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch()) : ?>
            <tr>
                <td><?= $row['faction'] ?></td>
                <td><?= $row['enemy'] ?></td>
                <td><?= $row['loot'] ?></td>
                <td><?= $row['chance'] ?></td>
                <td><?= $row['amount'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
