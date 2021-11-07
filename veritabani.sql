-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2021 at 10:00 PM
-- Server version: 10.2.40-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tikokul_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuzdan_bilgisi`
--

CREATE TABLE `cuzdan_bilgisi` (
  `id` bigint(20) NOT NULL,
  `uye_id` bigint(20) NOT NULL,
  `cuzdan_kimligi` text NOT NULL,
  `isim` text NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuzdan_bilgisi`
--

INSERT INTO `cuzdan_bilgisi` (`id`, `uye_id`, `cuzdan_kimligi`, `isim`, `durum`) VALUES
(1, 1, 'asd9q6a6654gd3g1df32g1', 'Cüzdan 1', 0),
(2, 1, 'ad6q9zadf65s4dfs654sdf65s132s1f32sd1', 'Cüzdanım Benim', 0),
(3, 2, 'sf3q6ssf321sdf651sd6', 'Deneme 1', 0),
(4, 1, 'ilasdlasdasldfgdfgdfgdlklasdajasd2342', 'Cüzdan 2', 1),
(5, 3, 'qqes35d51dq651As651A321WQ6SD231321', 'ilk cüzdanım', 0),
(6, 3, 'sdas651fd65df165df1g6d5fg132d1fg98165d', 'ilk cüzdanım', 1),
(7, 2, 'w9er3sdf651sdf9q5a', 'Cüzdanım', 1),
(8, 6, 'ads321x651xcv6516565q', 'Cüzdanım', 1),
(9, 7, '741852hjjk', 'My Wallet', 0),
(10, 7, 't3f22a111t2s5a36d85a112a30d2', 'USDT CÜZDANIM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durumlar`
--

CREATE TABLE `durumlar` (
  `id` int(11) NOT NULL,
  `durum_adi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durumlar`
--

INSERT INTO `durumlar` (`id`, `durum_adi`) VALUES
(1, 'Bekleniyor'),
(2, 'İşleme Alındı'),
(3, 'Red Edildi'),
(4, 'Onaylandı');

-- --------------------------------------------------------

--
-- Table structure for table `diller`
--

CREATE TABLE `diller` (
  `id` int(11) NOT NULL,
  `dil_adi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diller`
--

INSERT INTO `diller` (`id`, `dil_adi`) VALUES
(1, 'Turkish'),
(2, 'English'),
(3, 'German');

-- --------------------------------------------------------

--
-- Table structure for table `elektronik_posta_ayarlari`
--

CREATE TABLE `elektronik_posta_ayarlari` (
  `id` int(11) NOT NULL,
  `smtp_sunucusu` text NOT NULL,
  `smtp_mail_adresi` text NOT NULL,
  `smtp_mail_parolasi` text NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_guvenlik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elektronik_posta_ayarlari`
--

INSERT INTO `elektronik_posta_ayarlari` (`id`, `smtp_sunucusu`, `smtp_mail_adresi`, `smtp_mail_parolasi`, `smtp_port`, `smtp_guvenlik`) VALUES
(1, 'mail.archivetoken.net', 'noreply@archivetoken.net', 'ArchiveToken59', 587, 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `odeme_gecmisi`
--

CREATE TABLE `odeme_gecmisi` (
  `id` bigint(20) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1,
  `uye_id` bigint(20) DEFAULT NULL,
  `yatirilacak_token` double DEFAULT NULL,
  `hediyesiz_token` double DEFAULT NULL,
  `hediye_token` double DEFAULT NULL,
  `odenen_tutar` float DEFAULT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `alinan_adet` bigint(20) DEFAULT NULL,
  `odenen_cuzdan_id` int(11) DEFAULT NULL,
  `txid_kodu` text DEFAULT NULL,
  `tarih_saat` text DEFAULT NULL,
  `tur` text NOT NULL DEFAULT 'Standart Alım'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odeme_gecmisi`
--

INSERT INTO `odeme_gecmisi` (`id`, `durum`, `uye_id`, `yatirilacak_token`, `hediyesiz_token`, `hediye_token`, `odenen_tutar`, `paket_id`, `alinan_adet`, `odenen_cuzdan_id`, `txid_kodu`, `tarih_saat`, `tur`) VALUES
(102, 4, 1, 1, NULL, NULL, 0, 0, 0, 0, '0', '23/08/2021 19:04:40', 'Karşılıksız Tekil Token Yükleme'),
(103, 4, 1, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:11:53', 'Karşılıksız Tekil Token Yükleme'),
(104, 4, 7, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:14:13', 'Karşılıksız Tekil Token Yükleme'),
(105, 4, 7, 2, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:14:29', 'Karşılıksız Tekil Token Yükleme'),
(106, 3, 7, 960, 800, 160, 120, 1, 1, 9, 'fffff', '06/11/2021 15:33:36', '\'Standart Alım\''),
(107, 3, 7, 960, 800, 160, 120, 1, 1, 9, 'fffff', '06/11/2021 15:34:01', 'Standart Alım'),
(108, 4, 7, 1, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:34:50', 'Karşılıksız Tekil Token Yükleme'),
(109, 4, 1, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:35:14', 'Karşılıksız Toplu Token Yükleme'),
(110, 4, 2, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:35:14', 'Karşılıksız Toplu Token Yükleme'),
(111, 4, 3, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:35:14', 'Karşılıksız Toplu Token Yükleme'),
(112, 4, 4, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:35:14', 'Karşılıksız Toplu Token Yükleme'),
(113, 4, 6, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:35:14', 'Karşılıksız Toplu Token Yükleme'),
(114, 4, 7, 10, NULL, NULL, 0, 0, 0, 0, '0', '06/11/2021 15:35:14', 'Karşılıksız Toplu Token Yükleme'),
(115, 3, 7, 960, 800, 160, 120, 1, 1, 9, 'fffff', '06/11/2021 15:35:38', 'Standart Alım'),
(116, 4, 7, 10920, 7800, 3120, 1130, 3, 2, 10, 'f32q11a52x9a65x2a', '06/11/2021 18:15:41', 'Standart Alım'),
(117, 3, 7, 960, 800, 160, 120, 1, 1, 10, 'gghz322a654a', '06/11/2021 18:16:20', 'Standart Alım'),
(118, 3, 7, 960, 800, 160, 120, 1, 1, 9, '22ddd6a54a', '06/11/2021 18:29:33', 'Standart Alım');

-- --------------------------------------------------------

--
-- Table structure for table `paketler`
--

CREATE TABLE `paketler` (
  `id` int(11) NOT NULL,
  `paket_adi` text NOT NULL,
  `paket_fiyati` float NOT NULL,
  `token_degeri` float NOT NULL,
  `paket_aciklamasi` text NOT NULL,
  `paket_kazanci` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paketler`
--

INSERT INTO `paketler` (`id`, `paket_adi`, `paket_fiyati`, `token_degeri`, `paket_aciklamasi`, `paket_kazanci`) VALUES
(1, 'Small Paket', 120, 800, 'Archive Token 1.Paketi fsdf sdf sdfsdf sdfsdf sdf sdf sdf sdf sdf sdfsd fsdfsdf sdfsd fsdf sd fsdf sdf sdfsdf sdf sdf sdfsdfsdf sdfsdf sddf', 20),
(2, 'Big Paket', 280, 1700, 'Archive Token Paket 2', 30),
(3, 'King Paket', 565, 3900, 'Archive Token Paket 3', 40);

-- --------------------------------------------------------

--
-- Table structure for table `popup_pencere_maddeleri`
--

CREATE TABLE `popup_pencere_maddeleri` (
  `id` int(11) NOT NULL,
  `madde_yazisi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `popup_pencere_maddeleri`
--

INSERT INTO `popup_pencere_maddeleri` (`id`, `madde_yazisi`) VALUES
(1, 'Türkiye için erken erişim fırsatı!'),
(2, 'Borsaya girilemediği takdirde para iade garantisi!'),
(3, 'Borsaya girdikten sonra hedeflerimizi gerçekleştirmek adına piyasada yeri büyük olan bulut depolama şirketleri ile anlaşma imzalayacağız!'),
(4, 'Büyük Almanyalı bir menejerlik şirketiyle reklam anlaşması yapacağız.');

-- --------------------------------------------------------

--
-- Table structure for table `token_ayarlari`
--

CREATE TABLE `token_ayarlari` (
  `id` int(11) NOT NULL,
  `on_satis_siniri` bigint(20) NOT NULL,
  `cuzdan_kimligi` text NOT NULL,
  `toplam_satis` double NOT NULL,
  `referans_kazanci` float NOT NULL DEFAULT 0,
  `token_birimi` text DEFAULT NULL,
  `token_adi` text DEFAULT NULL,
  `varsayilan_dil_id` int(11) DEFAULT NULL,
  `sozlesme_adresi` text DEFAULT NULL,
  `platform` text NOT NULL,
  `on_satis` int(11) NOT NULL,
  `danisman` int(11) NOT NULL,
  `toplam_token` int(11) NOT NULL,
  `borsa_isbirligi` int(11) NOT NULL,
  `odul` int(11) NOT NULL,
  `on_satis_token_degeri` int(11) NOT NULL,
  `kurucular_ekip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token_ayarlari`
--

INSERT INTO `token_ayarlari` (`id`, `on_satis_siniri`, `cuzdan_kimligi`, `toplam_satis`, `referans_kazanci`, `token_birimi`, `token_adi`, `varsayilan_dil_id`, `sozlesme_adresi`, `platform`, `on_satis`, `danisman`, `toplam_token`, `borsa_isbirligi`, `odul`, `on_satis_token_degeri`, `kurucular_ekip`) VALUES
(1, 9992117, 'TYQsay4giPDGD5sux7Zu6qNtZpv6EDs6GQ', 7884, 11, 'CHT', 'Chest Token', 1, '66cx5a5a21321xcv321xc32v1xcv', 'Deneme', 9992117, 10000000, 100000000, 65000000, 5000000, 10000000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `elektronik_posta_adresi` text NOT NULL,
  `parola` text NOT NULL,
  `isim_soyisim` text NOT NULL,
  `bakiye` float NOT NULL DEFAULT 0,
  `referans` bigint(20) DEFAULT NULL,
  `guvenlik_kodu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`id`, `elektronik_posta_adresi`, `parola`, `isim_soyisim`, `bakiye`, `referans`, `guvenlik_kodu`) VALUES
(9, 'loremipsum@gmail.com', 'UxCs7K5Xp04w2Mr/piPjpg==', 'Lorem Ipsum', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `ad_soyad` text NOT NULL,
  `elektronik_posta_adresi` text NOT NULL,
  `telefon_numarasi` text NOT NULL,
  `parola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `ad_soyad`, `elektronik_posta_adresi`, `telefon_numarasi`, `parola`) VALUES
(4, 'Demo Kullanıcısı', 'demo@gmail.com', '05555555555', 'UxCs7K5Xp04w2Mr/piPjpg=='),
(5, 'Test deneme', 'deneme@deneme.com', '05555555555', 'UxCs7K5Xp04w2Mr/piPjpg==');

-- --------------------------------------------------------

--
-- Table structure for table `iade_nedenleri`
--

CREATE TABLE `iade_nedenleri` (
  `id` int(11) NOT NULL,
  `neden` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iade_nedenleri`
--

INSERT INTO `iade_nedenleri` (`id`, `neden`) VALUES
(1, 'Teknik Aksaklık Sonucu Bakiye ARH  Cüzdanıma Ulaşmadı'),
(5, 'Test sebebi');

-- --------------------------------------------------------

--
-- Table structure for table `iade_talepleri`
--

CREATE TABLE `iade_talepleri` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `iade_sebebi` text NOT NULL,
  `kullanici_aciklamasi` longtext NOT NULL,
  `iade_durumu` int(11) NOT NULL DEFAULT 1,
  `basvuru_tarih_saat` text NOT NULL,
  `islem_id` int(11) NOT NULL,
  `red_sebebi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iade_talepleri`
--

INSERT INTO `iade_talepleri` (`id`, `uye_id`, `iade_sebebi`, `kullanici_aciklamasi`, `iade_durumu`, `basvuru_tarih_saat`, `islem_id`, `red_sebebi`) VALUES
(7, 7, 'Test sebebi', 'Bu işlemi iptal etmek istiyorum.', 4, '06/11/2021 18:20:48', 117, NULL),
(8, 7, 'Test sebebi', 'İşlemin iptal olmasını istiyorum.', 4, '06/11/2021 18:30:56', 118, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuzdan_bilgisi`
--
ALTER TABLE `cuzdan_bilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durumlar`
--
ALTER TABLE `durumlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diller`
--
ALTER TABLE `diller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elektronik_posta_ayarlari`
--
ALTER TABLE `elektronik_posta_ayarlari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odeme_gecmisi`
--
ALTER TABLE `odeme_gecmisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paketler`
--
ALTER TABLE `paketler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popup_pencere_maddeleri`
--
ALTER TABLE `popup_pencere_maddeleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_ayarlari`
--
ALTER TABLE `token_ayarlari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iade_nedenleri`
--
ALTER TABLE `iade_nedenleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iade_talepleri`
--
ALTER TABLE `iade_talepleri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuzdan_bilgisi`
--
ALTER TABLE `cuzdan_bilgisi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `durumlar`
--
ALTER TABLE `durumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diller`
--
ALTER TABLE `diller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `elektronik_posta_ayarlari`
--
ALTER TABLE `elektronik_posta_ayarlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `odeme_gecmisi`
--
ALTER TABLE `odeme_gecmisi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `paketler`
--
ALTER TABLE `paketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `popup_pencere_maddeleri`
--
ALTER TABLE `popup_pencere_maddeleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `token_ayarlari`
--
ALTER TABLE `token_ayarlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iade_nedenleri`
--
ALTER TABLE `iade_nedenleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iade_talepleri`
--
ALTER TABLE `iade_talepleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
