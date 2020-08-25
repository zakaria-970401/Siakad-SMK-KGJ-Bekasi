-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2020 pada 13.36
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_akun` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `jeniskelamin`, `agama`, `email`, `password`, `foto`, `status_akun`) VALUES
(2, 'Ahmad Zakaria', 'Laki-Laki', 'Islam', 'zak@kgj.com', '$2y$10$3TOL5jtUM2l44MnpPW1iVe5oL4bhy1ACRdqSi/EWaJrnbFw68fPui', 'duck.jpg', 1),
(3, 'Anto Suranto, S.Kom', 'Laki-Laki', 'Islam', 'anto@gmail.com', '$2y$10$oUgS1XlmUl6ANOzMhbfpj.woO4iLtiBox5SLoynEizsVqe/Vj72n6', 'images (12).jpeg', 0),
(12, 'Maria db, S.Pd', 'Perempuan', 'Katolik', 'maria@kgj.com', '$2y$10$ghA4d62zlF74SkfV4zZ9k.5K4/tNBx55P4umBikLiX.fqJ4UzjxUO', 'images (14).jpeg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_02_24_034653_create_admins_table', 2),
(4, '2020_02_24_073542_create_users_table', 3),
(16, '2020_02_24_093726_create_users_table', 4),
(17, '2020_02_27_080325_create_teachers_table', 4),
(18, '2020_04_14_134957_create_tbl_absensi_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` int(11) NOT NULL,
  `kelas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglabsen` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `sakit` tinyint(1) NOT NULL DEFAULT '0',
  `izin` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_absen` tinyint(1) NOT NULL DEFAULT '0',
  `diperiksaoleh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasanditolak` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `namasiswa`, `nisn`, `kelas`, `tglabsen`, `jam_masuk`, `jam_keluar`, `sakit`, `izin`, `keterangan`, `status_absen`, `diperiksaoleh`, `alasanditolak`) VALUES
(1, 'Priyo Megarahadi Mahesa S', 235885, 'X-TKJ-A', '2020-05-20', '18:59:20', NULL, 0, 0, 'Hadir', 2, 'Kartinah, S.pd', 'TIdak Hadir Di Dalam Kelas Dan Tidak Ada Surat Keteranan'),
(2, 'Gulo Erda Murni Karunia Kasih', 235879, 'X-TKJ-A', '2020-05-20', NULL, NULL, 0, 1, 'Izin, Surat Saya titip ke DInda XII TKJA', 2, 'Dejan Jaya, S.Kom', 'Erda Surat Kamu Tidak Ada..'),
(3, 'Abdullah Zafar Ridwan', 235869, 'X-TKJ-A', '2020-05-27', '21:48:56', NULL, 0, 0, 'Hadir', 1, NULL, NULL),
(4, 'Priyo Megarahadi Mahesa S', 235885, 'X-TKJ-A', '2020-05-27', '21:49:27', NULL, 0, 0, 'll', 2, NULL, NULL),
(5, 'Priyo Megarahadi Mahesa S', 235885, 'X-TKJ-A', '2020-05-29', NULL, NULL, 1, 0, 'Sakit, Surat saya titip di anwar XII TKJA', 2, 'Acep Soleh, S.Pd', 'boong mulu lo anyinkkkk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agama`
--

INSERT INTO `tbl_agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datasiswa`
--

