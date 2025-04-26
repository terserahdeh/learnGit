<?php
$dsn = "mysql:host=localhost;dbname=tes_data_mhs;charset=utf8mb4";
$dbusername = "root"; 
$dbpassword = ""; 

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
