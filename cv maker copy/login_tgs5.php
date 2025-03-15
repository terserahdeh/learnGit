<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $domain = substr(strrchr($email, "@"), 1);
    if ($password === $domain) {
        $_SESSION['email'] = $email;
        header('Location: personal_detail2.php');
        exit();
    } else {
        $error = "Email atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
            <form method="POST">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <button type="submit">Login</button>
                <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            </form>
        </div>
    </div>
</body>
</html>
