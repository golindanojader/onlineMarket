-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 04:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercadoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `possessor` text NOT NULL,
  `document` text NOT NULL,
  `bank` text NOT NULL,
  `countnum` text NOT NULL,
  `typecount` text NOT NULL,
  `enable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bancos`
--

INSERT INTO `bancos` (`id`, `possessor`, `document`, `bank`, `countnum`, `typecount`, `enable`) VALUES
(10, 'Mercado Online', 'J-555488', 'Banco de Venezuela', '1111-8796-2224-4445', 'Corriente', 0),
(11, 'Mercado Online', 'J-555488', 'Banco Mercantil', '0105-555-6666-55454-55', 'Corriente', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carritocompras`
--

CREATE TABLE `carritocompras` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `title` text NOT NULL,
  `cant` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `identification` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `phone` int(11) NOT NULL,
  `estate` text NOT NULL,
  `municipality` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `identification`, `iduser`, `name`, `lastname`, `phone`, `estate`, `municipality`, `address`) VALUES
(1, '20758871', 1, 'Jader', 'Golindano', 2147483647, 'Aragua', ' JosÃ© Ãngel Lamas (Santa Cruz)', 'Urb la fontana calle prc casa num 4'),
(4, '1258996', 55, 'jhon', 'perez', 2147483647, 'Carabobo', ' Santiago MariÃ±o (Turmero)', 'cantarrana sector 3');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `intents` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `enable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `user`, `password`, `name`, `lastname`, `intents`, `rol`, `enable`) VALUES
(1, 'admin@gmail.com', '1234', 'jader', 'golindano', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id`, `estate`) VALUES
(14, 'Aragua'),
(19, 'Carabobo');

-- --------------------------------------------------------

--
-- Table structure for table `iva`
--

CREATE TABLE `iva` (
  `id` int(11) NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iva`
--

INSERT INTO `iva` (`id`, `iva`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `idestate` int(11) NOT NULL,
  `municipality` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`id`, `idestate`, `municipality`) VALUES
(43, 14, ' Girardot (Maracay)'),
(44, 14, ' Mario BriceÃ±o Iragorry (El LimÃ³n)'),
(46, 19, ' San Diego (San Diego)'),
(47, 14, ' Santiago MariÃ±o (Turmero)');

-- --------------------------------------------------------

--
-- Table structure for table `pagomovil`
--

CREATE TABLE `pagomovil` (
  `id` int(11) NOT NULL,
  `numbank` int(11) NOT NULL,
  `documentid` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagomovil`
--

INSERT INTO `pagomovil` (`id`, `numbank`, `documentid`, `phone`) VALUES
(3, 102, 'J-555115', '04128879658');

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `mount` decimal(10,2) NOT NULL,
  `convertion` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `idorder`, `iduser`, `reference`, `mount`, `convertion`, `date`, `status`) VALUES
(73, 859424, 1, 2147483647, '940000.00', '4.70', '2020-05-24 21:18:46', 2),
(74, 232592, 1, 0, '150000.00', '0.75', '2020-05-24 22:09:09', 2),
(75, 832543, 1, 2147483647, '150000.00', '0.75', '2020-05-25 00:13:16', 3),
(76, 736617, 1, 2147483647, '250000.00', '1.25', '2020-05-25 00:47:31', 2),
(77, 647332, 1, 2147483647, '560000.00', '2.80', '2020-05-25 01:13:29', 0),
(78, 392100, 1, 2147483647, '360000.00', '1.80', '2020-05-25 22:24:39', 0),
(79, 149105, 1, 453453454, '200000.00', '1.12', '2020-05-25 22:45:25', 0),
(80, 788797, 1, 2147483647, '224000.00', '1.12', '2020-05-25 22:46:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedido_has_producto`
--

CREATE TABLE `pedido_has_producto` (
  `id` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedido_has_producto`
--

INSERT INTO `pedido_has_producto` (`id`, `idorder`, `idproduct`, `cant`, `price`) VALUES
(120, 859424, 25, 2, '370000.00'),
(121, 859424, 19, 1, '200000.00'),
(122, 232592, 20, 1, '150000.00'),
(123, 832543, 20, 1, '150000.00'),
(124, 736617, 22, 1, '250000.00'),
(125, 647332, 26, 1, '180000.00'),
(126, 647332, 20, 1, '150000.00'),
(127, 647332, 24, 1, '230000.00'),
(128, 392100, 38, 3, '120000.00'),
(129, 149105, 19, 1, '200000.00'),
(130, 788797, 19, 1, '200000.00');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `cant` int(11) NOT NULL,
  `route` text NOT NULL,
  `enable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `title`, `description`, `price`, `cant`, `route`, `enable`) VALUES
(19, 'Harina P.A.N 1kg', 'harina de maiz precocida 1 kg', '200000.00', 179, 'views/img/products/product738.jpg', 0),
(20, 'Mayonesa Kraft 500 g', 'Mayonesa Kraft 500 g envase de vidrio', '150000.00', 190, 'views/img/products/product537.jpg', 0),
(21, 'Mantequilla mavesa 250g', 'Mantequilla mavesa 250g presentacion pequeÃ±a', '160000.00', 190, 'views/img/products/product168.jpg', 0),
(22, 'Pasta de tornillo 500 g', 'Pasta de tornillo 500 g marca primor', '250000.00', 182, 'views/img/products/product829.jpg', 0),
(23, 'Mortadela de res 500 g', 'Mortalela de res Plumrose 500g', '340000.00', 107, 'views/img/products/product242.jpg', 0),
(24, 'Frescolita 1.5Lts', 'Frescolita 1.5Lts', '230000.00', 60, 'views/img/products/product327.jpg', 0),
(25, 'Aceite vatel 1 Lt', 'Aceite de soya Vatel 1 Lt ', '370000.00', 28, 'views/img/products/product612.jpg', 0),
(26, 'Suavizante 1Lt', 'Suavizante celeste 1 Lt ', '180000.00', 16, 'views/img/products/product482.jpg', 1),
(31, 'Malta 6 und', 'malta 6 pack', '300000.00', 33, 'views/img/products/product773.jpg', 0),
(32, 'CheezWheez 300 g', 'Queso fundido tipo cheddar americano 300grms', '167000.00', 23, 'views/img/products/product941.jpg', 0),
(33, 'Chinotto 2 Lt', 'Bebida gaseosa sabor a limon 2 Lt', '220000.00', 53, 'views/img/products/product983.jpg', 0),
(34, 'Arroz mary 1KG', 'Arroz mary 1KG', '170000.00', 42, 'views/img/products/product895.jpg', 0),
(35, 'Caraotas negras  1Kg', 'Caraotas negras 1 Kg marca Pantera', '200000.00', 56, 'views/img/products/product596.jpg', 1),
(37, 'Tang Naranaja 30 g', 'Tang Naranaja 30 g para 2 Lts', '70000.00', 119, 'views/img/products/product775.jpg', 0),
(38, 'Pepsi Lata', 'Pepsi de lata 12 oz', '120000.00', 99, 'views/img/products/product124.jpg', 0),
(39, 'Pepsi 2 Lt', 'Pepsi 2 Lt', '210000.00', 53, 'views/img/products/product698.jpg', 0),
(40, 'Pasta de tomate 250 grm', 'Pasta de tomate 200 grm Kiero', '145000.00', 74, 'views/img/products/product982.jpg', 0),
(41, 'Mortade especila Plumrose 1 Kg', 'Mortade especila Plumrose 1 Kg 6 piezas', '230000.00', 41, 'views/img/products/product465.jpg', 0),
(42, 'Mantequilla mavesa 500g', 'Mantequilla mavesa 500g', '350000.00', 57, 'views/img/products/product722.jpg', 0),
(44, 'Malta de lata', 'Malta de lata maltin polar', '80000.00', 50, 'views/img/products/product169.jpg', 0),
(45, 'Masa para cachapas 500 g', 'Masa para cachapas 500 g', '250000.00', 94, 'views/img/products/product178.jpg', 0),
(47, 'Coca Cola 2 Lt', 'Coca Cola 2 Lt', '175000.00', 68, 'views/img/products/product739.jpg', 0),
(48, 'Atun Margarita grande', 'Atun Margarita grande', '300000.00', 17, 'views/img/products/product280.jpg', 1),
(49, 'Leche en polvo 900 grm', 'Leche en polvo 900 grm El rodeo', '700000.00', 43, 'views/img/products/product940.jpg', 0),
(50, 'Cepillos dentales adulto 2 Und', 'Cepillos dentales colgate 2 Und Adulto', '120000.00', 49, 'views/img/products/product912.jpg', 0),
(51, 'Gel antibacterial 265 ml', 'Gel antibacterial 265 ml', '210000.00', 62, 'views/img/products/product130.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasa`
--

CREATE TABLE `tasa` (
  `id` int(11) NOT NULL,
  `tasa` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasa`
--

INSERT INTO `tasa` (`id`, `tasa`) VALUES
(1, '200000.00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `intents` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `idclient`, `user`, `password`, `intents`, `rol`) VALUES
(1, 0, 'usuario@gmail.com', '1234', 0, 0),
(55, 0, 'golindan1234@gmail.com', '12345678', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`,`identification`(15));

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagomovil`
--
ALTER TABLE `pagomovil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`,`idorder`);

--
-- Indexes for table `pedido_has_producto`
--
ALTER TABLE `pedido_has_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasa`
--
ALTER TABLE `tasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carritocompras`
--
ALTER TABLE `carritocompras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pagomovil`
--
ALTER TABLE `pagomovil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pedido_has_producto`
--
ALTER TABLE `pedido_has_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tasa`
--
ALTER TABLE `tasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
