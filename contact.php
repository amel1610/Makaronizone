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
          <a class="navbar-brand" href="index.php"><h2>Makaronizone <em>STORE</em></h2></a>
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
                      <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="checkout.php">Pembayaran</a></li>

                <li class="nav-item"><a class="nav-link active" href="contact.php">Hubungi Kami</a></li>
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
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/makaroni1.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Makaronizone</h4>
              <h2>Hubungi Kami</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Lokasi Kami</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2705363050014!2d106.88601477584458!3d-6.228493093762385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4eba2c078a3%3A0x3e10b38445474a73!2sUniversitas%20BSI%20Kampus%20Pemuda!5e0!3m2!1sid!2sid!4v1720075919457!5m2!1sid!2sid" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>Tentang Toko Kami</h4>
              <p>Kami memiliki toko offline yang berada di kota Jakarta Timur, DKI Jakarta. jika kalian ingin mengunjunginya kalian basa datang ke alamat berikut :<br><br>Rawamangun, Jakarta Timur, DKI Jakarta, Indonesia.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

        <?php
        if (isset($_POST['kirim_pesan'])) {
            $email = $_POST['email'];
            $nama = $_POST['nama'];
            $pesan = $_POST['pesan'];
            if (empty($email) || empty($nama)) {
                echo '<div class="waning">Data tidak boleh kosong</div>';
            }else{
                $insert = mysqli_query($koneksi,
                "INSERT INTO kontak (email,nama,pesan)
                VALUES('$email','$nama','$pesan')");
                if ($insert) {
                    echo'<div class = "succes"> pesan berhasil disimpan</div>';
                } else {
                    echo '<div class="error">pesan gagal disimpan</div>';
                }
            }
        }
        ?>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Kirim Pesan</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="nama" type="text" class="form-control" id="nama" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="pesan" rows="6" class="form-control" id="pesan" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="kirim_pesan" id="form-submit" class="filled-button">Kirim</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/images/team.jpg" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;">Amelia Putri</h5>
            <h6 class="text-center" style="margin-top: 15px;">Admin</h6>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2023 Makaronizone - Template by: <a href=""></a></p>
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
