-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 12:18 AM
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
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `idproduct` int(11) NOT NULL
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
(1, '20758871', 1, 'jhon', 'martin', 2147483647, 'Aragua', ' BolÃ­var (San Mateo)', 'las acacias casa 32'),
(4, '1258996', 55, 'jhon', 'perez', 2147483647, 'Carabobo', ' Santiago MariÃ±o (Turmero)', 'cantarrana sector 3'),
(5, '12878996', 56, 'jhon', 'martin', 2555889, 'Miranda', ' Baruta (Baruta)', 'urb la florida casa 24'),
(6, '23665996', 57, 'Diego Alfonso', 'Campos', 416032558, 'Aragua', ' BolÃ­var (San Mateo)', 'Barrio la piedra calle pr casa 12');

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
-- Table structure for table `envios`
--

CREATE TABLE `envios` (
  `id` int(11) NOT NULL,
  `tax` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `envios`
--

INSERT INTO `envios` (`id`, `tax`) VALUES
(1, '50000.00');

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
(19, 'Carabobo'),
(20, 'Miranda');

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
(47, 14, ' Santiago MariÃ±o (Turmero)'),
(49, 20, ' Baruta (Baruta)'),
(50, 14, ' BolÃ­var (San Mateo)'),
(51, 19, ' Valencia (Valencia)');

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
(96, 684679, 1, 56546565, '615600.00', '3.08', '2020-05-28 03:20:13', 2),
(97, 253999, 1, 0, '604800.00', '3.02', '2020-05-28 02:23:35', 2),
(98, 776334, 1, 0, '5477920.00', '27.39', '2020-05-28 04:09:29', 2),
(99, 363769, 1, 77886867, '498000.00', '2.49', '2020-05-29 02:32:07', 2),
(100, 248948, 1, 2147483647, '1041800.00', '5.21', '2020-05-30 02:37:42', 2);

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
(174, 684679, 40, 1, '145000.00'),
(175, 684679, 21, 1, '160000.00'),
(176, 684679, 19, 1, '200000.00'),
(177, 253999, 25, 1, '370000.00'),
(178, 253999, 34, 1, '170000.00'),
(179, 776334, 32, 3, '167000.00'),
(180, 776334, 23, 1, '340000.00'),
(181, 776334, 19, 1, '200000.00'),
(182, 776334, 20, 1, '150000.00'),
(183, 776334, 21, 1, '160000.00'),
(184, 776334, 22, 1, '250000.00'),
(185, 776334, 26, 1, '180000.00'),
(186, 776334, 31, 1, '300000.00'),
(187, 776334, 33, 1, '220000.00'),
(188, 776334, 34, 3, '170000.00'),
(189, 776334, 37, 2, '70000.00'),
(190, 776334, 41, 3, '230000.00'),
(191, 776334, 48, 3, '300000.00'),
(192, 776334, 47, 2, '175000.00'),
(193, 363769, 19, 2, '200000.00'),
(194, 248948, 31, 1, '300000.00'),
(195, 248948, 23, 1, '340000.00'),
(196, 248948, 22, 1, '250000.00');

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
(19, 'Harina P.A.N 1kg', 'harina de maiz precocida 1 kg', '200000.00', 174, 'views/img/products/product738.jpg', 0),
(20, 'Mayonesa Kraft 500 g', 'Mayonesa Kraft 500 g envase de vidrio', '150000.00', 187, 'views/img/products/product537.jpg', 0),
(21, 'Mantequilla mavesa 250g', 'Mantequilla mavesa 250g presentacion pequeÃ±a', '160000.00', 186, 'views/img/products/product168.jpg', 0),
(22, 'Pasta de tornillo 500 g', 'Pasta de tornillo 500 g marca primor', '250000.00', 178, 'views/img/products/product829.jpg', 0),
(23, 'Mortadela de res 500 g', 'Mortalela de res Plumrose 500g', '340000.00', 100, 'views/img/products/product242.jpg', 0),
(24, 'Frescolita 1.5Lts', 'Frescolita 1.5Lts', '230000.00', 57, 'views/img/products/product327.jpg', 0),
(25, 'Aceite vatel 1 Lt', 'Aceite de soya Vatel 1 Lt ', '370000.00', 25, 'views/img/products/product612.jpg', 0),
(26, 'Suavizante 1Lt', 'Suavizante celeste 1 Lt ', '180000.00', 12, 'views/img/products/product482.jpg', 1),
(31, 'Malta 6 und', 'malta 6 pack', '300000.00', 30, 'views/img/products/product773.jpg', 0),
(32, 'CheezWheez 300 g', 'Queso fundido tipo cheddar americano 300grms', '167000.00', 19, 'views/img/products/product941.jpg', 1),
(33, 'Chinotto 2 Lt', 'Bebida gaseosa sabor a limon 2 Lt', '220000.00', 51, 'views/img/products/product983.jpg', 0),
(34, 'Arroz mary 1KG', 'Arroz mary 1KG', '170000.00', 37, 'views/img/products/product895.jpg', 0),
(35, 'Caraotas negras  1Kg', 'Caraotas negras 1 Kg marca Pantera', '200000.00', 54, 'views/img/products/product596.jpg', 0),
(37, 'Tang Naranaja 30 g', 'Tang Naranaja 30 g para 2 Lts', '70000.00', 115, 'views/img/products/product775.jpg', 0),
(38, 'Pepsi Lata', 'Pepsi de lata 12 oz', '120000.00', 98, 'views/img/products/product124.jpg', 0),
(39, 'Pepsi 2 Lt', 'Pepsi 2 Lt', '210000.00', 52, 'views/img/products/product698.jpg', 0),
(40, 'Pasta de tomate 250 grm', 'Pasta de tomate 200 grm Kiero', '145000.00', 72, 'views/img/products/product982.jpg', 0),
(41, 'Mortade especila Plumrose 1 Kg', 'Mortade especila Plumrose 1 Kg 6 piezas', '230000.00', 38, 'views/img/products/product465.jpg', 0),
(42, 'Mantequilla mavesa 500g', 'Mantequilla mavesa 500g', '350000.00', 57, 'views/img/products/product722.jpg', 0),
(44, 'Malta de lata', 'Malta de lata maltin polar', '80000.00', 49, 'views/img/products/product169.jpg', 0),
(45, 'Masa para cachapas 500 g', 'Masa para cachapas 500 g', '250000.00', 94, 'views/img/products/product178.jpg', 0),
(47, 'Coca Cola 2 Lt', 'Coca Cola 2 Lt', '175000.00', 66, 'views/img/products/product739.jpg', 0),
(48, 'Atun Margarita grande', 'Atun Margarita grande', '300000.00', 13, 'views/img/products/product280.jpg', 1),
(49, 'Leche en polvo 900 grm', 'Leche en polvo 900 grm El rodeo', '700000.00', 43, 'views/img/products/product940.jpg', 0),
(50, 'Cepillos dentales adulto 2 Und', 'Cepillos dentales colgate 2 Und Adulto', '120000.00', 48, 'views/img/products/product912.jpg', 0),
(51, 'Gel antibacterial 265 ml', 'Gel antibacterial 265 ml', '210000.00', 61, 'views/img/products/product130.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sucursales`
--

INSERT INTO `sucursales` (`id`, `branch`) VALUES
(1, 'jader'),
(2, 'Cc la orquidea pasillo 2 piso 2                                    ');

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
(55, 0, 'golindan1234@gmail.com', '12345678', 0, 0),
(56, 0, 'pepe@gmail.com', '12345678', 0, 0),
(57, 0, 'campe@hotmail.com', '12345678', 0, 0);

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
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
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
-- Indexes for table `envios`
--
ALTER TABLE `envios`
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
-- Indexes for table `sucursales`
--
ALTER TABLE `sucursales`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pagomovil`
--
ALTER TABLE `pagomovil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pedido_has_producto`
--
ALTER TABLE `pedido_has_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasa`
--
ALTER TABLE `tasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
