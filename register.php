<?php
session_start();
require_once("config/koneksi.php");

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    // Check if the email is already in use
    $check_email_query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_email_query) > 0) {
        echo 'Email is already in use. Please choose another email.';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO users (nama, email, gender, password) VALUES ('$nama', '$email', '$gender', '$password')");
        
        if (empty($nama) || empty($email) || empty($gender) || empty($password)) {
            echo 'Data tidak boleh kosong';
        } 
       elseif ($insert) {
    echo "<script>alert('Register berhasil! Silakan login.'); window.location.href='login.php';</script>";
    exit;

        } 
        else {
            echo 'Data gagal disimpan';
        }
    }
}
?>

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
      <h3 class="title">Registrasi Sekarang</h3>
      <input type="email" name="email" placeholder="Silakan masukkan email Anda" class="box" required>
      <input type="text" name="nama" placeholder="Silakan masukkan nama Anda" class="box" required>
     <select name="gender" class="box" required>
  <option value="" disabled selected>pilih jenis kelamin</option>
  <option value="Laki-lakI">Laki-laki</option>
  <option value="Perempuan">Perempuan</option>
</select>

      <input type="password" name="password" placeholder="Silakan masukkan password Anda" class="box" required>
      <input type="submit" value="Registrasi sekarang" class="form-btn" name="submit">
      <p>Sudah memiliki akun? <a href="login.php">Masuk sekarang!</a></p>
   </form>

</div>

</body>
</html>
