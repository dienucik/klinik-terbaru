-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2019 pada 15.46
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_sehat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(50) NOT NULL,
  `id_rm` int(50) NOT NULL,
  `id_penyakit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `id_rm`, `id_penyakit`) VALUES
(1, 16, 70),
(2, 16, 4),
(3, 18, 9),
(4, 18, 19),
(5, 19, 12),
(6, 19, 11),
(7, 24, 58),
(8, 24, 16),
(10, 23, 10),
(11, 25, 60),
(12, 26, 39),
(14, 28, 81),
(15, 29, 31),
(16, 30, 55),
(17, 31, 83);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(50) NOT NULL,
  `no_KTP` varchar(50) NOT NULL,
  `sip` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `jenis_dokter` enum('dokter umum','dokter gigi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `no_KTP`, `sip`, `nama_dokter`, `alamat`, `no_telp`, `jenis_dokter`) VALUES
(1, '34562147483647', '123 / abc / 345 / 2013', 'dr. Errythrina Whismah M.Kes', 'argamas timur', '081390292789', 'dokter umum'),
(2, '324536728910', '165 / ijk / 385 / 2016', 'dr. Purwaningrum', 'argamas barat', '085265478963', 'dokter umum'),
(3, '3987509278190', '234 / pqr / 245 / 2015', 'drg. Tutik Winarni', 'Argomulyo', '081223456728', 'dokter gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gigi`
--

