<?php
if(isset($_POST['submit_anggota'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($id) || empty($nama) || empty($gender) || empty($email) || empty($password)){   
        echo '<div class="warning">Data tidak boleh kosong</div>';
    } else {
        $insert = mysqli_query($koneksi,
            "INSERT INTO users(id, nama, gender, email, password)
            VALUES ('$id', '$nama', '$gender', '$email', '$password')");
         if ($insert){
             echo '<div class="success">Anggota berhasil disimpan</div>';
        } else {
            echo '<div class="error">Anggota gagal disimpan</div>';
        }
}
}
?>
<div class="col-lg-12">
<section class="panel">
    <h2 align="center">Halaman Tambah Anggota</h2>
    <a href="index.php?page=anggota">Kembali ke Anggota Management</a>
    <form method="post" action="">
        <input type="text" name="id" placeholder="ID anggota" class="form-control"> <br>
        <input type="text" name="nama" placeholder="Nama anggota" class="form-control"> <br>
        <select name="gender" aria-placeholder="Gender" class="form-control">
            <option value="aktif">Pria</option>
            <option value="nonaktif">Wanita</option>
        </select><br>
        <input type="text" name="email" placeholder="email" class="form-control"> <br>
        <input type="text" name="password" placeholder="password" class="form-control"> <br>
        <input type="submit" name="submit_anggota" value="Tambah anggota" class="submit">
    </form>
</section>
</div>