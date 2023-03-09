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
    SELECT `loot`.name as 'loot', `loot`.description
    FROM `WFlootcalc`.`loot`
    WHERE `loot`.id = :id;
");

$stmt->execute(['id' => $_GET['id']]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loot: <?= $_GET['id'] ?></title>

</head>
<body>
    <h1>Loot: <?= $_GET['id'] ?></h1>
        <table>
    <thead>
    <tr>
         <th>Loot Name</th>
        <th>Loot Description</th>
    </tr>
</thead>
    <tbody>
    <?php while ($row = $stmt->fetch()) : ?>
    <tr>
        <td><?= $row['loot'] ?></td>
        <td><?= $row['description'] ?></td>
    </tr>
    <?php endwhile; ?>
</tbody>

    </table>
</body>
</html>