CREATE TABLE `gigi` (
  `id_gigi` int(50) NOT NULL,
  `nomor_gigi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gigi`
--

INSERT INTO `gigi` (`id_gigi`, `nomor_gigi`) VALUES
(1, 18),
(2, 17),
(3, 16),
(4, 15),
(5, 14),
(6, 13),
(7, 12),
(8, 11),
(9, 21),
(10, 22),
(11, 23),
(12, 24),
(13, 25),
(14, 26),
(15, 27),
(16, 28),
(17, 55),
(18, 54),
(19, 53),
(20, 52),
(21, 51),
(22, 61),
(23, 62),
(24, 63),
(25, 64),
(26, 65),
(27, 85),
(28, 84),
(29, 83),
(30, 82),
(31, 81),
(32, 71),
(33, 72),
(34, 73),
(35, 74),
(36, 75),
(37, 48),
(38, 47),
(39, 46),
(40, 45),
(41, 44),
(42, 43),
(43, 42),
(44, 41),
(45, 31),
(46, 32),
(47, 33),
(48, 34),
(49, 35),
(50, 36),
(51, 37),
(52, 38);

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemen`
--

CREATE TABLE `manajemen` (
  `id_manajemen` int(50) NOT NULL,
  `nama_manajemen` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manajemen`
--

INSERT INTO `manajemen` (`id_manajemen`, `nama_manajemen`, `alamat`, `no_telp`) VALUES
(1, 'Bambang Santosa', 'Argoboga', '089897678890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `stok_obat` varchar(50) NOT NULL,
  `sediaan` enum('tablet','kapsul','cair','kaplet','salep') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok_obat`, `sediaan`) VALUES
(1, 'Amoxsan 250 mg', '10', 'kaplet'),
(2, 'Amaryl M 1', '2', 'tablet'),
(3, 'Amaryl M 2', '6', 'tablet'),
(4, 'Aldisi SR', '3', 'tablet'),
(5, 'Artrodar', '8', 'tablet'),
(6, 'Acyclovir', '3', 'tablet'),
(7, 'Carniq', '10', 'tablet'),
(8, 'Cefarox 100', '10', 'tablet'),
(9, 'Compraz', '10', 'tablet'),
(10, 'Celestamine', '10', 'tablet'),
(11, 'Centrizine', '10', 'tablet'),
(12, 'Cardivask 5', '10', 'tablet'),
(13, 'Cardivask 10', '10', 'tablet'),
(14, 'Captopril 12,5', '10', 'tablet'),
(15, 'Creestor 20', '10', 'tablet'),
(16, 'Cedocart 5', '10', 'tablet'),
(17, 'Digest 30', '10', 'tablet'),
(18, 'Dextamine', '10', 'tablet'),
(19, 'Diaglime 2', '10', 'tablet'),
(20, 'Ester C', '10', 'tablet'),
(21, 'Enzlyplex', '10', 'tablet'),
(22, 'Fludane', '10', 'tablet'),
(23, 'Fludane plus', '10', 'tablet'),
(24, 'Flutamol plus', '10', 'tablet'),
(25, 'Flutab', '10', 'tablet'),
(26, 'Fixef 100', '10', 'tablet'),
(27, 'Fleximuv capsul', '10', 'tablet'),
(28, 'Fg.Troches', '10', 'tablet'),
(29, 'gastram', '10', 'tablet'),
(30, 'Gastrilan', '10', 'tablet'),
(31, 'Glucovance 500/2.5', '10', 'tablet'),
(32, 'Incidal OD', '10', 'tablet'),
(33, 'Imodium', '10', 'tablet'),
(34, 'Itzol', '10', 'tablet'),
(35, 'Inflaz 4', '10', 'tablet'),
(36, 'Imox', '10', 'tablet'),
(37, 'Kalmoxillin 500', '10', 'tablet'),
(38, 'Kaflam', '10', 'tablet'),
(39, 'Lesvatin 10', '10', 'tablet'),
(40, 'Lipitor 10', '10', 'tablet'),
(41, 'lipinorm 10', '10', 'tablet'),
(42, 'lipinorm 20', '10', 'tablet'),
(43, 'Lodia', '10', 'tablet'),
(44, 'Lodoz 2.5', '10', 'tablet'),
(45, 'Lacophen 500', '10', 'tablet'),
(46, 'Lyphen', '10', 'tablet'),
(47, 'Leomoxyl 500', '10', 'tablet'),
(48, 'Mefinal 500', '10', 'tablet'),
(49, 'Molasic 500', '10', 'tablet'),
(50, 'Mesol 4', '10', 'tablet'),
(51, 'Mesol 8', '10', 'tablet'),
(52, 'Neurodial ', '10', 'tablet'),
(53, 'New Diatab', '10', 'tablet'),
(54, 'Norvask 5', '10', 'tablet'),
(55, 'Neurobion 500', '10', 'tablet'),
(56, 'Neurofeenac plus', '10', 'tablet'),
(57, 'Plantacid forte', '10', 'tablet'),
(58, 'Pariet 20', '10', 'tablet'),
(59, 'Pirofel 20', '10', 'tablet'),
(60, 'Provital plus', '10', 'tablet'),
(61, 'Remelox 7.5', '10', 'tablet'),
(62, 'Recustein', '10', 'tablet'),
(63, 'Sanmol', '10', 'tablet'),
(64, 'Sanprima Forte', '10', 'tablet'),
(65, 'Spasmacine', '10', 'tablet'),
(66, 'Tranec', '10', 'tablet'),
(67, 'Transamin', '10', 'tablet'),
(68, 'Tylonic 300', '10', 'tablet'),
(69, 'Ulsikur', '10', 'tablet'),
(70, 'Vocefa 500', '10', 'tablet'),
(71, 'Viaclav 500', '10', 'tablet'),
(72, 'Vomistop', '10', 'tablet'),
(73, 'Zyloric 300', '10', 'tablet'),
(74, 'Zincare', '10', 'tablet'),
(75, 'Zegase', '10', 'tablet'),
(76, 'Albothyl cons', '5', 'tablet'),
(77, 'Amoxsan 125 mg DS', '10', 'tablet'),
(78, 'Apialys syrup', '10', 'tablet'),
(79, 'Benacol exp yrup', '10', 'tablet'),
(80, 'Bethadine gargle 190 ml', '10', 'tablet'),
(81, 'bethadine sol 30 ml', '10', 'tablet'),
(82, 'bethadine sol 60 ml', '8', 'tablet'),
(83, 'Caladinel lot 95 ml', '10', 'tablet'),
(84, 'Farmacrol forte susp', '10', 'tablet'),
(85, 'Flutamol plus syrup', '10', 'tablet'),
(86, 'kalmoxillin syrup', '10', 'tablet'),
(87, 'Lenopront syrup', '10', 'tablet'),
(88, 'Nifural syrup', '10', 'tablet'),
(89, 'OBH Nellco sp dewasa', '10', 'tablet'),
(90, 'OBH Nellco sp anak', '10', 'tablet'),
(91, 'primperan drop', '10', 'tablet'),
(92, 'plantacid susp', '10', 'tablet'),
(93, 'propepsa susp', '10', 'tablet'),
(94, 'Sanadryl DMP syrup', '10', 'tablet'),
(95, 'Sanadryl exp syrup', '10', 'tablet'),
(96, 'Sanmol syrup', '10', 'tablet'),
(97, 'Tempra syrup', '10', 'tablet'),
(98, 'Tempra drop', '10', 'tablet'),
(99, 'Triaminic pilek syrup', '10', 'tablet'),
(100, 'Triaminic batuk pilek syrup', '10', 'tablet'),
(101, 'Toplexil syrup 120 ml', '10', 'tablet'),
(102, 'Vocefa forte 250 mg DS', '10', 'tablet'),
(103, 'Ventolin exp syrup', '10', 'tablet'),
(104, 'Bioplacenton gel', '10', 'tablet'),
(105, 'Burnazin Zalf', '10', 'tablet'),
(106, 'Bethadine zalf 10 gr', '10', 'tablet'),
(107, 'Benoson cr', '10', 'tablet'),
(108, 'Counterpain cr 30 gr', '10', 'tablet'),
(109, 'Diprosone cr', '10', 'tablet'),
(110, 'Diprogenta cr', '10', 'tablet'),
(111, 'Fleximuv cr', '10', 'tablet'),
(112, 'Formyco cr', '10', 'tablet'),
(113, 'Ichtiol zalf', '10', 'tablet'),
(114, 'Kenalog in orabase', '10', 'tablet'),
(115, 'Thrombophob gel', '10', 'tablet'),
(116, 'Thecort cr', '10', 'tablet'),
(117, 'Virumerz gel 10 gr', '10', 'tablet'),
(118, 'Tarivid otic', '10', 'tablet'),
(119, 'Faktu supp', '10', 'tablet'),
(120, 'Haemocaine oint 15 gr', '10', 'tablet'),
(121, 'c.Eyefresh TM', '10', 'tablet'),
(122, 'c.Fenicol TM 0,5 %', '10', 'tablet'),
(123, 'C.Fenicol ZM', '10', 'tablet'),
(124, 'C. Xitrol TM', '10', 'tablet'),
(125, 'C.Xitrol Zm', '10', 'tablet'),
(126, 'Visine Tm', '10', 'tablet'),
(127, 'Dexamethasone inj', '8', 'tablet'),
(128, 'Neurabion 5000 inj', '8', 'tablet'),
(129, 'Ranitidine inj', '10', 'tablet'),
(130, 'acetaminofen', '20', 'tablet'),
(131, 'calamine', '10', 'salep'),
(132, 'antithistamin', '10', 'kaplet'),
(133, 'panadol', '', 'tablet'),
(134, 'paramex', '', 'tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(50) NOT NULL,
  `no_rekam_medis` varchar(50) NOT NULL,
  `no_KTP` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_pasien` enum('umum','BPJS','PLN') NOT NULL,
  `no_BPJS` varchar(50) DEFAULT NULL,
  `no_PLN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rekam_medis`, `no_KTP`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `jenis_pasien`, `no_BPJS`, `no_PLN`) VALUES
(5, '00001', '3373034112960001', 'Dien NoorFawziah PandiAstuti', '1996-12-01', 'perempuan', 'Argamas Barat III No 411 Salatiga', '087839122183', 'BPJS', '154895', ''),
(6, '00002', '3373034112960002', 'Tegar Jati Wicaksono', '1996-08-16', 'laki-laki', 'canden', '085265478963', 'umum', '', ''),
(7, '00003', '3373034112960003', 'Dita Safitri Pandi Astuti', '1992-04-19', 'perempuan', 'argamas barat 3 no 411 salatiga', '08562688170', 'PLN', '', '14785693'),
(8, '00004', '3373034112960005', 'Supandi', '1962-11-13', 'laki-laki', 'argamas barat 3 no 411 salatiga', '08122816299', 'BPJS', '8797627', ''),
(9, '00005', '3373034112960007', 'Umi Hartutik', '1963-07-21', 'perempuan', 'Argamas Barat III No 411 Salatiga', '081390023511', 'PLN', '', '89767859'),
(10, '00006', '3373034112960010', 'Dewi Utami Retnoningsih', '1997-05-07', 'perempuan', 'Bawen Raya RT 1 RW 3', '089897867980', 'BPJS', '237891098', ''),
(11, '00007', '3373034112960011', 'Yuni Kurniawardhani', '1968-06-21', 'perempuan', 'canden raya kompleks canden permai', '089786909909', 'umum', '', ''),
(12, '00008', '337303411296008', 'Dyah Suryaningrum', '2001-01-19', 'perempuan', 'canden RT1 RW 3 Salatiga', '0897868990', 'BPJS', '1548957688', ''),
(13, '00009', '337303411296009', 'Nadila', '1996-12-05', 'perempuan', 'yogyakarta', '089798000900', 'BPJS', '5624431', ''),
(14, '00010', '3373034112960435', 'Fadhila Syahla', '1997-03-21', 'perempuan', 'jalan ki penjawi salatiga', '08563452671', 'umum', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_gigi`
--

CREATE TABLE `pasien_gigi` (
  `id_pasien` int(50) NOT NULL,
  `no_rekam_medis` varchar(50) NOT NULL,
  `no_KTP` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_pasien` enum('umum','BPJS','PLN') NOT NULL,
  `no_BPJS` varchar(50) DEFAULT NULL,
  `no_PLN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien_gigi`
--

INSERT INTO `pasien_gigi` (`id_pasien`, `no_rekam_medis`, `no_KTP`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `jenis_pasien`, `no_BPJS`, `no_PLN`) VALUES
(2, 'G0001', '3373034112960001', 'Dien NoorFawziah PandiAstuti', '1996-12-01', 'perempuan', 'Argamas Barat III No 411 Salatiga', '087839122183', 'BPJS', '154895', ''),
(3, 'G0002', '3373034112960003', 'Dita Safitri Pandi Astuti', '1992-04-19', 'perempuan', 'Argamas Barat III No 411 Salatiga', '087838964070', 'umum', '', ''),
(4, 'G0003', '3373034112960786', 'Fikri Muktaf', '1991-11-21', 'laki-laki', 'banyu putih salatiga', '087896785909', 'BPJS', '1548957688', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_obat`
--

CREATE TABLE `pemakaian_obat` (
  `id_pemakaian_obat` int(50) NOT NULL,
  `id_rm` int(50) NOT NULL,
  `id_obat` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `dosis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaian_obat`
--

INSERT INTO `pemakaian_obat` (`id_pemakaian_obat`, `id_rm`, `id_obat`, `jumlah`, `dosis`) VALUES
(9, 4, 14, 122, '323'),
(10, 4, 7, 12, '12'),
(11, 4, 10, 20, '3x1'),
(12, 7, 14, 1, '3x1'),
(13, 7, 17, 1, '3x1'),
(14, 8, 18, 1, '2x1'),
(15, 8, 15, 1, '3x1'),
(16, 8, 3, 1, '3x1'),
(17, 9, 18, 1, '3x1'),
(18, 9, 15, 1, '3x1'),
(19, 9, 5, 1, '2x1'),
(20, 9, 3, 1, '3x1'),
(21, 10, 130, 1, '3x1'),
(22, 10, 131, 1, '3x1'),
(23, 10, 132, 1, '3x1'),
(24, 11, 19, 1, '3x1'),
(25, 11, 17, 1, '3x1'),
(26, 11, 11, 1, '3x1'),
(27, 11, 7, 1, '3x1'),
(28, 15, 14, 1, '3x1'),
(29, 15, 16, 1, '3x1'),
(30, 15, 9, 1, '3x1'),
(31, 15, 7, 1, '3x1'),
(32, 16, 3, 1, '3x1'),
(33, 16, 18, 1, '3x1'),
(34, 16, 77, 1, '3x1'),
(35, 18, 17, 1, '3x1'),
(36, 18, 18, 1, '3x1'),
(37, 18, 14, 1, '3x1'),
(38, 19, 69, 1, '3x1'),
(39, 19, 74, 1, '3x1'),
(40, 24, 4, 1, '3x1'),
(41, 24, 12, 1, '3x1'),
(42, 24, 18, 1, '3x1'),
(43, 24, 19, 1, '3x1'),
(44, 23, 26, 1, '3x1'),
(45, 25, 24, 1, '3x1'),
(46, 26, 17, 1, '3x1'),
(47, 26, 1, 1, '3x1'),
(48, 28, 24, 1, '3x1'),
(49, 29, 25, 1, '3x1'),
(50, 29, 28, 1, '3x1'),
(51, 30, 37, 1, '3x1'),
(52, 30, 39, 1, '3x1'),
(53, 31, 22, 1, '3x1'),
(54, 31, 29, 1, '3x1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_obat_gigi`
--

CREATE TABLE `pemakaian_obat_gigi` (
  `id_pemakaian_obat_gigi` int(50) NOT NULL,
  `id_rm` int(50) NOT NULL,
  `id_obat` int(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `dosis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaian_obat_gigi`
--

INSERT INTO `pemakaian_obat_gigi` (`id_pemakaian_obat_gigi`, `id_rm`, `id_obat`, `jumlah`, `dosis`) VALUES
(1, 3, 18, '1', '3x1'),
(2, 6, 10, '1', '3x1'),
(3, 7, 49, '1', '3x1'),
(4, 5, 17, '1', '3x1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_gigi`
--

CREATE TABLE `pemeriksaan_gigi` (
  `id_pemeriksaan_gigi` int(50) NOT NULL,
  `id_gigi` int(50) NOT NULL,
  `id_rm` int(50) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `perawatan` varchar(100) NOT NULL,
  `kode_ICD_10` enum('amf','amf-rct','ano','car','cfr','cof','cof-rct','fis','fmc','fmc-rct','ipx','mis','non','nvt','poc','poc-rct','prd-fld','pre','rct','rrx','une') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan_gigi`
--

INSERT INTO `pemeriksaan_gigi` (`id_pemeriksaan_gigi`, `id_gigi`, `id_rm`, `keluhan`, `perawatan`, `kode_ICD_10`) VALUES
(8, 33, 1, 'Test', 'Di sikat', 'poc-rct'),
(9, 22, 2, 'Test', 'Di sikat', 'nvt'),
(10, 22, 3, 'Test', 'Di sikat', 'non'),
(11, 20, 4, 'Test', 'Di sikat', 'poc-rct'),
(12, 22, 4, '', '', 'amf'),
(13, 19, 4, 'Test', '', 'mis'),
(14, 24, 4, 'Test', '', 'prd-fld'),
(15, 10, 4, '', '', 'poc-rct'),
(16, 1, 4, '', '', 'une'),
(17, 2, 4, '', '', 'une'),
(18, 17, 4, 'Test', '', 'nvt'),
(19, 7, 6, 'Test', 'Di sikat', 'fmc-rct'),
(20, 16, 7, 'goyang', 'cabut', 'fis'),
(21, 22, 5, 'goyang', 'cabut', 'fmc'),
(22, 23, 5, 'goyang', 'cabut', 'cfr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(50) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
(1, 'Apendiksitis'),
(2, 'Asma'),
(3, 'Anemia'),
(4, 'Diabetes Melitu'),
(5, 'Diare & Gastroe'),
(6, 'Gangguan Ginjal'),
(7, 'Gangguan Mata'),
(8, 'Gasteritis & Du'),
(9, 'Gigi & Mulut'),
(10, 'Ginekologi'),
(11, 'Hati lainnya'),
(12, 'Hemia'),
(13, 'Hemoroid'),
(14, 'Hiperlipidemia'),
(15, 'Hipertensi'),
(16, 'ISPA'),
(17, 'Jantung'),
(18, 'Karsinoma'),
(19, 'Kecelakaan'),
(20, 'Kehamilan Norma'),
(21, 'Kontrasepsi'),
(22, 'Kulit'),
(23, 'Migren & Sindro'),
(24, 'Neurologi'),
(25, 'Osteoarteritis'),
(26, 'Psikosis'),
(27, 'Sinusitis'),
(28, 'Sist Kemih Lain'),
(29, 'Sist muskuloske'),
(30, 'Telinga'),
(31, 'Thyroid'),
(32, 'Tuberculosis'),
(33, 'Hiperpuricemia'),
(34, 'Tumor'),
(35, 'Paru'),
(36, 'Imsomnia'),
(37, 'Demam'),
(38, 'Hipotensi'),
(39, 'cacar'),
(41, 'hepatitis A'),
(54, 'hepatitis B'),
(55, 'DBD'),
(56, 'gondongan'),
(57, 'radang'),
(58, 'flek paru-paru'),
(59, 'ekzim'),
(60, 'psioriasis'),
(61, 'maag'),
(62, 'kanker paru-paru'),
(63, 'kanker hati'),
(64, 'kanker serviks'),
(65, 'kanker otak'),
(66, 'kanker kulit'),
(69, 'kanker usus'),
(70, 'asam urat'),
(71, 'masuk angin'),
(72, 'kesleo'),
(73, 'luka bakar'),
(74, 'pneumonia'),
(75, 'herpes'),
(76, 'TBC'),
(77, 'Muntaber'),
(78, 'kolera'),
(79, 'polio'),
(80, 'panu'),
(81, 'saraf terjepit'),
(82, 'ebola'),
(83, 'tetanus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawat`
--

CREATE TABLE `perawat` (
  `id_perawat` int(50) NOT NULL,
  `nama_perawat` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perawat`
--

INSERT INTO `perawat` (`id_perawat`, `nama_perawat`, `alamat`, `no_telp`) VALUES
(1, 'wahyuni', 'canden', '085265478963'),
(2, 'Rina Sulistyawati', 'Getasan', '08786564345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(50) NOT NULL,
  `id_pasien` int(50) NOT NULL,
  `keluhan` text NOT NULL,
  `alergi_obat` varchar(50) NOT NULL,
  `riwayat_penyakit` varchar(50) NOT NULL,
  `berat_badan` int(50) NOT NULL,
  `tinggi_badan` int(50) NOT NULL,
  `sistolik` int(50) NOT NULL,
  `diastolik` int(50) NOT NULL,
  `nadi` int(50) NOT NULL,
  `suhu` float NOT NULL,
  `kolesterol_tetap` int(50) NOT NULL,
  `gula_darah_sesaat` int(50) NOT NULL,
  `asam_urat` int(50) NOT NULL,
  `rujuk` varchar(50) NOT NULL,
  `temuan_dokter` text NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `id_pemakaian_obat` int(50) NOT NULL,
  `id_dokter` int(50) NOT NULL,
  `status_pasien` enum('antri','sudah diperiksa') NOT NULL,
  `tanggal_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_pasien`, `keluhan`, `alergi_obat`, `riwayat_penyakit`, `berat_badan`, `tinggi_badan`, `sistolik`, `diastolik`, `nadi`, `suhu`, `kolesterol_tetap`, `gula_darah_sesaat`, `asam_urat`, `rujuk`, `temuan_dokter`, `diagnosa`, `id_pemakaian_obat`, `id_dokter`, `status_pasien`, `tanggal_periksa`) VALUES
(4, 5, 'sakit perut bagian tengah sudah tiga hari', '', '', 65, 165, 120, 80, 100, 37, 0, 0, 0, '', 'ada gangguan dibagian jantung', 'Jantung', 0, 2, 'sudah diperiksa', '2019-02-03'),
(7, 9, 'gatal-gatal di tangan bagian kiri, sesak 3 hari', 'Cedocart 5', 'Asma', 60, 155, 120, 80, 100, 37, 0, 0, 0, '', 'ruam gatal kemerahan pada kulit yang muncul akibat kontak langsung dengan zat tertentu', 'Apendiksitis', 0, 1, 'sudah diperiksa', '2019-02-18'),
(8, 10, 'sakit kepala 3 hari ', '', 'Anemia', 45, 155, 120, 70, 100, 34, 0, 0, 0, '', 'pernafasan tidak teratur, mata berkunang-kunang', 'Gangguan Mata', 0, 1, 'sudah diperiksa', '2019-03-19'),
(9, 11, 'sakit perut 3 hari ', 'Cardivask 5', 'Asma', 50, 150, 120, 80, 100, 34, 0, 0, 0, '', 'bengkak diperut sebelah kanan', 'Gangguan Ginjal', 0, 1, 'sudah diperiksa', '2019-03-19'),
(10, 12, 'demam 3 hari, pusing, lemas, nyeri tenggorokan', '', 'Anemia', 50, 160, 120, 80, 100, 37, 0, 0, 0, '', 'ruam merah diperut, pinggang, wajah berwarna merah kecil berair', 'cacar', 0, 1, 'sudah diperiksa', '2019-03-19'),
(11, 12, 'sakit di ulu hati', 'Amaryl M 1', 'Anemia', 55, 165, 120, 80, 100, 34, 100, 50, 2, '', 'pembengkakan di hati', 'Hati lainnya', 0, 1, 'sudah diperiksa', '2019-03-21'),
(15, 6, 'batuk sudah 3 hari', '', 'Jantung', 86, 175, 120, 70, 100, 34, 0, 0, 0, '', 'ada gangguan dibagian antara laring dengan jantung', 'ISPA', 0, 1, 'sudah diperiksa', '2019-04-01'),
(16, 8, 'kaki bengkak', '', '-', 86, 160, 120, 80, 100, 34, 0, 0, 0, '', 'ada nanah dibagian kaki kiri', '', 0, 1, 'sudah diperiksa', '2019-04-01'),
(17, 10, 'test', '', '', 60, 160, 100, 80, 100, 34, 0, 0, 0, '', 'test', 'test', 0, 1, 'sudah diperiksa', '2018-08-01'),
(18, 12, 'sakit punggung', '', '', 50, 155, 120, 80, 100, 34, 0, 0, 0, '', 'coba', '', 0, 1, 'sudah diperiksa', '2019-04-02'),
(19, 8, 'ulu hati sakit', '', '', 80, 160, 120, 80, 100, 34, 0, 0, 0, '', 'ada bengkak di bagian perut tengah', '', 0, 1, 'sudah diperiksa', '2019-04-03'),
(23, 12, 'haid tidak lancar', '', '', 50, 160, 120, 80, 100, 34, 0, 0, 0, '', 'ada penumpukan lemak yang mengakibatkan haid tidak lancar', '', 0, 1, 'sudah diperiksa', '2019-04-04'),
(24, 13, 'gatal-gatal', 'panadol', '', 60, 165, 120, 80, 100, 34, 0, 0, 0, '', 'ruam merah', '', 0, 1, 'sudah diperiksa', '2019-04-04'),
(25, 14, 'kulit mengelupas dibagian leher', '', '', 50, 160, 120, 80, 100, 34, 0, 0, 0, '', 'kulit mengelupas dan ada luka memerah', '', 0, 2, 'sudah diperiksa', '2019-04-07'),
(26, 14, 'gatal dibagian perut', '', '', 50, 160, 120, 80, 100, 34, 0, 0, 0, '', 'ruam merah di bagian perut sebelah kiri', '', 0, 2, 'sudah diperiksa', '2019-04-07'),
(27, 14, 'perut terasa kembung, bila dipegang sakit', '', '', 55, 165, 120, 80, 100, 34, 0, 0, 0, '', 'asam lambung meningkat', '', 0, 1, 'sudah diperiksa', '2019-04-08'),
(28, 6, 'sakit dibagian punggung ', '', '', 86, 175, 120, 80, 100, 34, 0, 0, 0, 'laboratorium kimia farma', 'ada penyempitan pembuluh darah di bagian punggung', '', 0, 2, 'sudah diperiksa', '2019-04-09'),
(29, 10, 'demam, sakit kepala, nyeri otot, muntah-muntah', '', '', 50, 160, 120, 80, 100, 34, 0, 0, 0, '', 'peradangan hati, rusaknya ginjal, turunnya jumlah trombosit drastis', '', 0, 2, 'sudah diperiksa', '2019-04-09'),
(30, 11, 'demam tinggi 3 hari, sakit pada persendian', '', '', 50, 150, 120, 80, 100, 34, 0, 0, 0, '', 'munculnya bintik-bintik merah, turunnya trombosit secara drastis', '', 0, 1, 'sudah diperiksa', '2019-04-09'),
(31, 13, 'kejang-kejang', '', '', 55, 150, 120, 80, 100, 34, 0, 0, 0, '', 'infeksi luka yang terbuka yang diakibatkan kuman Clostridium tetani', '', 0, 2, 'sudah diperiksa', '2019-04-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis_pasien_gigi`
--

CREATE TABLE `rekam_medis_pasien_gigi` (
  `id_rm` int(50) NOT NULL,
  `id_pasien` int(50) NOT NULL,
  `keluhan` text NOT NULL,
  `alergi_obat` varchar(50) NOT NULL,
  `alergi_makanan` varchar(50) NOT NULL,
  `golongan_darah` enum('A','B','AB','O') NOT NULL,
  `sistolik` int(50) NOT NULL,
  `diastolik` int(50) NOT NULL,
  `nadi` int(50) NOT NULL,
  `occlusi` enum('normal bite','cross bite','steep bite') NOT NULL,
  `torus_palatinus` enum('tidak ada','kecil','sedang','besar','multiple') NOT NULL,
  `torus_mandibularis` enum('tidak ada','sisi kiri','sisi kanan','kedua sisi') NOT NULL,
  `palatum` enum('dalam','sedang','rendah') NOT NULL,
  `diastema` enum('ada','tidak ada') NOT NULL,
  `ket_diastema` text NOT NULL,
  `gigi_anomali` enum('ada','tidak ada') NOT NULL,
  `ket_gigi_anomali` text NOT NULL,
  `lain_lain` varchar(50) NOT NULL,
  `id_odontogram` int(50) NOT NULL,
  `id_pemakaian_obat` int(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_penyakit` int(50) NOT NULL,
  `rujuk` varchar(100) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `status_pasien` enum('sudah di periksa','antri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekam_medis_pasien_gigi`
--

INSERT INTO `rekam_medis_pasien_gigi` (`id_rm`, `id_pasien`, `keluhan`, `alergi_obat`, `alergi_makanan`, `golongan_darah`, `sistolik`, `diastolik`, `nadi`, `occlusi`, `torus_palatinus`, `torus_mandibularis`, `palatum`, `diastema`, `ket_diastema`, `gigi_anomali`, `ket_gigi_anomali`, `lain_lain`, `id_odontogram`, `id_pemakaian_obat`, `id_dokter`, `id_penyakit`, `rujuk`, `tanggal_periksa`, `status_pasien`) VALUES
(1, 2, 'sakit gigi ', '', 'yang dingin', 'A', 120, 80, 100, 'normal bite', 'sedang', 'tidak ada', 'sedang', 'tidak ada', '', 'tidak ada', '', '', 0, 0, 'drg. Tutik Winarni', 0, '', '2019-03-21', ''),
(2, 3, 'sakit gigi', '', 'yang dingin', 'A', 120, 80, 100, 'steep bite', 'sedang', 'tidak ada', 'rendah', 'tidak ada', '', 'tidak ada', '', '', 0, 0, 'drg. Tutik Winarni', 0, '', '2019-03-21', ''),
(3, 2, 'sakit', '', 'yang dingin', 'A', 120, 80, 100, 'normal bite', 'sedang', 'tidak ada', 'dalam', 'tidak ada', '', 'tidak ada', '', '', 0, 0, 'drg. Tutik Winarni', 0, '', '2019-03-21', ''),
(5, 3, 'sakit gigi bagian belakang', '', 'dingin', 'A', 120, 80, 100, 'cross bite', 'sedang', 'tidak ada', 'rendah', 'ada', 'pada gigi 61', 'ada', 'pada gigi 62', '', 0, 0, 'drg. Tutik Winarni', 0, '', '2019-04-03', ''),
(6, 3, 'sakit gigi bagian belakang kanan', 'panadol', 'dingin', 'A', 120, 80, 100, 'normal bite', 'tidak ada', 'tidak ada', 'dalam', 'tidak ada', '', 'tidak ada', '', '', 0, 0, 'drg. Tutik Winarni', 0, '', '2019-04-04', ''),
(7, 4, 'gigi belakang kanan goyang', '', 'makanan yang terlalu panas', 'AB', 120, 80, 100, 'cross bite', 'tidak ada', 'tidak ada', 'sedang', 'tidak ada', '', 'tidak ada', '', '', 0, 0, 'drg. Tutik Winarni', 0, '', '2019-04-06', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penyakit`
--

CREATE TABLE `riwayat_penyakit` (
  `id_riwayat_penyakit` int(50) NOT NULL,
  `id_pasien` int(50) NOT NULL,
  `id_penyakit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_penyakit`
--

INSERT INTO `riwayat_penyakit` (`id_riwayat_penyakit`, `id_pasien`, `id_penyakit`) VALUES
(3, 12, 1),
(4, 12, 2),
(5, 8, 17),
(6, 11, 8),
(7, 11, 2),
(9, 12, 1),
(10, 12, 12),
(11, 12, 3),
(12, 12, 3),
(13, 12, 3),
(14, 13, 70),
(15, 13, 3),
(16, 14, 61),
(18, 14, 16),
(21, 14, 7),
(22, 6, 80),
(23, 10, 3),
(24, 11, 6),
(25, 13, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('dokter-umum','perawat','apoteker','dokter-gigi','manajemen','super-admin') NOT NULL,
  `id_dokter` int(50) NOT NULL,
  `id_perawat` int(50) NOT NULL,
  `id_manajemen` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `id_dokter`, `id_perawat`, `id_manajemen`) VALUES
(2, 'dr. Errythrina Whismah M.Kes', 'erry', 'a85a606dc3cfb34554abdbe96d6c3e7d', 'dokter-umum', 1, 0, 0),
(3, 'wahyuni', 'yuni', '81dc9bdb52d04dc20036dbd8313ed055', 'perawat', 0, 1, 0),
(7, 'drg. Tutik Winarni', 'tutik', '225f42cfd6d106e7065d435e59faefad', 'dokter-gigi', 3, 0, 0),
(9, 'Rina Sulistyawati', 'rina', '81dc9bdb52d04dc20036dbd8313ed055', 'perawat', 0, 2, 0),
(10, 'Bambang Santosa', 'bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 'manajemen', 0, 0, 1),
(11, 'Dien NoorFawziah P', 'dien', '52ec538941f82416e7ce1caf283a765f', 'super-admin', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `diagnosa_rm` (`id_rm`),
  ADD KEY `diagnosa_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `gigi`
--
ALTER TABLE `gigi`
  ADD PRIMARY KEY (`id_gigi`);

--
-- Indeks untuk tabel `manajemen`
--
ALTER TABLE `manajemen`
  ADD PRIMARY KEY (`id_manajemen`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pasien_gigi`
--
ALTER TABLE `pasien_gigi`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  ADD PRIMARY KEY (`id_pemakaian_obat`),
  ADD KEY `add_pemakaian_obat_pk` (`id_rm`),
  ADD KEY `add_obat_pk` (`id_obat`);

--
-- Indeks untuk tabel `pemakaian_obat_gigi`
--
ALTER TABLE `pemakaian_obat_gigi`
  ADD PRIMARY KEY (`id_pemakaian_obat_gigi`),
  ADD KEY `add_pasien_gigi` (`id_rm`),
  ADD KEY `add_obat_gigi` (`id_obat`);

--
-- Indeks untuk tabel `pemeriksaan_gigi`
--
ALTER TABLE `pemeriksaan_gigi`
  ADD PRIMARY KEY (`id_pemeriksaan_gigi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id_perawat`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `fk_rm_pasien` (`id_pasien`),
  ADD KEY `fk_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `rekam_medis_pasien_gigi`
--
ALTER TABLE `rekam_medis_pasien_gigi`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `FK_Pasien_gigi` (`id_pasien`);

--
-- Indeks untuk tabel `riwayat_penyakit`
--
ALTER TABLE `riwayat_penyakit`
  ADD PRIMARY KEY (`id_riwayat_penyakit`),
  ADD KEY `rp_penyakit` (`id_penyakit`),
  ADD KEY `rp_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_dokteruser` (`id_dokter`),
  ADD KEY `FK_perawatuser` (`id_perawat`),
  ADD KEY `FK_manajemenuser` (`id_manajemen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gigi`
--
ALTER TABLE `gigi`
  MODIFY `id_gigi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `manajemen`
--
ALTER TABLE `manajemen`
  MODIFY `id_manajemen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pasien_gigi`
--
ALTER TABLE `pasien_gigi`
  MODIFY `id_pasien` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  MODIFY `id_pemakaian_obat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pemakaian_obat_gigi`
--
ALTER TABLE `pemakaian_obat_gigi`
  MODIFY `id_pemakaian_obat_gigi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan_gigi`
--
ALTER TABLE `pemeriksaan_gigi`
  MODIFY `id_pemeriksaan_gigi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id_perawat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis_pasien_gigi`
--
ALTER TABLE `rekam_medis_pasien_gigi`
  MODIFY `id_rm` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `riwayat_penyakit`
--
ALTER TABLE `riwayat_penyakit`
  MODIFY `id_riwayat_penyakit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `diagnosa_rm` FOREIGN KEY (`id_rm`) REFERENCES `rekam_medis` (`id_rm`);

--
-- Ketidakleluasaan untuk tabel `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  ADD CONSTRAINT `add_obat_pk` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `add_pemakaian_obat_pk` FOREIGN KEY (`id_rm`) REFERENCES `rekam_medis` (`id_rm`);

--
-- Ketidakleluasaan untuk tabel `pemakaian_obat_gigi`
--
ALTER TABLE `pemakaian_obat_gigi`
  ADD CONSTRAINT `add_obat_gigi` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `add_pasien_gigi` FOREIGN KEY (`id_rm`) REFERENCES `rekam_medis_pasien_gigi` (`id_rm`);

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `fk_rm_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `rekam_medis_pasien_gigi`
--
ALTER TABLE `rekam_medis_pasien_gigi`
  ADD CONSTRAINT `FK_Pasien_gigi` FOREIGN KEY (`id_pasien`) REFERENCES `pasien_gigi` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `riwayat_penyakit`
--
ALTER TABLE `riwayat_penyakit`
  ADD CONSTRAINT `rp_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `rp_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
