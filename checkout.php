<!DOCTYPE html>
<html lang="id">
<?php
session_start();
require_once("config/koneksi.php");

if (isset($_SESSION["email"])) {


  if (isset($_POST['update_update_btn'])) {
    $_SESSION['checkout_nama'] = $_POST['nama'] ?? '';
    $_SESSION['checkout_email'] = $_POST['email'] ?? '';
    $_SESSION['checkout_no_telp'] = $_POST['no_telp'] ?? '';
    $_SESSION['checkout_alamat'] = $_POST['alamat'] ?? '';
    $_SESSION['checkout_metode'] = $_POST['metode_pembayaran'] ?? '';
    $_SESSION['checkout_pesan'] = $_POST['pesan'] ?? '';
    $_SESSION['checkout_ongkir'] = $_POST['ongkir'] ?? '';
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($koneksi, "UPDATE `keranjang` SET jumlah = '$update_value' WHERE id_produk = '$update_id'");
    if ($update_quantity_query) {
      header('location:checkout.php');
    }
  }

  if (isset($_POST['delete_item'])) {
    // Simpan dulu input sebelum hapus ke session
    $_SESSION['checkout_nama'] = $_POST['nama'] ?? '';
    $_SESSION['checkout_email'] = $_POST['email'] ?? '';
    $_SESSION['checkout_no_telp'] = $_POST['no_telp'] ?? '';
    $_SESSION['checkout_alamat'] = $_POST['alamat'] ?? '';
    $_SESSION['checkout_metode'] = $_POST['metode_pembayaran'] ?? '';
    $_SESSION['checkout_pesan'] = $_POST['pesan'] ?? '';
    $_SESSION['checkout_ongkir'] = $_POST['ongkir'] ?? '';

    // Lanjut hapus produk
    $remove_id = $_POST['id_produk'];
    mysqli_query($koneksi, "DELETE FROM `keranjang` WHERE id_produk = '$remove_id'");
    header('location:checkout.php');


}


  if (isset($_GET['delete_all'])) {
    mysqli_query($koneksi, "DELETE FROM `keranjang`");
    header('location:checkout.php');
  }

 if (isset($_POST['checkout_btn'])) {
  // Validasi data form
  if (
    empty($_POST['nama']) ||
    empty($_POST['email']) ||
    empty($_POST['no_telp']) ||
    empty($_POST['alamat']) ||
    empty($_POST['metode_pembayaran']) ||
    !isset($_POST['ongkir']) || $_POST['ongkir'] === ''
  ) {
    echo "<script>alert('Harap lengkapi semua data sebelum melanjutkan pembayaran.'); window.history.back();</script>";
    exit();
  }

  // Ambil data setelah validasi
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $no_telp = $_POST['no_telp'];
  $alamat = $_POST['alamat'];
  $metode_pembayaran = $_POST['metode_pembayaran'];
  $pesan = $_POST['pesan'];
  $ongkir = $_POST['ongkir'];

  // ... lanjutkan seperti biasa


  $cart_query = mysqli_query($koneksi, "SELECT * FROM `keranjang`");
  $total_tagihan = 0;

  if (mysqli_num_rows($cart_query) > 0) {
    $merk = [];
    while ($product_item = mysqli_fetch_assoc($cart_query)) {
      $id_produk = $product_item['id_produk'];
      $jumlah = $product_item['jumlah'];
      $harga = $product_item['harga'] * $jumlah;
      $total_tagihan += $harga;

      $merk[] = $product_item['merk'] . ' (' . $jumlah . ')';

  
    }

    // Tambahkan ongkir ke total
    $total_tagihan += $ongkir;

    $jumlah_produk = implode(', ', $merk);
    $detail_query = mysqli_query($koneksi, "INSERT INTO `penjualan` (nama, email, no_telp, alamat, metode_pembayaran, pesan, ongkir, jumlah_produk, total_tagihan) 
      VALUES ('$nama','$email','$no_telp','$alamat','$metode_pembayaran','$pesan', '$ongkir', '$jumlah_produk','$total_tagihan')") or die('query failed');

    if ($cart_query && $detail_query) {
      mysqli_query($koneksi, "DELETE FROM `keranjang`");
      unset($_SESSION['checkout_nama']);
      unset($_SESSION['checkout_email']);
      unset($_SESSION['checkout_no_telp']);
      unset($_SESSION['checkout_alamat']);
      unset($_SESSION['checkout_metode']);
      unset($_SESSION['checkout_pesan']);
      unset($_SESSION['checkout_ongkir']);

      $payment_message = ($metode_pembayaran == 'cod') ? '(*bayar saat produk sampai*)' : 'segera selesaikan pembayaran';

      echo "
      <div class='order-message-container'>
          <div class='message-container'>
              <h3>Terima kasih telah berbelanja!</h3>
              <div class='order-detail'>
                  <span>" . $jumlah_produk . "</span>
                  <span class='total'> Tagihan : Rp." . number_format($total_tagihan, 0, ',', '.') . "</span>
              </div>
              <div class='customer-details'>
                  <p> Nama : <span>" . $nama . "</span> </p>
                  <p> No. Telp : <span>" . $no_telp . "</span> </p>
                  <p> Email : <span>" . $email . "</span> </p>
                  <p> Alamat : <span>" . $alamat . "</span> </p>
                  <p> Metode Pembayaran : <span>" . $metode_pembayaran . "</span> </p>
                  <p> Ongkos Kirim : <span>Rp." . number_format($ongkir, 0, ',', '.') . "</span> </p>
                  <p>($payment_message)</p>
              </div>
              <a href='pemesanan.php' class='btn'>Selesaikan Pembayaran</a>
          </div>
      </div>
      ";
    }
  } else {
    echo "<script>alert('Keranjang kosong. Silakan tambahkan produk terlebih dahulu.');</script>";
  }
}



  ?>



  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
      rel="stylesheet">

    <title>Makaronizone</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
    <link rel="stylesheet" href="assets/css/order.css">


  <body>
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <h2>Makaronizone <em>STORE</em></h2>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Beranda
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item"><a class="nav-link" href="products.php">Produk</a></li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                  aria-expanded="false">Lainnya</a>

                <div class="dropdown-menu">
                  <a class="dropdown-item" href="about-us.php">Tentang</a>
                  <a class="dropdown-item" href="blog.php">Blog</a>
                  <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                </div>
              </li>

              <li class="nav-item"><a class="nav-link active" href="checkout.php">Pembayaran</a></li>

              <li class="nav-item"><a class="nav-link" href="contact.php">Hubungi Kami</a></li>
              <?php
              if (isset($_SESSION['email'])) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Akun</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="akun.php">Akun saya</a>
                    <a class="dropdown-item" href="pemesanan.php">Riwayat Pemesanan</a>
                    <a class="dropdown-item" href="logout.php">logout</a>
                  </div>
                </li>
              <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>
              <?php } ?>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
      style="background-image: url(assets/images/makaroni1.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Makaronizone</h4>
              <h2>Pembayaran</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form action="checkout.php" method="post">

      <div class="products call-to-action">
        <div class="inner-content">
          <div class="contact-form">
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['checkout_nama'] ?? ''; ?>">
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Email :</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['checkout_email'] ?? ''; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">No.Telepon:</label>
                  <input type="varchar" name="no_telp" class="form-control" value="<?php echo $_SESSION['checkout_no_telp'] ?? ''; ?>">
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $_SESSION['checkout_alamat'] ?? ''; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Metode Pembayaran</label>
                  <select class="form-control" name="metode_pembayaran">
                    <option value="cod" <?= (($_SESSION['checkout_metode'] ?? '') == 'cod') ? 'selected' : '' ?>>-- COD --</option>
                    <option value="dana" <?= (($_SESSION['checkout_metode'] ?? '') == 'dana') ? 'selected' : '' ?>>-- DANA --</option>
                    <option value="transferbank" <?= (($_SESSION['checkout_metode'] ?? '') == 'transferbank') ? 'selected' : '' ?>>-- Transfer Bank --</option>
                  </select>

                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Pesan untuk Penjual</label>
                  <input type="text" name="pesan" class="form-control" value="<?php echo $_SESSION['checkout_pesan'] ?? ''; ?>">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Ongkos Kirim</label>
                  <select class="form-control" name="ongkir">
                    <option value="0" <?= (($_SESSION['checkout_ongkir'] ?? '') == '0') ? 'selected' : '' ?>>Pulau Jawa = Gratis Ongkir</option>
                    <option value="40000" <?= (($_SESSION['checkout_ongkir'] ?? '') == '40000') ? 'selected' : '' ?>>Pulau Sumatera = 40.000</option>
                    <option value="60000" <?= (($_SESSION['checkout_ongkir'] ?? '') == '60000') ? 'selected' : '' ?>>Pulau Kalimantan & Sulawesi = 60.000</option>
                    <option value="20000" <?= (($_SESSION['checkout_ongkir'] ?? '') == '20000') ? 'selected' : '' ?>>Pulau Bali = 20.000</option>
                    <option value="80000" <?= (($_SESSION['checkout_ongkir'] ?? '') == '80000') ? 'selected' : '' ?>>Pulau Papua = 80.000</option>
                  </select>
          </div>
        </div>
      </div>


      <!---table keranjang----->
    <section class="cart table">
      <div class="inner cart">
        <form action="">
          <h1>keranjang belanja</h1>
          <br>
          <table>
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang");
              $total_tagihan = 0; // Initialize total price variable
            
              if (mysqli_num_rows($keranjang) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($keranjang)) {
                  ?>
              <input type="hidden" name="id_produk" value="<?php echo $fetch_cart['id_produk']; ?>">
              <input type="hidden" name="gambar" value="<?php echo $fetch_cart['gambar']; ?>">
              <input type="hidden" name="merk" value="<?php echo $fetch_cart['merk']; ?>">
              <input type="hidden" name="jumlah" value="<?php echo $fetch_cart['jumlah']; ?>">
              <input type="hidden" name="harga" value="<?php echo $fetch_cart['harga']; ?>">
              <input type="hidden" name="total_tagihan" value="<?php echo $fetch_cart['total_tagihan']; ?>">
              
              <tr>
                <form method="post" action="checkout.php">
                  <td><img class="product-image" src="assets/images/produk/<?php echo $fetch_cart['gambar']; ?>"></td>
                  <td>
                    <?php echo $fetch_cart['merk']; ?>
                  </td>
                  <td>Rp.
                    <?php echo number_format($fetch_cart['harga'], 0, ',', '.'); ?>
                  </td>
                  <td>
                    <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id_produk']; ?>">
                    <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['jumlah']; ?>">
                    <input type="submit" value="update" class="btn btn-danger" name="update_update_btn">
                  </td>
                </form>
                <td>Rp.
                  <?php echo $sub_total = number_format($fetch_cart['harga'] * $fetch_cart['jumlah'], 0, ',', '.'); ?>
                </td>
                <td>
                    <form method="post" action="checkout.php" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                      <input type="hidden" name="id_produk" value="<?php echo $fetch_cart['id_produk']; ?>">
  
                <!-- Tambahkan semua input dari form checkout -->
                      <input type="hidden" name="nama" value="<?php echo $_POST['nama'] ?? ($_SESSION['checkout_nama'] ?? ''); ?>">
                      <input type="hidden" name="email" value="<?php echo $_POST['email'] ?? ($_SESSION['checkout_email'] ?? ''); ?>">
                      <input type="hidden" name="no_telp" value="<?php echo $_POST['no_telp'] ?? ($_SESSION['checkout_no_telp'] ?? ''); ?>">
                      <input type="hidden" name="alamat" value="<?php echo $_POST['alamat'] ?? ($_SESSION['checkout_alamat'] ?? ''); ?>">
                      <input type="hidden" name="metode_pembayaran" value="<?php echo $_POST['metode_pembayaran'] ?? ($_SESSION['checkout_metode'] ?? ''); ?>">
                      <input type="hidden" name="pesan" value="<?php echo $_POST['pesan'] ?? ($_SESSION['checkout_pesan'] ?? ''); ?>">
                      <input type="hidden" name="ongkir" value="<?php echo $_POST['ongkir'] ?? ($_SESSION['checkout_ongkir'] ?? ''); ?>">
                    <button type="submit" class="btn btn-danger" name="delete_item">Hapus</button>
                    </form>


              </tr>
              </tr>
              <?php
              $total_tagihan += ($fetch_cart['harga'] * $fetch_cart['jumlah']);
              
                }
                ;
              }
              ;
              
              ?>
              <tr class="table-bottom">
                <td><a href="products.php" class="option-btn" style="margin-top: 0;">Lanjut Belanja</a></td>
                <td colspan="3">Total Tagihan</td>
                <td>Rp.
                  <?php echo number_format($total_tagihan, 0, ',', '.'); ?>
                </td>
                <td><a href="checkout.php?delete_all" onclick="return confirm('Apakah Anda yakin ingin menghapus semuanya??');"
                    class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus semua </a></td>
              </tr>
            </tbody>
          </table>

          <!-- Display total price -->
            <div class="checkout-btn">
              <button type="submit" name="checkout_btn"
                class="btn btn-danger <?= ($total_tagihan > 1) ? '' : 'disabled'; ?>">Pembayaran</button>
            </div>

        </div>
    </form>
    </div>
    </section>

    </form>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2025 Makaronizone - Create by: AP <a href=""></a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>

  </body>

  </html>
<?php
} else { ?>
  <script>
    alert("Harap LOGIN terlebih dahulu");
    window.location.href = 'index.php';
  </script>
<?php }
?> 