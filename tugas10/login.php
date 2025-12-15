<?php
require_once 'User.php';
$user = new User();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = $user->login($_POST['username'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login System</h2>

<form method="POST">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<p style="color:red"><?= $error ?></p>

</body>
</html>
