<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $alamat = $_POST["alamat"];

    try {
        require_once 'dbInc.php';

        $query = "INSERT INTO data_mhs (nim, nama, alamat) VALUES (?, ?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$nim, $nama, $alamat]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
