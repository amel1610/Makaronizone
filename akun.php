<!DOCTYPE html>
<html lang="id">
<?php
session_start();
require_once("config/koneksi.php");

if (isset($_SESSION["email"])) {



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

    <style>
        .container-users {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: auto;
        }

        h3 {
            text-align: center;
            color: #333;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        p {
            margin: 8px 0;
            font-size: 16px;
            color: #555;
        }

        .user-info p:nth-child(even) {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 8px;
        }
    </style>

</head>

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
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Lainnya</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about-us.php">Tentang</a>
                                <a class="dropdown-item" href="blog.php">Blog</a>
                                <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                            </div>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="checkout.php">Pembayaran</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact.php">Hubungi Kami</a></li>
                        <?php
                        if (isset($_SESSION['email'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Akun</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item active" href="akun.php">Akun saya</a>
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

    <!-----etok------>
    <br><br><br><br>
    <div class="container-users">
        <h3>Akun saya</h3>
        <div class="user-info">
            <?php 
            $sql = mysqli_query ($koneksi, "SELECT * FROM users WHERE email = '{$_SESSION['email']}'");
            if ($sql) {
                while ($result = mysqli_fetch_array($sql)){
            ?>
                    <p>ID: <?php echo $result['id'];?></p>
                    <p>Nama: <?php echo $result['nama'];?></p>
                    <p>Email: <?php echo $result['email'];?></p>
                    <p>Gender: <?php echo $result['gender'];?></p>
                    <p>Password: <?php echo $result['password'];?></p>
                <?php
                }
            }
            ?>
        </div>
    </div>

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
<?php
}
?>
