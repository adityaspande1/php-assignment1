<?php

class User {
    public int $id;
    public string $name;
    public string $mail;
    public string $city;
    public string $gender;
}

function connectToDb() {
    try {
        $pdo = new PDO(
            'mysql:host=127.0.0.1;port=3306;dbname=Users',
            'root',
            ''
        );

        return $pdo;
    } catch (Exception $e) {
        die("Connection to Database Failed"); // Terminating script execution on connection failure
    }
}

function selectAll(PDO $pdo, string $table, string $class) {
    $statement = $pdo->prepare("SELECT * FROM $table ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, $class); // Return the result
}

function insertInto(PDO $pdo, string $table, array $data) {
    $fields = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));

    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    $statement = $pdo->prepare($sql);

    foreach ($data as $field => $value) {
        $statement->bindValue(":$field", $value);
    }

    $statement->execute();
}
