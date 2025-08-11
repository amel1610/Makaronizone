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

    <title>Makaronizone | Store Website</title>

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
          <a class="navbar-brand" href="index.php"><h2>Makaronizone <em>STORE</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
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
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01" style="background-image: url('assets/images/makaroni1.jpg'); background-size: cover; background-position: center;">
          <div class="text-content">
            <h2>Makaronizone</h2>
            <h4>Cita Rasa Pedas yang Menggugah Selera</h4>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Produk Unggulan</h2>
              <a href="products.php">Lihat selengkapnya <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="products.php"><img src="assets/images/makaroni4.jpg" alt=""></a>
              <div class="down-content">
                <a href="products.php"><h4>Makaroni Kering</h4></a>
                <p>Makaroni Kering merupakan camilan renyah berbahan dasar makaroni yang digoreng hingga kering dan dibumbui dengan berbagai varian rasa pilihan. Produk ini dirancang untuk memenuhi selera konsumen yang menyukai makanan ringan bercita rasa kuat, terutama rasa pedas yang khas. untuk melihat makaroni yang kami jual lebih lengkapnya kalian bisa klik <a href="products.php">Produk</a>. kami juga menerima requestan anda melalui kolom <a href="contact.php">Hubungi Kami.</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="products.php"><img src="assets/images/makaroni5.jpg" alt=""></a>
              <div class="down-content">
                <a href="products.php"><h4>Makaroni Basah </h4></a>
                <p>Makaroni Basah merupakan camilan kekinian berbahan dasar makaroni rebus yang disajikan dengan bumbu basah khas Nusantara. Teksturnya yang kenyal dipadukan dengan racikan bumbu pedas gurih, menjadikan produk ini favorit di berbagai kalangan, terutama pencinta rasa pedas. untuk melihat makaroni yang kami jual lebih lengkapnya kalian bisa klik <a href="products.php">Produk</a>. kami juga menerima requestan anda melalui kolom <a href="contact.php">Hubungi Kami.</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="products.php"><img src="assets/images/otak-otak.png" alt=""></a>
              <div class="down-content">
                <a href="products.php"><h4>Otak-otak</h4></a>
                <p>Otak-Otak Kering merupakan camilan gurih berbahan dasar ikan pilihan yang diproses melalui pengeringan dan penggorengan hingga menghasilkan tekstur renyah. Dibalut dengan bumbu khas Makaronizone, camilan ini menawarkan sensasi rasa gurih dan pedas yang cocok dinikmati kapan saja. untuk melihat Otak-otak yang kami jual lebih lengkapnya kalian bisa klik <a href="products.php">Produck</a>. kami juga menerima requestan anda melalui kolom <a href="contact.php">Hubungi Kami.</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="products.php"><img src="assets/images/mielidi1.png" alt=""></a>
              <div class="down-content">
                <a href="products.php"><h4>Mie lidi</h4></a>
                <p>Mie Lidi merupakan camilan legendaris khas masa sekolah yang kini hadir dengan cita rasa modern dan lebih berkualitas. Terbuat dari adonan mie pilihan yang dikeringkan dan digoreng hingga renyah, kemudian dibumbui dengan berbagai varian rasa yang menggugah selera. untuk melihat menu yang kami jual lebih lengkapnya kalian bisa klik <a href="products.php">Produk</a>. kami juga menerima requestan anda melalui kolom <a href="contact.php">Hubungi Kami.</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="products.php"><img src="assets/images/cimol1.jpg" alt=""></a>
              <div class="down-content">
                <a href="products.php"><h4>Cimol</h4></a>
                <p>Cimol adalah camilan khas Indonesia berbahan dasar tepung tapioka yang digoreng hingga garing di luar dan kenyal di dalam. Disajikan dengan taburan bumbu khas Makaronizone, cimol ini menghadirkan perpaduan rasa gurih, pedas, dan nikmat yang menggugah selera. untuk melihat Headphone yang kami jual lebih lengkapnya kalian bisa klik <a href="products.php">Produk</a>. kami juga menerima requestan anda melalui kolom <a href="contact.php">Hubungi Kami.</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="products.php"><img src="assets/images/basreng.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php?id=PR007"><h4>Basreng</h4></a>
                <p>Basreng adalah camilan khas Indonesia yang terbuat dari irisan bakso ikan berkualitas tinggi, digoreng kering hingga renyah, lalu dibalut dengan bumbu khas Makaronizone. Rasa gurih dari bakso dipadukan dengan bumbu pedas yang meresap, menciptakan sensasi camilan yang nikmat dan memuaskan. Untuk melihat Monitor yang kami jual lebih lengkapnya kalian bisa klik <a href="product-details.php?id=PR007">Produk</a>. kami juga menerima requestan anda melalui kolom <a href="contact.php">Hubungi Kami.</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Tentang</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>"Makaronizone adalah brand camilan pedas khas Indonesia yang menghadirkan berbagai produk seperti makaroni, mie lidi, basreng, dan seblak dalam kemasan modern dan higienis. Kami berkomitmen menyajikan cita rasa autentik dengan bahan berkualitas dan varian rasa yang beragam."</p>
              <a href="about-us.php" class="filled-button">Baca selengkapnya</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/makaroni1.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/bakery.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Artikel Blog Terbaru</h2>

              <a href="blog.php">Baca selengkapnya <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/makaroni4.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">5 Alasan Kenapa Camilan Pedas Selalu Jadi Favorit!</a></h4>

                <p style="margin: 0;"> admin &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2025 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/basreng.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Ngemil Pedas Bukan Sekadar Tren, Ini Manfaatnya!</a></h4>

                <p style="margin: 0;"> admin &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/makaroni5.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#">Tips Menyimpan Camilan Agar Tetap Renyah!!</a></h4>

                <p style="margin: 0;"> admin &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <a href="testimonials.php">Baca selengkapnya <i class="fa fa-angle-right"></i></a>
              <h2>Kepuasan Klien</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Hansen</h4>
                  <p class="n-m"><em>"Saya suka banget camilan dari Toko Makaroni ini! Rasa pedasnya pas, teksturnya renyah, dan anak-anak juga suka banget makaroni keju mereka. Cocok banget buat stok di rumah."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Prianda</h4>
                  <p class="n-m"><em>"Pelayanannya bagus adminnya ramah-ramah, dan juga sangat lengkap."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Revan</h4>
                  <p class="n-m"><em>"Camilan yang bikin semangat kerja! Makaroni keringnya mantap, bumbunya nempel banget dan nggak pelit rasa. Udah langganan tiap minggu beli buat di kantor."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Runa</h4>
                  <p class="n-m"><em>"Pas tugas numpuk dan begadang, cuma makaroni pedas dari toko ini yang nemenin. Enak banget, bumbunya nendang, dan harganya terjangkau buat mahasiswa kayak aku."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Prianda</h4>
                  <p class="n-m"><em>"Pesan via online, pengemasan aman, dan sampai cepat! Produknya fresh dan rasa nggak berubah meskipun pengiriman luar kota. Highly recommended banget buat yang suka cemilan pedas!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Hansen</h4>
                  <p class="n-m"><em>"Udah cobain banyak merek makaroni pedas, tapi yang satu ini beda! Pedasnya bisa disesuaikan, varian rasanya banyak, dan bumbunya nagih banget!"</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Tetap terhubung dengan kami</h4>
                  <p>Anda bisa meminta informasi produk baru, memberikan saran, dan menyampaikan masukan terkait layanan kami.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.php" class="filled-button">Hubungi Kami</a>
                </div>
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
              <p>Copyright © 2025 Makaronizone - Create by: Amelia <a href=""></a></p>
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