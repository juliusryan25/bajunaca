-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230114.c95b64afeb
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 22.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_jualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carosel`
--

CREATE TABLE `carosel` (
  `id_carosel` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `carosel`
--

INSERT INTO `carosel` (`id_carosel`, `image`) VALUES
(1, 'upload/BANER_WEB_BAJU.jpg'),
(2, 'upload/BANER_WEB_BAJU_2.jpg'),
(3, 'upload/BANER_WEB_BAJU_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pesanan`
--

INSERT INTO `data_pesanan` (`id`, `id_invoice`, `id_product`, `nama_product`, `jumlah`, `harga`) VALUES
(37, 95, 28, 'Scent By London', 2, 55000),
(38, 96, 24, 'Hoodie Blank Red', 1, 55000),
(39, 96, 25, 'test', 1, 1),
(40, 97, 21, 'Shirt Lumen', 1, 85000),
(41, 97, 26, 'Jemut', 1, 85000),
(42, 98, 27, 'Men wear', 1, 85000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `jasa_pengiriman` varchar(10) NOT NULL,
  `subtotal_produk` int(11) NOT NULL,
  `subtotal_pengiriman` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_user`, `nama_user`, `no_telp`, `alamat`, `jasa_pengiriman`, `subtotal_produk`, `subtotal_pengiriman`, `total_bayar`, `no_rekening`, `bukti_pembayaran`, `status`, `tgl_pesan`, `resi`) VALUES
(95, 36, 'Ilham Shawal', '0898989898', 'Jl.adaadakjdhakwjdhakjdhkawjhdawkjdhkajdhakwjdh - KABUPATEN BOGOR - JAWA BARAT ', 'J&T', 110000, 8000, 118000, '4234234234', 'upload/Instagram_story_-_2.jpg', 'Pesanan Diterima', '2023-06-29', 'asdsdasdae221313123qsasa'),
(96, 36, 'Ilham Shawal', '0898989898', 'Jl.adaadakjdhakwjdhakjdhkawjhdawkjdhkajdhakwjdh - KABUPATEN BOGOR - JAWA BARAT ', 'J&T', 55001, 8000, 63001, '4234234234', 'upload/Instagram_story_-_3.jpg', 'Dalam Pengiriman', '2023-06-30', 'sdsdfsdfsdfs4234'),
(97, 36, 'Ilham Shawal', '0898989898', 'Jl.adaadakjdhakwjdhakjdhkawjhdawkjdhkajdhakwjdh - KABUPATEN BOGOR - JAWA BARAT ', 'J&T', 170000, 8000, 178000, '4234234234', 'upload/Instagram_story_-_3.jpg', 'Pesanan Diproses', '2023-06-30', ''),
(98, 36, 'Ilham Shawal', '0898989898', 'Jl.adaadakjdhakwjdhakjdhkawjhdawkjdhkajdhakwjdh - KABUPATEN BOGOR - JAWA BARAT ', 'J&T', 85000, 8000, 93000, '4234234234', 'upload/Instagram_story_-_1.jpg', 'Pesanan Diterima', '2023-06-30', 'oioioioioioioi989898');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_product`
--

CREATE TABLE `kategori_product` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_product`
--

INSERT INTO `kategori_product` (`id`, `kategori`) VALUES
(1, 'Pakaian'),
(2, 'Alat Dapur'),
(3, 'Mainan'),
(4, 'Elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `email_seller` varchar(100) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `asal_product` varchar(100) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `email_seller`, `nama_toko`, `no_rekening`, `asal_product`, `kategori`, `nama_product`, `deskripsi`, `harga`, `stok`, `status_aktif`, `image`) VALUES
(21, 'aldi@gmail.com', 'Bagol_shop', '4234234234', 'KOTA JAKARTA TIMUR', 'Pakaian', 'Shirt Lumen', '<p style=\"text-align: left;\"><strong>Shirt Lumen (Dark Green)</strong></p>\r\n<p><strong>Size L</strong></p>', 85000, 10, 1, 'assets/img/profile/IMG_0829-removebg-preview-min.png'),
(24, 'aldi@gmail.com', 'Bagol_shop', '4234234234', 'KOTA JAKARTA TIMUR', 'Pakaian', 'Hoodie Blank Red', '<p><strong>Hoodie Blank Red</strong></p>\r\n<p><strong>Size L</strong></p>', 55000, 3, 1, 'upload/Screenshot_2023-06-14_234027-removebg-preview.png'),
(25, 'aldi@gmail.com', 'Bagol_shop', '4234234234', 'KOTA JAKARTA TIMUR', 'Pakaian', 'test', '<p>test</p>', 1, 1, 1, 'upload/box.png'),
(26, 'aldi@gmail.com', 'Bagol_shop', '4234234234', 'KOTA JAKARTA TIMUR', 'Pakaian', 'Jemut', '<p>Jemut/blank hoodie</p>\r\n<p>size L</p>', 85000, 1, 1, 'upload/hudi_1.png'),
(27, 'aldi@gmail.com', 'Bagol_shop', '4234234234', 'KOTA JAKARTA TIMUR', 'Pakaian', 'Men wear', '<p>Men wear/cream</p>\r\n<p>size L</p>', 85000, 3, 1, 'upload/hudi_2.png'),
(28, 'aldi@gmail.com', 'Bagol_shop', '4234234234', 'KOTA JAKARTA TIMUR', 'Pakaian', 'Scent By London', '<p>Scent by London/grey</p>\r\n<p>size L</p>', 55000, 3, 1, 'upload/hudi_5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten_kota` varchar(75) NOT NULL,
  `address` text NOT NULL,
  `status_data` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `no_telp`, `nama_toko`, `no_rekening`, `provinsi`, `kabupaten_kota`, `address`, `status_data`) VALUES
