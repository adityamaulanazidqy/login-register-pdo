<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE nama = :nama");
    $stmt->bindParam(':nama', $nama);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        header("Location: welcome.php");
        exit();
    } else {
        echo "Nama atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>