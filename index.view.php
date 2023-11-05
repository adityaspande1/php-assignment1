<?php
require_once 'function.php';
$pdo = connectToDb();
$statement = $pdo->prepare("SELECT * FROM user");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_CLASS, 'User');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>
        <u>User Details :</u> <br>
    </h1>
    <table border="2" cellspacing="5" cellpadding="10">
        <tr>
            <td><b>Id</b></td>
            <td><b>Name</b></td>
            <td><b>Mail</b></td>
            <td><b>Gender</b></td>
            <td><b>City</b></td>
        </tr>
        
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->mail; ?></td>
                <td><?= $user->gender; ?></td>
                <td><?= $user->city; ?></td>                
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>
