<?php

require 'function.php';

$pdo = connectToDb();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'name' => $_POST['name'],
        'mail' => $_POST['mail'],
        'gender' => $_POST['gender'],
        'city' => $_POST['city']
    ];
    insertInto($pdo, 'user', $data);
    header('Location: index.view.php'); // Redirect to the user list after form submission
    exit;
}
