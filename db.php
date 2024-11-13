<?php
$host = 'localhost'; // Database host
$dbname = 'survey_db'; // Database name
$username = 'root'; // Database username (change to your username)
$password = ''; // Database password (change to your password)

try {
    // Create a PDO instance for database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>
