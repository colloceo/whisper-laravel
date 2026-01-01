<?php
$host = '127.0.0.1';
$port = 3306;
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS whisper");
    echo "Database 'whisper' created successfully.\n";
} catch (PDOException $e) {
    echo "DB Error: " . $e->getMessage() . "\n";
}