(4, 'Julius Ryan ', 'ryanjulius742@gmail.com', 'assets/img/profile/PP.jpg', '$2y$10$IG/qEzF7CdFpiCjmNGOlfext4E.1d6COBtqa4Ex/kNPRgilpe8upi', 1, 1, 1686122825, '085156539576', '', '0', 'JAWA BARAT', 'KOTA DEPOK', 'Julius - Depok', 1),
(36, 'Ilham Shawal', 'ilham@gmail.com', 'assets/img/profile/LOGO_SIBIZA2.jpg', '$2y$10$1aCLIL7hB7HT/lxqn1nKPOioCyNOhP/04DtjwFw4k5CEnNEvdjVpW', 2, 1, 1685965075, '0898989898', '', '0', 'JAWA BARAT', 'KABUPATEN BOGOR', 'Jl.adaadakjdhakwjdhakjdhkawjhdawkjdhkajdhakwjdh', 1),
(43, 'Aldi', 'aldi@gmail.com', 'assets/img/profile/zimbrut.png', '$2y$10$EVkyyHdYL6LbATSVN6hIguxMiXSBK1wV.aS/6WutN9PhNWaNypOtG', 3, 1, 1686466230, '1111111', 'Bagol_shop', '4234234234', 'DKI JAKARTA', 'KOTA JAKARTA TIMUR', 'Cijantung', 1),
(47, 'Bagol123', 'bagol@gmail.com', 'assets/img/profile/images_(5).png', '$2y$10$Q1KRqoIH/7wcx797U2XUxOq5ohxmAypdbBYnSzZsjD.uMOZscQDNS', 1, 1, 1686248618, '87878878787', '', '0', 'BANTEN', 'KABUPATEN PANDEGLANG', 'Bagol - Papua', 0),
(48, 'viera', 'viera@gmail.com', 'assets/img/profile/hacker.png', '$2y$10$/k1UYy1m/JNrrmje6oGqquG/hhVS7hkLaWb6zt715uB.lon65JdvG', 2, 1, 1685559384, '343434343', '', '0', 'BALI', 'KOTA DENPASAR', 'Denpasar Bali', 1),
(51, 'jamal', 'jamal@gmail.com', 'assets/img/profile/log.jpg', '$2y$10$qXeStrgkscJ0TyUYd3V0/e9dqMSsXUeovKtkyn9rxY9eSYE7EPPqG', 2, 1, 1686123409, '9879837593', '', '0', 'BALI', 'KABUPATEN BANGLI', 'Jamal - Bangli', 1),
(54, 'Salsabila iftinan', 'salsa@gmail.com', 'assets/img/profile/bg2.jpg', '$2y$10$dJt4RndRTScngL8tvspo2OVkSTcV6eWxSSugKovAJgKC3J6g37JGi', 3, 1, 1686467532, '8979789', 'Salsa_shop', '0', '232323', 'JAWA BARAT', 'KABUPATEN BEKASI', 0),
(56, 'jajang', 'jajang@gmail.com', 'assets/img/profile/bg.png', '$2y$10$gCwBH0Hoc2DfdCuB7mAeLe3R7itR0JKSkYcHi.9pCI3kblfEX8hYC', 2, 1, 1686250311, '989898', '', '0', '', 'KOTA PEKANBARU', 'Pekanbaru', 1),
(57, 'qwqwqq', 'qwqw@gmail.com', 'assets/img/profile/asu.PNG', '$2y$10$b1lqI.ekbMbcaBkWwLUAjOM36AHTvh0BxrsZgNeg6lVDW9zYU/kiy', 1, 1, 1686252266, '78687546', '', '0', 'JAWA BARAT', 'KOTA BANDUNG', 'Bandung', 0),
(59, 'test', 'test@gmail.com', 'assets/img/profile/Capture1.PNG', '$2y$10$Gy4vyEMA7hQi0pAtbnbjieojtv73/rvsC3rkGXxuTQnnnVB3fNwNW', 2, 1, 1686467292, '213124124', '', '0', '22423523', '8797897', 'ACEH', 1),
(60, 'mail', 'mail@gmail.com', 'assets/img/profile/bg2.jpg', '$2y$10$zQ5WVgRTXqKpKY./51s3Vuxfc7C9TLyCUyOx3ZY0ksQe38c0TxXyO', 3, 1, 1686467734, '23232323', 'mail_shop', '0', 'JAWA TENGAH', 'KABUPATEN SRAGEN', 'Sragen', 1),
(62, 'asasa', 'asasas@gmail.com', 'assets/img/profile/user.png', '$2y$10$1.cYHT7ug1pY6OWjkDoRzOWjelR9or.BPQBBZ4kJbdD5P4WAo3RAu', 3, 1, 1687976456, '2324345', 'sadasdasd', '123456789', 'RIAU', 'KABUPATEN INDRAGIRI HULU', 'asdasdsdasasdasdasda', 1),
(63, 'baba', 'baba@gmail.com', 'assets/img/profile/user.png', '$2y$10$KE75vu6IKk.8fmDOPGrqVu1rf4WK1kgUCmgpSGYFN1/eqXVFnUnzy', 2, 1, 1688061145, '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Seller');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Seller');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-duotone fa-list', 1),
(2, 1, 'Data users', 'admin/data_user', 'fas fa-fw fa-duotone fa-user', 1),
(3, 2, 'Bajunaca', 'user/etalase', 'fa-solid fa-fw fa-list', 1),
(4, 3, 'Dashboard', 'seller', 'fas fa-fw fa-duotone fa-list', 1),
(5, 3, 'Product', 'seller/product', 'fa-solid fa-fw fa-boxes-stacked', 1),
(8, 2, 'Personal', 'user/personal', 'fas fa-fw fa-duotone fa-user', 1),
(10, 1, 'Carosel', 'admin/carosel', 'fa-solid fa-fw fa-ellipsis', 1),
(11, 0, 'Pesanan', 'seller/pesanan', 'fa-solid fa-fw fa-bag-shopping', 0),
(12, 0, 'Pesanan', 'seller/pesanan', 'fa-solid fa-fw fa-bag-shopping', 1),
(13, 3, 'Pesanan', 'seller/pesanan', 'fa-solid fa-fw fa-bag-shopping', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carosel`
--
ALTER TABLE `carosel`
  ADD PRIMARY KEY (`id_carosel`);

--
-- Indeks untuk tabel `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `kategori_product`
--
ALTER TABLE `kategori_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carosel`
--
ALTER TABLE `carosel`
  MODIFY `id_carosel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_pesanan`
--
ALTER TABLE `data_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `kategori_product`
--
ALTER TABLE `kategori_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
