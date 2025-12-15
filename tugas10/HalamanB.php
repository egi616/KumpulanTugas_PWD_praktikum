<?php
session_start();

if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman B</title>
</head>
<body>
    <p>Selamat datang <?= $_SESSION['username']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
