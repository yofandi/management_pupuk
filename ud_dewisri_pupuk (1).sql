-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2019 at 11:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ud_dewisri_pupuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id_blok` int(11) NOT NULL,
  `nama_blok` varchar(45) NOT NULL,
  `kebun_id_kebun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `nama_blok`, `kebun_id_kebun`) VALUES
(1, 'KP-012', 2),
(2, 'Pronojiwo Tratakan Wetan 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `history_add_pupuk`
--

CREATE TABLE `history_add_pupuk` (
  `id_history` varchar(200) NOT NULL,
  `suplier_id_suplier` int(11) NOT NULL,
  `no_do` varchar(100) NOT NULL,
  `no_police` varchar(40) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `jml_li` decimal(20,2) NOT NULL,
  `qty_satuan` varchar(50) NOT NULL,
  `receiver` varchar(45) NOT NULL,
  `ongkos_kirim` int(20) DEFAULT NULL,
  `tanggal_history` datetime DEFAULT NULL,
  `stock_pupuk_id_stock` int(11) NOT NULL,
  `satuan_barang_idsatuan_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_add_pupuk`
--

INSERT INTO `history_add_pupuk` (`id_history`, `suplier_id_suplier`, `no_do`, `no_police`, `driver`, `jml_li`, `qty_satuan`, `receiver`, `ongkos_kirim`, `tanggal_history`, `stock_pupuk_id_stock`, `satuan_barang_idsatuan_barang`) VALUES
('GDAAAA000001', 1, '1292-PSI-12-1KS', 'P 9138 DK', 'baron', '25.00', 'kg', 'Kiki', 100000, '2019-01-18 15:42:00', 5, 0),
('GDAAAA000002', 2, 'KSNK29390', 'P 9903 TH', 'Zaki', '10.00', 'kg', 'kamil', 100000, '2019-01-18 15:36:00', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kebun`
--

CREATE TABLE `kebun` (
  `id_kebun` int(11) NOT NULL,
  `nama_kebun` varchar(100) NOT NULL,
  `kota_id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kebun`
--

INSERT INTO `kebun` (`id_kebun`, `nama_kebun`, `kota_id_kota`) VALUES
(2, 'Padeglang', 3),
(3, 'Pronojiwo Tratakan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `nama_klasifikasi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`) VALUES
(2, 'INTERNAL'),
(3, 'EKSTERNAL'),
(4, 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'JAKARTA'),
(2, 'BANDUNG'),
(3, 'YOGYAKARTA'),
(4, 'JEMBER'),
(5, 'BANYUWANGI'),
(7, 'PASURUAN'),
(8, 'BONDOWOSO'),
(9, 'MALANG'),
(10, 'BANJARMASIN'),
(11, 'BANTEN');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `name_level` varchar(45) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `name_level`, `description`) VALUES
(1, 'ADMIN', '-'),
(2, 'GUDANG', '-'),
(3, 'ADMINISTRASI', '-'),
(4, 'MANAGER', '-'),
(5, 'KEUANGAN', '-');

-- --------------------------------------------------------

--
-- Table structure for table `merk_pupuk`
--

CREATE TABLE `merk_pupuk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merk_pupuk`
--

INSERT INTO `merk_pupuk` (`id_merk`, `nama_merk`) VALUES
(1, 'P-128 SUPER COMPOS'),
(2, 'P-120 INTER MEDIUM COMPOS'),
(3, 'PK-0001 AC NITROGEN');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(3, 'Tanam'),
(4, 'Pupuk');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(200) NOT NULL,
  `tanggal_pembayaran_awl` datetime NOT NULL,
  `jenis_pembayaran` varchar(10) NOT NULL,
  `status_lunas` varchar(10) NOT NULL,
  `tanggal_max_bayar` datetime NOT NULL,
  `penjualan_id_penjualan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran_awl`, `jenis_pembayaran`, `status_lunas`, `tanggal_max_bayar`, `penjualan_id_penjualan`) VALUES
('PBAAAA000001', '2019-01-16 20:56:00', 'Cicil', 'Lunas', '2019-01-23 20:56:00', 'GDAAAA000001');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `ktp_pemohon` varchar(225) NOT NULL,
  `no_phone_pemohon` varchar(75) NOT NULL,
  `alamat_pemohon` varchar(100) DEFAULT NULL,
  `klasifikasi_id_klasifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `nama_pemohon`, `ktp_pemohon`, `no_phone_pemohon`, `alamat_pemohon`, `klasifikasi_id_klasifikasi`) VALUES
(1, 'Eka', '350903280520010003', '087753821349', 'jombang', 4),
(2, 'Damma', '350903280520010001', '087753821349', 'Lumajang', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `tanggal_terima` datetime NOT NULL,
  `uang_terima` varchar(100) NOT NULL,
  `status_transaksi` varchar(10) NOT NULL,
  `pembayaran_id_pembayaran` varchar(200) NOT NULL,
  `penjualan_id_penjualan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `tanggal_terima`, `uang_terima`, `status_transaksi`, `pembayaran_id_pembayaran`, `penjualan_id_penjualan`) VALUES
(10, '2019-01-18 21:50:00', '100000', 'Cicil', 'PBAAAA000001', 'GDAAAA000001'),
(11, '2019-01-21 10:24:00', '180000', 'Cicil', 'PBAAAA000001', 'GDAAAA000001'),
(14, '2019-01-20 14:12:00', '100000', 'Lunas', 'PBAAAA000001', 'GDAAAA000001');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(200) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `total_harga` int(100) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_keseluruhan` int(100) NOT NULL,
  `status_lunas_penjualan` int(1) NOT NULL,
  `status_konfirmasi_id_konfirmasi` int(11) NOT NULL,
  `sales_id_sales` int(11) NOT NULL,
  `blok_id_blok` int(11) NOT NULL,
  `pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `pemohon_id_pemohon` int(11) NOT NULL,
  `perkiraan_id_perkiraan` int(11) NOT NULL,
  `supir_ud_dewisri_id_supir` int(11) NOT NULL,
  `no_do_penjualan` varchar(100) DEFAULT NULL,
  `supir_pengantar` varchar(100) DEFAULT NULL,
  `tanggal_kirim` datetime DEFAULT NULL,
  `pengirim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal_penjualan`, `total_harga`, `diskon`, `harga_keseluruhan`, `status_lunas_penjualan`, `status_konfirmasi_id_konfirmasi`, `sales_id_sales`, `blok_id_blok`, `pekerjaan_id_pekerjaan`, `pemohon_id_pemohon`, `perkiraan_id_perkiraan`, `supir_ud_dewisri_id_supir`, `no_do_penjualan`, `supir_pengantar`, `tanggal_kirim`, `pengirim`) VALUES
('GDAAAA000001', '2019-01-14 18:40:54', 380000, 0, 380000, 1, 2, 2, 2, 4, 1, 3, 2, 'DHD128192', NULL, '2019-01-16 18:40:54', 'Shani');

-- --------------------------------------------------------

--
-- Table structure for table `perkiraan`
--

CREATE TABLE `perkiraan` (
  `id_perkiraan` int(11) NOT NULL,
  `no_perkiraan` varchar(100) NOT NULL,
  `nama_perkiraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perkiraan`
--

INSERT INTO `perkiraan` (`id_perkiraan`, `no_perkiraan`, `nama_perkiraan`) VALUES
(1, '01', 'Biaya Garap'),
(3, '02', 'Biaya Umum'),
(4, '03', 'Biaya Pemeliharaan Armada Angkutan');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_kas`
--

CREATE TABLE `pinjaman_kas` (
  `id_penerimaan` int(11) NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `nominal_pinjaman` int(11) NOT NULL,
  `uraian_pinjaman` text,
  `tanggal_pelunasan` date NOT NULL,
  `status_pelunasan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(100) NOT NULL,
  `ktp_sales` varchar(225) NOT NULL,
  `email_sales` varchar(100) DEFAULT NULL,
  `no_phone` varchar(45) DEFAULT NULL,
  `alamat_sales` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `nama_sales`, `ktp_sales`, `email_sales`, `no_phone`, `alamat_sales`) VALUES
(2, 'kharisma Tegar', '3500011210990001', 'kharisma@gmail.com', '085678231991', 'lumajang');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `idsatuan_barang` int(11) NOT NULL,
  `nama_satuan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`idsatuan_barang`, `nama_satuan`) VALUES
(1, 'item'),
(2, 'ton'),
(3, 'kwintal'),
(4, 'kg'),
(5, 'hg'),
(6, 'dag'),
(7, 'g'),
(8, 'dg'),
(9, 'cg'),
(10, 'mg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `pimpinan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `pimpinan`) VALUES
(1, 'Hutibul Umam');

-- --------------------------------------------------------

--
-- Table structure for table `status_konfirmasi`
--

CREATE TABLE `status_konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `nama_konfirmasi` varchar(45) NOT NULL,
  `deskripsi_konfirmasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_konfirmasi`
--

INSERT INTO `status_konfirmasi` (`id_konfirmasi`, `nama_konfirmasi`, `deskripsi_konfirmasi`) VALUES
(1, 'Belum Dikonfirmasi', 'data belum dikonfirmasi oleh manager'),
(2, 'Acc', 'data dikonfirmasi oleh manager, dan diterima'),
(3, 'Non Acc', 'data dikonfirmasi oleh manager, dan tidak diterima'),
(4, 'Ybs. Menghadap', 'data dikonfirmasi namun pemohon diharuskan menghadap ke manager');

-- --------------------------------------------------------

--
-- Table structure for table `stock_pupuk`
--

CREATE TABLE `stock_pupuk` (
  `id_stock` int(11) NOT NULL,
  `nama_pupuk` varchar(100) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `harga_pupuk` varchar(100) NOT NULL,
  `description_pupuk` text,
  `satuan_barang_idsatuan_barang` int(11) NOT NULL,
  `merk_pupuk_id_merk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_pupuk`
--

INSERT INTO `stock_pupuk` (`id_stock`, `nama_pupuk`, `qty`, `harga_pupuk`, `description_pupuk`, `satuan_barang_idsatuan_barang`, `merk_pupuk_id_merk`) VALUES
(5, 'Organic Compos - 0001', '107.00', '75000', 'pupuk kompos 0001', 4, 1),
(6, 'Organic Compos ZN-1', '100.00', '100000', 'sip', 4, 2),
(7, 'Organic ACA - 00001', '100.00', '90000', 'cek', 4, 3),
(8, 'Organic Compos - 0001 A1', '100.00', '150000', 'dlsp', 4, 1),
(9, 'Organic Green SF-130 tree', '115.00', '90000', 'dede', 4, 2),
(10, 'POLIMENIC Earth - 300 ACA', '100.00', '85000', 'sasa', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stock_to_penjualan`
--

CREATE TABLE `stock_to_penjualan` (
  `idstock_to_penjualan` int(11) NOT NULL,
  `qty_jual` int(100) NOT NULL,
  `diskon` int(50) NOT NULL,
  `harga_total` int(50) NOT NULL,
  `stock_pupuk_id_stock` int(11) NOT NULL,
  `penjualan_id_penjualan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_to_penjualan`
--

INSERT INTO `stock_to_penjualan` (`idstock_to_penjualan`, `qty_jual`, `diskon`, `harga_total`, `stock_pupuk_id_stock`, `penjualan_id_penjualan`) VALUES
(18, 2, 0, 200000, 6, 'GDAAAA000001'),
(19, 2, 0, 180000, 9, 'GDAAAA000001');

-- --------------------------------------------------------

--
-- Table structure for table `supir_ud_dewisri`
--

CREATE TABLE `supir_ud_dewisri` (
  `id_supir` int(11) NOT NULL,
  `ktp_supir` varchar(225) NOT NULL,
  `nama_supir` varchar(100) NOT NULL,
  `no_polisi` varchar(45) NOT NULL,
  `no_phone` varchar(45) NOT NULL,
  `alamat_supir` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supir_ud_dewisri`
--

INSERT INTO `supir_ud_dewisri` (`id_supir`, `ktp_supir`, `nama_supir`, `no_polisi`, `no_phone`, `alamat_supir`) VALUES
(2, '350807110919920001', 'Jupri', 'P 2329 JH', '087345289001', 'selok'),
(3, '350807120219910001', 'Japri', 'P 2739JH', '087345289002', 'blambangan'),
(4, '350807230519920001', 'Sukri', 'N 2380 PL', '087345289003', 'meleman');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(150) NOT NULL,
  `email_suplier` varchar(150) NOT NULL,
  `no_phone_suplier` varchar(50) DEFAULT NULL,
  `no_telepon_suplier` varchar(50) DEFAULT NULL,
  `alamat_suplier` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `email_suplier`, `no_phone_suplier`, `no_telepon_suplier`, `alamat_suplier`) VALUES
(1, 'CV. CITRADARMAWIDYA JAYA', 'info@mascitra.com', '084235093221', '-', 'Jember'),
(2, 'CHARA Foundation ', 'charafruit@charafoundation.com', '089238465118', '(0334) 137833', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `ongkos_kirim_tagihan` int(100) NOT NULL,
  `uang_bbm` int(100) NOT NULL,
  `status_pelunasan` varchar(20) DEFAULT NULL,
  `history_add_pupuk_id_history` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `ongkos_kirim_tagihan`, `uang_bbm`, `status_pelunasan`, `history_add_pupuk_id_history`) VALUES
(9, 100000, 50000, 'Lunas', 'GDAAAA000001'),
(10, 100000, 150000, 'Belum Lunas', 'GDAAAA000002');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(225) NOT NULL,
  `full_name` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `address` text,
  `image` varchar(150) DEFAULT NULL,
  `level_id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `full_name`, `email`, `phone_number`, `address`, `image`, `level_id_level`) VALUES
(2, 'admin', '0e33d778c4bf0c16360f291997e0df09ac8e0034eaf3b66e6bb334fb29a7396c466a631cf49b7b9f65866308c9e93bfb5a3a80ad73ade9addbfe6f3ef6df0bc8F2ax444ju5hOEWPDQnM8OLHuMYdGLG5Ik6Cq/0GBN9Q=', 'admin 1', 'admin@dewisrigroup.com', '087757391238', 'dirumah', NULL, 1),
(3, 'jaja', 'bdab4d942727a7f2b396d9f3c1300fbdb7a848ffb3adb8c823563ce32b9ee593792bba205bd140111a51d616a689eca96bd62675153780086780c5177d617dc1KRAXCIYrW9dBu7Dw6nNmtE/r3U9xzX3ElyFE4tY2qh0=', 'jaja', 'jaja@jaja.com', '012345', 'jaja', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`,`kebun_id_kebun`),
  ADD KEY `fk_blok_kebun1_idx` (`kebun_id_kebun`);

--
-- Indexes for table `history_add_pupuk`
--
ALTER TABLE `history_add_pupuk`
  ADD PRIMARY KEY (`id_history`,`suplier_id_suplier`,`stock_pupuk_id_stock`,`satuan_barang_idsatuan_barang`),
  ADD KEY `fk_history_add_pupuk_suplier1_idx` (`suplier_id_suplier`),
  ADD KEY `fk_history_add_pupuk_stock_pupuk1_idx` (`stock_pupuk_id_stock`,`satuan_barang_idsatuan_barang`);

--
-- Indexes for table `kebun`
--
ALTER TABLE `kebun`
  ADD PRIMARY KEY (`id_kebun`,`kota_id_kota`),
  ADD KEY `fk_kebun_kota1_idx` (`kota_id_kota`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `merk_pupuk`
--
ALTER TABLE `merk_pupuk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`,`penjualan_id_penjualan`),
  ADD KEY `fk_pembayaran_penjualan1_idx` (`penjualan_id_penjualan`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`,`klasifikasi_id_klasifikasi`),
  ADD KEY `fk_pemohon_klasifikasi1_idx` (`klasifikasi_id_klasifikasi`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`,`pembayaran_id_pembayaran`,`penjualan_id_penjualan`),
  ADD KEY `fk_penerimaan_pembayaran1_idx` (`pembayaran_id_pembayaran`,`penjualan_id_penjualan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`,`sales_id_sales`,`blok_id_blok`,`pekerjaan_id_pekerjaan`,`pemohon_id_pemohon`,`perkiraan_id_perkiraan`,`supir_ud_dewisri_id_supir`),
  ADD KEY `fk_penjualan_sales1_idx` (`sales_id_sales`),
  ADD KEY `fk_penjualan_pekerjaan1_idx` (`pekerjaan_id_pekerjaan`),
  ADD KEY `fk_penjualan_pemohon1_idx` (`pemohon_id_pemohon`),
  ADD KEY `fk_penjualan_perkiraan1_idx` (`perkiraan_id_perkiraan`),
  ADD KEY `fk_penjualan_supir_ud_dewisri1_idx` (`supir_ud_dewisri_id_supir`),
  ADD KEY `fk_penjualan_blok1_idx` (`blok_id_blok`),
  ADD KEY `fk_penjualan_status_konfirmasi1_idx` (`status_konfirmasi_id_konfirmasi`);

--
-- Indexes for table `perkiraan`
--
ALTER TABLE `perkiraan`
  ADD PRIMARY KEY (`id_perkiraan`);

--
-- Indexes for table `pinjaman_kas`
--
ALTER TABLE `pinjaman_kas`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`idsatuan_barang`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `stock_pupuk`
--
ALTER TABLE `stock_pupuk`
  ADD PRIMARY KEY (`id_stock`,`satuan_barang_idsatuan_barang`,`merk_pupuk_id_merk`),
  ADD KEY `fk_stock_pupuk_satuan_barang1_idx` (`satuan_barang_idsatuan_barang`),
  ADD KEY `fk_stock_pupuk_merk_pupuk1_idx` (`merk_pupuk_id_merk`);

--
-- Indexes for table `stock_to_penjualan`
--
ALTER TABLE `stock_to_penjualan`
  ADD PRIMARY KEY (`idstock_to_penjualan`,`stock_pupuk_id_stock`,`penjualan_id_penjualan`),
  ADD KEY `fk_stock_to_penjualan_stock_pupuk1_idx` (`stock_pupuk_id_stock`),
  ADD KEY `fk_stock_to_penjualan_penjualan1_idx` (`penjualan_id_penjualan`);

--
-- Indexes for table `supir_ud_dewisri`
--
ALTER TABLE `supir_ud_dewisri`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`,`history_add_pupuk_id_history`),
  ADD KEY `fk_tagihan_history_add_pupuk1_idx` (`history_add_pupuk_id_history`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`,`level_id_level`),
  ADD KEY `fk_users_level_idx` (`level_id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebun`
--
ALTER TABLE `kebun`
  MODIFY `id_kebun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merk_pupuk`
--
ALTER TABLE `merk_pupuk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `perkiraan`
--
ALTER TABLE `perkiraan`
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjaman_kas`
--
ALTER TABLE `pinjaman_kas`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `idsatuan_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_pupuk`
--
ALTER TABLE `stock_pupuk`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock_to_penjualan`
--
ALTER TABLE `stock_to_penjualan`
  MODIFY `idstock_to_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supir_ud_dewisri`
--
ALTER TABLE `supir_ud_dewisri`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blok`
--
ALTER TABLE `blok`
  ADD CONSTRAINT `fk_blok_kebun1` FOREIGN KEY (`kebun_id_kebun`) REFERENCES `kebun` (`id_kebun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_add_pupuk`
--
ALTER TABLE `history_add_pupuk`
  ADD CONSTRAINT `fk_history_add_pupuk_stock_pupuk1` FOREIGN KEY (`stock_pupuk_id_stock`,`satuan_barang_idsatuan_barang`) REFERENCES `stock_pupuk` (`id_stock`, `satuan_barang_idsatuan_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_add_pupuk_suplier1` FOREIGN KEY (`suplier_id_suplier`) REFERENCES `suplier` (`id_suplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kebun`
--
ALTER TABLE `kebun`
  ADD CONSTRAINT `fk_kebun_kota1` FOREIGN KEY (`kota_id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_penjualan1` FOREIGN KEY (`penjualan_id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `fk_pemohon_klasifikasi1` FOREIGN KEY (`klasifikasi_id_klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD CONSTRAINT `fk_penerimaan_pembayaran1` FOREIGN KEY (`pembayaran_id_pembayaran`,`penjualan_id_penjualan`) REFERENCES `pembayaran` (`id_pembayaran`, `penjualan_id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_blok1` FOREIGN KEY (`blok_id_blok`) REFERENCES `blok` (`id_blok`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_pekerjaan1` FOREIGN KEY (`pekerjaan_id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_pemohon1` FOREIGN KEY (`pemohon_id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_perkiraan1` FOREIGN KEY (`perkiraan_id_perkiraan`) REFERENCES `perkiraan` (`id_perkiraan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_sales1` FOREIGN KEY (`sales_id_sales`) REFERENCES `sales` (`id_sales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_status_konfirmasi1` FOREIGN KEY (`status_konfirmasi_id_konfirmasi`) REFERENCES `status_konfirmasi` (`id_konfirmasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_supir_ud_dewisri1` FOREIGN KEY (`supir_ud_dewisri_id_supir`) REFERENCES `supir_ud_dewisri` (`id_supir`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_pupuk`
--
ALTER TABLE `stock_pupuk`
  ADD CONSTRAINT `fk_stock_pupuk_merk_pupuk1` FOREIGN KEY (`merk_pupuk_id_merk`) REFERENCES `merk_pupuk` (`id_merk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_pupuk_satuan_barang1` FOREIGN KEY (`satuan_barang_idsatuan_barang`) REFERENCES `satuan_barang` (`idsatuan_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_to_penjualan`
--
ALTER TABLE `stock_to_penjualan`
  ADD CONSTRAINT `fk_stock_to_penjualan_penjualan1` FOREIGN KEY (`penjualan_id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stock_to_penjualan_stock_pupuk1` FOREIGN KEY (`stock_pupuk_id_stock`) REFERENCES `stock_pupuk` (`id_stock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `fk_tagihan_history_add_pupuk1` FOREIGN KEY (`history_add_pupuk_id_history`) REFERENCES `history_add_pupuk` (`id_history`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_level` FOREIGN KEY (`level_id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
