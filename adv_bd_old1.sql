-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.8-log
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `adv_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devedor`
--

CREATE TABLE IF NOT EXISTS `devedor` (
  `id_devedor` int(9) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `responsavel` varchar(70) NOT NULL,
  `cpf_responsavel` varchar(14) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id_devedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` datetime NOT NULL,
  `ip` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `mensagem` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hora` (`hora`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=84 ;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `hora`, `ip`, `usuario`, `mensagem`) VALUES
(8, '2012-10-03 19:37:36', '127.0.0.1', 'Administrador Teste', 'UsuÃ¡rio logou no sistema'),
(9, '2012-10-03 19:38:19', '127.0.0.1', 'Usuário Teste', 'Logado no sistema'),
(10, '2012-10-04 01:44:15', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(11, '2012-10-04 01:44:40', '127.0.0.1', 'Usuário Teste', 'Logado no sistema'),
(12, '2012-10-04 01:48:59', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(13, '2012-10-04 01:51:28', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(14, '2012-10-04 01:55:59', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(15, '2012-10-04 01:57:08', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(16, '2012-10-04 01:57:38', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(17, '2012-10-04 01:58:58', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(18, '2012-10-04 01:59:33', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(19, '2012-10-04 01:59:54', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(20, '2012-10-04 13:07:33', '127.0.0.1', 'Administrador Teste', 'Logado no sistema'),
(21, '2012-10-04 13:16:09', '127.0.0.1', '', 'Logado no sistema'),
(22, '2012-10-04 13:18:39', '127.0.0.1', 'admin', 'Logado no sistema'),
(23, '2012-10-04 13:19:24', '127.0.0.1', 'admin', 'Logado no sistema'),
(24, '2012-10-04 13:43:06', '127.0.0.1', 'admin', 'Logado no sistema'),
(25, '2012-10-04 13:44:34', '127.0.0.1', 'admin', 'Logado no sistema'),
(26, '2012-10-04 13:51:30', '127.0.0.1', 'admin', 'Logado no sistema'),
(27, '2012-10-04 13:53:51', '127.0.0.1', 'admin', 'Logado no sistema'),
(28, '2012-10-04 13:54:05', '127.0.0.1', 'admin', 'Logado no sistema'),
(29, '2012-10-04 14:11:48', '127.0.0.1', 'admin', 'Logado no sistema'),
(30, '2012-10-04 14:23:44', '127.0.0.1', 'admin', 'Logado no sistema'),
(31, '2012-10-05 13:26:55', '127.0.0.1', 'admin', 'Logado no sistema'),
(32, '2012-10-05 13:27:08', '127.0.0.1', 'demo', 'Logado no sistema'),
(33, '2012-10-05 13:33:08', '127.0.0.1', 'admin', 'Logado no sistema'),
(34, '2012-10-05 13:35:12', '127.0.0.1', 'admin', 'Logado no sistema'),
(35, '2012-10-05 15:50:07', '127.0.0.1', 'admin', 'Logado no sistema'),
(36, '2012-10-05 16:44:44', '127.0.0.1', 'admin', 'Logado no sistema'),
(37, '2012-10-05 16:46:33', '127.0.0.1', 'admin', 'Logado no sistema'),
(38, '2012-10-05 17:15:40', '127.0.0.1', 'admin', 'Logado no sistema'),
(39, '2012-10-05 17:16:06', '127.0.0.1', 'admin', 'Logado no sistema'),
(40, '2012-10-05 17:16:13', '127.0.0.1', 'admin', 'Logado no sistema'),
(41, '2012-10-05 17:16:29', '127.0.0.1', 'admin', 'Logado no sistema'),
(42, '2012-10-05 19:07:39', '127.0.0.1', 'admin', 'Logado no sistema'),
(43, '2012-10-05 19:08:09', '127.0.0.1', 'admin', 'Logado no sistema'),
(44, '2012-10-05 19:44:09', '127.0.0.1', 'admin', 'Logado no sistema'),
(45, '2012-10-05 19:45:09', '127.0.0.1', 'admin', 'Logado no sistema'),
(46, '2012-10-05 19:45:17', '127.0.0.1', 'demo', 'Logado no sistema'),
(47, '2012-10-19 13:26:53', '127.0.0.1', 'admin', 'Logado no sistema'),
(48, '2012-10-19 14:25:13', '127.0.0.1', 'admin', 'Logado no sistema'),
(49, '2012-10-19 22:54:46', '127.0.0.1', 'admin', 'Logado no sistema'),
(50, '2012-10-19 22:58:37', '127.0.0.1', 'admin', 'Logado no sistema'),
(51, '2012-10-19 22:58:45', '127.0.0.1', 'admin', 'Logado no sistema'),
(52, '2012-10-19 23:10:19', '127.0.0.1', 'admin', 'Logado no sistema'),
(53, '2012-10-19 23:50:32', '127.0.0.1', 'admin', 'Logado no sistema'),
(54, '2012-10-19 23:59:13', '127.0.0.1', 'admin', 'Logado no sistema'),
(55, '2012-10-19 23:59:37', '127.0.0.1', 'admin', 'Logado no sistema'),
(56, '2012-10-20 00:01:20', '127.0.0.1', 'admin', 'Logado no sistema'),
(57, '2012-10-20 00:01:21', '127.0.0.1', 'admin', 'Logado no sistema'),
(58, '2012-10-20 00:03:35', '127.0.0.1', 'demo', 'Logado no sistema'),
(59, '2012-10-22 12:35:01', '127.0.0.1', 'admin', 'Logado no sistema'),
(60, '2012-10-22 12:35:27', '127.0.0.1', 'demo', 'Logado no sistema'),
(61, '2012-10-22 12:35:37', '127.0.0.1', 'admin', 'Logado no sistema'),
(62, '2012-10-22 12:36:34', '127.0.0.1', 'admin', 'Logado no sistema'),
(63, '2012-10-22 12:37:46', '127.0.0.1', 'admin', 'Logado no sistema'),
(64, '2012-10-22 12:38:14', '127.0.0.1', 'admin', 'Logado no sistema'),
(65, '2012-10-22 12:38:17', '127.0.0.1', 'admin', 'Logado no sistema'),
(66, '2012-10-22 12:38:18', '127.0.0.1', 'admin', 'Logado no sistema'),
(67, '2012-10-22 12:38:18', '127.0.0.1', 'admin', 'Logado no sistema'),
(68, '2012-10-22 12:38:18', '127.0.0.1', 'admin', 'Logado no sistema'),
(69, '2012-10-22 12:40:29', '127.0.0.1', 'admin', 'Logado no sistema'),
(70, '2012-10-22 12:40:35', '127.0.0.1', 'admin', 'Logado no sistema'),
(71, '2012-10-22 12:41:25', '127.0.0.1', 'demo', 'Logado no sistema'),
(72, '2012-10-22 12:43:09', '127.0.0.1', 'adv', 'Logado no sistema'),
(73, '2012-10-22 12:43:45', '127.0.0.1', 'adv', 'Logado no sistema'),
(74, '2012-10-22 12:44:43', '127.0.0.1', 'admin', 'Logado no sistema'),
(75, '2012-10-22 12:45:07', '127.0.0.1', 'admin', 'Logado no sistema'),
(76, '2012-10-22 12:46:49', '127.0.0.1', 'admin', 'Logado no sistema'),
(77, '2012-10-22 12:48:04', '127.0.0.1', 'admin', 'Logado no sistema'),
(78, '2012-10-22 12:48:33', '127.0.0.1', 'admin', 'Logado no sistema'),
(79, '2012-10-22 12:50:17', '127.0.0.1', 'admin', 'Logado no sistema'),
(80, '2012-10-22 12:51:11', '127.0.0.1', 'demo', 'Logado no sistema'),
(81, '2012-10-22 13:14:11', '127.0.0.1', 'admin', 'Logado no sistema'),
(82, '2012-10-22 14:19:56', '127.0.0.1', 'admin', 'Logado no sistema'),
(83, '2012-10-22 14:27:03', '127.0.0.1', 'admin', 'Logado no sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `nome`) VALUES
(1, 'Cliente'),
(2, 'Estagiários'),
(3, 'Advogados'),
(4, 'Administradores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_devedor`
--

CREATE TABLE IF NOT EXISTS `telefone_devedor` (
  `id_tel_devedor` int(9) NOT NULL AUTO_INCREMENT,
  `ddd` varchar(2) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `tipo_tel` varchar(11) NOT NULL,
  `id_devedor` int(9) NOT NULL,
  PRIMARY KEY (`id_tel_devedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `cadastro`) VALUES
(1, 'Usuário Teste', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'pricosta@gmail.com', 1, 1, '2012-10-03 14:50:40'),
(2, 'Administrador Teste', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'priscila@blushweb.com.br', 2, 1, '2012-10-03 14:50:40'),
(3, 'Advogado', 'adv', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'pricosta@gmail.com', 1, 1, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
