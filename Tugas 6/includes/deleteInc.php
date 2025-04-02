<?php
require_once 'dbInc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];

    try {
        $query = "DELETE FROM data_mhs WHERE nim = :nim";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->execute();

        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        die("Error deleting record: " . $e->getMessage());
    }
} else {
    // Redirect if no POST data
    header("Location: ../index.php");
    exit();
}
