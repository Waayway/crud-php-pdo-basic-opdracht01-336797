<?php

require 'config.php';
require 'tables.php';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);

    if ($pdo) {
        $connected = true;
    } else {
        $connected = false;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
createTables($pdo);