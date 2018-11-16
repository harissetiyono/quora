-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2018 at 08:11 AM
-- Server version: 5.6.36-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nama_admin` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ad_click_log`
--

CREATE TABLE `ad_click_log` (
  `id` int(11) NOT NULL,
  `id_member_bisnis` int(11) DEFAULT NULL,
  `id_adset` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ad_impression_log`
--

CREATE TABLE `ad_impression_log` (
  `id` int(11) NOT NULL,
  `id_adset` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_impression_log`
--

INSERT INTO `ad_impression_log` (`id`, `id_adset`, `tanggal`, `jumlah`) VALUES
(1, 11, '2018-11-15', 87);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `nama_blog` varchar(255) DEFAULT NULL,
  `url_blog` varchar(255) DEFAULT NULL,
  `deskripsi_blog` varchar(255) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `konten_blog`
--

CREATE TABLE `konten_blog` (
  `id_konten` int(11) NOT NULL,
  `id_blog` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `id_topik` int(11) DEFAULT NULL,
  `konten` longtext,
  `status` varchar(45) DEFAULT NULL,
  `Blog_id_blog` int(11) NOT NULL,
  `topik_id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_ad_set`
--

CREATE TABLE `mb_ad_set` (
  `id_adset` int(11) NOT NULL,
  `id_kampanye` varchar(20) DEFAULT NULL,
  `nama_bisnis` varchar(250) NOT NULL,
  `nama_adset` varchar(255) DEFAULT NULL,
  `topik` int(11) NOT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `cpc` decimal(12,0) DEFAULT NULL,
  `impressions` int(11) DEFAULT '0',
  `click` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mb_ad_set`
--

INSERT INTO `mb_ad_set` (`id_adset`, `id_kampanye`, `nama_bisnis`, `nama_adset`, `topik`, `judul`, `deskripsi`, `url`, `cpc`, `impressions`, `click`, `status`) VALUES
(11, '5beaf5599fa3a', 'http://opinetz.com', 'Pemrograman Java', 3, 'Pengen belajar Pemrograman Java?', 'Tutorial belajar Java dasar yang interaktif dan sistematis di CodePolitan, belajar java dasar, belajar pemrograman dasar.', 'http://opinetz.com', '500', 87, 0, 'aktif'),
(13, '5beaf5599fa3a', 'Opinetz.com', 'Pemrograman PHP', 3, 'Pengen belajar Pemrograman PHP?', 'kursus pemrograman web dengan materi disesuaikan kebutuhan siswa, materi php, html, css, oop, bootstrap, mysql.', 'https://opinetz.com', '500', 0, 0, 'aktif'),
(15, '5beaf81b7f6f9', 'kajianislam.com', 'Kajian slogan 1', 61, 'Kumpulan Berita untuk Kanal Kajian Islam', 'Berita Islam, Informasi Seputar Dunia Islam, Tuntunan Agama Islam, Belajar Islam , Media Islam Generasi Baru.', 'kajianislam.com', '500', 0, 0, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mb_audience`
--

CREATE TABLE `mb_audience` (
  `id_audience` int(11) NOT NULL,
  `nama_audience` varchar(45) DEFAULT NULL,
  `deskripsi_audience` varchar(45) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `id_bisnis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_bisnis_detail`
--

CREATE TABLE `mb_bisnis_detail` (
  `id_bisnis` int(11) NOT NULL,
  `nama_bisnis` varchar(45) DEFAULT NULL,
  `alamat_bisnis` varchar(45) DEFAULT NULL,
  `telepon_bisnis` varchar(45) DEFAULT NULL,
  `tax_id_bisnis` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `industri_kategori` varchar(45) DEFAULT NULL,
  `deskripsi_bisnis` varchar(45) DEFAULT NULL,
  `cp_bisnis` varchar(45) DEFAULT NULL,
  `id_member_bisnis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mb_bisnis_detail`
--

INSERT INTO `mb_bisnis_detail` (`id_bisnis`, `nama_bisnis`, `alamat_bisnis`, `telepon_bisnis`, `tax_id_bisnis`, `logo`, `website`, `industri_kategori`, `deskripsi_bisnis`, `cp_bisnis`, `id_member_bisnis`) VALUES
(1, 'Opinetz 2', '       Malang - Indonesia', '085234119848', '0323223', '1.png', 'http://opinetz.com', '1', 'Sentiment Analyst Service', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mb_email_report`
--

CREATE TABLE `mb_email_report` (
  `id_report` int(11) NOT NULL,
  `nama_report` varchar(255) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `mb_bisnis_detail_id_bisnis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_kampanye`
--

CREATE TABLE `mb_kampanye` (
  `id_kampanye` varchar(20) NOT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `nama_kampanye` varchar(50) DEFAULT NULL,
  `tipe` varchar(255) NOT NULL,
  `anggaran_perhari` decimal(15,0) DEFAULT NULL,
  `tipe_jadwal` varchar(255) NOT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mb_kampanye`
--

INSERT INTO `mb_kampanye` (`id_kampanye`, `id_bisnis`, `nama_kampanye`, `tipe`, `anggaran_perhari`, `tipe_jadwal`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
('5beaf5599fa3a', 1, 'Kursus pemrograman', '1', '20000', 'selamanya', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aktif'),
('5beaf81b7f6f9', 1, 'Kajian Islam', '1', '10000', 'rentang', '2018-11-13 00:00:00', '2018-11-18 00:00:00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mb_metode_pembayaran`
--

CREATE TABLE `mb_metode_pembayaran` (
  `id_metode_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mb_metode_pembayaran`
--

INSERT INTO `mb_metode_pembayaran` (`id_metode_pembayaran`, `nama_bank`, `no_rek`) VALUES
(1, 'BCA', '123456789'),
(2, 'BNI', '1234567890'),
(3, 'Bank Mandiri', '2173819738'),
(5, 'Bank Rakyat Indonesia', '987126371256'),
(7, 'Danamon', '8182382563');

-- --------------------------------------------------------

--
-- Table structure for table `mb_topup_transaksi`
--

CREATE TABLE `mb_topup_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_member_bisnis` int(11) DEFAULT NULL,
  `id_metode_pembayaran` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nominal` decimal(20,0) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mb_topup_transaksi`
--

INSERT INTO `mb_topup_transaksi` (`id_transaksi`, `id_member_bisnis`, `id_metode_pembayaran`, `tanggal`, `nominal`, `bukti`, `status`) VALUES
(11, 1, 1, '2018-11-15 07:37:57', '306000', '11.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL COMMENT '		',
  `email` varchar(255) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `bahasa` varchar(255) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `dekripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `email`, `id_pekerjaan`, `id_pendidikan`, `id_lokasi`, `bahasa`, `telepon`, `password`, `status`, `foto`, `dekripsi`) VALUES
(3, 'Tiani Khusnul', 'tianikr@gmail.com', 1, NULL, NULL, NULL, NULL, '$2y$10$JdlrDq95s1M/JkOni9Vr5e9aQK0nkOUqelTDsIPAINYQxGBP93zei', NULL, '', 'tambah dekripsi baru'),
(5, 'Haris Setiyono', 'harissetiyono@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$SEuVsnNuHkNPJFezJ894E.TFa04anpMltaVDaRvfnC0JCzA6NuZJe', NULL, '5.png', ''),
(7, 'ragata anggada', 'ragata@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$aY5VGozEYqsSA0.sL5FsmeCfXpnFLiuNzzOeI.IQAWCp4Crvnkjga', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_bisnis`
--

CREATE TABLE `member_bisnis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `saldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_bisnis`
--

INSERT INTO `member_bisnis` (`id`, `nama`, `email`, `password`, `saldo`) VALUES
(1, 'Haris Setiyono', 'harissetiyono@gmail.com', '$2y$10$Jsoge4CkNPzckxxXqNWHVeJueUNoE6EmIo2AT8dr9WPjb5LCqX.H2', '306000');

-- --------------------------------------------------------

--
-- Table structure for table `m_dukungan`
--

CREATE TABLE `m_dukungan` (
  `id_dukungan` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_jawaban` int(11) DEFAULT NULL,
  `dukungan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_feed`
--

CREATE TABLE `m_feed` (
  `id_feed` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_topik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_jawaban`
--

CREATE TABLE `m_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_member` varchar(45) DEFAULT NULL,
  `jawaban` longtext,
  `tanggal` varchar(45) DEFAULT NULL,
  `id_pertanyaan` varchar(45) DEFAULT NULL,
  `id_dukungan` varchar(45) DEFAULT NULL,
  `penayangan` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_jawaban`
--

INSERT INTO `m_jawaban` (`id_jawaban`, `id_member`, `jawaban`, `tanggal`, `id_pertanyaan`, `id_dukungan`, `penayangan`, `status`) VALUES
(3, '5', 'Gunakan perangkat pendukung yang nyaman.\r\n\r\nSeperti bermain musik, anda akan mendapati sensasi dan inspirasi yang berbeda ketika memainkan alat musik grade professional, karena merasa tune-in dengan suara idola anda, begitu pula dengan alat perang perekayasa perangkat lunak. Gunakanlah yang membuat anda sekiranya nyaman. Tadinya saya skeptis, tetapi sekarang nyaman dengan lingkungan gabungan Mac dan Linux dengan IDE gabungan antara Visual Studio Code, Spyder, dan sesekali Android Studio.\r\n\r\nSet tempat yang nyaman.\r\n\r\nEntah itu di sofa ruang tengah seperti saya sekarang ini dengan kaki nangkring di meja sehingga on-fire untuk menulis rentetan jawaban Quora, atau di tempat tidur dengan ditemani lagu favorit anda sembari menyeruput es kepal Milo, whatever floats your boat.', '2018-11-14', '11', NULL, NULL, '1'),
(5, '7', 'Karena terkadang memang bebrapa anak masuk jurusan TI tidak dengan keinginnannya', '2018-11-15', '7', NULL, NULL, '1'),
(11, NULL, 'tes', '2018-11-15', '7', NULL, NULL, '1'),
(13, '5', 'Waktu Saya kuliah dahulu, belajar filsafat lebih tentang siapa para filsuf besar dan apa ide yang dia lontarkan, atau yang lebih cocok disebut sejarah filsafat.', '2018-11-15', '19', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_komentar`
--

CREATE TABLE `m_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_jawaban` int(11) DEFAULT NULL,
  `komentar` longtext,
  `m_jawaban_id_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi`
--

CREATE TABLE `m_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `mulai_tahun` varchar(4) DEFAULT NULL,
  `sampai_tahun` varchar(4) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pekerjaan`
--

CREATE TABLE `m_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `mulai_tahun` varchar(4) DEFAULT NULL,
  `selesai_tahun` varchar(4) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pendidikan`
--

CREATE TABLE `m_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `sekolah` varchar(255) DEFAULT NULL,
  `konsen` varchar(255) DEFAULT NULL,
  `konsen_kedua` varchar(255) DEFAULT NULL,
  `gelar` varchar(10) DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pengikut`
--

CREATE TABLE `m_pengikut` (
  `id` int(11) NOT NULL,
  `id_followed` int(11) DEFAULT NULL,
  `id_following` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL,
  `member_id_member1` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan1` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan1` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pengikut_pertanyaan`
--

CREATE TABLE `m_pengikut_pertanyaan` (
  `id` int(11) NOT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_pengikut_pertanyaan`
--

INSERT INTO `m_pengikut_pertanyaan` (`id`, `id_pertanyaan`, `id_member`) VALUES
(1, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `m_pertanyaan`
--

CREATE TABLE `m_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_topik` int(11) DEFAULT NULL,
  `penayangan` int(11) DEFAULT NULL,
  `id_dukungan` int(11) DEFAULT NULL,
  `anonymous` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_pertanyaan`
--

INSERT INTO `m_pertanyaan` (`id_pertanyaan`, `id_member`, `pertanyaan`, `link`, `tanggal`, `id_topik`, `penayangan`, `id_dukungan`, `anonymous`, `status`) VALUES
(7, 5, 'Mengapa banyak mahasiswa jurusan TI yang tidak suka memrogram?', '', '2018-11-14 00:00:00', 3, NULL, NULL, NULL, '1'),
(9, 5, 'Bagaimana cara Shopee mendapatkan dana untuk promosi besar-besaran yang sering dilakukan sepanjang tahun ini?', '', '2018-11-14 00:00:00', 3, NULL, NULL, NULL, '1'),
(11, 5, 'Bagaimana cara meningkatkan produktivitas sebagai perekayasa perangkat lunak (software engineer)?', '', '2018-11-14 00:00:00', 3, NULL, NULL, NULL, '1'),
(13, 7, 'Apa blog tentang pemrograman yang terbaik untuk diikuti?', '', '2018-11-15 00:00:00', 3, NULL, NULL, NULL, '1'),
(15, 7, 'Mengapa semua orang mengatakan bahwa Python tidak cocok untuk aplikasi berskala besar padahal secara teori semua bahasa pemrograman memiliki potensi yang sama?', '', '2018-11-15 00:00:00', 3, NULL, NULL, NULL, '1'),
(17, 5, 'Apakah agama melarang pemeluknya untuk kritis terhadap ajaran agamanya sendiri?', '', '2018-11-15 00:00:00', 7, NULL, NULL, NULL, '1'),
(19, 5, 'Apa buku yang bisa kamu rekomendasikan untuk filsafat praktis yang mudah dimengerti bagi pemula? Buku yang benar-benar untuk orang awam yang ingin belajar filsafat dan tidak berniat untuk menjadi ahli.', '', '0000-00-00 00:00:00', 7, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_spam_jawaban`
--

CREATE TABLE `m_spam_jawaban` (
  `id_spam` int(11) NOT NULL,
  `id_jawaban` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `s_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_spam_jawaban`
--

INSERT INTO `m_spam_jawaban` (`id_spam`, `id_jawaban`, `id_member`, `tanggal`, `keterangan`, `s_status`) VALUES
(1, 1, 1, '2018-10-26 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_spam_pertanyaan`
--

CREATE TABLE `m_spam_pertanyaan` (
  `id_spam` int(11) NOT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `s_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_spam_pertanyaan`
--

INSERT INTO `m_spam_pertanyaan` (`id_spam`, `id_pertanyaan`, `id_member`, `keterangan`, `tanggal`, `s_status`) VALUES
(1, 1, 1, 'kosong', '2018-10-25 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tipe` varchar(45) DEFAULT NULL,
  `id_konten` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `id_pengirim` int(11) DEFAULT NULL,
  `pesan` longtext,
  `status` varchar(45) DEFAULT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL,
  `member_id_member1` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan1` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan1` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(11) NOT NULL,
  `nama_topik` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `nama_topik`, `status`) VALUES
(3, 'Pemrograman', '1'),
(7, 'Filsafat', '1'),
(9, 'Fisika', '1'),
(11, 'Statistik', '1'),
(13, 'Ilmu Komputer', '1'),
(15, 'Astronomi', '1'),
(17, 'Geografi', '1'),
(19, 'Geologi', '1'),
(21, 'Geofisika', '1'),
(23, 'Meteorologi', '1'),
(25, 'Perkebunan', '1'),
(27, 'Agribisnis', '1'),
(29, 'Elektro', '1'),
(33, 'Teknologi Informasi', '1'),
(35, 'Sistem Informasi', '1'),
(37, 'Perangkat Lunak', '1'),
(39, 'Telekomunikasi', '1'),
(41, 'Sastra', '1'),
(43, 'Jurnalistik', '1'),
(45, 'Perbankan', '1'),
(47, 'Perpajakan', '1'),
(49, 'Manajemen', '1'),
(51, 'Pemasaran', '1'),
(53, 'Politik', '1'),
(55, 'Sosiologi', '1'),
(57, 'Psikologi', '1'),
(59, 'Budaya', '1'),
(61, 'Agama', '1'),
(63, 'Seni', '1'),
(65, 'pendidikan', '1'),
(67, 'Hukum', '1'),
(69, 'Sipil', '1'),
(71, 'Buku', '1'),
(73, 'Film', '1'),
(75, 'Olahraga', '1'),
(77, 'Otomotif', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ad_click_log`
--
ALTER TABLE `ad_click_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_impression_log`
--
ALTER TABLE `ad_impression_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `konten_blog`
--
ALTER TABLE `konten_blog`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `mb_ad_set`
--
ALTER TABLE `mb_ad_set`
  ADD PRIMARY KEY (`id_adset`);

--
-- Indexes for table `mb_audience`
--
ALTER TABLE `mb_audience`
  ADD PRIMARY KEY (`id_audience`);

--
-- Indexes for table `mb_bisnis_detail`
--
ALTER TABLE `mb_bisnis_detail`
  ADD PRIMARY KEY (`id_bisnis`),
  ADD UNIQUE KEY `id_member_bisnis` (`id_member_bisnis`);

--
-- Indexes for table `mb_email_report`
--
ALTER TABLE `mb_email_report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `mb_kampanye`
--
ALTER TABLE `mb_kampanye`
  ADD PRIMARY KEY (`id_kampanye`);

--
-- Indexes for table `mb_metode_pembayaran`
--
ALTER TABLE `mb_metode_pembayaran`
  ADD PRIMARY KEY (`id_metode_pembayaran`);

--
-- Indexes for table `mb_topup_transaksi`
--
ALTER TABLE `mb_topup_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `member_bisnis`
--
ALTER TABLE `member_bisnis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `m_dukungan`
--
ALTER TABLE `m_dukungan`
  ADD PRIMARY KEY (`id_dukungan`);

--
-- Indexes for table `m_feed`
--
ALTER TABLE `m_feed`
  ADD PRIMARY KEY (`id_feed`);

--
-- Indexes for table `m_jawaban`
--
ALTER TABLE `m_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `m_komentar`
--
ALTER TABLE `m_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `m_pekerjaan`
--
ALTER TABLE `m_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `m_pendidikan`
--
ALTER TABLE `m_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `m_pengikut`
--
ALTER TABLE `m_pengikut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pengikut_pertanyaan`
--
ALTER TABLE `m_pengikut_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `m_spam_jawaban`
--
ALTER TABLE `m_spam_jawaban`
  ADD PRIMARY KEY (`id_spam`);

--
-- Indexes for table `m_spam_pertanyaan`
--
ALTER TABLE `m_spam_pertanyaan`
  ADD PRIMARY KEY (`id_spam`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`),
  ADD KEY `nama_topik` (`nama_topik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_click_log`
--
ALTER TABLE `ad_click_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ad_impression_log`
--
ALTER TABLE `ad_impression_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_ad_set`
--
ALTER TABLE `mb_ad_set`
  MODIFY `id_adset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mb_audience`
--
ALTER TABLE `mb_audience`
  MODIFY `id_audience` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_bisnis_detail`
--
ALTER TABLE `mb_bisnis_detail`
  MODIFY `id_bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mb_email_report`
--
ALTER TABLE `mb_email_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_metode_pembayaran`
--
ALTER TABLE `mb_metode_pembayaran`
  MODIFY `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mb_topup_transaksi`
--
ALTER TABLE `mb_topup_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member_bisnis`
--
ALTER TABLE `member_bisnis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `m_dukungan`
--
ALTER TABLE `m_dukungan`
  MODIFY `id_dukungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `m_feed`
--
ALTER TABLE `m_feed`
  MODIFY `id_feed` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_jawaban`
--
ALTER TABLE `m_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `m_komentar`
--
ALTER TABLE `m_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_pekerjaan`
--
ALTER TABLE `m_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_pendidikan`
--
ALTER TABLE `m_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_pengikut`
--
ALTER TABLE `m_pengikut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_pengikut_pertanyaan`
--
ALTER TABLE `m_pengikut_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `m_spam_pertanyaan`
--
ALTER TABLE `m_spam_pertanyaan`
  MODIFY `id_spam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
