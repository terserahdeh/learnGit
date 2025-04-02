<?php
require_once 'includes/dbInc.php';

$query = "SELECT nim, nama, alamat FROM data_mhs ORDER BY nim ASC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        table {
            table-layout: fixed;
            width: max-content;
        }

        th {
            text-align: left;
        }

        td {
            white-space: nowrap; 
        }

        th:nth-child(1), td:nth-child(1) {
            width: 15%; 
        }

        th:nth-child(2), td:nth-child(2) {
            width: auto;
            padding-right: 10px;
        }

        th:nth-child(3), td:nth-child(3), th:nth-child(4), td:nth-child(4) {
            text-align: center;
            width: 2%;
        }

        form.insert-form {
            display: block;
            margin-bottom: 20px;
        }

        form.insert-form label,
        form.insert-form input {
            display: inline-block;
            margin-bottom: 8px; 
        }

        form.insert-form label {
            width: 100px;
            margin-right: 10px; 
        }

        form.insert-form input {
            width: 300px;
        }

        form.insert-form button {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h3>Data Mahasiswa</h3>
    <form action = "includes/formhandlerInc.php" method = "post" class="insert-form">
        <label for="nama">Nama</label>
        <input type = "text" name = "nama" placeholder = "John Doe"><br>
        <label for="nim">NIM</label>
        <input type = "text" name = "nim" placeholder = "245150400111233"><br>
        <label for="alamat">Alamat</label>
        <input type = "text" name = "alamat" placeholder = "Jl. Merpati Putih No.20, Makmur, Sukses, Jakarta"><br>
        <button type = "submit" name="submit">Submit</button>
    </form>

    <hr>

    <h3>Daftar Mahasiswa</h3>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= htmlspecialchars($student['nim']); ?></td>
            <td><?= htmlspecialchars($student['nama']); ?></td>

            <!-- Update -->
            <td>
                <form action="" method="post">
                    <input type="hidden" name="nim" value="<?= $student['nim']; ?>">
                    <button type="submit" name="update">Update</button>
                </form>
            </td>
            <!-- Delete -->
            <td>
                <form action="includes/deleteInc.php" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <input type="hidden" name="nim" value="<?= $student['nim']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>

        <?php if (isset($_POST['update']) && $_POST['nim'] == $student['nim']): ?>
        <form action="includes/updateInc.php" method="post">
            <input type="hidden" name="nim" value="<?= $student['nim']; ?>">
            <tr>
                <td colspan="3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($student['nama']); ?>"><br>

                    <label for="nim">NIM</label>
                    <input type="text" name="nim" value="<?= htmlspecialchars($student['nim']); ?>"><br>

                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" value="<?= htmlspecialchars($student['alamat']); ?>"><br>

                    <button type="submit">Save</button>
                </td>
            </tr>
        </form>
        <?php endif; ?>

        <?php endforeach; ?>
    </table>
</body>
</html>