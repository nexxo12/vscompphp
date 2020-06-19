-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 09:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `garansi`
--

CREATE TABLE `garansi` (
  `ID_GARANSI` int(11) NOT NULL,
  `INV_PENJUALAN` varchar(100) DEFAULT NULL,
  `ID_BARANG` varchar(100) DEFAULT NULL,
  `TGL_BELI` date DEFAULT NULL,
  `TGL_HABIS` date DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garansi`
--

INSERT INTO `garansi` (`ID_GARANSI`, `INV_PENJUALAN`, `ID_BARANG`, `TGL_BELI`, `TGL_HABIS`, `STATUS`) VALUES
(1, 'INV00002', 'BR005', '2020-06-15', '0000-00-00', ''),
(2, 'INV00002', 'BR003', '2020-06-15', '0000-00-00', ''),
(4, 'INV00005', 'BR015', '2020-06-18', '0000-00-00', ''),
(8, 'INV00001', 'BR001', '2020-06-15', '2020-07-15', ''),
(9, 'INV00001', 'BR013', '2020-06-15', '2020-07-15', ''),
(13, 'INV00003', 'BR004', '2020-06-18', '0000-00-00', ''),
(14, 'INV00003', 'BR017', '2020-06-18', '0000-00-00', ''),
(16, 'INV00004', 'BR003', '2020-06-18', '0000-00-00', ''),
(17, 'INV00006', 'BR011', '2020-06-18', '0000-00-00', ''),
(18, 'INV00006', 'BR010', '2020-06-18', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `inv_penjualan`
--

CREATE TABLE `inv_penjualan` (
  `id_inv` varchar(100) NOT NULL,
  `TGL_TRX` date DEFAULT NULL,
  `BARANG` varchar(100) DEFAULT NULL,
  `GRAND_TOTAL` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inv_penjualan`
--

INSERT INTO `inv_penjualan` (`id_inv`, `TGL_TRX`, `BARANG`, `GRAND_TOTAL`) VALUES
('INV00001', '2020-06-15', '\r\nCube Gaming Varde - Matx - Tempered Glass - 3x Fan', 23200000),
('INV00002', '2020-06-15', '\r\nGEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)', 7460000),
('INV00003', '2020-06-18', '\r\nWDC 3.5\" 1TB SATA3 - Caviar Blue', 7080000),
('INV00004', '2020-06-18', '\r\nGEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)', 1230000),
('INV00005', '2020-06-18', '\r\nAdata SSD SU650 120GB', 1825000),
('INV00006', '2020-06-18', '\r\nPATRIOT VIPER ELITE DDR4 8GB (2x4GB) 2666Mhz', 8325000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `KATEGORI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KATEGORI`) VALUES
(1, 'Prosessor'),
(2, 'RAM'),
(3, 'Motherboard'),
(4, 'HDD'),
(5, 'Power Supply'),
(6, 'VGA'),
(7, 'Casing'),
(8, 'Monitor'),
(9, 'Keyboard'),
(10, 'SSD'),
(11, 'Mouse'),
(12, 'Speaker'),
(15, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `list_penjualan`
--

CREATE TABLE `list_penjualan` (
  `ID_PENJUALAN` int(11) NOT NULL,
  `INV_PENJUALAN` varchar(100) DEFAULT NULL,
  `ID_BARANG` varchar(100) DEFAULT NULL,
  `ID_PELANGGAN` varchar(100) DEFAULT NULL,
  `ID_LOGIN` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` date DEFAULT NULL,
  `JUMLAH_BELI` int(11) DEFAULT NULL,
  `HARGA_AWAL` double DEFAULT NULL,
  `HARGA_JL` double DEFAULT NULL,
  `TOTAL_HARGA` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `list_penjualan`
--
DELIMITER $$
CREATE TRIGGER `INSERT PJ` AFTER INSERT ON `list_penjualan` FOR EACH ROW BEGIN
INSERT INTO penjualan VALUES
(NEW.ID_PENJUALAN,NEW.INV_PENJUALAN, NEW.ID_BARANG, NEW.ID_PELANGGAN, NEW.ID_LOGIN, NEW.TANGGAL_TRANSAKSI, NEW.JUMLAH_BELI, NEW.HARGA_AWAL, NEW.HARGA_JL, NEW.TOTAL_HARGA);
        
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_LOGIN` int(11) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` text DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `LEVEL` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID_LOGIN`, `USERNAME`, `PASSWORD`, `NAMA`, `ALAMAT`, `LEVEL`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 'Jalan terindah', 'super'),
(2, 'maria', '202cb962ac59075b964b07152d234b70', 'Maria Gomez', 'Amerika', 'kasir'),
(3, 'vscomp', '202cb962ac59075b964b07152d234b70', 'VSComp', 'Surabaya', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `ID_BARANG` varchar(100) NOT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAMA_BARANG` varchar(100) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `SATUAN` varchar(10) DEFAULT NULL,
  `HARGA_JUAL` double DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`ID_BARANG`, `ID_KATEGORI`, `NAMA_BARANG`, `STOK`, `SATUAN`, `HARGA_JUAL`, `STATUS`) VALUES
('BR001', 6, 'Galax Geforce RTX 2060 6GB DDR6 - Dual Fan', 1, 'unit', 5600000, ''),
('BR002', 1, 'AM4 Raven Ridge Ryzen 3 2200G 3.5 Ghz Box', 3, 'unit', 1270000, ''),
('BR003', 2, 'GEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)', 0, 'unit', 1230000, ''),
('BR004', 5, 'Seasonic S12III-500 80+ Bronze', 1, 'Unit', 780000, ''),
('BR005', 3, 'ASRock X570 Phantom Gaming X', 1, 'unit', 2700000, ''),
('BR006', 1, 'Intel Core i3 9100F 3.6Ghz Up To 4.2Ghz Box Coffee Lake', 10, 'unit', 1120000, ''),
('BR007', 5, 'Seasonic Prime Gold GX-1000 / 1000GD - 1000W Full Modular', 0, 'unit', 2850000, ''),
('BR008', 6, 'PowerColor RX 580 RED DRAGON 8GB GDDR5', 0, 'unit', 2870000, ''),
('BR009', 3, 'Fast Intel H61 Socket 1155 with HDMI Port', 0, 'unit', 656000, ''),
('BR010', 2, 'PATRIOT VIPER ELITE DDR4 8GB (2x4GB) 2666Mhz', 5, 'unit', 715000, ''),
('BR011', 3, 'ECS H310CHS-M7 LGA 1151', 5, 'unit', 950000, ''),
('BR012', 6, 'PowerColor RX 580 RED Devil GOLDEN 8GB GDDR5', 0, 'unit', 3000000, ''),
('BR013', 7, 'Cube Gaming Varde - Matx - Tempered Glass - 3x Fan', 1, 'unit', 450000, ''),
('BR014', 7, 'Armaggeddon Nimitz N5 Aurora Micro ATX', 0, 'unit', 336000, ''),
('BR015', 10, 'Adata SSD SU650 120GB', 5, 'unit', 365000, ''),
('BR016', 10, 'Adata XPG Spectrix S40G RGB 512GB M.2 NVME PCIE GEN3X4', 0, 'unit', 1410000, ''),
('BR017', 4, 'WDC 3.5\" 1TB SATA3 - Caviar Blue', 1, 'unit', 695000, ''),
('BR018', 4, 'Seagate 3.5\" 1TB Baracuda SATA3', 0, 'unit', 750000, '');

--
-- Triggers `master_barang`
--
DELIMITER $$
CREATE TRIGGER `input id produk terjual` AFTER INSERT ON `master_barang` FOR EACH ROW BEGIN
INSERT INTO produk_terjual VALUES
('', NEW.ID_BARANG,'');
        
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID_NEWS` int(11) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `GAMBAR` varchar(50) DEFAULT NULL,
  `WAKTU` date DEFAULT NULL,
  `ISI` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID_NEWS`, `JUDUL`, `GAMBAR`, `WAKTU`, `ISI`) VALUES
(9, 'ASRock Launches the Radeon RX 5500 XT Challenger ITX 8G Graphics Cards', '5ebfdf15d33d6.png', '2020-06-12', '&lt;p&gt;&lt;strong&gt;TAIPEI&lt;/strong&gt;, Taiwan, April 16th, 2020 &amp;ndash;The leading global motherboard, graphics card and small form factor PC manufacturer, ASRock, launches the Challenger series &amp;ndash; Radeon RX 5500 XT Challenger ITX 8G graphics card. The graphics card is powered by the AMD advanced 7nm RDNA architecture, features new Compute Units delivering incredible performance and is optimized for better visual effects such as volumetric lighting, blur effects, depth of field, and multi-level cache hierarchy for reduced latency and highly responsive gaming.&lt;/p&gt;&lt;p&gt;The Radeon RX 5500 XT Challenger ITX 8G graphics card takes 1080p gaming to the next level, delivering ultra-responsive, high-fidelity AAA gaming at up to 60 FPS and e-Sports gaming at up to 90 FPS. The Radeon RX 5500 XT Challenger ITX 8G is equipped with up to 8GB of GDDR6 high-speed memory and PCI Express&amp;reg;&amp;nbsp;4.0 support for maximum game performance, exceptional power efficiency and outstanding value. Based on RDNA architecture, the Radeon RX 5500 XT Challenger ITX 8G graphics card provides base/game/boost GPU clock at 1607/1717/1845MHz. Furthermore, Radeon&amp;trade; Image Sharpening, FidelityFX, Radeon Anti-Lag and Radeon FreeSync technologies bring about maximum performance and enhanced gaming experiences.&lt;/p&gt;&lt;p&gt;The Radeon RX 5500 XT Challenger ITX 8G graphics card is specially designed with 17.8cm length, which can fit into small form factor and Mini-ITX chassis. The long-life 10 cm fan and 2 copper heat-pipes are able to enhance the heat dissipation effect. Users can ensure a smooth gaming experience in small system with high performance GPU.&lt;/p&gt;'),
(13, 'GIGABYTE Launches Latest AMD B550 AORUS Motherboards', '5ee34a1961a65.png', '2020-06-12', '&lt;p&gt;Taipei, Taiwan, May 21st, 2020 &amp;ndash; GIGABYTE TECHNOLOGY Co. Ltd, a leading manufacturer of motherboards and graphics cards, announced the launch of the newest B550 AORUS motherboards primed to unleash the potential of 3rd Gen AMD Ryzen&amp;trade; desktop processors. The all new B550 AORUS motherboards kick off the PCIe&amp;reg;&amp;nbsp;4.0 era with extensive feature sets, and equip up to Direct 16 phases of digital power design with advanced thermal solutions that provide the processors and chipset more stable power supplement. Select GIGABYTE B550 AORUS motherboards feature a native USB 3.2 Gen2 interface, feature-rich I/O with a pre-installed I/O shield, the latest wireless connection, and Ultra Durable technology, set to deliver an unmatched user experience. &amp;ldquo;&lt;br /&gt;&lt;br /&gt;We are seeing increasing user demands for flexible systems that perform well in a multitude of tasks from gaming to content creation more than ever before,&amp;rdquo; said Chris Kilburn, corporate vice president and general manager, client component business unit, AMD. &amp;ldquo;AMD is excited to bring the power of 3rd Gen AMD Ryzen&amp;trade; desktop processors and cutting edge PCIe&amp;reg;&amp;nbsp;4.0 support to the mainstream users with our latest AMD B550 chipsets. With overwhelming platform support from our partners at Gigabyte, AMD is confident these new B550 platforms will provide flexibility and power never seen before on a mainstream platform.&amp;rdquo;&lt;/p&gt;&lt;p&gt;GIGABYTE B550 AORUS motherboards provide various power designs to fulfill different budgets and system configuration. Users can choose 10+3 phases, 12+2 phases DrMOS all digital PWM design, or go straight to the flagship model, B550 AORUS MASTER, to experience a maximum of 1120 Amps solid power supply from Direct 16 phases digital power design with each phase of Power stage capable of managing up to 70A. As for those Mini-ITX board fans, B550I AORUS PRO AX implements 6+2 phases of DrMOS digital power design at 90A per phase, maximizing the overclocking potential on the 3rd Gen AMD Ryzen&amp;trade; desktop processors under different configuration while balancing the power efficiency and durability.&lt;br /&gt;&lt;br /&gt;Besides the variety of power supply design, GIGABYTE B550 AORUS motherboards also put effort into advanced thermal design of the power supply area. Beyond a multi-cut heatsink design, B550 AORUS PRO and higher motherboards come equipped with Fins-Array Heatsinks with Direct Touch Heatpipe for the strongest VRM cooling, providing coolness and stability to users while overclocking. With optimized heat dissipation of thermal baseplate and I/O, audio armor, B550 AORUS MASTER accomplishes a fusion of stylish thermal design and remarkable performance.&lt;br /&gt;&lt;br /&gt;GIGABYTE B550 motherboards adopt a PCIe&amp;reg;&amp;nbsp;4.0 M.2 design, and users can experience lightning-fast read/write and data transfer speed of PCIe&amp;reg;&amp;nbsp;4.0 SSD through top-of-the line components with 3rd Gen AMD Ryzen&amp;trade; desktop processors. GIGABYTE B550 AORUS motherboards all implement a M.2 thermal guard design to ensure that the M.2 SSD is adequately cooled under high-speed operation. Moreover, the B550 AORUS MASTER integrates three PCIe&amp;reg;&amp;nbsp;4.0 x4 M.2 slots layout directly from the processor which allows users to allocate the bandwidth between PCIe&amp;reg;&amp;nbsp;and M.2 slots accordingly, even to build a NVMe M.2 SSD RAID 0 array which can achieve up to 12700MB/s in write speed, bringing the performance of PCIe&amp;reg;&amp;nbsp;4.0 VGA cards and SSDs into full play.&lt;br /&gt;&lt;br /&gt;GIGABYTE B550 AORUS motherboards provide a comprehensive connectivity of mainstream extension interfaces, and are capable for future upgrades. The B550 AORUS series ATX and Mini-ITX motherboard provides 2.5Gbps Ethernet speeds which are 2.5 times faster than Gigabit Ethernet. Wireless connection is also enabled on select GIGABYTE B550 AORUS motherboards, among which B550 AORUS PRO AC features Intel WiFi 802.11ac wireless configuration, B550I AORUS PRO AX and B550 AORUS MASTER motherboards feature Intel WiFi6 802.11ax wireless configuration with 2T2R high-gain antenna, delivering blazing fast 2.4Gbps connection speeds. With both high-speed Ethernet and wireless connection, users can have extra flexibility, optimized network efficiency, and reliability. GIGABYTE B550 AORUS motherboards integrate USB 3.2 Gen 2 interface, bringing 10 Gbps high-speed data transfer, offering extensive capability and convenience for external devices with USB Type-C&amp;trade; on select models. Pre-installed I/O shield armor design on all B550 AORUS motherboards also provides easier alignment for system assembly.&lt;br /&gt;&lt;br /&gt;GIGABYTE B550 series motherboards come with the newest version of Q-Flash Plus Technology. Users can easily update BIOS without even installing a processor, memory, graphics cards, or booting up the PC so they can flash the BIOS without the concerns of not being able to boot up the system due to compatibility issues. GIGABYTE B550 series motherboards use an upgraded BIOS interface, providing users with a more intuitive user interface so they can easily fine tune their settings to upgrade their performance and overclocking.&lt;br /&gt;&lt;br /&gt;GIGABYTE B550 AORUS motherboards gear up well-received aesthetic product design, RGB Fusion LED lighting, programmable LED/RGB strip light supportability, Smart Fan, and many more refined features, offering users a tremendous computing experience. GIGABYTE B550 AORUS motherboards use only the finest components reinforced by GIGABYTE Ultra Durable&amp;trade; Technology to extend product durability and service life. Through the use of all solid caps, digital power designs, and Smart Fan technology to provide energy-conserving and effective cooling solutions, AORUS motherboards are an excellent choice for users who seek to build a high-end PC system so they can enjoy the best gaming experience possible. For more details, please visit the official GIGABYTE AORUS website:&lt;a target=&quot;_blank&quot; href=&quot;https://www.aorus.com/&quot;&gt;&amp;nbsp;https://www.aorus.com/&lt;/a&gt;&lt;/p&gt;'),
(14, 'COLORFUL IGAME GEFORCE RTX 2060 SUPER ULTRA HADIRKAN TEKNOLOGI RAYTRACING UNTUK MINECRAFT', '5ee34b6a3951e.png', '2020-06-12', '&lt;p&gt;&lt;strong&gt;Minecraft&lt;/strong&gt;&amp;nbsp;awalnya memang menawarkan permainan ringan dan ramah spesifikasi karena resolusinya rendah, tapi tahun ini,&amp;nbsp;&lt;strong&gt;Mojang&lt;/strong&gt;, pencipta&amp;nbsp;&lt;strong&gt;Minecraft&lt;/strong&gt;, telah berkolaborasi dengan&amp;nbsp;&lt;strong&gt;NVIDIA&amp;nbsp;&lt;/strong&gt;untuk mengumumkan dukungan raytracing dalam gamenya. Teknologi raytracing merombak pengalaman visual game, jadi walaupun gayanya tetap beresolusi rendah, cahaya dan bayangannya terlihat sangat mirip seperti di dunia nyata.&lt;/p&gt;&lt;p&gt;Istilah raytracing sendiri menjadi popular di dunia gaming namun beberapa dari kalian mungkin belum mengetahuinya dengan jelas. Membuat simulasi atas bayangan di dalam gim sebenarnya sangat sulit. Permasalahan itu kini dijawab dengan raytracing, tapi lagi-lagi, menampilkan gambar dengan teknologi raytrace secara real time itu sulit.&lt;/p&gt;&lt;p&gt;Bayangan dan cahaya yang realistis memberi pengalaman gaming yang unik serta mampu meningkatkan gameplay, seperti bagaimana pantulan cahaya dari permukaan logam, atau cahaya yang menyilaukan dari senter mampu menghalangi pandangan orang lain, seperti di dunia nyata.&lt;/p&gt;&lt;p&gt;Dengan kolaborsi tersebut, kini&amp;nbsp;&lt;strong&gt;Minecraft&lt;/strong&gt;&amp;nbsp;sudah sejajar dengan game-game besar yang menggunakan fitur raytracing RTX secara real time untuk mensimulasikan dunia dengan pencahayaan sebagaimana dunia nyata, yang mustahil sebelumnya.&lt;/p&gt;&lt;p&gt;Sebagai rekanan&amp;nbsp;&lt;strong&gt;NVIDIA, COLORFUL&lt;/strong&gt;&amp;nbsp;telah memperkuat lini gaming-nya melalui kartu grafis seri iGame. Tercatat paling ramah biaya,&amp;nbsp;&lt;strong&gt;Geforce RTX 2060 SUPER&lt;/strong&gt;&amp;nbsp;paling cocok untuk mereka yang ingin mencoba-coba kartu grafis dengan teknologi raytracing.&amp;nbsp;&lt;strong&gt;iGame&lt;/strong&gt;&amp;nbsp;meningkatkan kemampuan&amp;nbsp;&lt;strong&gt;GPU&lt;/strong&gt;&amp;nbsp;dengan teknologi pendinginan bawaannya, seperti&amp;nbsp;&lt;strong&gt;Vacuum Ice&lt;/strong&gt;&amp;nbsp;&lt;strong&gt;Piece&lt;/strong&gt;&amp;nbsp;pada kartu grafis seri&amp;nbsp;&lt;strong&gt;Advanced&lt;/strong&gt;&amp;nbsp;atau iGame Status Monitor pada kartu grafis seri&amp;nbsp;&lt;strong&gt;Vulcan&lt;/strong&gt;.&lt;/p&gt;&lt;p&gt;Seri&amp;nbsp;&lt;strong&gt;iGame&lt;/strong&gt;&amp;nbsp;juga menawarkan kartu&amp;nbsp;&lt;strong&gt;SUPER&lt;/strong&gt;&amp;nbsp;di lini&amp;nbsp;&lt;strong&gt;Ultra&lt;/strong&gt;&amp;nbsp;untuk rasio&amp;nbsp;&lt;strong&gt;cost-to-performance&lt;/strong&gt;. Diluncurkan perdana,&amp;nbsp;&lt;strong&gt;iGame GeForce RTX 2060 SUPER Ultra&lt;/strong&gt;&amp;nbsp;menghadirkan fitur&amp;nbsp;&lt;strong&gt;Multi-Mode RGB&amp;nbsp;&lt;/strong&gt;untuk pencahayaan bisa diakses melalui perangkat lunak&amp;nbsp;&lt;strong&gt;iGame Zone II&lt;/strong&gt;.&lt;br /&gt;&lt;br /&gt;Kartu ini juga dilengkapi dengan teknologi PCB yang digunakan kartu&amp;nbsp;&lt;strong&gt;grafis high-end&lt;/strong&gt;&amp;nbsp;di seri iGame, yakni&amp;nbsp;&lt;strong&gt;iGame Pure Power&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;Silver Plating Technology&lt;/strong&gt;.&amp;nbsp;&lt;strong&gt;Silver Plating Technology&lt;/strong&gt;&amp;nbsp;dipakai ketika setiap komponen dan sirkuit PCB berinteraksi, untuk memastikan respon cepat dan stabil.&lt;/p&gt;'),
(15, 'AMD Radeon Pro VII Meluncur, Jegal Nvidia Quadro', '5ee34d0c8194f.png', '2020-06-12', '&lt;p&gt;AMD pekan ini memperkenalkan karu grafis baru, Radeon Pro VII yang ditujukan untuk komputer workstation di industri media penyiaran dan engineering profesional. Kartu grafis ini dirilis AMD sebagai alternatif murah dari kartu grafis buatan pesaingnya, Nvidia, khususnya seri Quadro GV100. AMD menjanjikan, dengan dua Radeon VII Pro, kinerjanya mampu menyaingi Nvidia Quadro GV 100, dengan selisih harga yang hampir separuhnya. Tabel perbandingannya bisa dilihat di tabel yang dibuat oleh AMD berikut ini.&lt;/p&gt;&lt;p&gt;Radeon Pro VII memiliki 3.840 stream processor dan kinerja komputasi hingga 6,5 TFLOPS. Kartu grafis ini dirancang untuk menangani proyek-proyek media dan broadcast, simulasi Computer Aided Engineering (CAE), dan aplikasi High-Performance Computing (HPC). &amp;ldquo;Para profesional saat ini ditantang untuk memenuhi tenggat waktu singkat dengan anggaran ketat, dimana bertujuan untuk memberikan hasil kelas dunia,&amp;rdquo; kata Scott Herkelman, Corporate Vice President and General Manager, AMD Graphics Business Unit. &amp;quot;AMD Radeon Pro VII memberikannya dengan menyediakan teknologi inovatif, performa tinggi yang memungkinkan pengguna untuk mengelola simulasi yang lebih besar dan kompleks dengan mudah,&amp;rdquo; lanjut Herkelman Menurut keterangan tertulis yang diterima KompasTekno, Jumat (15/5/2020), untuk mendukung kinerjanya, Radeon Pro VII dibekali dengan RAM High Bandwidth Memory (HBM2) berkapasitas 16 GB.&lt;/p&gt;&lt;p&gt;Kartu grafis ini sanggup menjalankan hingga 6 display sekaligus, dengan interface PCIe 4.0 yang mendukung kinerja tinggi hingga resolusi 8K. Kinerja pengolahan gambar 8K di software pengolah konten Blackmagic Design DaVinci Resolve diiklaim 26 persen lebih tinggi dibanding kompetitor. Radeon Pro VII rencanananya akan mulai tersedia dari peritel offline dan online mulai awal Juni mendatang. Harganya dipatok sebesar 1.899 dollar AS atau sekitar Rp 28,3 juta. Sementara itu, komputer-komputer workstation yang dilengkapi dengan Radeon Pro VII bakal mulai dipasarkan pada paruh kedua 2020 oleh para pemanufaktur OEM rekanan AMD.&lt;br /&gt;&lt;br /&gt;&amp;nbsp;&lt;/p&gt;'),
(16, 'Intel Rilis 27 Prosesor VPro Generasi Ke-10 ', '5ee34e5008abe.png', '2020-06-12', '&lt;p&gt;Raksasa chip Intel kembali merilis jajaran prosesor baru, kali ini adalah prosesor Core dan Xeon vPro generasi ke-10 yang ditujukan untuk bisnis. Ada 27 model prosesor vPro yang dirilis ke pasaran, terdiri dari 9 prosesor untuk laptop dan 18 prosesor untuk desktop. Kesemuanya menggunakan arsitektur Comet Lake dengan proses fabrikasi 14nm. GM dan VP Intel untuk platform bisnis klien, Stephanie Hallford mengatakan bahwa prosesor-prosesor vPro baru tersebut dilengkapi dengan sekuriti tambahan di tingkat hardware. Pengamanan ekstra diterapkan di level BIOS dan firmware untuk meminimalisasi kemungkinan serangan siber oleh peretas atau program berbahaya.&lt;/p&gt;&lt;p&gt;&amp;ldquo;Kami memiliki kemampuan untuk melakukan enkripsi dan melindungi bagian sistem yang semakin rentan seiring dengan makin kreatifnya pelaku serangan siber,&amp;rdquo; ujar Hallford. Selain itu, CPU di prosesor-prosesor baru ini juga bisa mengalihkan beban komputasi (offload) ke bagian pengolah grafis (GPU) apabila terjadi serangan agar bisa melakukan penanganan sekaligus menjaga kinerja sistem.&lt;/p&gt;&lt;p&gt;Untuk laptop, lini prosesor vPro generasi ke-10 ditawarkan dalam enam model H-series dengan konsumsi daya 45 watt dan tiga model U series dengan konsumsi daya 15 watt. Jumlah inti CPU di dalam masing-masing model bervariasi mulai dari 4 core/8 thread, hingga 8 core/16 thread.&lt;/p&gt;&lt;p&gt;Sementara itu, ke-18 model prosesor vPro generasi ke-10 untuk desktop merupakan bagian dari S-series dengan TDP antara 35 watt hingga 125 watt. Jumlah core CPU di masing-masing prosesor mulai 6 core/12 thread hingga 10 core/20 thread. Sebagaimana dihimpun KompasTekno dari ZDNet, Kamis (14/5/2020), jajaran prosesor VPro Comet Lake ini turut dibekali dengan dukungan Wi-Fi 6 terintegrasi.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `paket_pc`
--

CREATE TABLE `paket_pc` (
  `ID_PC` int(11) NOT NULL,
  `HARGA_PC` int(11) NOT NULL,
  `TGL_PC` date NOT NULL,
  `PROC` text NOT NULL,
  `MOBO` text NOT NULL,
  `RAM` text NOT NULL,
  `HDD` text NOT NULL,
  `SSD` text NOT NULL,
  `VGA` text NOT NULL,
  `PSU` text NOT NULL,
  `CASING` text NOT NULL,
  `MONITOR` text NOT NULL,
  `KEYB` text NOT NULL,
  `MOUSE` text NOT NULL,
  `SPEAK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_pc`
--

INSERT INTO `paket_pc` (`ID_PC`, `HARGA_PC`, `TGL_PC`, `PROC`, `MOBO`, `RAM`, `HDD`, `SSD`, `VGA`, `PSU`, `CASING`, `MONITOR`, `KEYB`, `MOUSE`, `SPEAK`) VALUES
(1, 7500000, '2020-06-18', 'AM4 Raven Ridge Ryzen 3 2200G 3.5 Ghz Box', 'ASRock X570 Phantom Gaming X', 'GEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)', 'WDC 3.5\" 1TB SATA3 - Caviar Blue', 'Adata XPG Spectrix S40G RGB 512GB M.2 NVME PCIE GEN3X4', 'Galax Geforce RTX 2060 6GB DDR6 - Dual Fan', 'Seasonic S12III-500 80+ Bronze', 'Cube Gaming Varde - Matx - Tempered Glass - 3x Fan', '    ', '', '', ''),
(3, 8000000, '2020-06-18', 'Intel Core i3 9100F 3.6Ghz Up To 4.2Ghz Box Coffee Lake', 'ECS H310CHS-M7 LGA 1151', 'GEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)', 'WDC 3.5\" 1TB SATA3 - Caviar Blue', 'Adata XPG Spectrix S40G RGB 512GB M.2 NVME PCIE GEN3X4', 'PowerColor RX 580 RED DRAGON 8GB GDDR5', 'Seasonic S12III-500 80+ Bronze', 'Cube Gaming Varde - Matx - Tempered Glass - 3x Fan', '    ', '', '', ''),
(5, 7400000, '2020-06-18', 'Intel Core i3 9100F 3.6Ghz Up To 4.2Ghz Box Coffee Lake', 'ECS H310CHS-M7 LGA 1151', 'PATRIOT VIPER ELITE DDR4 8GB (2x4GB) 2666Mhz', 'Seagate 3.5\" 1TB Baracuda SATA3', 'Adata XPG Spectrix S40G RGB 512GB M.2 NVME PCIE GEN3X4', 'PowerColor RX 580 RED DRAGON 8GB GDDR5', 'Seasonic S12III-500 80+ Bronze', 'Armaggeddon Nimitz N5 Aurora Micro ATX', '  ', '', '', ''),
(8, 6000000, '2020-06-18', 'AM4 Raven Ridge Ryzen 3 2200G 3.5 Ghz Box', 'ASRock X570 Phantom Gaming X', 'PATRIOT VIPER ELITE DDR4 8GB (2x4GB) 2666Mhz', 'Seagate 3.5\" 1TB Baracuda SATA3', 'Adata XPG Spectrix S40G RGB 512GB M.2 NVME PCIE GEN3X4', 'Galax Geforce RTX 2060 6GB DDR6 - Dual Fan', '', 'Cube Gaming Varde - Matx - Tempered Glass - 3x Fan', '  ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` varchar(100) NOT NULL,
  `NAMA` varchar(20) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `HP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA`, `ALAMAT`, `HP`) VALUES
('1', 'CASH', '-', '-'),
('2', 'SCK Komputer', 'ITC Mega Grosir', '08323383830'),
('3', 'Icon Comp', 'Harco Mangga Dua', '08323383830'),
('4', 'Surya Kencana', 'Jl. Rungkut Industri', '08323383830');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `ID_BELI` varchar(50) NOT NULL,
  `ID_SUPP` int(11) DEFAULT NULL,
  `ID_BARANG` varchar(100) DEFAULT NULL,
  `ID_LOGIN` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `SATUAN` varchar(10) DEFAULT NULL,
  `HARGA_BELI` double DEFAULT NULL,
  `TGL_BELI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`ID_BELI`, `ID_SUPP`, `ID_BARANG`, `ID_LOGIN`, `JUMLAH`, `SATUAN`, `HARGA_BELI`, `TGL_BELI`) VALUES
('BL001', 20205, 'BR001', 1, 5, 'unit', 4900000, '2020-06-02'),
('BL002', 20205, 'BR002', 1, 1, 'unit', 1270000, '2020-06-02'),
('BL003', 20205, 'BR002', 1, 2, 'unit', 1270000, '2020-06-02'),
('BL004', 20203, 'BR003', 1, 3, 'unit', 780000, '2020-06-02'),
('BL005', 20205, 'BR004', 1, 3, 'unit', 780000, '2020-06-02'),
('BL006', 20201, 'BR005', 1, 3, 'unit', 2000000, '2020-06-02'),
('BL007', 20205, 'BR013', 1, 4, 'unit', 295000, '2020-06-02'),
('BL008', 20205, 'BR004', 3, 2, 'unit', 550000, '2020-06-15'),
('BL009', 20205, 'BR004', 3, 1, 'unit', 560000, '2020-06-15'),
('BL010', 20205, 'BR017', 2, 5, 'unit', 670000, '2020-06-18'),
('BL011', 20205, 'BR015', 3, 10, 'unit', 300000, '2020-06-18'),
('BL012', 20203, 'BR011', 3, 10, 'unit', 800000, '2020-06-18'),
('BL013', 20205, 'BR006', 3, 10, 'unit', 1000000, '2020-06-18'),
('BL014', 20203, 'BR010', 3, 10, 'unit', 600000, '2020-06-18');

--
-- Triggers `pembelian_barang`
--
DELIMITER $$
CREATE TRIGGER `UPDATE STOK` AFTER INSERT ON `pembelian_barang` FOR EACH ROW BEGIN
UPDATE master_barang SET STOK=STOK+NEW.JUMLAH WHERE ID_BARANG = NEW.ID_BARANG;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PENJUALAN` int(11) NOT NULL,
  `INV_PENJUALAN` varchar(100) DEFAULT NULL,
  `ID_BARANG` varchar(100) DEFAULT NULL,
  `ID_PELANGGAN` varchar(100) DEFAULT NULL,
  `ID_LOGIN` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` date DEFAULT NULL,
  `JUMLAH_BELI` int(11) DEFAULT NULL,
  `HARGA_AWAL` double DEFAULT NULL,
  `HARGA_JUALPJ` double DEFAULT NULL,
  `TOTAL_HARGA` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID_PENJUALAN`, `INV_PENJUALAN`, `ID_BARANG`, `ID_PELANGGAN`, `ID_LOGIN`, `TANGGAL_TRANSAKSI`, `JUMLAH_BELI`, `HARGA_AWAL`, `HARGA_JUALPJ`, `TOTAL_HARGA`) VALUES
(1, 'INV00002', 'BR005', '2', 3, '2020-06-15', 2, 2000000, 2500000, 5000000),
(2, 'INV00002', 'BR003', '2', 3, '2020-06-15', 2, 780000, 1230000, 2460000),
(4, 'INV00005', 'BR015', '1', 3, '2020-06-18', 5, 300000, 365000, 1825000),
(8, 'INV00001', 'BR001', '3', 3, '2020-06-15', 4, 4900000, 5500000, 22000000),
(9, 'INV00001', 'BR013', '3', 3, '2020-06-15', 3, 295000, 400000, 1200000),
(13, 'INV00003', 'BR004', '4', 2, '2020-06-18', 5, 560000, 780000, 3900000),
(14, 'INV00003', 'BR017', '4', 2, '2020-06-18', 4, 670000, 795000, 3180000),
(16, 'INV00004', 'BR003', '1', 3, '2020-06-18', 1, 780000, 1230000, 1230000),
(17, 'INV00006', 'BR011', '1', 3, '2020-06-18', 5, 800000, 950000, 4750000),
(18, 'INV00006', 'BR010', '1', 3, '2020-06-18', 5, 600000, 715000, 3575000);

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `PENJUALAN` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
UPDATE master_barang SET STOK=STOK-NEW.JUMLAH_BELI WHERE ID_BARANG = NEW.ID_BARANG;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Return STOK` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
UPDATE master_barang SET STOK=STOK+OLD.JUMLAH_BELI WHERE ID_BARANG = OLD.ID_BARANG;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Return produk terjual` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
UPDATE produk_terjual SET TOTAL=TOTAL-OLD.JUMLAH_BELI WHERE ID_BARANG = OLD.ID_BARANG;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update produk terjual` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
UPDATE produk_terjual SET TOTAL=TOTAL+NEW.JUMLAH_BELI WHERE ID_BARANG = NEW.ID_BARANG;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `waranty` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
INSERT INTO garansi VALUES
(NEW.ID_PENJUALAN, NEW.INV_PENJUALAN, NEW.ID_BARANG, NEW.TANGGAL_TRANSAKSI, '', '');
        
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk_terjual`
--

CREATE TABLE `produk_terjual` (
  `id` int(11) NOT NULL,
  `ID_BARANG` varchar(50) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_terjual`
--

INSERT INTO `produk_terjual` (`id`, `ID_BARANG`, `TOTAL`) VALUES
(2, 'BR001', 4),
(4, 'BR002', 0),
(5, 'BR003', 3),
(6, 'BR004', 5),
(7, 'BR005', 2),
(8, 'BR006', 0),
(9, 'BR007', 0),
(10, 'BR008', 0),
(11, 'BR009', 0),
(12, 'BR010', 5),
(13, 'BR011', 5),
(14, 'BR012', 0),
(15, 'BR013', 3),
(16, 'BR014', 0),
(17, 'BR015', 5),
(18, 'BR016', 0),
(19, 'BR017', 4),
(20, 'BR018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `ID_PROMO` int(11) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `GAMBAR` varchar(500) DEFAULT NULL,
  `WAKTU` date DEFAULT NULL,
  `ISI` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`ID_PROMO`, `JUDUL`, `GAMBAR`, `WAKTU`, `ISI`) VALUES
(1, 'Enhance with Z490 | MSI', '5ee3517d30d11.png', '2020-06-12', '&lt;p&gt;NIKMATI PENGALAMAN GAMING MENAKJUBKAN DARI PERFORMA MOTHERBOARD SERI Z490 TERBARU&lt;/p&gt;&lt;p&gt;Langkah - langkah :&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Voucher diskon dari facebook, FP MSI, dan Dealer MSI&lt;/li&gt;&lt;li&gt;Share voucher diskon yang diinginkan dan detail produk yang ingin dibeli lewat fitur chat pada e-tailer site setiap dealer&lt;/li&gt;&lt;li&gt;Dealer akan memberikan SKU baru sesuai request&lt;/li&gt;&lt;li&gt;Voucher diskon seiap digunakan&lt;/li&gt;&lt;/ol&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPP` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `NO_HP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_SUPP`, `NAMA`, `ALAMAT`, `NO_HP`) VALUES
(20201, 'Icon Comp', 'Jl. Sempol Blok P10, Vatican City', '083767847563'),
(20202, 'Kios Komputer', 'Jl. Bunguran Asih', '083767847563'),
(20203, 'Enter Komputer', 'Harco mangga dua', '083767847563'),
(20204, 'Coc Komputer', 'Jl. Rungkut', '08323383830'),
(20205, 'Win Komputer', 'ITC', '08323383830');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `garansi`
--
ALTER TABLE `garansi`
  ADD PRIMARY KEY (`ID_GARANSI`),
  ADD KEY `ID_BARANG` (`ID_BARANG`) USING BTREE;

--
-- Indexes for table `inv_penjualan`
--
ALTER TABLE `inv_penjualan`
  ADD PRIMARY KEY (`id_inv`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `list_penjualan`
--
ALTER TABLE `list_penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_LOGIN`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `ID_KATEGORI` (`ID_KATEGORI`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID_NEWS`);

--
-- Indexes for table `paket_pc`
--
ALTER TABLE `paket_pc`
  ADD PRIMARY KEY (`ID_PC`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`ID_BELI`),
  ADD KEY `FK_REFERENCE_4` (`ID_SUPP`),
  ADD KEY `FK_REFERENCE_5` (`ID_BARANG`),
  ADD KEY `FK_REFERENCE_6` (`ID_LOGIN`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`),
  ADD KEY `FK_REFERENCE_7` (`ID_BARANG`),
  ADD KEY `FK_REFERENCE_8` (`ID_PELANGGAN`),
  ADD KEY `FK_REFERENCE_9` (`ID_LOGIN`);

--
-- Indexes for table `produk_terjual`
--
ALTER TABLE `produk_terjual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_PROMO`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `list_penjualan`
--
ALTER TABLE `list_penjualan`
  MODIFY `ID_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID_NEWS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `paket_pc`
--
ALTER TABLE `paket_pc`
  MODIFY `ID_PC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk_terjual`
--
ALTER TABLE `produk_terjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_PROMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `garansi`
--
ALTER TABLE `garansi`
  ADD CONSTRAINT `garansi_ibfk_1` FOREIGN KEY (`ID_BARANG`) REFERENCES `master_barang` (`ID_BARANG`);

--
-- Constraints for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD CONSTRAINT `master_barang_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_SUPP`) REFERENCES `supplier` (`ID_SUPP`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_BARANG`) REFERENCES `master_barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_LOGIN`) REFERENCES `login` (`ID_LOGIN`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_BARANG`) REFERENCES `master_barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_LOGIN`) REFERENCES `login` (`ID_LOGIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
