-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2018 at 10:28 PM
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
  `id_kampanye` int(11) DEFAULT NULL,
  `nama_adset` varchar(255) DEFAULT NULL,
  `targeting_adset` varchar(255) DEFAULT NULL,
  `tipe_device` varchar(155) DEFAULT NULL,
  `platform_mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `exclude_question` varchar(255) DEFAULT NULL,
  `exclude_audience` int(11) DEFAULT NULL,
  `cpc` decimal(12,0) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `mb_kampanye_id_kampanye` int(11) NOT NULL,
  `id_audience` int(11) DEFAULT NULL,
  `mb_audience_id_audience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_audience`
--

CREATE TABLE `mb_audience` (
  `id_audience` int(11) NOT NULL,
  `nama_audience` varchar(45) DEFAULT NULL,
  `deskripsi_audience` varchar(45) DEFAULT NULL,
  `kateogori` varchar(45) DEFAULT NULL,
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
  `cp_bisnis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_email_report`
--

CREATE TABLE `mb_email_report` (
  `id_report` int(11) NOT NULL,
  `nama_report` varchar(255) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `mb_bisnis_detail_id_bisnis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_kampanye`
--

CREATE TABLE `mb_kampanye` (
  `id_kampanye` int(11) NOT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `nama_kampanye` varchar(50) DEFAULT NULL,
  `Objek` varchar(50) DEFAULT NULL,
  `tipe_konversi` varchar(50) DEFAULT NULL,
  `anggaran_perhari` decimal(15,0) DEFAULT NULL,
  `anggaran_selamanya` decimal(15,0) DEFAULT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `mb_bisnis_detail_id_bisnis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_metode_pembayaran`
--

CREATE TABLE `mb_metode_pembayaran` (
  `id_metode_pembayaran` int(11) NOT NULL,
  `id_member_bisnis` varchar(45) DEFAULT NULL,
  `nama_kartu` varchar(45) DEFAULT NULL,
  `nomor_kartu` varchar(45) DEFAULT NULL,
  `expiry` varchar(5) DEFAULT NULL,
  `cvc` varchar(3) DEFAULT NULL,
  `billing_zip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mb_topup_transaksi`
--

CREATE TABLE `mb_topup_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_member_bisnis` int(11) DEFAULT NULL,
  `id_metode_pembayaran` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `mb_metode_pembayaran_id_metode_pembayaran` int(11) NOT NULL,
  `member_bisnis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `m_lokasi_id_lokasi` int(11) NOT NULL,
  `m_pendidikan_id_pendidikan1` int(11) NOT NULL,
  `m_pekerjaan_id_pekerjaan1` int(11) NOT NULL,
  `m_lokasi_id_lokasi1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_bisnis`
--

CREATE TABLE `member_bisnis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `mb_bisnis_detail_id_bisnis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_dukungan`
--

CREATE TABLE `m_dukungan` (
  `id_dukungan` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_jawaban` int(11) DEFAULT NULL,
  `dukungan` int(11) DEFAULT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL,
  `m_jawaban_id_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_feed`
--

CREATE TABLE `m_feed` (
  `id_feed` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_topik` int(11) DEFAULT NULL,
  `topik_id_topik` int(11) NOT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL
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
  `id_member` int(11) DEFAULT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pertanyaan`
--

CREATE TABLE `m_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `pertanyaan` longtext,
  `link` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_topik` int(11) DEFAULT NULL,
  `penayangan` int(11) DEFAULT NULL,
  `id_dukungan` int(11) DEFAULT NULL,
  `anonymous` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `topik_id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `status` varchar(45) DEFAULT NULL,
  `m_jawaban_id_jawaban` int(11) NOT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `status` varchar(45) DEFAULT NULL,
  `m_pertanyaan_id_pertanyaan` int(11) NOT NULL,
  `member_id_member` int(11) NOT NULL,
  `member_m_pekerjaan_id_pekerjaan` int(11) NOT NULL,
  `member_m_pendidikan_id_pendidikan` int(11) NOT NULL,
  `member_m_lokasi_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `fk_Blog_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`);

