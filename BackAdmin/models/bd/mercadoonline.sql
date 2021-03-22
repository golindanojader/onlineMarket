-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 03:25 AM
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

--
-- Dumping data for table `carritocompras`
--

INSERT INTO `carritocompras` (`id`, `idproduct`, `iduser`, `title`, `cant`, `price`, `total`) VALUES
(32, 19, 55, 'Harina P.A.N 1kg', 1, '177000.00', '177000.00'),
(33, 24, 55, 'Frescolita 1.5Lts', 1, '200000.00', '200000.00'),
(34, 23, 55, 'Mortadela de res 500 g', 1, '340000.00', '340000.00');

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
(1, '20758871', 1, 'jader', 'golindano', 412487566, 'Aragua', 'Girardot (Aragua)', 'turmero casa 02');

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
(1, 'admin@gmail.com', '1234', 'jader', 'golindano', 0, 0, 0);

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
(17, 'Apure');

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
(45, 14, ' JosÃ© Ãngel Lamas (Santa Cruz)'),
(46, 14, ' Santiago MariÃ±o (Turmero)');

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
(28, 274865, 1, 556456456, '737000.00', '3.92', '2020-05-16 00:38:44', 2),
(29, 371384, 1, 7777, '547000.00', '2.91', '2020-05-16 00:41:01', 2),
(30, 315155, 1, 6676, '600000.00', '3.19', '2020-05-16 00:49:43', 3),
(31, 589412, 1, 768768, '5220000.00', '27.77', '2020-05-16 00:51:11', 2),
(32, 614228, 1, 33434234, '3400000.00', '18.09', '2020-05-16 00:52:03', 2),
(33, 328091, 1, 969933, '857000.00', '4.56', '2020-05-16 00:57:00', 2);

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
(32, 274865, 19, 1, '177000.00'),
(33, 274865, 20, 1, '150000.00'),
(34, 274865, 22, 1, '250000.00'),
(35, 274865, 21, 1, '160000.00'),
(36, 371384, 19, 1, '177000.00'),
(37, 371384, 25, 1, '370000.00'),
(38, 315155, 24, 3, '200000.00'),
(39, 589412, 21, 1, '160000.00'),
(40, 589412, 23, 4, '340000.00'),
(41, 589412, 25, 10, '370000.00'),
(42, 614228, 23, 10, '340000.00'),
(43, 328091, 23, 2, '340000.00'),
(44, 328091, 19, 1, '177000.00');

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
(19, 'Harina P.A.N 1kg', 'harina de maiz precocida 1 kg', '177000.00', 250, 'views/img/products/product738.jpg', 0),
(20, 'Mayonesa Kraft 500 g', 'Mayonesa Kraft 500 g envase de vidrio', '150000.00', 300, 'views/img/products/product537.jpg', 0),
(21, 'Mantequilla mavesa 250g', 'Mantequilla mavesa 250g presentacion pequeÃ±a', '160000.00', 50, 'views/img/products/product168.jpg', 0),
(22, 'Pasta de tornillo 500 g', 'Pasta de tornillo 500 g marca primor', '250000.00', 120, 'views/img/products/product829.jpg', 0),
(23, 'Mortadela de res 500 g', 'Mortalela de res Plumrose 500g', '340000.00', 125, 'views/img/products/product242.jpg', 0),
(24, 'Frescolita 1.5Lts', 'Frescolita 1.5Lts', '200000.00', 25, 'views/img/products/product327.jpg', 0),
(25, 'Aceite vatel 1 Lt', 'Aceite de soya Vatel 1 Lt ', '370000.00', 20, 'views/img/products/product612.jpg', 0);

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
(1, '188000.00');

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
(55, 0, 'golindan1234@gmail.com', '12345678', 0, 0),
(70, 0, 'golindan111@gmail.com', '11111111', 0, 0),
(71, 0, 'golindano.jader@gmail.com', 'ubuntu13.04', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pagomovil`
--
ALTER TABLE `pagomovil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pedido_has_producto`
--
ALTER TABLE `pedido_has_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tasa`
--
ALTER TABLE `tasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
