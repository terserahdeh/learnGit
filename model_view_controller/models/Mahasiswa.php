<?php

class Mahasiswa {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM data_mhs ORDER BY nim ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNim($nim) {
        $stmt = $this->pdo->prepare("SELECT * FROM data_mhs WHERE nim = ?");
        $stmt->execute([$nim]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nim, $nama, $alamat) {
        $stmt = $this->pdo->prepare("INSERT INTO data_mhs (nim, nama, alamat) VALUES (?, ?, ?)");
        return $stmt->execute([$nim, $nama, $alamat]);
    }

    public function update($nim, $nama, $alamat) {
        $stmt = $this->pdo->prepare("UPDATE data_mhs SET nama = ?, alamat = ? WHERE nim = ?");
        return $stmt->execute([$nama, $alamat, $nim]);
    }

    public function delete($nim) {
        $stmt = $this->pdo->prepare("DELETE FROM data_mhs WHERE nim = ?");
        return $stmt->execute([$nim]);
    }
}