--
-- Indexes for table `konten_blog`
--
ALTER TABLE `konten_blog`
  ADD PRIMARY KEY (`id_konten`),
  ADD KEY `fk_konten_blog_Blog1_idx` (`Blog_id_blog`),
  ADD KEY `fk_konten_blog_topik1_idx` (`topik_id_topik`);

--
-- Indexes for table `mb_ad_set`
--
ALTER TABLE `mb_ad_set`
  ADD PRIMARY KEY (`id_adset`),
  ADD KEY `fk_mb_ad_set_mb_kampanye1_idx` (`mb_kampanye_id_kampanye`),
  ADD KEY `fk_mb_ad_set_mb_audience1_idx` (`mb_audience_id_audience`);

--
-- Indexes for table `mb_audience`
--
ALTER TABLE `mb_audience`
  ADD PRIMARY KEY (`id_audience`);

--
-- Indexes for table `mb_bisnis_detail`
--
ALTER TABLE `mb_bisnis_detail`
  ADD PRIMARY KEY (`id_bisnis`);

--
-- Indexes for table `mb_email_report`
--
ALTER TABLE `mb_email_report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_mb_email_report_mb_bisnis_detail1_idx` (`mb_bisnis_detail_id_bisnis`);

--
-- Indexes for table `mb_kampanye`
--
ALTER TABLE `mb_kampanye`
  ADD PRIMARY KEY (`id_kampanye`),
  ADD KEY `fk_mb_kampanye_mb_bisnis_detail1_idx` (`mb_bisnis_detail_id_bisnis`);

--
-- Indexes for table `mb_metode_pembayaran`
--
ALTER TABLE `mb_metode_pembayaran`
  ADD PRIMARY KEY (`id_metode_pembayaran`);

--
-- Indexes for table `mb_topup_transaksi`
--
ALTER TABLE `mb_topup_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_mb_topup_transaksi_mb_metode_pembayaran1_idx` (`mb_metode_pembayaran_id_metode_pembayaran`),
  ADD KEY `fk_mb_topup_transaksi_member_bisnis1_idx` (`member_bisnis_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`,`m_pekerjaan_id_pekerjaan`,`m_pendidikan_id_pendidikan`,`m_lokasi_id_lokasi`),
  ADD KEY `fk_member_m_pendidikan1_idx` (`m_pendidikan_id_pendidikan1`),
  ADD KEY `fk_member_m_pekerjaan1_idx` (`m_pekerjaan_id_pekerjaan1`),
  ADD KEY `fk_member_m_lokasi1_idx` (`m_lokasi_id_lokasi1`);

--
-- Indexes for table `member_bisnis`
--
ALTER TABLE `member_bisnis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_bisnis_mb_bisnis_detail1_idx` (`mb_bisnis_detail_id_bisnis`);

--
-- Indexes for table `m_dukungan`
--
ALTER TABLE `m_dukungan`
  ADD PRIMARY KEY (`id_dukungan`),
  ADD KEY `fk_m_dukungan_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`),
  ADD KEY `fk_m_dukungan_m_jawaban1_idx` (`m_jawaban_id_jawaban`);

--
-- Indexes for table `m_feed`
--
ALTER TABLE `m_feed`
  ADD PRIMARY KEY (`id_feed`),
  ADD KEY `fk_m_feed_topik1_idx` (`topik_id_topik`),
  ADD KEY `fk_m_feed_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`);

