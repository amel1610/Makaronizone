<?php
session_start();
require_once("config/koneksi.php");

if (isset($_POST['buy_now'])) {
    $gambar = $_POST['gambar'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $jumlah = 1;

    $select_cart = mysqli_query($koneksi, "SELECT * FROM `keranjang` WHERE merk = '$merk'");

    if (mysqli_num_rows($select_cart) > 0) {
        // Jika produk sudah ada di keranjang, tampilkan alert
        echo "
        <script>
            alert('Produk sudah ada di keranjang');
            window.location.href = 'products.php'; // Sesuaikan dengan halaman produk Anda
        </script>
        ";
    } else {
        // Jika produk belum ada di keranjang, tambahkan ke keranjang
        $insert_product = mysqli_query($koneksi, "INSERT INTO `keranjang`(gambar, merk, harga, jumlah) VALUES('$gambar', '$merk', '$harga', '$jumlah')");
        
        // Tampilkan alert bahwa produk berhasil ditambahkan ke keranjang
        echo "
        <script>
            alert('Produk berhasil ditambah ke keranjang');
            window.location.href = 'products.php'; // Sesuaikan dengan halaman keranjang atau checkout Anda
        </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="id">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Makaronizone</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Makaronizone<em>STORE</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link active" href="products.php">Produk</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.php">Tentang</a>
                      <a class="dropdown-item" href="blog.php">Blog</a>
                      <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="checkout.php">Pembayaran</a></li>

                <li class="nav-item"><a class="nav-link" href="contact.php">Hubungi Kami</a></li>
<?php
                if (isset ($_SESSION['email'])) {?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="akun.php">Akun saya</a>
                      <a class="dropdown-item" href="pemesanan.php">Riwayat Pemesanan</a>
                      <a class="dropdown-item" href="logout.php">logout</a>
                    </div>
                </li>  
                <?php } else {?>
                <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>  
                <?php } ?>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/makaroni1.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Makaronizone</h4>
              <h2>Produk</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="products">
      <div class="container">
        <div class="row"> 

        <?php
        $produk = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($hasil = mysqli_fetch_array($produk)) {
            ?>
            <div class="col-md-4">
                <div class="product-item">
                    <form method="post" action="">
                        <input type="hidden" name="id_produk" value="<?php echo $hasil['id_produk']; ?>">
                        <input type="hidden" name="gambar" value="<?php echo $hasil['gambar']; ?>">
                        <input type="hidden" name="merk" value="<?php echo $hasil['merk']; ?>">
                        <input type="hidden" name="harga" value="<?php echo $hasil['harga']; ?>">

                        <a href="product-details.php?id=<?php echo $hasil['id_produk']; ?>">
                          <img src="assets/images/produk/<?php echo $hasil['gambar']; ?>">
                        </a>
                        <div class="down-content">
                          <a href="product-details.php?id=<?php echo $hasil['id_produk']; ?>">
                             <h4><?php echo $hasil['merk']; ?></h4>
                          </a>

                            <h6>
                                <small>
                                    <del>Rp. <?php echo number_format($hasil['harga_awal'], 0, ',', '.'); ?></del>
                                </small>
                                Rp. <?php echo number_format($hasil['harga'], 0, ',', '.'); ?>
                            </h6>
                            <p><?php echo $hasil['deskripsi']; ?></p>
                            <a href="product-details.php?id=<?php echo $hasil['id_produk']; ?>&action=buy_now" class="btn btn-danger">BELI SEKARANG</a>
                        </div>
                    </form>
                </div>
            </div>
       <?php
        }
        ?>


        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2023 Makaronizone - Create by:AMELIA <a href=""></a></p>
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
 