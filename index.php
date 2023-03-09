<?php

$host = 'localhost';
$db   = 'wflootcalc';
$user = 'root';
$pass = '';
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
    SELECT `faction`.name as 'faction', `enemy`.name as 'enemy', `enemy`.id as enemy_id, `loot`.name as 'loot', `enemy-loot`.chance, `enemy-loot`.amount
    FROM `WFlootcalc`.`faction`
    INNER JOIN `WFlootcalc`.`enemy` ON `faction`.`id` = `enemy`.`faction_id`
    INNER JOIN `WFlootcalc`.`enemy-loot` ON `enemy`.`id` = `enemy-loot`.`enemy_id`
    INNER JOIN `WFlootcalc`.`loot` ON `enemy-loot`.`loot_id` = `loot`.`id`;
");

$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warframe loot calculator</title>
</head>
<body>
    <h1>Warframe loot calculator</h1>
    <select name="faction">
        <option value="1">Grineer</option>
        <option value="2">Corpus</option>
        <option value="3">Infested</option>
</select>
<button type="submit">Get Loot</button>
<input type="number" name="amount" id="amount" placeholder="Amount"> <br>

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
<?php
foreach ($stmt as $row) {
    ?>
<tr>
    <td><a href="factionpage.php"><?php echo $row['faction']; ?></a></td>
    <td><a href="enemypage.php?id=<?= $row['enemy_id'] ?>"><?php echo $row['enemy']; ?></a></td>
    <td><a href="lootpage.php"><?php echo $row['loot']; ?></a></td>
    <td><?php echo $row['chance']; ?></td>
    <td><?php echo $row['amount']; ?></td>
</tr>

    <?php
}
?>
    </tbody>
</table>
</body>
</html>
