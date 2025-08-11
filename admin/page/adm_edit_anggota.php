<?php
if (isset($_POST['edit_anggota'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender']; // Change to gender
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($id) || empty($nama) || empty($gender) || empty($email) || empty($password)) {
        echo '<div class="warning"> Data tidak boleh kosong </div>';
    } else {
        $edit = mysqli_query($koneksi, "UPDATE users
        SET nama='$nama', gender='$gender', email='$email', password='$password'
        WHERE id='$id'");
    if ($edit) {
        echo '<div class="success">Anggota berhasil diedit</div>';
    } else {
        echo '<div class="error">Anggota gagal diedit</div>';
    }
}
}

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM users WHERE id ='$id'");
$result = mysqli_fetch_array($sql);
?>
<div class="col-lg-6">
    <form method="post" action="">
        <fieldset style="border: 1px solid orange;">
            <legend>Id Anggota</legend>
            <input type="hidden" name="id" class="form-control" value="<?php echo $result['id']; ?>">
            <label>Nama Anggota</label>
            <input type="text" name="nama" placeholder="Nama Anggota" class="form-control" value="<?php echo $result['nama']; ?>"> <br>
            <label>Gender</label>
            <select name="gender" class="form-control"> <!-- Change to gender -->
                <option value="Pria" <?php if ($result['gender'] == 'Pria') echo 'selected'; ?>>Pria</option>
                <option value="Wanita" <?php if ($result['gender'] == 'Wanita') echo 'selected'; ?>>Wanita</option>
            </select> <br>
            <label>Email</label>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $result['email']; ?>"> <br>
            <label>Password</label>
            <input type="text" name="password" placeholder="Password" class="form-control" value="<?php echo $result['password']; ?>"> <br>
            <input type="submit" name="edit_anggota" value="edit_anggota" class="submit">
        </fieldset>
    </form>
</div>
