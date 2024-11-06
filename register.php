<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Cek apakah nama atau email sudah ada
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE nama = :nama OR email = :email");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "Nama atau email sudah digunakan. Silakan coba yang lain.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
        } else {
            echo "Gagal melakukan registrasi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form method="POST" action="register.php">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>

</html>