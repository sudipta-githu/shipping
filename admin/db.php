<?php
// Load DB credentials from external JSON file
$configPath = __DIR__ . '/db_config.json'; // Adjust path if needed
if (!file_exists($configPath)) {
    die("Database config file not found.");
}
$dbConfig = json_decode(file_get_contents($configPath), true);

// Assign credentials
$hostname = $dbConfig['hostname'];
$username = $dbConfig['username'];
$password = $dbConfig['password'];
$database = $dbConfig['database'];

try {
    // Connect to database using PDO
    $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $pdo->prepare("SELECT * FROM `company` where `id` = 1");
$query->execute();
$company_info = $query->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>