-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2019 pada 08.23
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `jenis_dokter` enum('dokter umum','dokter gigi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat`, `no_telp`, `jenis_dokter`) VALUES
(1, 'dr. Erythrina Whisma M.Kes', 'argamas timur', '081390292789', 'dokter umum'),
(2, 'dr. Purwaningrum', 'argamas barat', '085265478963', 'dokter umum'),
(3, 'drg. Tutik Winarni', 'Argomulyo', '085256354233', 'dokter gigi');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `stok_obat` varchar(50) NOT NULL,
  `sediaan` enum('tablet','kapsul','cair','kaplet') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok_obat`, `sediaan`) VALUES
(1, 'Amoxsan 250 mg', '10', 'tablet'),
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
(129, 'Ranitidine inj', '10', 'tablet');

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
  `no_BPJS` varchar(50) NOT NULL,
  `no_PLN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rekam_medis`, `no_KTP`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `jenis_pasien`, `no_BPJS`, `no_PLN`) VALUES
(5, '00001', '3373034112960001', 'Dien NoorFawziah PandiAstuti', '1996-12-01', 'perempuan', 'Argamas Barat III No 411 Salatiga', '087839122183', 'BPJS', '154895', ''),
(6, '00002', '3373034112960002', 'Tegar Jati Wicaksono', '1996-08-16', 'laki-laki', 'canden', '085265478963', 'umum', '', ''),
(7, '00003', '3373034112960003', 'Dita Safitri Pandi Astuti', '1992-04-19', 'perempuan', 'argamas barat 3 no 411 salatiga', '08562688170', 'PLN', '', '14785693');

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
  `no_BPJS` varchar(50) NOT NULL,
  `no_PLN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien_gigi`
--

INSERT INTO `pasien_gigi` (`id_pasien`, `no_rekam_medis`, `no_KTP`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `jenis_pasien`, `no_BPJS`, `no_PLN`) VALUES
(2, 'G0001', '3373034112960001', 'Dien NoorFawziah PandiAstuti', '1996-12-01', 'perempuan', 'Argamas Barat III No 411 Salatiga', '087839122183', 'BPJS', '154895', '');

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
(38, 'Hipotensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit_pasien`
--

CREATE TABLE `penyakit_pasien` (
  `id_penyakit_pasien` int(50) NOT NULL,
  `id_rm` int(50) NOT NULL,
  `id_penyakit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, 'wahyuni', 'ledok argomulyo', '089878677456');

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
(1, 7, 'sakit maag sudah tiga hari', 'biotin', 'anemia', 60, 155, 120, 80, 100, 37, 0, 0, 0, '', '', 'anemia', 0, 0, 'antri', '2019-02-24');

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
  `id_penggunaan_obat` int(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_penyakit` int(50) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `status_pasien` enum('sudah di periksa','antri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekam_medis_pasien_gigi`
--

INSERT INTO `rekam_medis_pasien_gigi` (`id_rm`, `id_pasien`, `keluhan`, `alergi_obat`, `alergi_makanan`, `golongan_darah`, `sistolik`, `diastolik`, `nadi`, `occlusi`, `torus_palatinus`, `torus_mandibularis`, `palatum`, `diastema`, `ket_diastema`, `gigi_anomali`, `ket_gigi_anomali`, `lain_lain`, `id_odontogram`, `id_penggunaan_obat`, `id_dokter`, `id_penyakit`, `tanggal_periksa`, `status_pasien`) VALUES
(0, 2, 'gigi ngilu disebelah kanan', 'biotin', 'yang dingin', 'A', 80, 120, 200, 'normal bite', 'tidak ada', 'tidak ada', 'dalam', 'ada', '', 'ada', '', '', 0, 0, 'drg. Tutik Winarni', 0, '2019-02-13', 'antri');

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
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `last_login`) VALUES
(1, 'Dien NoorFawziah P', 'ucik', '95f0754c64c63faca9f5e43588526b86', 'super-admin', '0000-00-00 00:00:00'),
(2, 'dr. Errythrina W M.Kes', 'erry', 'a85a606dc3cfb34554abdbe96d6c3e7d', 'dokter-umum', '0000-00-00 00:00:00'),
(3, 'drg', 'drg', '75fe57ec4a047a300cac5f27223df81a', 'dokter-gigi', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

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
  ADD PRIMARY KEY (`id_pemakaian_obat`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `penyakit_pasien`
--
ALTER TABLE `penyakit_pasien`
  ADD PRIMARY KEY (`id_penyakit_pasien`);

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
  ADD KEY `fk_rm_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `rekam_medis_pasien_gigi`
--
ALTER TABLE `rekam_medis_pasien_gigi`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `FK_Pasien_gigi` (`id_pasien`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pasien_gigi`
--
ALTER TABLE `pasien_gigi`
  MODIFY `id_pasien` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  MODIFY `id_pemakaian_obat` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `penyakit_pasien`
--
ALTER TABLE `penyakit_pasien`
  MODIFY `id_penyakit_pasien` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_rm_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `rekam_medis_pasien_gigi`
--
ALTER TABLE `rekam_medis_pasien_gigi`
  ADD CONSTRAINT `FK_Pasien_gigi` FOREIGN KEY (`id_pasien`) REFERENCES `pasien_gigi` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
