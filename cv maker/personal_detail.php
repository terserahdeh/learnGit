<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $formatted_date = date("d-m-Y", strtotime($tanggal_lahir));
    
    $highschool_name = $_POST['highschool_name'];
    $highschool_start = $_POST['highschool_start'];
    $highschool_end = $_POST['highschool_end'];
    
    $university_name = $_POST['university_name'] ?? '';
    $major = $_POST['major'] ?? '';
    $university_start = $_POST['university_start'] ?? '';
    $university_end = $_POST['university_end'] ?? '';
    
    $_SESSION['cv_data'] = [
        'nama' => $nama,
        'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $formatted_date,
        'highschool' => [
            'name' => $highschool_name,
            'start' => $highschool_start,
            'end' => $highschool_end
        ],
        'university' => !empty($university_name) ? [
            'name' => $university_name,
            'major' => $major,
            'start' => $university_start,
            'end' => $university_end
        ] : null
    ];
    
    header('Location: cv.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri</title>
    <link rel="stylesheet" href="pdstyle.css">
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <div class="form-group">
                <label for="nama" class="required">Nama</label>
                <input type="text" name="nama" id="nama" required placeholder="Nama Lengkap">

            </div>
            <div class="form-group">
                <label for="tempat_lahir" class="required">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" required placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
            </div>
            
            <h3 style = "color : #7A73D1;">SMA</h3>
            <div class="form-group">
                <label for="highschool_name" class="required">Nama Institusi</label>
                <input type="text" name="highschool_name" id="highschool_name" required>
            </div>
            <div class="form-group">
                <label for="highschool_start" class="required">Tahun Masuk</label>
                <input type="number" name="highschool_start" id="highschool_start" required>
            </div>
            <div class="form-group">
                <label for="highschool_end" class="required">Tahun Lulus (atau kemungkinan)</label>
                <input type="number" name="highschool_end" id="highschool_end" required>
            </div>
            
            <h3 style ="color : #7A73D1;">Universitas</h3>
            <div class="form-group">
                <label for="university_name">Nama Institusi</label>
                <input type="text" name="university_name" id="university_name">
            </div>
            <div class="form-group">
                <label for="major">Jurusan</label>
                <input type="text" name="major" id="major">
            </div>
            <div class="form-group">
                <label for="university_start">Tahun Masuk</label>
                <input type="number" name="university_start" id="university_start">
            </div>
            <div class="form-group">
                <label for="university_end">Tahun Lulus (atau kemungkinan)</label>
                <input type="number" name="university_end" id="university_end">
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
