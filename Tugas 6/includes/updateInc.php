<?php
require_once 'dbInc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    try {
        $query = "UPDATE data_mhs SET nama = :nama, nim = :nim, alamat = :alamat WHERE nim = :nim";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->execute();

        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        die("Error updating record: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
