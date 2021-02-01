-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2019 at 01:39 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashmawo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `stock`, `price`, `name`, `gender`, `category`, `description`, `Image`) VALUES
(1, 20, 175000, 'St.Kward Shirt', 'F', 'Shirt', 'material berkualitas, memastikan Anda dapat bebas bergerak', 'G1.jpg'),
(2, 20, 172000, 'Knight Shirt', 'F', 'Shirt', 'Dengan memastikan Anda dapat bebas bergerak', 'G2.jpg'),
(3, 20, 175000, 'St. Knits Shirt', 'F', 'Shirt', 'Dengan material berkualitas, memastikan Anda dapat bebas bergerak', 'G3.jpg'),
(4, 20, 270000, 'Woman Shirt Casual', 'F', 'Shirt', 'Korean Women Casual Checked Shirts Cotton Blouse. Long sleeves shirtstyle:Commuting', 'G4.jpg'),
(5, 20, 169000, 'Women Shirt - Amber Shirt', 'F', 'Shirt', 'ALL SIZE Fit to L . Material kemeja : Katun kotak Detail kemeja : Material kaos : Spandek', 'G5.jpg'),
(6, 20, 170000, 'Ambar Shirt', 'F', 'Shirt', 'Women Casual Checked Shirts Cotton BlouseLong sleeves shirts Material: cotton style:Commuting OL', 'G6.jpg'),
(7, 50, 126000, 'Mango Striped Cotton Shirt', 'F', 'Shirt', 'Women Casual Checked Shirts Cotton Blouse Long sleeves shirts', 'G7.jpg'),
(8, 50, 120000, 'Liberty Shirt', 'F', 'Shirt', 'Women Casual Checked Shirts Cotton Blouse Long sleeves shirts Material: cotton', 'G8.jpg'),
(9, 50, 134000, 'Missisipi Shirt', 'F', 'Shirt', 'ALL SIZE Fit to L LD 100 MAterial kemeja : Katun kotak Material kaos : Spandek', 'G9.jpg'),
(10, 50, 132000, 'Okechuku Shirt', 'F', 'Shirt', 'long sleeves Didesain chic dan button of cuff Material : Katun', 'G10.jpg'),
(11, 50, 135000, '3Lstore112 - Men Shirt', 'M', 'Shirt', 'Soft and confortable to wear dengan jahitan tepi ganda  Good quality  Tidak luntur ', 'G11.jpg'),
(12, 50, 142000, 'Kubix Shirt', 'M', 'Shirt', 'Long Sleeve dengan material aman dipakai', 'G12.jpg'),
(13, 50, 129000, 'ShortShirt Batik', 'M', 'Shirt', 'Dijahit dengan kualitas garment  Mudah dicuci', 'G13.jpg'),
(14, 50, 143000, 'Nelzpusi Shirt', 'M', 'Shirt', 'Dijahit dengan kualitas garment dengan jahitan tepi ganda  Good quality  Tidak luntur ', 'G14.jpg'),
(15, 50, 165000, 'Seven Flanel Fro', 'M', 'Shirt', 'Long sleeves shirts Material: cotton style:Commuting OB', 'G15.jpg'),
(16, 50, 176000, 'Fortlash Davin Men Shirt', 'M', 'Shirt', 'Dijahit dengan kualitas garment dengan jahitan tepi ganda  Good quality  Tidak luntur ', 'G16.jpg'),
(17, 50, 143000, 'Fashion FF- Carmen', 'M', 'Shirt', 'Detail kerah unlined Regular fit Kancing depan 1 Kantong slot depan Material Katun', 'G17.jpg'),
(18, 50, 187000, 'Fashion - GG Carmendi', 'M', 'Shirt', 'Long sleeves shirts Material: cotton style:Commuting ', 'G18.jpg'),
(19, 50, 153000, 'Beach Party Shirt', 'M', 'Shirt', 'Long sleeves shirts Material: cotton style:Commuting ', 'G19.jpg'),
(20, 50, 133000, 'Totoro Navy Shirt', 'M', 'Shirt', 'Long sleeves shirts Material: cotton style:Commuting ', 'G20.jpg'),
(21, 50, 56000, 'Pura Pura Bahagia', 'F', 'T- Shirt', 'Color: black, dark red', 'G21.jpg'),
(22, 50, 66000, 'Backless Hollow', 'F', 'T-Shirt', 'long sleeves Didesain chic dalam plaid pattern V-neckline', 'G22.jpg'),
(23, 50, 67000, 'Britney Top T-Shirt', 'F', 'T-Shirt', 'long sleeves Didesain chic dalam plaid pattern V-neckline', 'G23.jpg'),
(24, 50, 69000, 'BlackWhite Shirt Woman', 'F', 'T-Shirt', 'Soft Good quality  Tidak luntur', 'G24.jpg'),
(25, 50, 76000, 'Large Strip Tees', 'F', 'T-Shirt', 'long sleeves Didesain chic dalam plaid pattern V-neckline', 'G25.jpg'),
(26, 50, 61000, 'Lera Stripped ', 'F', 'T-Shirt', 'Soft and Tidak luntur', 'G26.jpg'),
(27, 50, 54000, 'Full Colour Navy', 'F', 'T-Shirt', 'long sleeves Didesain chic dalam plaid pattern V-neckline', 'G27.jpg'),
(28, 50, 73000, 'Bigbang Theory', 'F', 'T-Shirt', 'Soft and confortable to wear  Model slim fit   Good quality  Tidak luntur', 'G28.jpg'),
(29, 50, 62000, 'Sakit Hati', 'F', 'T-Shirt', 'Soft and confortable to wear  Model slim fit   Good quality  Tidak luntur', 'G29.jpg'),
(30, 50, 56000, 'The Farenhaw queen', 'F', 'T-Shirt', 'long sleeves Didesain chic dalam plaid pattern V-neckline', 'G30.jpg'),
(31, 50, 120000, 'Knitwork Cable Knit', 'M', 'T-Shirt', 'long sleeves Soft and confortable to wear', 'G31.jpg'),
(32, 50, 234000, 'Knitwork Twisted ', 'M', 'T-Shirt', 'Produk Lokal  Bahan Lembut Tidak Panas Jahitan Double Stick dan Rapih', 'G32.jpg'),
(33, 50, 75000, 'Superhero T-Shirt', 'M', 'T-Shirt', ' Import Bahan Cotton Combed 30S Bahan Lembut  dan Rapih', 'G33.jpg'),
(34, 50, 110000, 'St.Knits Darwin Top', 'M', 'T-Shirt', 'Soft and confortable to wear, Good quality ', 'G34.jpg'),
(35, 50, 137000, 'St.Knits Darius Top', 'M', 'T-Shirt', 'Produk Lokal Quality Import.Bahan Cotton Combed 30S', 'G35.jpg'),
(36, 50, 35000, 'VM Cotton Linen', 'M', 'T-Shirt', 'Produk Lokal Quality Import.Bahan Lembut Tidak Panas', 'G36.jpg'),
(37, 50, 121000, 'Cotton Linen Short Sleev', 'M', 'T-Shirt', 'Soft and confortable to wearGood quality', 'G37.jpg'),
(38, 50, 56000, 'Basic Oneck', 'M', 'T-Shirt', 'Produk Lokal.Quality Import,Bahan Cotton Combed 30SJahitan Double Stick dan Rapih', 'G38.jpg'),
(39, 50, 119000, 'Pretz_Id ', 'M', 'T-Shirt', 'long sleeves', 'G39.jpg'),
(40, 50, 136000, 'Zeintin ZpS02', 'M', 'T-Shirt', 'Produk Lokal.Jahitan Double Stick dan Rapih', 'G40.jpg'),
(41, 50, 79000, 'Zahra Signature Cropped', 'F', 'Short', 'dari bahan katun supernova yang super nyaman dengan model trendy', 'G41.jpg'),
(42, 50, 132000, 'Jo & Nic', 'F', 'Short', 'dari bahan katun, cocok dikenakan untuk ke kantor', 'G42.jpg'),
(43, 50, 122000, 'SJO High Rise Navy', 'F', 'Short', 'Desain trendy Detail neat stitching. detail belt loop', 'G43.jpg'),
(44, 50, 141000, 'Jhon F K', 'F', 'Short', 'Front pocket, back pocket, detail belt loop', 'G44.jpg'),
(45, 50, 90000, 'Celpen Greesasy', 'F', 'Short', 'front zipper closure, button opening', 'G45.jpg'),
(46, 50, 86000, 'Mobile Power', 'F', 'Short', 'Front pocket, back pocket, detail belt loop', 'G46.jpg'),
(47, 50, 162000, 'Wuwus Pants', 'F', 'Short', 'Desain Detail neat stitching, front zipper closure,back pocket, detail belt loop', 'G47.jpg'),
(48, 50, 102000, 'Basic Jeans Pants', 'F', 'Short', 'front zipper closure, button opening', 'G48.jpg'),
(49, 50, 156000, 'Levia Short Lime', 'F', 'Short', 'Front pocket, back pocket, detail belt loop', 'G49.jpg'),
(50, 50, 110000, 'Bery Benka', 'F', 'Short', 'Desain trendy Detail neat stitching, front zipper closure', 'G50.jpg'),
(51, 50, 75000, 'Heavy Rope', 'M', 'Short', 'Model celana ini regular fit serta didukung bahan yang halus', 'G51.jpg'),
(52, 50, 147000, 'Edwin Jeans Short', 'M', 'Short', 'Model celana ini regular fit serta didukung bahan yang halus', 'G52.jpg'),
(53, 50, 132000, 'Chinos Dadu', 'M', 'Short', 'cocok untuk kegiatan outdor seperti hiking, climbing, traveling', 'G53.jpg'),
(54, 50, 171000, 'Emoline Lime', 'M', 'Short', 'Model celana ini regular fit serta didukung bahan yang halus', 'G54.jpg'),
(55, 50, 120000, 'Buncos Gauss', 'M', 'Short', 'cocok untuk kegiatan outdor seperti hiking, climbing, traveling', 'G55.jpg'),
(56, 50, 133000, 'Callista Dums', 'M', 'Short', 'Model celana ini regular fit serta didukung bahan yang halus', 'G56.jpg'),
(57, 50, 132000, 'NHS Cargo', 'M', 'Short', 'cocok untuk kegiatan outdor seperti hiking, climbing, traveling', 'G57.jpg'),
(58, 50, 157000, 'Britania Hugo', 'M', 'Short', 'cocok untuk kegiatan outdor seperti hiking, climbing, traveling', 'G58.jpg'),
(59, 50, 73000, 'Chinos Rhins', 'M', 'Short', 'Model celana ini regular fit serta didukung bahan yang halus', 'G59.jpg'),
(60, 50, 133000, 'Rhinos Man', 'M', 'Short', 'cocok untuk kegiatan outdor seperti hiking, climbing, traveling', 'G60.jpg'),
(61, 50, 220000, 'Summer Korean Slim', 'F', 'Long Pants', 'cocok buat santai material bahan denim streets', 'G61.jpg'),
(62, 50, 101000, 'Hisht High', 'F', 'Long Pants', 'celana ini di buat dengan bahan katun streeth,nyaman di pakai', 'G62.jpg'),
(63, 50, 146000, 'Skini Varinia', 'F', 'Long Pants', 'celana ini sangat nyaman digunakan karena berbahan bajatex yang halus', 'G63.jpg'),
(64, 50, 130000, 'Jegging Basic', 'F', 'Long Pants', 'material bahan denim streets harga sangat terjangkau', 'G64.jpg'),
(65, 50, 320000, 'Flies Wide', 'F', 'Long Pants', 'A perfect bottom will upgrade your style to a new level!', 'G65.jpg'),
(66, 50, 205000, 'Waist Black Jeans', 'F', 'Long Pants', 'celana ini di buat dengan bahan katun streeth,nyaman di pakai', 'G66.jpg'),
(67, 50, 156000, 'Loose Bf', 'F', 'Long Pants', 'cocok buat santai material bahan denim streets', 'G67.jpg'),
(68, 50, 160000, 'Goose Cat', 'F', 'Long Pants', 'celana ini sangat nyaman digunakan karena berbahan bajatex yang halus', 'G68.jpg'),
(69, 50, 170000, 'Hight Weist', 'F', 'Long Pants', 'material bahan denim streets harga sangat terjangkau ', 'G69.jpg'),
(70, 50, 189000, 'New Wider', 'F', 'Long Pants', 'celana ini sangat nyaman digunakan karena berbahan bajatex yang halus', 'G70.jpg'),
(71, 50, 126000, 'Badass High', 'M', 'Long Pants', 'celana ini di buat dengan bahan katun streeth,nyaman di pakai', 'G71.jpg'),
(72, 50, 180000, 'Edwin Jenacs', 'M', 'Long Pants', 'Model celana ini regular fit serta didukung bahan yang halus', 'G72.jpg'),
(73, 50, 159000, 'Vintage Mariana', 'M', 'Long Pants', 'A perfect bottom will upgrade your style to a new level!', 'G73.jpg'),
(74, 50, 162000, 'NFL Skinny', 'M', 'Long Pants', 'celana ini di buat dengan bahan katun streeth,nyaman di pakai', 'G74.jpg'),
(75, 50, 211000, 'Straight Vintage', 'M', 'Long Pants', 'cocok untuk kegiatan outdor seperti hiking, climbing, traveling', 'G75.jpg'),
(76, 50, 343000, 'Oryza Sativa', 'M', 'Long Pants', 'Model celana ini regular fit serta didukung bahan yang halus', 'G76.jpg'),
(77, 50, 250000, 'Stretch Pizza Long', 'M', 'Long Pants', 'A perfect bottom will upgrade your style to a new level!', 'G77.jpg'),
(78, 50, 199000, 'Clanaria Mucossa', 'M', 'Long Pants', 'celana ini sangat nyaman digunakan karena berbahan bajatex yang halus', 'G78.jpg'),
(79, 50, 201000, 'Denim Biowash', 'M', 'Long Pants', 'Model celana ini regular fit serta didukung bahan yang halus', 'G79.jpg'),
(80, 50, 321000, 'Treetwear Rip', 'M', 'Long Pants', 'celana ini sangat nyaman digunakan karena berbahan bajatex yang halus', 'G80.jpg'),
(81, 50, 345000, 'Heels Block', 'F', 'Shoes', 'kami menawarkan produk dengan kualitas terbaik dan kreatifitas pengrajin sepatu', 'G81.jpg'),
(82, 50, 219000, 'PierDev Heels', 'F', 'Shoes', 'memberikan pengalaman yang berbeda saat anda memakai sepatu kami', 'G82.jpg'),
(83, 50, 199000, 'Kaisar sang', 'F', 'Shoes', 'Heels cantik berbahan kulit sintetis', 'G83.jpg'),
(84, 50, 111000, 'Zill High Heels', 'F', 'Shoes', 'memberikan pengalaman yang berbeda saat anda memakai sepatu kami', 'G84.jpg'),
(85, 50, 212000, 'Adelioshoes', 'F', 'Shoes', 'Dengan sol fiber tidak licin, tidak keras, bantalan spon', 'G85.jpg'),
(86, 50, 135000, 'Alena Bebbi', 'F', 'Shoes', 'kami menawarkan produk dengan kualitas terbaik dan kreatifitas pengrajin sepatu', 'G86.jpg'),
(87, 50, 243000, 'Brukat Ago', 'F', 'Shoes', 'Heels cantik berbahan kulit sintetis', 'G87.jpg'),
(88, 50, 158000, 'Bluesky Boot', 'F', 'Shoes', 'Dengan sol fiber tidak licin, tidak keras, bantalan spon', 'G88.jpg'),
(89, 50, 140000, 'Farish Odin', 'F', 'Shoes', 'memberikan pengalaman yang berbeda saat anda memakai sepatu kami', 'G89.jpg'),
(90, 50, 378000, 'Thor Kumulatif', 'M', 'Shoes', 'Material Canvas & Suede, Insole tekstil', 'G90.jpg'),
(91, 50, 371000, 'JckQuill Lick', 'M', 'Shoes', 'Design produk ini sangat uptodate dan kekinian dengan harga yang sangat terjangkau', 'G91.jpg'),
(92, 50, 245000, 'Paulmay full', 'M', 'Shoes', 'Sol Luar Rubber,Detail tali depan', 'G92.jpg'),
(93, 50, 342000, 'Eddien Big', 'M', 'Shoes', 'kami menawarkan produk dengan kualitas terbaik dan kreatifitas pengrajin sepatu', 'G93.jpg'),
(94, 50, 150000, 'Jstrom Bulgarian', 'M', 'Shoes', 'Sol Luar Rubber,Detail tali depan', 'G94.jpg'),
(95, 50, 211000, 'Nax Santai', 'M', 'Shoes', 'Material Canvas & Suede, Insole tekstil', 'G95.jpg'),
(96, 50, 233000, 'Naz Snd', 'M', 'Shoes', 'Sol Luar Rubber,Detail tali depan', 'G96.jpg'),
(97, 50, 340000, 'Dr. Kevin Soft', 'M', 'Shoes', 'memberikan pengalaman yang berbeda saat anda memakai sepatu kami', 'G97.jpg'),
(98, 50, 259000, 'Awka rindous', 'M', 'Shoes', 'Design produk ini sangat uptodate dan kekinian dengan harga yang sangat terjangkau', 'G98.jpg'),
(99, 50, 314000, 'Encrypt', 'M', 'Shoes', 'Design produk ini sangat uptodate dan kekinian dengan harga yang sangat terjangkau', 'G99.jpg'),
(100, 50, 119000, 'Eleven Seven', 'M', 'Shoes', 'kami menawarkan produk dengan kualitas terbaik dan kreatifitas pengrajin sepatu', 'G100.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `shipping_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transactions_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
