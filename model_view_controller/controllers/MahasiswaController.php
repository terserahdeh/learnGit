<?php
require_once 'models/Mahasiswa.php';

class MahasiswaController {
    private $model;

    public function __construct($pdo) {
        $this->model = new Mahasiswa($pdo);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function get($nim) {
        return $this->model->getByNim($nim);
    }

    public function store($nim, $nama, $alamat) {
        return $this->model->insert($nim, $nama, $alamat);
    }

    public function update($nim, $nama, $alamat) {
        return $this->model->update($nim, $nama, $alamat);
    }

    public function delete($nim) {
        return $this->model->delete($nim);
    }
}
