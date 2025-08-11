<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Makaronizone</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background-color: #f5f6fa;
        }

        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .login-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-box h3 {
            margin-bottom: 25px;
        }

        .form-control {
            height: 45px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="login-box">
            <h3 class="text-center">Login Admin</h3>

            <?php
            session_start();
            require_once("config/koneksi.php");

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
                $cek = mysqli_num_rows($query);

                if ($cek > 0) {
                    $_SESSION['admin'] = $email;
                    header("Location: index.php");
                    exit;
                } else {
                    echo '<div class="alert alert-danger text-center">Email atau password salah!</div>';
                }
            }
            ?>

            <form method="POST">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
