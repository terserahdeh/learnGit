<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
require_once 'includes/dbInc.php';
require_once 'controllers/MahasiswaController.php';

$controller = new MahasiswaController($pdo);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->store($_POST['nim'], $_POST['nama'], $_POST['alamat']);
    } elseif (isset($_POST['update'])) {
        $controller->update($_POST['nim'], $_POST['nama'], $_POST['alamat']);
    }
    header("Location: index.php");
    exit;
}

// Handle delete
if (isset($_GET['delete'])) {
    $controller->delete($_GET['delete']);
    header("Location: index.php");
    exit;
}

// Handle edit
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $controller->get($_GET['edit']);
}

$mahasiswa = $controller->index();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        input { display: block; margin-bottom: 8px; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <?php require 'views/mahasiswaForm.php'; ?>
    <?php require 'views/mahasiswaList.php'; ?>
</body>
</html>


