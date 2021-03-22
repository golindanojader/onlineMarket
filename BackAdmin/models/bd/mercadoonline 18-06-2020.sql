-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 04:37 PM
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `category`, `status`) VALUES
(1, 'Harinas', 0),
(2, 'Pastas', 0),
(3, 'Enlatados', 0),
(5, 'Embutidos', 0),
(7, 'Cereales', 0),
(9, 'Salsas', 0),
(10, 'Aceites', 0),
(11, 'Lacteos', 0),
(12, 'Cuidado Personal', 0),
(13, 'Condimentos', 0),
(14, 'Limpieza', 0),
(20, 'Bebidas', 0);

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
(1, '20758871', 1, 'Jader', 'Golindano', 2147483647, 'Aragua', ' Santiago MariÃ±o (Turmero)', 'Urb la fontana calle prc casa num 4'),
(4, '214783647', 55, 'Jhon ', 'Perez', 1258996, 'Aragua', ' Girardot (Maracay)', 'cantarrana sector 3'),
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
(1, 'admin@gmail.com', '1234', 'jader', 'golindano', 0, 0, 0);

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
  `status` int(11) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `idorder`, `iduser`, `reference`, `mount`, `convertion`, `date`, `status`, `branch`) VALUES
(112, 343964, 1, 2147483647, '1069200.00', '5.35', '2020-06-11 00:51:32', 3, 0),
(113, 415258, 1, 0, '740320.00', '3.70', '2020-06-10 23:48:22', 0, 1),
(114, 150078, 55, 343456676, '1326800.00', '6.63', '2020-06-17 23:35:27', 2, 0);

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
(220, 343964, 55, 3, '190000.00'),
(221, 343964, 23, 1, '340000.00'),
(222, 415258, 21, 1, '160000.00'),
(223, 415258, 32, 3, '167000.00'),
(224, 150078, 35, 1, '200000.00'),
(225, 150078, 42, 1, '350000.00'),
(226, 150078, 23, 1, '340000.00'),
(227, 150078, 22, 1, '250000.00');

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
  `enable` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `title`, `description`, `price`, `cant`, `route`, `enable`, `idcategory`) VALUES
(20, 'Mayonesa Kraft 500 g', 'Mayonesa Kraft 500 g envase de vidrio', '150000.00', 187, 'views/img/products/product537.jpg', 0, 13),
(21, 'Mantequilla mavesa 250g', 'Mantequilla mavesa 250g presentacion pequeÃ±a', '160000.00', 186, 'views/img/products/product168.jpg', 0, 11),
(22, 'Pasta de tornillo 500 g', 'Pasta de tornillo 500 g marca primor', '250000.00', 177, 'views/img/products/product829.jpg', 0, 2),
(23, 'Mortadela de res 500 g', 'Mortalela de res Plumrose 500g', '340000.00', 99, 'views/img/products/product242.jpg', 0, 5),
(24, 'Frescolita 1.5Lts', 'Frescolita 1.5Lts', '230000.00', 57, 'views/img/products/product327.jpg', 0, 20),
(26, 'Suavizante 1Lt', 'Suavizante celeste 1 Lt ', '180000.00', 32, 'views/img/products/product482.jpg', 0, 14),
(31, 'Malta 6 und', 'malta 6 pack', '300000.00', 30, 'views/img/products/product773.jpg', 0, 20),
(32, 'CheezWheez 300 g', 'Queso fundido tipo cheddar americano 300grms', '167000.00', 19, 'views/img/products/product941.jpg', 0, 11),
(33, 'Chinotto 2 Lt', 'Bebida gaseosa sabor a limon 2 Lt', '220000.00', 51, 'views/img/products/product983.jpg', 0, 20),
(34, 'Arroz mary 1KG', 'Arroz mary 1KG', '170000.00', 33, 'views/img/products/product895.jpg', 0, 7),
(35, 'Caraotas negras  1Kg', 'Caraotas negras 1 Kg marca Pantera', '200000.00', 51, 'views/img/products/product596.jpg', 0, 6),
(37, 'Tang Naranaja 30 g', 'Tang Naranaja 30 g para 2 Lts', '70000.00', 114, 'views/img/products/product775.jpg', 0, 20),
(38, 'pepsi', 'Pepsi de lata 12 oz', '120000.00', 92, 'views/img/products/product124.jpg', 0, 20),
(39, 'Pepsi 2 Lt', 'Pepsi 2 Lt', '210000.00', 52, 'views/img/products/product698.jpg', 0, 20),
(40, 'Pasta de tomate 250 grm', 'Pasta de tomate 200 grm Kiero', '145000.00', 72, 'views/img/products/product982.jpg', 0, 9),
(41, 'Mortade especila Plumrose 1 Kg', 'Mortade especila Plumrose 1 Kg 6 piezas', '230000.00', 38, 'views/img/products/product465.jpg', 0, 5),
(42, 'Mantequilla mavesa 500g', 'Mantequilla mavesa 500g', '350000.00', 56, 'views/img/products/product722.jpg', 0, 11),
(44, 'Malta de lata', 'Malta de lata maltin polar', '80000.00', 49, 'views/img/products/product169.jpg', 0, 20),
(47, 'Coca Cola 2 Lt', 'Coca Cola 2 Lt', '175000.00', 66, 'views/img/products/product739.jpg', 0, 20),
(48, 'Atun Margarita grande', 'Atun Margarita grande', '300000.00', 13, 'views/img/products/product280.jpg', 0, 3),
(49, 'Leche en polvo 900 grm', 'Leche en polvo 900 grm El rodeo', '700000.00', 43, 'views/img/products/product940.jpg', 0, 11),
(50, 'Cepillos dentales adulto 2 Und', 'Cepillos dentales colgate 2 Und Adulto', '120000.00', 48, 'views/img/products/product912.jpg', 0, 12),
(51, 'Gel antibacterial 265 ml', 'Gel antibacterial 265 ml', '210000.00', 61, 'views/img/products/product130.jpg', 0, 12),
(54, 'Aceite vatel 1 Lt', 'Aceite de soya marca vatel 1 Lt', '300000.00', 50, 'views/img/products/product331.jpg', 0, 10),
(55, 'Harina P.A.N 1kg', 'harina de maiz precocida 1 kg', '190000.00', 200, 'views/img/products/product641.jpg', 0, 1),
(56, 'Mantequilla chifon 500 grm', 'Mantequilla chifon 500 grm marca mavesa', '540000.00', 60, 'views/img/products/product473.jpg', 0, 11),
(58, 'Mascarilla 3M', 'Mascarilla 3M tamaÃ±o estandar desechable', '120000.00', 1100, 'views/img/products/product432.jpg', 0, 12),
(59, 'Combo Online # 1', 'Combo de higiene personal', '1200000.00', 4, 'views/img/products/product889.jpg', 1, 12);

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
(1, 'C.C La orquidea piso 2 pasillo 3 local 21 (Maracay)');

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
  `user` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `intents` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `password`, `intents`, `rol`, `status`) VALUES
(1, 'usuario@gmail.com', '1234', 0, 0, 1),
(55, 'golindan1234@gmail.com', '12345678', 0, 0, 0),
(56, 'pepe@gmail.com', '12345678', 1, 0, 0),
(57, 'campe@hotmail.com', '12345678', 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `pedido_has_producto`
--
ALTER TABLE `pedido_has_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
