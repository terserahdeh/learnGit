<?php
session_start();
if (!isset($_SESSION['cv_data'])) {
    header('Location: form.php'); // Redirect to form if no data
    exit();
}
$cv_data = $_SESSION['cv_data'];
$email = $_SESSION['email'];
$photoPath = $_SESSION['cv_data']['photo'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CV</title>
    <link rel="stylesheet" href="cvstyle.css">
</head>
<body>
    <div class="cv-wrapper">
        <h1 class="cv-title">Curriculum Vitae</h1> <!-- Now Centered Above the Container -->
        <div class="cv-container">
            <?php if (!empty($photoPath)): ?>
                <img src="<?php echo htmlspecialchars($photoPath); ?>" alt="Uploaded Photo" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">
            <?php else: ?>
                <p>No photo uploaded.</p>
            <?php endif; ?>
            <h1><?php echo htmlspecialchars($cv_data['nama']); ?></h1>
            <p><?php echo htmlspecialchars($email)?>
            <p><?php echo htmlspecialchars($cv_data['tempat_lahir']) . ', ' . htmlspecialchars($cv_data['tanggal_lahir']); ?></p>
            
            <div class="cv-section">
                <h3>🎓 Education</h3>
                <p><strong>High School:</strong> <?php echo htmlspecialchars($cv_data['highschool']['name']); ?> (<?php echo htmlspecialchars($cv_data['highschool']['start']) . ' - ' . htmlspecialchars($cv_data['highschool']['end']); ?>)</p>

                <?php if ($cv_data['university']): ?>
                    <p><strong>University:</strong> <?php echo htmlspecialchars($cv_data['university']['major']); ?> - <?php echo htmlspecialchars($cv_data['university']['name']); ?> (<?php echo htmlspecialchars($cv_data['university']['start']) . ' - ' . htmlspecialchars($cv_data['university']['end']); ?>)</p>
                <?php endif; ?>
            </div>
            
            <a href="personal_detail2.php" class="button">Edit CV</a>
        </div>
        <a href="logout2.php" class="logout-button">Logout</a>
    </div>
</body>
</html>