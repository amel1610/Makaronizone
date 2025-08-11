<?php
session_start();
require_once("config/koneksi.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo 'Data tidak boleh kosong';
    } else {
        $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        $result = mysqli_fetch_array($sql);

        if ($result) {
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit(); // Make sure to exit after header redirection
        } else {
            echo 'Email atau password salah. Silakan coba lagi.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="form-container">
    <form action="" method="post">
        <h3 class="title">Masuk sekarang</h3>
        <input type="email" name="email" placeholder="Silakan masukkan email Anda" class="box" required>
        <input type="password" name="password" placeholder="Silakan masukkan password Anda" class="box" required>
        <input type="submit" value="Masuk" class="form-btn" name="submit">
        <p>Belum memiliki akun? <a href="register.php">registrasi sekarang!</a></p>
    </form>
</div>

</body>
</html>