CREATE TABLE `tbl_datasiswa` (
  `id` int(11) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `nisn` varchar(7) NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `kotakelahiran` varchar(25) NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `namaayah` varchar(50) NOT NULL,
  `namaibu` varchar(50) NOT NULL,
  `anakke` int(2) NOT NULL,
  `alamatortu` varchar(50) NOT NULL,
  `no_teleponortu` varchar(50) NOT NULL,
  `pekerjaanayah` varchar(25) NOT NULL,
  `pekerjaanibu` varchar(25) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_datasiswa`
--

INSERT INTO `tbl_datasiswa` (`id`, `namasiswa`, `nisn`, `jurusan`, `kelas`, `kotakelahiran`, `tgllahir`, `jeniskelamin`, `agama`, `namaayah`, `namaibu`, `anakke`, `alamatortu`, `no_teleponortu`, `pekerjaanayah`, `pekerjaanibu`, `foto`) VALUES
(29, 'Abdullah Zafar Ridwan', '235869', 'TKJ', 'X-TKJ-A', 'Magetan', '2002-02-02', 'Laki-Laki', 'Islam', 'adam', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', '12IPS2_Rizky-Primayudha.jpg'),
(30, 'Aditya Putra Daniswara', '235870', 'TKJ', 'X-TKJ-A', 'Solo', '2002-10-10', 'Laki-Laki', 'Islam', 'Budi', 'putri', 3, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'ajerin-karim_edit_jpg.jpg'),
(31, 'Agustina Riskiyani', '235871', 'TKJ', 'X-TKJ-A', 'Malang', '2001-11-10', 'Perempuan', 'Islam', 'Ahmad', 'putri', 5, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'aman-tubilah_edit-jpg.jpg'),
(32, 'Aulia Fitriyana', '235872', 'TKJ', 'X-TKJ-A', 'Bekasi', '2000-05-01', 'Perempuan', 'Islam', 'Jaya', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'Aulia.jpg'),
(33, 'Azzarah Salwa Salsabillah', '235873', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-03-02', 'Perempuan', 'Islam', 'Aung', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'avatar (1).jpg'),
(34, 'Cantika Fitri Asyfa', '235874', 'TKJ', 'X-TKJ-A', 'Bandung', '2002-05-05', 'Perempuan', 'Islam', 'Agus', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'avatar.jpg'),
(35, 'Dina Ariyanti', '235875', 'TKJ', 'X-TKJ-A', 'Medan', '2002-05-06', 'Perempuan', 'Islam', 'Mandra', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'beta-anggraini.jpg'),
(36, 'Enjelita Rosmawaty Sitohang', '235876', 'TKJ', 'X-TKJ-A', 'Medan', '2002-05-07', 'Perempuan', 'Islam', 'Alex', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'bg biru.jpg'),
(37, 'Febri Ardiansah', '235877', 'TKJ', 'X-TKJ-A', 'Jakarta', '2002-05-08', 'Laki-Laki', 'Islam', 'Poni', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'arwan-safta-van-bel.jpg'),
(38, 'Ferdinand', '235878', 'TKJ', 'X-TKJ-A', 'Jakarta', '2002-05-09', 'Laki-Laki', 'Islam', 'Cahyo', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'darwis-setiawan_edit_jpg.jpg'),
(39, 'Gulo Erda Murni Karunia Kasih', '235879', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-10', 'Perempuan', 'Islam', 'Dimas', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'images (27).jpeg'),
(40, 'Karmila Wahyuni', '235880', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-11', 'Perempuan', 'Islam', 'Jaelani', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'desti_edit_jpg.jpg'),
(41, 'Leo J Pramurio Samosir', '235881', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-12', 'Laki-Laki', 'Islam', 'Mugeni', 'putri', 5, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'darwis-setiawan_edit_jpg.jpg'),
(42, 'Linda Mei Saputri', '235882', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-13', 'Perempuan', 'Islam', 'Deka', 'putri', 4, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'dsc_0178.jpg'),
(43, 'Matrin Luis Timbul Sibarani', '235883', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-14', 'Laki-Laki', 'Islam', 'Iqbal', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'deni-prayoga_edit_jpg.jpg'),
(44, 'Nuryana Kusumawati', '235884', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-15', 'Perempuan', 'Islam', 'Adit', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'elsa-liyana.jpg'),
(45, 'Priyo Megarahadi Mahesa S', '235885', 'TKJ', 'X-TKJ-A', 'Medan', '2002-05-16', 'Laki-Laki', 'Islam', 'Andi', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'deri-anggara_edit_jpg.jpg'),
(46, 'Rafli Firdaus', '235886', 'TKJ', 'X-TKJ-A', 'Medan', '2002-05-17', 'Laki-Laki', 'Islam', 'Tomo', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'dsc_0032.jpg'),
(47, 'Rokip Firmansyah', '235887', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-18', 'Laki-Laki', 'Islam', 'Mario', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'dsc_0035.jpg'),
(48, 'Ronaldi Goklas S', '235888', 'TKJ', 'X-TKJ-A', 'Bekasi', '2002-05-19', 'Laki-Laki', 'Islam', 'Aziz', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'dsc_0045.jpg'),
(49, 'Siti Patimah', '235889', 'TKJ', 'X-TKJ-A', 'Sorong', '2002-05-20', 'Perempuan', 'Islam', 'Dejan', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'dsc_0019.jpg'),
(50, 'Tesalonika Aprilyani Situmorang', '235890', 'TKJ', 'X-TKJ-A', 'Madura', '2002-05-21', 'Laki-Laki', 'Islam', 'Tomoro', 'putri', 2, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'images (27).jpeg'),
(51, 'Tri Suci Wijayanti Aisyah', '235891', 'TKJ', 'X-TKJ-A', 'Jakarta', '2002-05-22', 'Perempuan', 'Islam', 'Suca', 'putri', 1, 'Bekasi', '21356889', 'Karyawan Swasta', 'Ibu rumah tangga', 'dwi-retna-ambarwati_edit_jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id` int(11) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `untuk` varchar(6) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(3000) NOT NULL,
  `dibuatoleh` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id`, `tgl_terbit`, `untuk`, `judul`, `isi`, `dibuatoleh`, `foto`) VALUES
(16, '2020-03-20', 'siswa', 'SURAT EDARAN LIBUR SEKOLAH', 'Assalamualaikum Wr,Wb. Teruntuk Murid-Murid SMK KARYA GUNA JAYA BEKASI, Seiring Bertambahnya Merebahnya Kasus Virus covid-19. Dan untuk mengurangi penyebaran pandemi ini. maka pihak sekolah akan meliburkan kegiatan sekolah dan proses kegiatan belajar mengajar di laksanan melalui daring atau online. untuk pemberitahuan surat edaran akan di berikan kepada siswa segera mungkin.. terikasih, Wassalamualaikum Wr, Wb.', 'Anto Suranto, S.Kom', 'images (12).jpeg'),
(17, '2020-02-03', 'siswa', 'JAGA KEBERSIHAN KELAS', 'Pemberitahuan untuk semua siswa agar menjaga kebersihan lingkungan sekolah dan kelas, di harapkan tidak membawa makanan serta minuman di dalam kelas..', 'Anto Suranto, S.Kom', 'images (12).jpeg'),
(18, '2020-01-08', 'siswa', 'PENEMUAN BARANG MILIK SISWA', 'Diberitahukan bagi siswa yang merasa kehilangan heandphone OPPO F11. Telah di temukan HP OPPO F11 di kelas XII-TKJ-C bagi siswa yang merasa kehilangan harap hubungi saya serta membawa serta bukti-bukti konkret', 'Maria db, S.Pd', 'images (14).jpeg'),
(19, '2020-02-21', 'siswa', 'MEMPERINGATI HARI KARTINI', 'Diberitahukan untuk para siswa, dalam rangka memperingati hari kartini. Akan di laksanakan upacara di hari senin. adapun pemakaian seragam untuk para SISWA memakai Baju batik bebas dan celana hitam bahan. Untuk SISWI memakai kebaya serta rok bahan hitam. yang tidak mematuhi aturan akan di kenakan sanksi atau tindakan hukuman yang berlaku', 'Maria db, S.Pd', 'images (14).jpeg'),
(20, '2020-04-23', 'guru', 'RAPAT TAHUN AJARAN BARU', 'Informasi untuk bapak/ibu guru SMK KARTA GUNA JAYA, untuk menghadiri agenda tahunan sekolah yaitu membahas perihal rapat tahun ajaran baru. adapun waktu dan tempat : Ruang Rapat Guru, Waktu: 19 MEI 2020, 08:00-13:00 WIB. DIrahapkan untuk mengadiri agenda rapat tersebut. Terimakasih', 'Ahmad Zakaria', 'WhatsApp Image 2019-07-11 at 09.58.20.jpeg'),
(21, '2020-05-17', 'Siswa', 'JAGA KEBERSIHAN KELASssss', '$this->timeZone(\'Asia/Jakarta\');\"', 'Acep Soleh, S.Pd', 'images (12).jpeg'),
(22, '2020-05-17', 'siswa', 'HARI LIBUR', '$tglterbit = date(\"Y-m-d\");', 'Ahmad Zakaria', 'WhatsApp Image 2019-07-11 at 09.58.20.jpeg'),
(23, '2020-05-18', 'Siswa', 'HARI LIBUR', 'adadadadada', 'Kartinah, S.pd', 'images (7).jpeg'),
(24, '2020-05-29', 'Siswa', 'LIBUUUR', 'LIBUR CORONAAAA', 'Acep Soleh, S.Pd', 'images (12).jpeg'),
(25, '2020-05-29', 'Guru', 'ACEP ANYINK', 'CEEEP KALO PAKE APLIKASI YANG BENER ANYIINKKK', 'Ahmad Zakaria', 'duck.jpg'),
(26, '2020-05-29', 'Guru', 'KARTINAH ANTYIINKKK', 'ANYIONK LOOO', 'Maria db, S.Pd', 'images (14).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `namajabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `namajabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Kurukulum'),
(4, 'Kesiswaan'),
(5, 'Hubungan Masyarakat'),
(6, 'Kepala Perpustakaan'),
(7, 'Kepala Program TKJ'),
(8, 'Kepala Lab TKJ'),
(9, 'Kepala Program TKR'),
(10, 'Kepala Bengkel TKR'),
(11, 'Wali Kelas'),
(12, 'Pembina Osis'),
(13, 'Kepala Ekstrakurikuler'),
(14, 'Guru Bimbingan Dan Konseling'),
(15, 'Kepala Tata Usaha'),
(16, 'Staff Pengajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jeniskelamin`
--

CREATE TABLE `tbl_jeniskelamin` (
  `id` int(11) NOT NULL,
  `jeniskelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jeniskelamin`
--

INSERT INTO `tbl_jeniskelamin` (`id`, `jeniskelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusann`
--

CREATE TABLE `tbl_jurusann` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusann`
--

INSERT INTO `tbl_jurusann` (`id_jurusan`, `jurusan`) VALUES
(1, 'TKJ'),
(2, 'TKR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelass`
--

CREATE TABLE `tbl_kelass` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `rombel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelass`
--

INSERT INTO `tbl_kelass` (`id`, `id_jurusan`, `id_kelas`, `kelas`, `rombel`) VALUES
(1, 1, 'K001', 'X-TKJ-A', 1),
(2, 1, 'K002', 'X-TKJ-B', 1),
(3, 1, 'K003', 'X-TKJ-C', 1),
(4, 1, 'K004', 'XI-TKJ-A', 0),
(5, 1, 'K005', 'XI-TKJ-B', 0),
(6, 1, 'K006', 'XI-TKJ-C', 0),
(7, 1, 'K007', 'XII-TKJ-A', 0),
(8, 1, 'K008', 'XII-TKJ-B', 0),
(10, 2, 'K010', 'X-TKR-A', 0),
(11, 2, 'K011', 'X-TKR-B', 0),
(12, 2, 'K012', 'X-TKR-C', 0),
(13, 2, 'K013', 'XI-TKR-A', 0),
(14, 2, 'K014', 'XI-TKR-B', 0),
(15, 2, 'K015', 'XI-TKR-C', 0),
(16, 2, 'K016', 'XII-TKR-A', 0),
(17, 2, 'K017', 'XII-TKR-B', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL,
  `namamapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id`, `kode_mapel`, `namamapel`) VALUES
(3, 'MP003', 'Bahasa Indonesia'),
(4, 'MP004', 'Matematika'),
(5, 'MP005', 'Sejarah Indonesia'),
(6, 'MP006', 'Bahasa Inggris'),
(7, 'MP007', 'Seni Budaya'),
(8, 'MP008', 'Prakarya Dan Kewirausahaan'),
(9, 'MP009', 'PJOK'),
(10, 'MP010', 'Bahasa Sunda'),
(11, 'MP011', 'Fisika'),
(12, 'MP012', 'Kmia'),
(13, 'MP013', 'Simulasi Digital'),
(14, 'MP014', 'Ilmu Pengetahuan Alam'),
(15, 'MP015', 'Ilmu Pengetahuan Sosial'),
(16, 'MP016', 'Produktif TKJ'),
(17, 'MP017', 'Produktif TKR'),
(18, 'MP018', 'Pendidikan Agama Kristen'),
(19, 'MP019', 'Bimbingan Konseling'),
(20, 'MP020', 'Pendidikan Agama Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id` int(11) NOT NULL,
  `id_tahunajaran` varchar(15) NOT NULL,
  `id_semester` varchar(2) NOT NULL,
  `nisn` varchar(6) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `nilai_uts` int(3) DEFAULT NULL,
  `nilai_uas` int(3) DEFAULT NULL,
  `nilai_tugas` int(3) DEFAULT NULL,
  `nilai_harian` int(3) DEFAULT NULL,
  `nilai_praktek` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id`, `id_tahunajaran`, `id_semester`, `nisn`, `namasiswa`, `kelas`, `mapel`, `nilai_uts`, `nilai_uas`, `nilai_tugas`, `nilai_harian`, `nilai_praktek`) VALUES
(1, 'T20-21-Genap', '1', '235869', 'Abdullah Zafar Ridwan', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 75, NULL, NULL),
(2, 'T20-21-Genap', '1', '235870', 'Aditya Putra Daniswara', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 78, NULL, NULL),
(3, 'T20-21-Genap', '1', '235871', 'Agustina Riskiyani', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 78, NULL, NULL),
(4, 'T20-21-Genap', '1', '235872', 'Aulia Fitriyana', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 78, NULL, NULL),
(5, 'T20-21-Genap', '1', '235873', 'Azzarah Salwa Salsabillah', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 80, NULL, NULL),
(6, 'T20-21-Genap', '1', '235874', 'Cantika Fitri Asyfa', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 80, NULL, NULL),
(7, 'T20-21-Genap', '1', '235875', 'Dina Ariyanti', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 81, NULL, NULL),
(8, 'T20-21-Genap', '1', '235876', 'Enjelita Rosmawaty Sitohang', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 81, NULL, NULL),
(9, 'T20-21-Genap', '1', '235877', 'Febri Ardiansah', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 80, NULL, NULL),
(10, 'T20-21-Genap', '1', '235878', 'Ferdinand', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 80, NULL, NULL),
(11, 'T20-21-Genap', '1', '235879', 'Gulo Erda Murni Karunia Kasih', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 80, NULL, NULL),
(12, 'T20-21-Genap', '1', '235880', 'Karmila Wahyuni', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 80, NULL, NULL),
(13, 'T20-21-Genap', '1', '235881', 'Leo J Pramurio Samosir', 'X-TKJ-A', 'Seni Budaya', 77, NULL, 78, NULL, NULL),
(14, 'T20-21-Genap', '1', '235882', 'Linda Mei Saputri', 'X-TKJ-A', 'Seni Budaya', 77, NULL, 78, NULL, NULL),
(15, 'T20-21-Genap', '1', '235883', 'Matrin Luis Timbul Sibarani', 'X-TKJ-A', 'Seni Budaya', 77, NULL, 78, NULL, NULL),
(16, 'T20-21-Genap', '1', '235884', 'Nuryana Kusumawati', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 78, NULL, NULL),
(17, 'T20-21-Genap', '1', '235885', 'Priyo Megarahadi Mahesa S', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 78, NULL, NULL),
(18, 'T20-21-Genap', '1', '235886', 'Rafli Firdaus', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 78, NULL, NULL),
(19, 'T20-21-Genap', '1', '235887', 'Rokip Firmansyah', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 78, NULL, NULL),
(20, 'T20-21-Genap', '1', '235888', 'Ronaldi Goklas S', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 78, NULL, NULL),
(21, 'T20-21-Genap', '1', '235889', 'Siti Patimah', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 78, NULL, NULL),
(22, 'T20-21-Genap', '1', '235890', 'Tesalonika Aprilyani Situmorang', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 78, NULL, NULL),
(23, 'T20-21-Genap', '1', '235891', 'Tri Suci Wijayanti Aisyah', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 78, NULL, NULL),
(24, 'T20-21-Genap', '1', '235869', 'Abdullah Zafar Ridwan', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 79, NULL, NULL),
(25, 'T20-21-Genap', '1', '235870', 'Aditya Putra Daniswara', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 79, NULL, NULL),
(26, 'T20-21-Genap', '1', '235871', 'Agustina Riskiyani', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 79, NULL, NULL),
(27, 'T20-21-Genap', '1', '235872', 'Aulia Fitriyana', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 79, NULL, NULL),
(28, 'T20-21-Genap', '1', '235873', 'Azzarah Salwa Salsabillah', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 79, NULL, NULL),
(29, 'T20-21-Genap', '1', '235874', 'Cantika Fitri Asyfa', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 78, NULL, NULL),
(30, 'T20-21-Genap', '1', '235875', 'Dina Ariyanti', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 79, NULL, NULL),
(31, 'T20-21-Genap', '1', '235876', 'Enjelita Rosmawaty Sitohang', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 78, NULL, NULL),
(32, 'T20-21-Genap', '1', '235877', 'Febri Ardiansah', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 79, NULL, NULL),
(33, 'T20-21-Genap', '1', '235878', 'Ferdinand', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 79, NULL, NULL),
(34, 'T20-21-Genap', '1', '235879', 'Gulo Erda Murni Karunia Kasih', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 90, NULL, NULL),
(35, 'T20-21-Genap', '1', '235880', 'Karmila Wahyuni', 'X-TKJ-A', 'Seni Budaya', 70, NULL, 80, NULL, NULL),
(36, 'T20-21-Genap', '1', '235881', 'Leo J Pramurio Samosir', 'X-TKJ-A', 'Seni Budaya', 77, NULL, 80, NULL, NULL),
(37, 'T20-21-Genap', '1', '235882', 'Linda Mei Saputri', 'X-TKJ-A', 'Seni Budaya', 77, NULL, 80, NULL, NULL),
(38, 'T20-21-Genap', '1', '235883', 'Matrin Luis Timbul Sibarani', 'X-TKJ-A', 'Seni Budaya', 77, NULL, 80, NULL, NULL),
(39, 'T20-21-Genap', '1', '235884', 'Nuryana Kusumawati', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 80, NULL, NULL),
(40, 'T20-21-Genap', '1', '235885', 'Priyo Megarahadi Mahesa S', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 80, NULL, NULL),
(41, 'T20-21-Genap', '1', '235886', 'Rafli Firdaus', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 80, NULL, NULL),
(42, 'T20-21-Genap', '1', '235887', 'Rokip Firmansyah', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 80, NULL, NULL),
(43, 'T20-21-Genap', '1', '235888', 'Ronaldi Goklas S', 'X-TKJ-A', 'Seni Budaya', 75, NULL, 80, NULL, NULL),
(44, 'T20-21-Genap', '1', '235889', 'Siti Patimah', 'X-TKJ-A', 'Seni Budaya', 78, NULL, 80, NULL, NULL),
(45, 'T20-21-Genap', '1', '235890', 'Tesalonika Aprilyani Situmorang', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 80, NULL, NULL),
(46, 'T20-21-Genap', '1', '235891', 'Tri Suci Wijayanti Aisyah', 'X-TKJ-A', 'Seni Budaya', 79, NULL, 80, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL,
  `id_semester` varchar(2) NOT NULL,
  `semester` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_semester`
--

INSERT INTO `tbl_semester` (`id`, `id_semester`, `semester`) VALUES
(1, '1', 'Ganjil'),
(2, '2', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahunajaran`
--

CREATE TABLE `tbl_tahunajaran` (
  `id` int(11) NOT NULL,
  `id_tahunajaran` varchar(15) NOT NULL,
  `tahunajaran` varchar(15) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `status_semester` int(11) NOT NULL DEFAULT '0',
  `pengaktif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahunajaran`
--

INSERT INTO `tbl_tahunajaran` (`id`, `id_tahunajaran`, `tahunajaran`, `id_semester`, `status_semester`, `pengaktif`) VALUES
(1, 'T18-19-Ganjil', '2018/2019', 1, 0, ' '),
(2, 'T18-19-Genap', '2018/2019', 2, 0, ' '),
(3, 'T19-20-Ganjil', '2019/2020', 1, 0, ' '),
(4, 'T19-20-Genap', '2019/2020', 2, 0, ''),
(5, 'T20-21-Genap', '2020/2021', 1, 1, 'Ahmad Zakaria'),
(6, 'T20-21-Ganjil', '2020/2021', 2, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id` int(11) NOT NULL,
  `namaguru` varchar(50) NOT NULL,
  `nuptk` varchar(7) NOT NULL,
  `id_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id`, `namaguru`, `nuptk`, `id_kelas`) VALUES
(1, 'Sulistiono S.Pd', '7790356', 'K001'),
(2, 'Aisyah Ramadhani, S,Sos', '3615893', 'K005'),
(3, 'Yanti Sumarti, S.Pd', '9090120', 'K002'),
(4, 'Sumarno S.Pd', '2268921', 'K003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaguru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nuptk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kotakelahiran` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` datetime NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`id`, `namaguru`, `nuptk`, `jabatan`, `Kotakelahiran`, `jeniskelamin`, `mapel`, `tgllahir`, `agama`, `alamat`, `pendidikan`, `nohp`, `email`, `password`, `foto`) VALUES
(1, 'Aisyah Ramdhani Suci, S.Sos', '2569863', 'Kurikulum', 'bekasi', 'Perempuan', '[\"Sejarah Indonesia\",\"Seni Budaya\"]', '1997-04-01 00:00:00', 'islam', 'Jln. Wahyu 4 Jatimulya Bekasi', 'S1', '813226912', 'aisyah@kgj.com', '$2y$10$9qM2eS8kJtfCCDyFOCpTZeS9ADSD8mLpA//Vl1IZTtJuUujO7bfiq', 'images (1).jpeg'),
(6, 'Robbi Diapari, S.Kom', '5689134', 'Kepala Sekolah', 'Lampun', 'Laki-Laki', 'TKJ', '1981-05-05 00:00:00', 'islam', 'Jln. Pattimura 4 Villa Anggrek, Bekasi', 'S1', '813226912', 'robbi@kgj.com', '$2y$10$ZsirmqvUZE128VbeRIwzaOVP9wzPq0X5J1m6GPnjYMKcdo5KL80Lm', 'images (4).jpeg'),
(7, 'Yoga Prasetya Valentino', '5894632', 'Kepala Tata Usaha', 'Jakarta', 'Laki-Laki', 'TKJ', '1997-03-02 00:00:00', 'islam', 'Jl. Merdeka V Bekasi Utara', 'D3', '8977653316', 'yoga@kgj.com', '$2y$10$riiuQKKn8ObbhtLuKU8a2eqFQm/7xm/H5rn6uFOILcigdfI9KX2vS', 'images (6).jpeg'),
(8, 'Nia Permatasari, S.Pd', '5568915', 'Kurikulum', 'Jakarta', 'Perempuan', '[\"Matematika\"]', '1995-02-21 00:00:00', 'islam', 'Jl. Jambu Jatimulya, Bekasi', 'S1', '8135569780', 'nia@kgj.com', '$2y$10$uWD2n2vUY7JmBUTAwsmpi.rauWk9gfbllV52DuMMIRaHuldp/05Wm', 'unnamed.jpg'),
(9, 'Acep Soleh, S.Pd', '5123649', 'Kesiswaan', 'Magetan', 'Laki-Laki', '[\"PJOK\"]', '1978-03-06 00:00:00', 'islam', 'Bekasi', 'S1', '81266497653', 'acep@kgj.com', '$2y$10$6pYo9FFArvw8xhwMQ08fROqIZuuJOpK3iNw4MvHKiRUfyjZc.yyXC', 'images (12).jpeg'),
(10, 'Ujang Sujana, S.Ag', '5564893', 'Hubungan Masyarakat', 'Banten', 'Laki-Laki', '[\"Bahasa Sunda\",\"Bimbingan Konseling\",\"Pendidikan Agama Islam\"]', '1975-05-02 00:00:00', 'islam', 'Bekasi', 'S1', '8152234680', 'ujang@kgj.com', '$2y$10$S0CPa2bX5DunYjkQLhNHMuAZWZ/xAxqZ3pIpSJN4GUKkyU.W71UVu', 'images (13).jpeg'),
(11, 'Sri Mulyana, S.pd', '5564891', 'Kepala Perpustakaan', 'bekasi', 'Perempuan', '[\"Seni Budaya, Bahasa Indonesia\",\"Bahasa Indonesia\"]', '1972-02-07 00:00:00', 'islam', 'Bekasi', 'S1', '81944567321', 'sri@kgj.com', '$2y$10$UNrnwY93dG0Knt2n/IZ2GeQaQDruVeB0AJPrX6PxDXuOq5flCiQYi', 'images (2).jpeg'),
(12, 'Kartinah, S.pd', '5512345', 'Kordinator Osis', 'bekasi', 'Perempuan', '[\"Bahasa Indonesia\"]', '1995-01-09 00:00:00', 'islam', 'Tambun Selatan', 'S1', '8956631557', 'kartinah@kgj.com', '$2y$10$yHAG5Cv4Y7K.j.e3CNBkAuVVeG3ytSwCMMthAFV1O/So8xU0c6v2.', 'images (7).jpeg'),
(13, 'Firmansyah, ST', '5164978', 'Kepala Bengkel TKR', 'bekasi', 'Laki-Laki', '[\"Produktif TKR\"]', '1989-05-07 00:00:00', 'islam', 'Setu, Bekasi', 'S1', '8152231446', 'firman@kgj.com', '$2y$10$sn1k72TvMnPEbeKh6g1PA.AVJJFKSzVEYVZFI9dnACOh7XkgDVUJS', 'images (5).jpeg'),
(14, 'Krisna Atmaja, S.Kom', '5663214', 'Kordinator BKK', 'bekasi', 'Laki-Laki', '[\"Produktif TKJ\"]', '1997-04-09 00:00:00', 'islam', 'Bekasi Utara, Villa Gading Harapan 3', 'S1', '81255678989', 'krisna@kgj.com', '$2y$10$pRxuIFJJGzRQTKhTbeJPYOovg7t7QOQbzeWReqnp8mKbLg0UbqOJy', 'images (8).jpeg'),
(15, 'Dejan Jaya, S.Kom', '5879123', 'Kepala Lab Komputer', 'bekasi', 'Perempuan', '[\"Produktif TKJ\"]', '2000-02-02 00:00:00', 'islam', 'Bekasi Rawalumbu', 'S1', '812664866', 'dejan@kgj.com', '$2y$10$kcUbG/R6rG/zSK8DQEv5ju0pCoPVFziqvSl2qX9CSfR0UypCqezbS', 'images (10).jpeg'),
(16, 'Wahyuti Wibawati, S.Pd.', '5564983', 'Staff Guru', 'Solo', 'Perempuan', '[\"Ilmu Pengetahuan Alam\",\"Ilmu Pengetahuan Sosial\"]', '1994-02-05 00:00:00', 'islam', 'Setu, Bekasi', 'S1', '8175564994', 'wahyuti@kgj.com', '$2y$10$OZYeiprSMrDwwH4V3d4Iue0qUFj45AGVMyJbUWaasvD9wDYBo.hA2', 'images (3).jpeg'),
(17, 'Hj. Nining Suwarni, S.Pd', '5564984', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Fisika\",\"Kmia\"]', '1982-01-06 00:00:00', 'islam', 'Bekasi', 'S1', '813226923', 'nining@kgj.com', '$2y$10$S8AtVHGXR8Tf.atnjRrJQuiWMLgw5Lif9EVt5itMa6sEz7E1YiNfi', 'images (15).jpeg'),
(18, 'H. Imam Supardi, S.Pd.', '5564985', 'Staff Guru', 'bekasi', 'Laki-Laki', '[\"Simulasi Digital\",\"Prakarya Dan Kewirausahaan\"]', '1986-03-05 00:00:00', 'islam', 'Bekasi', 'S1', '813226924', 'imam@kgj.com', '$2y$10$ZzVMZmeB8ALwTnXl0D3Y..aJEQAXZJmsteUwVvDKDzW.vv5GLSGxS', 'images (12).jpeg'),
(19, 'Rachmawati Rahayu, S.Pd.', '5564986', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Prakarya Dan Kewirausahaan\",\"Pendidikan Agama Kristen\"]', '1997-04-14 00:00:00', 'islam', 'Bekasi', 'S1', '813226925', 'rachmawati@kgj.com', '$2y$10$l6P3a4MwK/ouutk4QdzW1u5sOAXw4.Md9O0UrNqB/.ZFN5Wcu2VZK', 'images (11).jpeg'),
(20, 'Istikomah, S.Pd.', '5564987', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Matematika\",\"Sejarah Indonesia\"]', '1998-02-05 00:00:00', 'islam', 'Bekasi', 'S1', '813226926', 'istikomah@kgj.com', '$2y$10$NE48jsgdlxN0sQdMAvepROzhFcihLhIYfstahMKhM/8WD4uRyD1S2', 'images (16).jpeg'),
(21, 'Aris Hendaris, S.Pd', '5564988', 'Staff Guru', 'bekasi', 'Laki-Laki', '[\"Bimbingan Konseling\"]', '1995-05-10 00:00:00', 'islam', 'Bekasi', 'S1', '813226927', 'aris@kgj.com', '$2y$10$hMxal7neqf8PPgDVjUjxMe6BqLNcL/RgOxPUV6D/iyw8uHUSsJAH6', 'images.jpeg'),
(22, 'Tuty Suprapti, S.Pd.', '5564989', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Pendidikan Agama Kristen\",\"Bahasa Inggris\"]', '1987-01-08 00:00:00', 'islam', 'Bekasi', 'S1', '813226928', 'tuty@kgj.com', '$2y$10$/bYaGp5WnCWmJYlmIdxE/ulHSD1zOG1YFw9HNWXRwJnV/Em5mLfJu', 'images (14).jpeg'),
(23, 'Yuni Susanto, S.Pd., M.Pd.', '5564990', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Bahasa Inggris\"]', '1997-04-18 00:00:00', 'islam', 'Bekasi', 'S1', '813226929', 'yuni@kgj.com', '$2y$10$OxeNIep0W39CE6ZBTKf2ZeG097YKBF4k2O7L.nZ0VDlhbKtyYm1nm', 'images (17).jpeg'),
(24, 'Odah Saodah, S.Sos., M.Si.', '5564991', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Sejarah Indonesia\",\"Bimbingan Konseling\"]', '1992-05-10 00:00:00', 'islam', 'Bekasi', 'S1', '813226930', 'odah@kgj.com', '$2y$10$i/j1gyUsEE1HJvregvAohOqVdAEfLodoyzR3FL7CKAe/IDlDAa0Nm', 'images (18).jpeg'),
(25, 'Murni Nengsih, S.Pd.', '5564992', 'Staff Guru', 'bekasi', 'Perempuan', '[\"PJOK\"]', '1997-04-20 00:00:00', 'islam', 'Bekasi', 'S1', '813226931', 'murni@kgj.com', '$2y$10$YsKc6jEQ.jwE24M.WtKCduKWd0byuNm4dIhQRc8deqXev5D3BPRGG', 'images (19).jpeg'),
(26, 'Titi Setiati, ST.', '5564993', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Kmia\"]', '1991-02-01 00:00:00', 'islam', 'Bekasi', 'S1', '813226932', 'titi@kgj.com', '$2y$10$deOqu6YsLvHspAUGgTjEmuqY.p9/kUAPFSHOg1GFI1M35KsaCW2S6', 'DjDUskoUYAAZBn3.jpg'),
(27, 'Cucu Hidayati, S.Pd', '5564994', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Bahasa Inggris\"]', '1994-05-05 00:00:00', 'islam', 'Bekasi', 'S1', '813226933', 'cucu@kggj.com', '$2y$10$9mo/ALSu39Vzbp61HoO0G.FvnmUxsYHsVmyXIoAxqCzvispu2qtsy', 'unnamed.jpg'),
(28, 'Tommy Nurul Muflikh, S.Pd.', '5564995', 'Staff Guru', 'bekasi', 'Perempuan', '[\"Bahasa Indonesia\"]', '1997-04-23 00:00:00', 'islam', 'Bekasi', 'S1', '813226934', 'tommy@kgj.com', '$2y$10$8lxI3e4a7tUhr6/oS5x5HOeCdvWiWXWZFFEHGokyisI0ZUIDf4XpG', 'fb_img_1506912121084.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rombel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `namasiswa`, `nisn`, `jeniskelamin`, `nohp`, `alamat`, `agama`, `jurusan`, `rombel`, `kelas`, `email`, `password`, `foto`) VALUES
(2, 'Abdullah Zafar Ridwan', '235869', 'Laki-Laki', '8136658', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'zafar@kgj.com', '$2y$10$7kR3QsVGyIRU8SduR6xTfewvUUsP25ioZDv0l0O4MKYdfGCXcAYEW', 'IMG-20200526-WA0002.jpg'),
(3, 'Aditya Putra Daniswara', '235870', 'Laki-Laki', '8136659', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'adityaputra@kgj.com', '$2y$10$ez/2T3rulcV/b0ACqb/84eNKuFgIq3L.1imAviln00w7zNJY7ciru', ''),
(4, 'Agustina Riskiyani', '235871', 'Perempuan', '8136660', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'agustina@kgj.com', '$2y$10$2SGBefqV1hN5PKcEulYeLeSL4ua8QNGQ8zRr8AiVP3iTKVZYyDa0m', ''),
(5, 'Aulia Fitriyana', '235872', 'Perempuan', '8136661', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'aulia@kgj.com', '$2y$10$uIDReJCT9lcVIKxFP4KjX.3IOOfZKuC/nsKPGyThlEn1ZtURIGvpq', ''),
(6, 'Azzarah Salwa Salsabillah', '235873', 'Perempuan', '8136662', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'salwa@kgj.com', '$2y$10$L4xmGU3HhnPTeM8k0cL9TOtBQZ2i/NwPHgsFpL9Kpe25ipSFdswem', ''),
(7, 'Cantika Fitri Asyfa', '235874', 'Perempuan', '8136663', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'cantika@kgj.com', '$2y$10$qpgRMgYSWZXfcQ/0MTaoO.VHZsmXEs1mBQvThEvyDc.0QY3X2kLre', ''),
(8, 'Dina Ariyanti', '235875', 'Perempuan', '8136664', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'dina@kgj.com', '$2y$10$KXE3rqEs2VcdtjPfIlgDlOWaRfOIEThCEwCehBrnyQfm.NAHdwTSy', ''),
(9, 'Enjelita Rosmawaty Sitohang', '235876', 'Perempuan', '8136665', 'Bekasi', 'Kristen', 'TKJ', '0', 'X-TKJ-A', 'enjelita@kgj.com', '$2y$10$vTLKhcg.I9vblmTrvStU7.sEQIqkemrCXEtPT.GgGyjPGolgu6ax.', ''),
(10, 'Febri Ardiansah', '235877', 'Laki-Laki', '8136666', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'febri@kgj.com', '$2y$10$ntUsYvXcZfXAAihhPTniwuyTQCXPWRrz7iYbnC/TtY/DwhLPqh7bm', ''),
(11, 'Ferdinand', '235878', 'Laki-Laki', '8136667', 'Bekasi', 'Kristen', 'TKJ', '0', 'X-TKJ-A', 'ferdinand@kj.com', '$2y$10$QdEiusWAN.RGB0VY/tqlbeSGjbQZwr8I30wmpT7TGZN2nwEcT9zlu', ''),
(12, 'Gulo Erda Murni Karunia Kasih', '235879', 'Perempuan', '8136668', 'Bekasi', 'Katolik', 'TKJ', '0', 'X-TKJ-A', 'gulo@kgj.com', '$2y$10$wlkFg7bKv7OyU0Unr84gUuCybsHmWuQdacM5mnVgBk0TWbHLXOyle', 'koala.png'),
(13, 'Karmila Wahyuni', '235880', 'Perempuan', '8136669', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'karmila@kgj.com', '$2y$10$YYgxM2146CEkq5epE2u.ZOhsHPlS72y8CVrpwaihTS9NzsyqF4iYe', ''),
(14, 'Leo J Pramurio Samosir', '235881', 'Laki-Laki', '8136670', 'Bekasi', 'Kristen', 'TKJ', '0', 'X-TKJ-A', 'leo@kgj.com', '$2y$10$uZWCVsHlzwAZM/jV.rOWZeCAZ/RIR3.TGPNbBhebjsTTlbvCAKjIK', ''),
(15, 'Linda Mei Saputri', '235882', 'Perempuan', '8136671', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'linda@kgj.com', '$2y$10$qHQGqK.uioXs2z.MUDwmVObhL/PtWk9.aJodwPXjwPxdXv/.qmZzm', ''),
(16, 'Matrin Luis Timbul Sibarani', '235883', 'Laki-Laki', '8136672', 'Bekasi', 'Kristen', 'TKJ', '0', 'X-TKJ-A', 'martinluis@kgj.com', '$2y$10$FIl4cVYgp3SkmcYl8miS1eIjzm7BnISMbKF34npOdLcvLAYMI9neu', ''),
(17, 'Nuryana Kusumawati', '235884', 'Perempuan', '8136673', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'nuryana@kgj.com', '$2y$10$AX1Sb6nBxtx/kO8m41Jyfe4JDc6r7U6Aarj9Rx1DvZ57V9wrgMIIG', ''),
(18, 'Priyo Megarahadi Mahesa S', '235885', 'Laki-Laki', '8136674', 'Bekasi', 'Islam', 'TKJ', '3', 'X-TKJ-A', 'priyo@kgj.com', '$2y$10$NuLH/tVMEGdHLRXMHd7F5.2n3tGn/CX.mE3HKz7NQW5q5LisAFmtC', 'aPjOydl.jpg'),
(19, 'Rafli Firdaus', '235886', 'Laki-Laki', '8136675', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'rafli@kgj.com', '$2y$10$n1wn1p18rfAZaCpAmFsjMOonVKkktTiaH6jzXw2eE0GrHx1MYPgVW', ''),
(20, 'Rokip Firmansyah', '235887', 'Laki-Laki', '8136676', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'rokip@kgj.com', '$2y$10$ZLut1lfNmKCVFyXx7l4EiuF5N1PreMIQXcYLL4OYY62QT1llKX/8W', ''),
(21, 'Ronaldi Goklas S', '235888', 'Laki-Laki', '8136677', 'Bekasi', 'Kristen', 'TKJ', '0', 'X-TKJ-A', 'ronaldi@kgj.com', '$2y$10$7LRvs7ksaSevuxybswzYXeyyRQK9JanTyA3HQUS0sGldv9sCExmD6', ''),
(22, 'Siti Patimah', '235889', 'Perempuan', '8136678', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'sitipatimah@kgj.com', '$2y$10$kRvxtfZIaxyNXVjcUWlN8.c/PCHeovLvFMZb1NdXIkGxUZVzIXYVa', ''),
(23, 'Tesalonika Aprilyani Situmorang', '235890', 'Laki-Laki', '8136679', 'Bekasi', 'Kristen', 'TKJ', '0', 'X-TKJ-A', 'tesalonika@kgj.com', '$2y$10$xzVh2OMg4X/LjoEAncQZL.9qkX9qEYbhuVwpKDkhePMVFO4QwAkpi', ''),
(24, 'Tri Suci Wijayanti Aisyah', '235891', 'Perempuan', '8136680', 'Bekasi', 'Islam', 'TKJ', '0', 'X-TKJ-A', 'trisuci@kgj.com', '$2y$10$dT7JQCl80WSBpTDsZZPBQOnvrg42nE.dd2rw.mM09MQCFkGGDssNm', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_datasiswa`
--
ALTER TABLE `tbl_datasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jeniskelamin`
--
ALTER TABLE `tbl_jeniskelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jurusann`
--
ALTER TABLE `tbl_jurusann`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kelass`
--
ALTER TABLE `tbl_kelass`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tahunajaran`
--
ALTER TABLE `tbl_tahunajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_datasiswa`
--
ALTER TABLE `tbl_datasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_jeniskelamin`
--
ALTER TABLE `tbl_jeniskelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusann`
--
ALTER TABLE `tbl_jurusann`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelass`
--
ALTER TABLE `tbl_kelass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahunajaran`
--
ALTER TABLE `tbl_tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
