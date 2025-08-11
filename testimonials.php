<!DOCTYPE html>
<html lang="id">
<?php
	session_start();
	require_once("config/koneksi.php");
?>

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
          <a class="navbar-brand" href="index.php"><h2> Makaronizone <em>STORE</em></h2></a>
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

                <li class="nav-item"><a class="nav-link" href="products.php">Produk</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.php">Tentang</a>
                      <a class="dropdown-item" href="blog.php">Blog</a>
                      <a class="dropdown-item active" href="testimonials.php">Testimoni</a>
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
              <h2>Testimoni</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="services section-background">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Hansen</h4>
                <p class="n-m"><em>"Saya suka banget camilan dari Toko Makaroni ini! Rasa pedasnya pas, teksturnya renyah, dan anak-anak juga suka banget makaroni keju mereka. Cocok banget buat stok di rumah."</em></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Bang jali</h4>
                <p class="n-m"><em>"Camilan yang bikin semangat kerja! Makaroni keringnya mantap, bumbunya nempel banget dan nggak pelit rasa. Udah langganan tiap minggu beli buat di kantor."</em></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Revan</h4>
                <p class="n-m"><em>"Pas tugas numpuk dan begadang, cuma makaroni pedas dari toko ini yang nemenin. Enak banget, bumbunya nendang, dan harganya terjangkau buat mahasiswa kayak aku."</em></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Hansen</h4>
                <p class="n-m"><em>"Pesan via online, pengemasan aman, dan sampai cepat! Produknya fresh dan rasa nggak berubah meskipun pengiriman luar kota. Highly recommended banget buat yang suka cemilan pedas!"</em></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Runa</h4>
                <p class="n-m"><em>"Udah cobain banyak merek makaroni pedas, tapi yang satu ini beda! Pedasnya bisa disesuaikan, varian rasanya banyak, dan bumbunya nagih banget!"</em></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Antony Davis</h4>
                <p class="n-m"><em>"Saya suka banget camilan dari Toko Makaroni ini! Rasa pedasnya pas, teksturnya renyah, dan anak-anak juga suka banget makaroni keju mereka. Cocok banget buat stok di rumah."</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2025 Makaronizone - Create by: <a href=""></a></p>
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
