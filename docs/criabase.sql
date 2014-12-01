-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2014 às 02:28
-- Versão do servidor: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Reginaldo Silva', 'reginaldo.rubens@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
`id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome`) VALUES
(1, 'Informática'),
(2, 'Eletrônicos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL,
  `registrado_em` timestamp NULL DEFAULT NULL,
  `situacao` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor_desconto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(11) NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8 NOT NULL,
  `detalhes` text CHARACTER SET utf8,
  `preco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `detalhes`, `preco`, `id_departamento`) VALUES
(1, 'Mouse Óptico', 'wirelles', '40.00', 1),
(2, 'Monitor LED 23"', 'smart', '400.00', 1),
(3, 'TV Plasma 60"', '3D+smart', '5000.00', 2),
(4, 'Notbook 8GB', 'Dell 15p', '2500.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Fran', 'fm.fiori@gmail.com', 'fran', '1234'),
(3, 'Douglas', 'doug@gmail.com', 'doug', '1234'),
(4, 'Reginaldo', 'reginaldo@gmail.com', 'reginaldo', '1234'),
(5, 'Higor', 'hbchelli@gmail.com', 'higor', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
 ADD PRIMARY KEY (`id_pedido`,`id_produto`), ADD KEY `fk_itens_pedido_produtos1_idx` (`id_produto`), ADD KEY `fk_itens_pedido_pedidos1_idx` (`id_pedido`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_pedidos_clientes1_idx` (`id_cliente`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_produtos_departamentos_idx` (`id_departamento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_UNIQUE` (`email`), ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
ADD CONSTRAINT `fk_itens_pedido_pedidos1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_itens_pedido_produtos1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
ADD CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
ADD CONSTRAINT `fk_produtos_departamentos` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
