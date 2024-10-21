<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=manage;charset=utf8mb4', 'manage', 'manage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    exit;
}

return $pdo;