<?php
if (isset($_POST['edit_produk'])) {
    $folder = '../assets/images/produk/';
    $name_p = $_FILES['gambar']['name'];
    $sumber_p = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($sumber_p, $folder . $name_p);
    $id_produk = $_POST['id_produk'];
    $gambar = $name_p;
    $merk = $_POST['merk'];
    $harga_awal = $_POST['harga_awal'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    if (empty($id_produk) || empty($merk) || empty($harga_awal) || empty($harga) || empty($deskripsi) || empty($status)) {
        echo '<div class="warning"> Data tidak boleh kosong </div>';
    } else {
        $edit = mysqli_query($koneksi, "UPDATE produk
            SET merk='$merk', gambar='$gambar', harga_awal='$harga_awal', harga='$harga', deskripsi='$deskripsi', status='$status'
            WHERE id_produk='$id_produk'");
        if ($edit) {
            echo '<div class="success">Produk berhasil diedit</div>';
        } else {
            echo '<div class="error">Produk gagal diedit</div>';
        }
    }
}

$id_produk = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk ='$id_produk'");
$result = mysqli_fetch_array($sql);
?>
<div class="col-lg-6">
    <form method="post" action="" enctype="multipart/form-data">
        <fieldset style="border: 1px solid orange;">
            <legend>Edit produk</legend>
            <input type="hidden" name="id_produk" class="form-control" value="<?php echo $result['id_produk'];?>">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control"> <br>
            <label>Merk</label>
            <input type="text" name="merk" placeholder="Merk" class="form-control" value="<?php echo $result['merk'];?>"> <br>
            <label>Harga Awal</label>
            <input type="text" name="harga_awal" placeholder="Harga Awal" class="form-control" value="<?php echo $result['harga_awal'];?>"> <br>
            <label>Harga Akhir</label>
            <input type="text" name="harga" placeholder="Harga" class="form-control" value="<?php echo $result['harga'];?>"> <br>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" value="<?php echo $result['deskripsi'];?>"> <br>
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="tersedia" <?php echo ($result['status'] == 'tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                <option value="dipinjam" <?php echo ($result['status'] == 'dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
            </select> <br><br>
            <input type="submit" name="edit_produk" value="Edit Produk" class="submit">
        </fieldset>
    </form>
</div>
