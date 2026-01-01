<?php
$host = '127.0.0.1';
$port = 3306;
$username = 'root';
$password = '';

try {
    // Connect to MySQL server (no DB selected)
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("DROP DATABASE IF EXISTS whispr_platform");
    echo "Dropped database.\n";

    $pdo->exec("CREATE DATABASE whispr_platform");
    echo "Created database.\n";

    $pdo->exec("USE whispr_platform");

    // Create migrations table manually
    $sql = "CREATE TABLE migrations (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255) NOT NULL,
        batch INT NOT NULL
    )";

    $pdo->exec($sql);
    echo "Table 'migrations' created successfully.\n";

} catch (PDOException $e) {
    echo "DB Error: " . $e->getMessage() . "\n";
}