--
-- Indexes for table `m_jawaban`
--
ALTER TABLE `m_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `m_komentar`
--
ALTER TABLE `m_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `fk_m_komentar_m_jawaban1_idx` (`m_jawaban_id_jawaban`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_m_pengikut_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`),
  ADD KEY `fk_m_pengikut_member2_idx` (`member_id_member1`,`member_m_pekerjaan_id_pekerjaan1`,`member_m_pendidikan_id_pendidikan1`,`member_m_lokasi_id_lokasi1`);

--
-- Indexes for table `m_pengikut_pertanyaan`
--
ALTER TABLE `m_pengikut_pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_m_pengikut_pertanyaan_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`);

--
-- Indexes for table `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `fk_m_pertanyaan_topik1_idx` (`topik_id_topik`);

--
-- Indexes for table `m_spam_jawaban`
--
ALTER TABLE `m_spam_jawaban`
  ADD PRIMARY KEY (`id_spam`),
  ADD KEY `fk_m_spam_jawaban_m_jawaban1_idx` (`m_jawaban_id_jawaban`),
  ADD KEY `fk_m_spam_jawaban_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`);

--
-- Indexes for table `m_spam_pertanyaan`
--
ALTER TABLE `m_spam_pertanyaan`
  ADD PRIMARY KEY (`id_spam`),
  ADD KEY `fk_m_spam_pertanyaan_m_pertanyaan1_idx` (`m_pertanyaan_id_pertanyaan`),
  ADD KEY `fk_m_spam_pertanyaan_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `fk_notifikasi_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `fk_pesan_member1_idx` (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`),
  ADD KEY `fk_pesan_member2_idx` (`member_id_member1`,`member_m_pekerjaan_id_pekerjaan1`,`member_m_pendidikan_id_pendidikan1`,`member_m_lokasi_id_lokasi1`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_ad_set`
--
ALTER TABLE `mb_ad_set`
  MODIFY `id_adset` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_audience`
--
ALTER TABLE `mb_audience`
  MODIFY `id_audience` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_bisnis_detail`
--
ALTER TABLE `mb_bisnis_detail`
  MODIFY `id_bisnis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_email_report`
--
ALTER TABLE `mb_email_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_kampanye`
--
ALTER TABLE `mb_kampanye`
  MODIFY `id_kampanye` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_metode_pembayaran`
--
ALTER TABLE `mb_metode_pembayaran`
  MODIFY `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mb_topup_transaksi`
--
ALTER TABLE `mb_topup_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_bisnis`
--
ALTER TABLE `member_bisnis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_dukungan`
--
ALTER TABLE `m_dukungan`
  MODIFY `id_dukungan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_feed`
--
ALTER TABLE `m_feed`
  MODIFY `id_feed` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_jawaban`
--
ALTER TABLE `m_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk_Blog_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konten_blog`
--
ALTER TABLE `konten_blog`
  ADD CONSTRAINT `fk_konten_blog_Blog1` FOREIGN KEY (`Blog_id_blog`) REFERENCES `blog` (`id_blog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_konten_blog_topik1` FOREIGN KEY (`topik_id_topik`) REFERENCES `topik` (`id_topik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mb_ad_set`
--
ALTER TABLE `mb_ad_set`
  ADD CONSTRAINT `fk_mb_ad_set_mb_audience1` FOREIGN KEY (`mb_audience_id_audience`) REFERENCES `mb_audience` (`id_audience`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mb_ad_set_mb_kampanye1` FOREIGN KEY (`mb_kampanye_id_kampanye`) REFERENCES `mb_kampanye` (`id_kampanye`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mb_email_report`
--
ALTER TABLE `mb_email_report`
  ADD CONSTRAINT `fk_mb_email_report_mb_bisnis_detail1` FOREIGN KEY (`mb_bisnis_detail_id_bisnis`) REFERENCES `mb_bisnis_detail` (`id_bisnis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mb_kampanye`
--
ALTER TABLE `mb_kampanye`
  ADD CONSTRAINT `fk_mb_kampanye_mb_bisnis_detail1` FOREIGN KEY (`mb_bisnis_detail_id_bisnis`) REFERENCES `mb_bisnis_detail` (`id_bisnis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mb_topup_transaksi`
--
ALTER TABLE `mb_topup_transaksi`
  ADD CONSTRAINT `fk_mb_topup_transaksi_mb_metode_pembayaran1` FOREIGN KEY (`mb_metode_pembayaran_id_metode_pembayaran`) REFERENCES `mb_metode_pembayaran` (`id_metode_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mb_topup_transaksi_member_bisnis1` FOREIGN KEY (`member_bisnis_id`) REFERENCES `member_bisnis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_member_m_lokasi1` FOREIGN KEY (`m_lokasi_id_lokasi1`) REFERENCES `m_lokasi` (`id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_member_m_pekerjaan1` FOREIGN KEY (`m_pekerjaan_id_pekerjaan1`) REFERENCES `m_pekerjaan` (`id_pekerjaan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_member_m_pendidikan1` FOREIGN KEY (`m_pendidikan_id_pendidikan1`) REFERENCES `m_pendidikan` (`id_pendidikan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_bisnis`
--
ALTER TABLE `member_bisnis`
  ADD CONSTRAINT `fk_member_bisnis_mb_bisnis_detail1` FOREIGN KEY (`mb_bisnis_detail_id_bisnis`) REFERENCES `mb_bisnis_detail` (`id_bisnis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_dukungan`
--
ALTER TABLE `m_dukungan`
  ADD CONSTRAINT `fk_m_dukungan_m_jawaban1` FOREIGN KEY (`m_jawaban_id_jawaban`) REFERENCES `m_jawaban` (`id_jawaban`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_m_dukungan_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_feed`
--
ALTER TABLE `m_feed`
  ADD CONSTRAINT `fk_m_feed_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_m_feed_topik1` FOREIGN KEY (`topik_id_topik`) REFERENCES `topik` (`id_topik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_komentar`
--
ALTER TABLE `m_komentar`
  ADD CONSTRAINT `fk_m_komentar_m_jawaban1` FOREIGN KEY (`m_jawaban_id_jawaban`) REFERENCES `m_jawaban` (`id_jawaban`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_pengikut`
--
ALTER TABLE `m_pengikut`
  ADD CONSTRAINT `fk_m_pengikut_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_m_pengikut_member2` FOREIGN KEY (`member_id_member1`,`member_m_pekerjaan_id_pekerjaan1`,`member_m_pendidikan_id_pendidikan1`,`member_m_lokasi_id_lokasi1`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_pengikut_pertanyaan`
--
ALTER TABLE `m_pengikut_pertanyaan`
  ADD CONSTRAINT `fk_m_pengikut_pertanyaan_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  ADD CONSTRAINT `fk_m_pertanyaan_topik1` FOREIGN KEY (`topik_id_topik`) REFERENCES `topik` (`id_topik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_spam_jawaban`
--
ALTER TABLE `m_spam_jawaban`
  ADD CONSTRAINT `fk_m_spam_jawaban_m_jawaban1` FOREIGN KEY (`m_jawaban_id_jawaban`) REFERENCES `m_jawaban` (`id_jawaban`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_m_spam_jawaban_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_spam_pertanyaan`
--
ALTER TABLE `m_spam_pertanyaan`
  ADD CONSTRAINT `fk_m_spam_pertanyaan_m_pertanyaan1` FOREIGN KEY (`m_pertanyaan_id_pertanyaan`) REFERENCES `m_pertanyaan` (`id_pertanyaan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_m_spam_pertanyaan_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `fk_notifikasi_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `fk_pesan_member1` FOREIGN KEY (`member_id_member`,`member_m_pekerjaan_id_pekerjaan`,`member_m_pendidikan_id_pendidikan`,`member_m_lokasi_id_lokasi`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pesan_member2` FOREIGN KEY (`member_id_member1`,`member_m_pekerjaan_id_pekerjaan1`,`member_m_pendidikan_id_pendidikan1`,`member_m_lokasi_id_lokasi1`) REFERENCES `member` (`id_member`, `m_pekerjaan_id_pekerjaan`, `m_pendidikan_id_pendidikan`, `m_lokasi_id_lokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
