<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_toko = "toko";
$koneksi = mysqli_connect ($db_host, $db_user, $db_pass, $db_toko);

if (mysqli_connect_error()) {
    echo 'Gagal melakukan koneksi ke database :' .mysqli_connect_error();
}
?>