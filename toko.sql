-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2025 at 02:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_produk` varchar(5) NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_produk`, `gambar`, `merk`, `harga`, `jumlah`) VALUES
(123, 'ky1.jpg', 'Rexus Keyboard Mechanical Daxa M64 Ultimate', 799999, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `nama` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pesan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`nama`, `email`, `pesan`) VALUES
('agil petir', 'agil123@gmail.com', 'bang request mouse ajjaz 02'),
('Agil petir', 'agilpetirbanget@gmail.com', 'bang request mouse gaming 300 ribuan dong bang');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` bigint NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `metode_pembayaran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pesan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ongkir` int NOT NULL,
  `jumlah_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `total_tagihan` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bukti_transfer` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Verifikasi Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `nama`, `email`, `no_telp`, `alamat`, `metode_pembayaran`, `pesan`, `ongkir`, `jumlah_produk`, `total_tagihan`, `date`, `bukti_transfer`, `status`) VALUES
(19, 'hansen', 'hansen211@gmail.com', 2147483647, 'mencirimm', 'cod', 'agak cepat ngirimnya abngkuu', 40000, 'Rexus Keyboard Mechanical Daxa M64 Ultimate (1), Monitor Gaming MSI OPTIX G24C4 24 (1)', 2378999, '2023-12-14 13:48:45', 'barbuk.jpg', 'Pesanan Berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `gambar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_produk` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_awal` int NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`gambar`, `id_produk`, `merk`, `harga_awal`, `harga`, `deskripsi`, `status`) VALUES
('ky1.jpg', 'PR001', 'Rexus Keyboard Mechanical Daxa M64 Ultimate', 999999, 799999, 'Dilengkapi 2 merk switch, keyboard ini hadir dengan teknologi Hotswappable.', 'tersedia'),
('cc1.jpg', 'PR003', 'FANTECH Coiled Cable Type C Aviator  ', 399000, 100000, 'Kabel AC701 dilengkapi desain Double Sleeved & Reversed Coil, terdiri dari PET mesh , menjaga coil cable agar awet dan tahan lama. Reversed coilnya mencegah kabel cepat merenggang,.', 'tersedia'),
('ms1.jpg', 'PR004', 'Mouse Gaming Rexus Arka II Dual Connection RX-107', 499999, 300000, 'Mouse ini mengusung Teknologi Dual Connection praktis, Desain Ambidextrous  dan Tombol Huano 20M Lifespan. Dengan DPI lengkap dan pengaturan mudah, serta baterai tanam kapasitas besar.', 'tersedia'),
('pr5.jpg', 'PR005', 'Monitor Gaming MSI OPTIX G24C4 24', 2000000, 1499000, 'Monitor ini hadir dengan panel berukuran 23.6\" (60cm) dan resolusi 1920 x 1080 (FHD). Dengan refresh rate 144Hz dan response time 1ms, menggunakan panel Samsung VA. ', 'tersedia'),
('dxmt.jpg', 'PR006', 'LIQUID Series Gaming Deskmat by Press Play', 249000, 149000, 'Matras ini terbuat dari bahan Neoprene yang tahan lama dan tahan air dengan ukuran 40x90cm dan ketebalan 4mm. Juga tersedia ukuran 30x80cm dengan ketebalan 3mm.', 'tersedia'),
('stnd.png', 'PR007', 'Laptop stand aluminium From VICOMP', 329000, 280000, 'Stand laptop aluminium: Ringan dan kokoh, dirancang ergonomis untuk meningkatkan kenyamanan penggunaan. Penyimpanan portabel dan estetika modern.', 'tersedia'),
('daxa.jpg', 'PR008', 'Rexus Daxa Mechanical Keyboard', 500000, 450000, 'Rexus Gaming Keyboard merupakan keyboard gaming yang didesain secara sempurna untuk memfasilitasi kebutuhan gaming Anda.', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `gender`, `email`, `password`) VALUES
(1, 'hansen', 'male', 'hansen211@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
