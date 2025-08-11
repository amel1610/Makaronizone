<?php
session_start();
require_once("config/koneksi.php");

if (isset($_POST['add_to_cart'])) {
    $id_produk = $_POST['id_produk'];
    $gambar = $_POST['gambar'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $level = $_POST['level_pedas'];
    $jumlah = $_POST['jumlah'];


    // Cek apakah produk sudah ada di keranjang
    $select_cart = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE merk = '$merk' AND level_pedas = '$level'");

    mysqli_query($koneksi, "INSERT INTO keranjang (id_produk, gambar, merk, harga, jumlah, level_pedas) 
    VALUES ('$id_produk', '$gambar', '$merk', '$harga', '$jumlah', '$level')");
echo "<script>alert('Produk berhasil ditambahkan ke keranjang'); window.location.href='products.php';</script>";
}

// Ambil detail produk dari database berdasarkan ID (misalnya lewat URL)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");
    $produk = mysqli_fetch_assoc($query);
} else {
    echo "<script>alert('Produk tidak ditemukan'); window.location.href='products.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk - <?php echo $produk['merk']; ?></title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <img src="assets/images/produk/<?php echo $produk['gambar']; ?>" class="img-fluid" alt="<?php echo $produk['merk']; ?>">
        </div>

        <!-- Detail Produk -->
        <div class="col-md-6">
            <h2><?php echo $produk['merk']; ?></h2>
            <h4>Rp. <?php echo number_format($produk['harga'], 0, ',', '.'); ?></h4>
            <p><?php echo $produk['deskripsi']; ?></p>
           

            <form method="POST">
                <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
                <input type="hidden" name="gambar" value="<?php echo $produk['gambar']; ?>">
                <input type="hidden" name="merk" value="<?php echo $produk['merk']; ?>">
                <input type="hidden" name="harga" value="<?php echo $produk['harga']; ?>">

                <!-- Level Pedas -->
                <div class="form-group">
                    <label for="level_pedas">Level Pedas:</label>
                    <select name="level_pedas" id="level_pedas" class="form-control" required>
                        <option value="">-- Pilih Level --</option>
                        <option value="Level 1">Level 1 - Tidak Pedas</option>
                        <option value="Level 2">Level 2 - Sedang</option>
                        <option value="Level 3">Level 3 - Pedas</option>
                        <option value="Level 4">Level 4 - Sangat Pedas</option>
                    </select>
                </div>

                <!-- Jumlah -->
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" max="<?php echo $produk['stok']; ?>" value="1" required>
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" name="add_to_cart" class="btn btn-success px-4 py-2">
                        Tambah ke Keranjang
                    </button>
                    <a href="products.php" class="btn btn-outline-secondary px-4 py-2" style="margin-left: 75px;">
                        Kembali ke Produk
                    </a>
                </div>

                
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
