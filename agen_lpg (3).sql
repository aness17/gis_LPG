-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 21.24
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agen_lpg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `username` varchar(99) DEFAULT NULL,
  `password` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen`
--

CREATE TABLE `agen` (
  `id` int(11) NOT NULL,
  `a` varchar(99) DEFAULT NULL,
  `b` varchar(99) DEFAULT NULL,
  `c` varchar(99) DEFAULT NULL,
  `d` varchar(99) DEFAULT NULL,
  `e` varchar(99) DEFAULT NULL,
  `f` varchar(99) DEFAULT NULL,
  `g` varchar(99) DEFAULT NULL,
  `h` varchar(99) DEFAULT NULL,
  `i` varchar(99) DEFAULT NULL,
  `j` varchar(99) DEFAULT NULL,
  `k` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agen`
--

INSERT INTO `agen` (`id`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`) VALUES
(1, 'PT ALAM ANUGERAH SEJAHTERA', 'Pekanbaru', 'Riau', 'SAIL', '0.4836942873428328,101.41744033109072', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JALAN LET JEND S PARMAN NO 101 C\r'),
(2, 'Pt.Buchari.H', 'Pekanbaru', 'Riau', 'SENAPELAN', '0.5387426573620717,101.43850734211053', 'Rp.21.000', '00.00-00.00', '3 Kg', 'Subsidi', '', 'JL PANGLIMA UNDAN NO. 73 KEL. KAMPUNG BANDAR KEC. SENAPELAN\r'),
(3, 'PT. LISFA INTI SELARAS', 'Pekanbaru', 'Riau', 'SENAPELAN', '0.536248011642411,101.43297164135949', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL KULIM NO. 14 PEKANBARU\r'),
(4, 'PT. MELAYU BUMI LESTARI', 'Pekanbaru', 'Riau', 'BUKIT RAYA', '0.4832799879379507,101.45882222403982', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL MUSTAFA SARI NO.13 RT.001 RW.006 \r'),
(5, 'PT. PENINDO PRATAMA ', 'Pekanbaru', 'Riau', 'LIMA PULUH', '0.5384017578682868,101.45930880192272', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL KUANTAN II NO. 9 RT/RW 03/03 PEKANBARU\r'),
(6, 'PT. SINAR RIAU MANDIRI', 'Pekanbaru', 'Riau', 'LIMA PULUH', '0.5336580905670235,101.45935323144256', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL KUANTAN II NO. 9\r'),
(7, 'PT. HASANUDDIN BERSAUDARA ', 'Pekanbaru', 'Riau', 'Senapelan', '0.5385921315665421,101.431971177477', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'Jl. Jati No.41, Kp. Baru, Kec. Senapelan, Kota Pekanbaru, Riau 28155\r'),
(8, 'PT. SARI BUMI RAYA ', 'Pekanbaru', 'Riau', 'TENAYAN RAYA ', '0.5011844272362711,101.49824890075695', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL NARAS RAYA \r'),
(9, 'PT. VALERY FAMILI SEJAHTERA', 'Pekanbaru', 'Riau', 'SENAPELAN', '0.5429698205954243,101.44648837425773', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'Jl. Riau I No.61, Kp. Bandar, Kec. Senapelan, Kota Pekanbaru, Riau 28155\r'),
(10, 'PT. IDIMAR RIAU MAKMUR ', 'Pekanbaru', 'Riau', 'SAIL', '0.512363384950318,101.4621898007564', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL RONGGOWARSITO NO 88\r'),
(11, 'PT. PRIKON NUSANTARA ENERGI', 'Pekanbaru', 'Riau', 'SUKAJADI', '0.5288086237545061,101.428342585945', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'JL LILI \r'),
(12, 'PT. SURYA GLOBAL MANDIRI', 'Pekanbaru', 'Riau', 'BUKIT RAYA ', '0.47761101700355274,101.47889781913524', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'FFGH+JJP, Tengkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru, Riau 28289\r'),
(13, 'PT. PRATAMA BINA PURNA SEJAHTERA', 'Pekanbaru', 'Riau', 'PAYUNG SEKAKI', '0.5131027031150277,101.3962311547255', 'Rp.21.000', '00.00-00.00', '3 KG', 'Subsidi', '', 'Jl SIAK II\r'),
(14, 'PT. Surya Nambaruna', 'Pekanbaru', 'Riau', 'Payung Sekaki', '0.5077136904153162,101.43215659335138', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', 'PT.SuryaNambaruna.jpg', 'Jl. Pembangunan, Labuh Baru Tim., Kec. Payung Sekaki, Kota Pekanbaru, Riau 28122\r'),
(15, 'PT. Samudera Mandari Dumai', 'Pekanbaru', 'Riau', 'Tampan', '0.4530958628643167,101.39194340869774', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Cipta Karya Panam No.1 A\r'),
(16, 'PT. Tuah Karsa Muda', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.5094067491027099,101.44379447006935', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Tuanku Tambusai No. 155 \r'),
(17, 'PT. Tirta Buana Perkasa', 'Pekanbaru', 'Riau', 'Senapelan', '0.5409462624815519,101.43999062403692', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Perdagangan 210 Senapelan \r'),
(18, 'PT. Ikhsan Mandiri Sejati', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.49784912764518874,101.42701870869544', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jalan Pawas\r'),
(19, 'PT. Sinar Riau Abadi', 'Pekanbaru', 'Riau', 'Payung Sekaki', '0.5036299953924417,101.42555457800793', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl.Lintas Sumatra\r'),
(20, 'PT. Raih Usaha Karya Mandiri', 'Pekanbaru', 'Riau', 'Payung Sekaki', '0.5180333523229058,101.42611505419222', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Durian No. 1C \r'),
(21, 'PT. Garis Esapakarti', 'Pekanbaru', 'Riau', 'Rumbai', '0.5890462971819537,101.40416356323848', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Padat Karya \r'),
(22, 'PT. Energi Lintas Nasional', 'Pekanbaru', 'Riau', 'Tenayan Raya', '0.5024059229846919,101.50983970075691', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Imam Munandar\r'),
(23, 'PT. Valery Tira Jaya', 'Pekanbaru', 'Riau', 'Tampan', '0.4908862249122878,101.34993973144472', 'Rp 104.000 , Rp 215.000', '00.00-00.00', '5,5 Kg,12 Kg, 50Kg', 'Brighgas,non subsidi', '', 'Jl. Indragiri\r'),
(24, 'Pangkalan LPG 3 KG Ray HUGHSS', 'Pekanbaru', 'Riau', 'Sukajadi', '0.5114264090306129,101.43202299144124', 'Rp22.000', '09.00-21.00', '3 Kg', 'Subsidi', 'PangkalanLPG3KgRayHughes.JPG', 'Jl.Balam Ujung\r'),
(25, 'Pangkalan LPG 3 KG Fitri Marizawati', 'Pekanbaru', 'Riau', 'Bukit Raya', '0.4929878534647756,101.46934369449235', 'Rp22.000', '07.00-18.00', '3 Kg', 'Subsidi', 'PangkalanLPG3KGFitriMarizawati.jpg', 'Jl. Tj., Tengkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru, Riau 28125\r'),
(26, 'Pangkalan Gas Elpija Amilgis', 'Pekanbaru', 'Riau', 'Bukit Raya', '0.44217958339577507,101.46140816953724', 'Rp 22000 , Rp 217.000', '', '3 Kg,12 Kg', '', '', 'CFR6+RGH, Unnamed Rd,, Simpang Tiga, Kec. Bukit Raya, Kota Pekanbaru, Riau 28284\r'),
(27, 'Pangkalan LPG 3 Kg Sulisman Anoer', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.4527747691381949,101.44990125461861', 'Rp22.000', '', '3 Kg', 'Subsidi', '', 'Jl. Pinang Merah, Maharatu, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28288\r'),
(28, 'Pangkalan Gas LPG Dechandra Furnika', 'Pekanbaru', 'Riau', 'Tampan', '0.4652443776951502,101.39614570461892', 'Rp 22000 , Rp 217.000', '07.00-18.00', '3 Kg,12 Kg', '', 'PangkalanGasLPGDechandraFurnika.jpg', 'Jl. Rajawali Sakti, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28297\r'),
(29, 'Pangkalan LPG KBI', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.44203329755728554,101.43918810189994', 'Rp 22000 , Rp 217.000', '', '3 Kg,12 Kg', '', '', 'jl. Maharatu, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28284\r'),
(30, 'Pt.Tiah karsa Muda', 'pekanbaru', 'Riau', 'Marpoyan Damai', '0.5085029795241137,101.44281553092912', 'Rp22.000', '', '3 Kg,12 Kg', '', '', 'Jl. Tuanku Tambusai, Wonorejo, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28122\r'),
(31, 'Cemerlang Mandiri', 'Pekanbaru', 'Riau', 'Sukajadi', '0.5149159612321601,101.43179226742289', 'Rp 22000 , Rp 217.000', '', '3 Kg,12 Kg', '', 'CemerlangMandiri.jpg', 'Jl. Kutilang No.23, Kp. Melayu, Kec. Sukajadi, Kota Pekanbaru, Riau 28122\r'),
(32, 'PT.Ikhsan Mandiri  Sejati', 'Pekanbaru', 'Riau', 'Tangkerang Baru', '0.4965690125006895,101.42831401694698', 'Rp 22000 , Rp 106.000Rp 217.000', '08.00--16.30', '3 Kg, 5,5 Kg,12 Kg', '', 'PTIkhasanMandiriSejati.jpg', 'Jalan Pawas Marpoyan Damai\r'),
(33, 'PT. Melayu Bumi Lestari', 'Pekanbaru', 'Riau', 'Bukit Raya', '0.48356644674045546,101.45895200373442', 'Rp 22000 , Rp 106.000Rp 217.000', '', '3 Kg, 5,5 Kg,12 Kg', '', '', 'Jl. Mustafa Sari No.12a, Tengkerang Sel., Kec. Bukit Raya, Kota Pekanbaru, Riau 28125\r'),
(34, 'Agen LPG 3 KG PT.Prikon Nusantara Energi', 'Pekanbaru', 'Riau', 'Sukajadi', '0.5276086736421302,101.42876142405686', 'Rp22.000', '08.30-16.30', '3 Kg', 'Subsidi', 'AgenLPG3KGPT.PrikonusantaraEnergi.JPG', 'Jl. Lili 1 No.82, Kedungsari, Kec. Sukajadi, Kota Pekanbaru, Riau 28156\r'),
(35, 'Pangkalan LPG Stefina', 'Pekanbaru', 'Riau', 'Tenayan Raya', '0.4989860097006461,101.48167264792492', 'Rp 22000 , Rp 217.000', '07.00-22.00', '3 Kg, 5,5 Kg,', 'Subsidi,Brightgas', 'PangkalanLPGStefina.jpg', '?Jl. Imam Munandar No.389, Tengkerang Tim., Kec. Tenayan Raya, Kota Pekanbaru, Riau 28131\r'),
(36, 'Pangkalan LPG Videl', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.4936386348164413,101.45233638525012', 'Rp 22000 , Rp 106.000Rp 217.000', '', '3 Kg, 5,5 Kg,12 Kg', '', '', 'Jl. Merak No.4 D, Tengkerang Tengah, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28125\r'),
(37, 'Pangkalan Gas LPG 3 Kg Eviwarti ', 'Pekanbaru', 'Riau', 'Tambang', '0.4214439213652858,101.37059579407504', 'Rp22.000', '06.00-23.00', '3 Kg', 'Subsidi', 'PangkalanGasLPG3KgEviwarti.jpg', 'Jalan Sukaramai RT. 01/RW. 01 Kelurahan Kubang Raya, Kecamatan, Tarai Bangun, Kec. Tambang, Kabupaten Kampar, Riau 28293\r'),
(38, 'Gudang LPG.PT.putra Hasmar Riau', 'Pekanbaru', 'Riau', 'Kp Dalam', '0.8107341473232059,102.04459230202275', 'Rp 22000 , Rp 106.000Rp 217.000', '08.00-19.00', '3 Kg, 5,5 Kg,12 Kg', '', 'GudangLPGPTputraHasmarRiau.jpg', 'Q2XX+5M6, Kp. Dalam, Kec. Siak, Kabupaten Siak, Riau 28773\r'),
(39, 'Pangkalan Yunita Ermiza', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.5062311288464726,101.44886555657278', 'Rp22.000', '07.00-17.00', '3 Kg', 'Subsidi', 'PangkalanYunitaErmiza.jpg', 'Jl. Cempedak No.15, Wonorejo\r'),
(40, 'Agen LPG Iwan', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.507742172210252,101.44738019838123', 'Rp 22000 , Rp 107.000', '08.00 -17.00', '3 Kg, 5,5 Kg,', '', 'AgenLPGIwan.jpg', 'Jl. Klp. No.18, Wonorejo, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28121\r'),
(41, 'SPBU PASTI PAS 14-282-6125', 'Pekanbaru', 'Riau', 'Tenayan Raya', '0.5251310639171411,101.47560747171713', 'Rp 22.000, Rp 104.000, Rp 215.000', '00.00-00.00', '3 Kg, 5,5 Kg,12 Kg', '', 'SPBUPASTIPAS14-282-6125.jpg', 'Jl. Hangtuah Ujung No.153, Rejosari, Kec. Tenayan Raya, Kota Pekanbaru, Riau 28112\r'),
(42, 'PT Tirta Perkasa', 'Pekanbaru', 'Riau', 'Senapelan', '0.5395401438885787,101.43967036875253', 'Rp 22.000, Rp 104.000, Rp 215.000', '08.00-21.00', '3 Kg, 5,5 Kg,12 Kg', '', 'PTTirtaPerkasa.jpg', 'Jl. Perdagangan No.123, Kp. Bandar, Kec. Senapelan, Kota Pekanbaru, Riau 28155\r'),
(43, 'Agen LPG PT.Samudra Mandiri Dumai', 'Pekanbaru', 'Riau', 'Tampan', '0.45357177954256156,101.39265538354505', 'Rp 22.000, Rp 104.000, Rp 215.000', '08.00-17.00', '3 Kg, 5,5 Kg,12 Kg', '', 'AgenLPGPTSamudraMandiriDumai.jpg', 'Jl. Cipta Karya No.1A, Tuah Karya, Kec. Tampan, Kota Pekanbaru, Riau 28293\r'),
(44, 'Pangkalan Gas LPG', 'Pekanbaru', 'Riau', 'Marpoyan Damai', '0.49381954947013995,101.42698889194732', 'Rp 22000 , Rp 107.000', '08.00-17.00', '3 Kg, 5,5 Kg,', '', 'PangkalanGasLPG.jpg', 'Jl. Gulama Ujung No.3, Tengkerang Bar., Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28124\r'),
(45, 'PT.Valeri Family Sejahtera', 'Pekanbaru', 'Riau', 'Senapelan', '0.5366125185186847,101.44152574854567', 'Rp 22000 , Rp 107.000', '09.00-17.00', '3 Kg, 5,5 Kg,', '', 'PT.ValeriFamilySejahtera.jpg', 'Jl. Riau I No.61, Kp. Bandar, Kec. Senapelan, Kota Pekanbaru, Riau 28155\r'),
(46, 'PT. Sari Bumi Raya', 'Pekanbaru', 'Riau', 'Tenayan Raya', '0.500696122835221,101.49811426451144', 'Rp22.000', '08.00-17.00', '3Kg', 'Subsidi', 'PT.SariBumiRaya.jpg', 'Jl. Naras Raya, Sail, Kec. Tenayan Raya, Kota Pekanbaru, Riau 28131\r'),
(47, 'PT.Lisfa Inti Selaras', 'Pekanbaru', 'Riau', 'Senapelan', '0.5365454637056565,101.43265057171376', 'Rp22.000', '08.00-15.00', '3 Kg', 'Subsidi', 'PT.LisfaIntiSelaras.jpg', 'Jl. Kulim No.14, Kp. Baru, Kec. Senapelan, Kota Pekanbaru, Riau 28155\r'),
(48, 'Pangkalan LPG 3 Kg Dani', 'Pekanbaru', 'Riau', 'Tambang', '0.42626893580800124,101.3743195792251', 'Rp22.000', '08.00-17.00', '3 Kg', 'Subsidi', 'PangkalanLPG3KgDani.jpg', 'JL. Suka Karya No.Kelurahan, Tarai Bangun, Kec. Tambang, Kabupaten Kampar, Riau 28468\r');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `kritik` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `telp`, `kritik`) VALUES
(2, 'Muhammad Febriansyah', '081294929592', 'nice');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpg`
--

CREATE TABLE `lpg` (
  `id` int(11) NOT NULL,
  `agen` varchar(99) DEFAULT NULL,
  `kab` varchar(99) DEFAULT NULL,
  `prov` varchar(99) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kec` varchar(99) DEFAULT NULL,
  `kel` varchar(99) DEFAULT NULL,
  `titik` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lpg`
--

INSERT INTO `lpg` (`id`, `agen`, `kab`, `prov`, `alamat`, `kec`, `kel`, `titik`) VALUES
(1, 'KOP. PRIMER KOPERASI KARTIKA WIRABIMA', 'Pekanbaru', 'Riau', 'JL. GATOT SUBROTO KOMP. KOREM 031 WIRABIMA', 'PEKANBARU KOTA ', 'KOTA TINGGI', '\r'),
(2, 'PT ALAM ANUGERAH SEJAHTERA', 'Pekanbaru', 'Riau', 'JALAN LET JEND S PARMAN NO 101 C', 'SAIL', 'SUKAMAJU', '0.4836942873428328, 101.41744033109072\r'),
(3, 'PT. BUMI SUMBER RIZQY', 'Pekanbaru', 'Riau', 'JL HARAPAN MURNI ', 'TENAYAN RAYA ', 'TANGKERANG TIMUR ', '\r'),
(4, 'PT. GARUDA MANDIRI', 'Pekanbaru', 'Riau', 'JL SATRIA NO 9 RT 03 RW 11', 'TENAYAN RAYA', 'BAMBU KUNING', '\r'),
(5, 'Pt.Buchari.H', 'Pekanbaru', 'Riau', 'JL PANGLIMA UNDAN NO. 73 KEL. KAMPUNG BANDAR KEC. SENAPELAN', 'SENAPELAN', 'KAMPUNG BANDAR', '0.5387426573620717, 101.43850734211053\r'),
(6, 'PT. LISFA INTI SELARAS', 'Pekanbaru', 'Riau', 'JL KULIM NO. 14 PEKANBARU', 'SENAPELAN', 'KAMPUNG BARU', '0.536248011642411, 101.43297164135949\r'),
(7, 'PT. MELAYU BUMI LESTARI', 'Pekanbaru', 'Riau', 'JL MUSTAFA SARI NO.13 RT.001 RW.006 ', 'BUKIT RAYA', 'TANGKERANG SELATAN', '0.4832799879379507, 101.45882222403982\r'),
(8, 'PT. PENINDO PRATAMA ', 'Pekanbaru', 'Riau', 'JL KUANTAN II NO. 9 RT/RW 03/03 PEKANBARU', 'LIMA PULUH', 'SEKIP', '0.5384017578682868, 101.45930880192272\r'),
(9, 'PT. PUSAKA INDRAPURI', 'Pekanbaru', 'Riau', 'JL TANJUNG BATU NO. 73 RT.03 RW.02 ', 'LIMA PULUH', 'PESISIR', '\r'),
(10, 'PT. SINAR RIAU MANDIRI', 'Pekanbaru', 'Riau', 'JL KUANTAN II NO. 9', 'LIMA PULUH', 'SEKIP', '0.5336580905670235, 101.45935323144256\r'),
(11, 'PT. HASANUDDIN BERSAUDARA ', 'Pekanbaru', 'Riau', 'Jl. Jati No.41, Kp. Baru, Kec. Senapelan, Kota Pekanbaru, Riau 28155', 'Senapelan', 'SRI MERANTI', '0.5385921315665421, 101.431971177477\r'),
(12, 'PT. TIRTA HARAPAN SEJAHTERA ', 'Pekanbaru', 'Riau', 'JL PERDAGANGAN NO. 210 PEKANBARU', 'SENAPELAN', 'KAMPUNG BANDAR', '\r'),
(13, 'PT. SARI BUMI RAYA ', 'Pekanbaru', 'Riau', 'JL NARAS RAYA ', 'TENAYAN RAYA ', 'SIALANG SAKTI', '0.5011844272362711, 101.49824890075695\r'),
(14, 'PT. VALERY FAMILI SEJAHTERA', 'Pekanbaru', 'Riau', 'Jl. Riau I No.61, Kp. Bandar, Kec. Senapelan, Kota Pekanbaru, Riau 28155', 'SENAPELAN', 'AIR PUTIH', '0.5429698205954243, 101.44648837425773\r'),
(15, 'PT. IDIMAR RIAU MAKMUR ', 'Pekanbaru', 'Riau', 'JL RONGGOWARSITO NO 88', 'SAIL', 'SUKAMAJU', '0.512363384950318, 101.4621898007564\r'),
(16, 'PT. PRIKON NUSANTARA ENERGI', 'Pekanbaru', 'Riau', 'JL LILI ', 'SUKAJADI', 'KEDUNG SARI', '0.5288086237545061, 101.428342585945\r'),
(17, 'PT. RONGGO MERBA SEJATI', 'Pekanbaru', 'Riau', 'JL KELAPA NO 11', 'TENAYAN RAYA', 'REJOSARI', '\r'),
(18, 'PT. PEKANBARU GASINDO PRATAMA ', 'Pekanbaru', 'Riau', 'JL BERINGIN INDAH RT 02', 'TENAYAN RAYA ', 'KULIM', '\r'),
(19, 'PT. SURYA GLOBAL MANDIRI', 'Pekanbaru', 'Riau', 'FFGH+JJP, Tengkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru, Riau 28289', 'BUKIT RAYA ', 'TANGKERANG LABUAI', '0.47761101700355274, 101.47889781913524\r'),
(20, 'PT. MITRA SINAR TAMA ', 'Pekanbaru', 'Riau', 'JL TODAK UJUNG ', 'MARPOYAN DAMAI', 'TANGKERANG TENGAH', '\r'),
(21, 'PT. PUSAKA RIAU ABADI', 'Pekanbaru', 'Riau', 'JL SWADAYA', 'PAYUNG SEKAKI', 'BANDAR RAYA ', '\r'),
(22, 'PT. PRATAMA BINA PURNA SEJAHTERA', 'Pekanbaru', 'Riau', 'Jl SIAK II', 'PAYUNG SEKAKI', 'LABUH BARU BARAT', '0.5131027031150277, 101.3962311547255\r'),
(23, 'PT. Surya Nambaruna', 'Pekanbaru', 'Riau', 'Jl. Pembangunan, Labuh Baru Tim., Kec. Payung Sekaki, Kota Pekanbaru, Riau 28122', 'Payung Sekaki', 'Labuh Baru Timur', '0.5077136904153162, 101.43215659335138\r'),
(24, 'PT. Samudera Mandari Dumai', 'Pekanbaru', 'Riau', 'Jl. Cipta Karya Panam No.1 A', 'Tampan', 'Simpang Baru', '0.4530958628643167, 101.39194340869774\r'),
(25, 'PT. Tuah Karsa Muda', 'Pekanbaru', 'Riau', 'Jl. Tuanku Tambusai No. 155 ', 'Marpoyan Damai', 'Wonorejo', '0.5094067491027099, 101.44379447006935\r'),
(26, 'PT. Rimuindo', 'Pekanbaru', 'Riau', 'Jl. Kaharudin Nasution Simpang Tiga ', 'Bukit Raya', 'Simpang Tiga', '\r'),
(27, 'PT. Tirta Buana Perkasa', 'Pekanbaru', 'Riau', 'Jl. Perdagangan 210 Senapelan ', 'Senapelan', 'Kampung Bandar', '0.5409462624815519, 101.43999062403692\r'),
(28, 'PT. Ikhsan Mandiri Sejati', 'Pekanbaru', 'Riau', 'Jalan Pawas', 'Marpoyan Damai', 'Tangkerang Barat ', '0.49784912764518874, 101.42701870869544\r'),
(29, 'PT. Sinar Riau Abadi', 'Pekanbaru', 'Riau', 'Jl.Lintas Sumatra', 'Payung Sekaki', 'Labuh Baru Timur', '0.5036299953924417, 101.42555457800793\r'),
(30, 'PT. Raih Usaha Karya Mandiri', 'Pekanbaru', 'Riau', 'Jl. Durian No. 1C ', 'Payung Sekaki', 'Labuh Baru Timur', '0.5180333523229058, 101.42611505419222\r'),
(31, 'PT. Garis Esapakarti', 'Pekanbaru', 'Riau', 'Jl. Padat Karya ', 'Rumbai', 'Umban Sari', '0.5890462971819537, 101.40416356323848\r'),
(32, 'PT. Energi Lintas Nasional', 'Pekanbaru', 'Riau', 'Jl. Imam Munandar', 'Tenayan Raya', 'Sialang Sakti', '0.5024059229846919, 101.50983970075691\r'),
(33, 'PT. Valery Tira Jaya', 'Pekanbaru', 'Riau', 'Jl. Indragiri', 'Tampan', 'Air Putih', '0.4908862249122878, 101.34993973144472\r'),
(34, 'Pangkalan LPG 3 KG Ray HUGHSS', 'Pekanbaru', 'Riau', 'Jl.Balam Ujung', 'Sukajadi', '', '0.5114264090306129, 101.43202299144124\r'),
(35, 'Pangkalan LPG 3 KG Fitri Marizawati', 'Pekanbaru', 'Riau', 'Jl. Tj., Tengkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru, Riau 28125', 'Bukit Raya', '', '0.4929878534647756, 101.46934369449235\r'),
(36, 'Pangkalan Gas Elpija Amilgis', 'Pekanbaru', 'Riau', 'CFR6+RGH, Unnamed Rd,, Simpang Tiga, Kec. Bukit Raya, Kota Pekanbaru, Riau 28284', 'Bukit Raya', '', '0.44217958339577507, 101.46140816953724\r'),
(37, 'Pangkalan LPG 3 Kg Sulisman Anoer', 'Pekanbaru', 'Riau', 'Jl. Pinang Merah, Maharatu, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28288', 'Marpoyan Damai', '', '0.4527747691381949, 101.44990125461861\r'),
(38, 'Pangkalan Gas LPG Dechandra Furnika', 'Pekanbaru', 'Riau', 'Jl. Rajawali Sakti, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28297', 'Tampan', '', '0.4652443776951502, 101.39614570461892\r'),
(39, 'Pangkalan LPG KBI', 'Pekanbaru', 'Riau', 'jl. Maharatu, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28284', 'Marpoyan Damai', '', '0.44203329755728554, 101.43918810189994\r'),
(40, 'Pt.Tiah karsa Muda', 'pekanbaru', 'Riau', 'Jl. Tuanku Tambusai, Wonorejo, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28122', 'Marpoyan Damai', '', '0.5085029795241137, 101.44281553092912\r'),
(41, 'Cemerlang Mandiri', 'Pekanbaru', 'Riau', 'Jl. Kutilang No.23, Kp. Melayu, Kec. Sukajadi, Kota Pekanbaru, Riau 28122', 'Sukajadi', '', '0.5149159612321601, 101.43179226742289\r'),
(42, 'PT.Ikhsan Mandiri ', 'Pekanbaru', 'Riau', 'Jalan Pawas Marpoyan Damai', 'Tangkerang Baru', '', '0.4965690125006895, 101.42831401694698\r'),
(43, 'PT. Melayu Bumi Lestari', 'Pekanbaru', 'Riau', 'Jl. Mustafa Sari No.12a, Tengkerang Sel., Kec. Bukit Raya, Kota Pekanbaru, Riau 28125', 'Bukit Raya', '', '0.48356644674045546, 101.45895200373442\r'),
(44, 'Agen LPG 3 KG PT.Prikon Nusantara Energi', 'Pekanbaru', 'Riau', 'Jl. Lili 1 No.82, Kedungsari, Kec. Sukajadi, Kota Pekanbaru, Riau 28156', 'Sukajadi', '', '0.5276086736421302, 101.42876142405686\r'),
(45, 'Pangkalan LPG Stefina', 'Pekanbaru', 'Riau', '?Jl. Imam Munandar No.389, Tengkerang Tim., Kec. Tenayan Raya, Kota Pekanbaru, Riau 28131', 'Tenayan Raya', '', '0.4989860097006461, 101.48167264792492\r'),
(46, 'Pangkalan LPG Videl', 'Pekanbaru', 'Riau', 'Jl. Merak No.4 D, Tengkerang Tengah, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28125', 'Marpoyan Damai', '', '0.4936386348164413, 101.45233638525012\r'),
(47, 'Pangkalan Gas LPG 3 Kg Eviwati ', 'Pekanbaru', 'Riau', 'Jalan Sukaramai RT. 01/RW. 01 Kelurahan Kubang Raya, Kecamatan, Tarai Bangun, Kec. Tambang, Kabupaten Kampar, Riau 28293', 'Tambang', '', '0.4214439213652858, 101.37059579407504\r');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lpg`
--
ALTER TABLE `lpg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `agen`
--
ALTER TABLE `agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lpg`
--
ALTER TABLE `lpg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
