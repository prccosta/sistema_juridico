--
-- Banco de Dados: `adv_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_devedor`
--

CREATE TABLE IF NOT EXISTS `aluno_devedor` (
  `id_aluno_devedor` int(9) NOT NULL AUTO_INCREMENT,
  `id_devedor` int(9) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id_aluno_devedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `aluno_devedor`
--

INSERT INTO `aluno_devedor` (`id_aluno_devedor`, `id_devedor`, `matricula`, `nome`) VALUES
(16, 25, '12345', 'Priscila Ribeiro da Costa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ativo`
--

CREATE TABLE IF NOT EXISTS `ativo` (
  `id` int(1) NOT NULL,
  `nome` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ativo`
--

INSERT INTO `ativo` (`id`, `nome`) VALUES
(2, 'Não'),
(1, 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(9) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(70) NOT NULL,
  `nome_exib` varchar(30) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `responsavel` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `tipo_pessoa` varchar(8) NOT NULL,
  `cpf_cnpj` varchar(18) NOT NULL,
  `url` varchar(30) NOT NULL,
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `nome_exib`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `responsavel`, `email`, `tipo_pessoa`, `cpf_cnpj`, `url`, `datacadastro`) VALUES
(1, 'Blush! Web e Publicidade', 'Blush! Web e Publicidade', 'Rua Washington Luiz', '45', 'Apto 404', 'Centro', 'Rio de Janeiro', 'RJ', '', 'Priscila R. da Costa', 'priscila@blushweb.com.br', 'Jurídica', '08296667703', 'www.blushweb.com.br', '2012-11-09'),
(3, 'Escola Porto Seguro', 'Escola Porto Seguro', 'Rua Professor Eurico Rabelo', '133', '', 'Maracanã', 'Rio de Janeiro', 'RJ', '20271150', 'Antonio Fernando Rodrigues', '', 'Trabalho', '33890260/0', 'www.escolaportosegur', '2012-11-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `devedor`
--

CREATE TABLE IF NOT EXISTS `devedor` (
  `id_devedor` int(9) NOT NULL AUTO_INCREMENT,
  `id_cli_cliente` int(9) NOT NULL,
  `nome_dev` varchar(70) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `devedor`
--

INSERT INTO `devedor` (`id_devedor`, `id_cli_cliente`, `nome_dev`, `cpf`, `responsavel`, `cpf_responsavel`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `datacadastro`) VALUES
(25, 3, 'Carla Ribeiro da Costa Vicente da Silva', '08296667703', 'Rosileide Maria Ribeiro da Costa', '96608267799', 'Rua Judite ABREU', '99', 'casa 99', 'Éden ABREU', 'São João de Meriti ABREU', 'MG', '25535499', '2012-11-21');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=404 ;

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
(83, '2012-10-22 14:27:03', '127.0.0.1', 'admin', 'Logado no sistema'),
(84, '2012-11-07 13:00:20', '127.0.0.1', 'admin', 'Logado no sistema'),
(85, '2012-11-07 18:09:32', '127.0.0.1', 'admin', 'Logado no sistema'),
(86, '2012-11-07 18:11:47', '127.0.0.1', 'admin', 'Logado no sistema'),
(87, '2012-11-08 13:02:51', '127.0.0.1', 'admin', 'Logado no sistema'),
(88, '2012-11-08 16:48:45', '127.0.0.1', 'admin', 'Logado no sistema'),
(89, '2012-11-09 10:38:46', '127.0.0.1', 'admin', 'Logado no sistema'),
(90, '2012-11-09 14:29:45', '127.0.0.1', 'admin', 'Logado no sistema'),
(91, '2012-11-09 14:46:29', '127.0.0.1', 'admin', 'Logado no sistema'),
(92, '2012-11-09 14:47:30', '127.0.0.1', 'admin', 'Logado no sistema'),
(93, '2012-11-09 14:49:25', '127.0.0.1', 'admin', 'Logado no sistema'),
(94, '2012-11-09 15:00:06', '127.0.0.1', 'admin', 'Logado no sistema'),
(95, '2012-11-09 20:38:45', '127.0.0.1', 'admin', 'Logado no sistema'),
(96, '2012-11-10 02:00:00', '127.0.0.1', 'admin', 'Logado no sistema'),
(97, '2012-11-11 16:07:48', '127.0.0.1', 'admin', 'Logado no sistema'),
(98, '2012-11-12 10:01:12', '127.0.0.1', 'admin', 'Logado no sistema'),
(99, '2012-11-13 13:48:08', '127.0.0.1', 'admin', 'Logado no sistema'),
(100, '2012-11-13 14:46:14', '127.0.0.1', 'admin', 'Logado no sistema'),
(101, '2012-11-13 17:06:35', '127.0.0.1', 'demo', 'Logado no sistema'),
(102, '2012-11-14 14:10:00', '127.0.0.1', 'admin', 'Logado no sistema'),
(103, '2012-11-14 14:10:24', '127.0.0.1', 'admin', 'Logado no sistema'),
(104, '2012-11-14 21:00:19', '127.0.0.1', 'admin', 'Logado no sistema'),
(105, '2012-11-15 10:36:53', '127.0.0.1', 'admin', 'Logado no sistema'),
(106, '2012-11-15 10:47:24', '127.0.0.1', 'admin', 'Logado no sistema'),
(107, '2012-11-16 11:07:06', '127.0.0.1', 'admin', 'Logado no sistema'),
(108, '2012-11-19 13:48:46', '127.0.0.1', 'admin', 'Logado no sistema'),
(109, '2012-11-19 22:28:58', '127.0.0.1', 'admin', 'Logado no sistema'),
(110, '2012-11-21 10:03:23', '127.0.0.1', 'admin', 'Logado no sistema'),
(111, '2012-11-21 14:02:56', '127.0.0.1', 'admin', 'Logado no sistema'),
(112, '2012-11-21 14:05:02', '127.0.0.1', 'admin', 'Logado no sistema'),
(113, '2012-11-21 14:07:28', '127.0.0.1', 'xuxu', 'Logado no sistema'),
(114, '2012-11-21 14:08:27', '127.0.0.1', 'admin', 'Logado no sistema'),
(115, '2012-11-21 14:12:29', '127.0.0.1', 'admin', 'Logado no sistema'),
(116, '2012-11-21 20:17:40', '127.0.0.1', 'admin', 'Logado no sistema'),
(117, '2012-11-22 12:07:53', '127.0.0.1', 'admin', 'Logado no sistema'),
(118, '2012-11-26 10:13:16', '127.0.0.1', 'admin', 'Logado no sistema'),
(119, '2012-12-03 17:50:24', '127.0.0.1', 'admin', 'Logado no sistema'),
(120, '2012-12-04 12:53:39', '127.0.0.1', 'admin', 'Logado no sistema'),
(121, '2012-12-05 11:29:45', '127.0.0.1', 'admin', 'Logado no sistema'),
(122, '2012-12-06 10:31:39', '127.0.0.1', 'admin', 'Logado no sistema'),
(123, '2012-12-06 15:36:12', '127.0.0.1', 'admin', 'Logado no sistema'),
(124, '2012-12-06 18:08:06', '127.0.0.1', 'admin', 'Logado no sistema'),
(125, '2012-12-07 10:52:54', '127.0.0.1', 'admin', 'Logado no sistema'),
(126, '2012-12-10 11:53:52', '127.0.0.1', 'admin', 'Logado no sistema'),
(127, '2012-12-10 17:17:14', '127.0.0.1', 'admin', 'Logado no sistema'),
(128, '2012-12-10 19:40:54', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(129, '2012-12-10 19:42:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(130, '2012-12-10 19:42:07', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(131, '2012-12-10 19:42:08', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(132, '2012-12-10 19:47:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(133, '2012-12-10 19:47:47', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(134, '2012-12-10 19:47:49', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(135, '2012-12-10 19:47:51', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(136, '2012-12-10 19:49:41', '127.0.0.1', 'admin', 'Tela de Ediçãos de Processo'),
(137, '2012-12-10 19:52:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(138, '2012-12-10 19:52:13', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(139, '2012-12-10 19:52:15', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(140, '2012-12-10 19:53:08', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(141, '2012-12-10 19:53:09', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(142, '2012-12-10 19:53:10', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(143, '2012-12-10 19:53:15', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(144, '2012-12-10 19:53:17', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(145, '2012-12-11 12:04:39', '127.0.0.1', 'admin', 'Logado no sistema'),
(146, '2012-12-11 12:06:45', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(147, '2012-12-11 12:06:48', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(148, '2012-12-11 12:15:09', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(149, '2012-12-11 12:37:20', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(150, '2012-12-11 12:46:56', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(151, '2012-12-11 12:46:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(152, '2012-12-11 12:47:02', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(153, '2012-12-11 12:58:09', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(154, '2012-12-11 12:58:22', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(155, '2012-12-11 12:58:46', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(156, '2012-12-11 14:31:07', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(157, '2012-12-11 14:32:29', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(158, '2012-12-11 14:34:53', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(159, '2012-12-11 14:36:11', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(160, '2012-12-11 14:36:37', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(161, '2012-12-11 14:45:53', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(162, '2012-12-11 14:45:57', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(163, '2012-12-11 14:56:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(164, '2012-12-11 14:59:51', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(165, '2012-12-11 14:59:55', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(166, '2012-12-11 14:59:56', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(167, '2012-12-11 15:00:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(168, '2012-12-11 15:00:49', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(169, '2012-12-11 15:02:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(170, '2012-12-11 15:02:06', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(171, '2012-12-11 15:02:08', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(172, '2012-12-11 15:02:26', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(173, '2012-12-11 15:02:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(174, '2012-12-11 15:02:31', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(175, '2012-12-11 17:06:53', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(176, '2012-12-11 17:08:41', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(177, '2012-12-11 17:09:36', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(178, '2012-12-11 17:09:39', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(179, '2012-12-11 17:09:57', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(180, '2012-12-11 17:10:07', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(181, '2012-12-11 17:10:08', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(182, '2012-12-11 17:10:11', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(183, '2012-12-11 17:12:25', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(184, '2012-12-11 17:12:37', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(185, '2012-12-11 17:41:30', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(186, '2012-12-11 17:42:01', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(187, '2012-12-11 17:42:04', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(188, '2012-12-11 17:44:38', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(189, '2012-12-11 17:44:42', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(190, '2012-12-11 17:44:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(191, '2012-12-11 17:46:06', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(192, '2012-12-11 17:49:36', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(193, '2012-12-11 17:49:45', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(194, '2012-12-11 17:49:47', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(195, '2012-12-11 18:01:11', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(196, '2012-12-11 18:01:13', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(197, '2012-12-11 18:01:46', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(198, '2012-12-11 18:02:09', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(199, '2012-12-11 18:02:31', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(200, '2012-12-12 18:41:49', '127.0.0.1', 'admin', 'Logado no sistema'),
(201, '2012-12-12 18:41:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(202, '2012-12-12 18:44:27', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(203, '2012-12-12 18:44:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(204, '2012-12-12 18:53:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(205, '2012-12-12 18:53:46', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(206, '2012-12-12 18:55:13', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(207, '2012-12-12 18:55:47', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(208, '2012-12-12 18:56:09', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(209, '2012-12-12 18:56:10', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(210, '2012-12-12 18:56:39', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(211, '2012-12-12 18:57:01', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(212, '2012-12-12 18:57:03', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(213, '2012-12-12 18:57:06', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(214, '2012-12-12 22:55:01', '127.0.0.1', 'admin', 'Logado no sistema'),
(215, '2012-12-12 22:55:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(216, '2012-12-12 22:55:10', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(217, '2012-12-12 22:55:17', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(218, '2012-12-12 22:55:49', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(219, '2012-12-12 22:55:51', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(220, '2012-12-12 22:55:59', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(221, '2012-12-12 22:56:02', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(222, '2012-12-12 22:56:07', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(223, '2012-12-12 23:07:55', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(224, '2012-12-12 23:23:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(225, '2012-12-12 23:23:14', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(226, '2012-12-12 23:49:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(227, '2012-12-13 01:27:08', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(228, '2012-12-13 01:27:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(229, '2012-12-13 01:27:17', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(230, '2012-12-13 11:51:24', '127.0.0.1', 'admin', 'Logado no sistema'),
(231, '2012-12-13 11:51:39', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(232, '2012-12-13 11:51:41', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(233, '2012-12-16 18:17:19', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(234, '2012-12-16 18:18:38', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(235, '2012-12-16 18:42:06', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(236, '2012-12-16 18:42:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(237, '2012-12-16 18:42:23', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(238, '2012-12-16 18:44:36', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(239, '2012-12-16 18:44:52', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(240, '2012-12-16 18:45:02', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(241, '2012-12-16 19:21:35', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(242, '2012-12-16 19:21:38', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(243, '2012-12-16 19:21:40', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(244, '2012-12-16 19:21:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(245, '2012-12-16 19:22:23', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(246, '2012-12-16 19:22:25', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(247, '2012-12-16 19:22:30', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(248, '2012-12-16 19:22:41', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(249, '2012-12-16 19:24:28', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(250, '2012-12-16 19:24:53', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(251, '2012-12-16 19:29:55', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(252, '2012-12-16 19:30:00', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(253, '2012-12-16 19:30:21', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(254, '2012-12-16 19:30:25', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(255, '2012-12-16 19:30:27', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(256, '2012-12-16 19:30:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(257, '2012-12-16 19:30:33', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(258, '2012-12-16 19:30:34', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(259, '2012-12-16 19:30:35', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(260, '2012-12-16 19:30:36', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(261, '2012-12-16 19:30:54', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(262, '2012-12-16 19:31:01', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(263, '2012-12-16 19:34:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(264, '2012-12-16 19:36:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(265, '2012-12-16 19:36:33', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(266, '2012-12-16 19:36:41', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(267, '2012-12-16 19:37:08', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(268, '2012-12-16 19:37:24', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(269, '2012-12-16 19:37:28', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(270, '2012-12-16 19:37:34', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(271, '2012-12-16 19:37:43', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(272, '2012-12-16 19:37:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(273, '2012-12-16 19:37:48', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(274, '2012-12-16 19:37:54', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(275, '2012-12-16 19:44:01', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(276, '2012-12-16 19:44:07', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(277, '2012-12-16 19:44:55', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(278, '2012-12-16 19:44:59', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(279, '2012-12-16 19:45:33', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(280, '2012-12-16 19:45:42', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(281, '2012-12-16 19:45:48', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(282, '2012-12-16 19:48:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(283, '2012-12-16 19:48:18', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(284, '2012-12-16 19:48:19', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(285, '2012-12-16 19:48:24', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(286, '2012-12-16 19:49:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(287, '2012-12-16 19:50:27', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(288, '2012-12-16 19:50:37', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(289, '2012-12-16 19:54:55', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(290, '2012-12-16 19:55:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(291, '2012-12-16 19:58:17', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(292, '2012-12-16 19:58:23', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(293, '2012-12-16 19:58:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(294, '2012-12-16 19:58:37', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(295, '2012-12-16 19:58:52', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(296, '2012-12-16 19:58:54', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(297, '2012-12-16 20:03:18', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(298, '2012-12-16 20:03:23', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(299, '2012-12-16 20:03:28', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(300, '2012-12-16 20:03:33', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(301, '2012-12-16 20:09:21', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(302, '2012-12-16 20:09:24', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(303, '2012-12-16 20:09:28', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(304, '2012-12-16 20:10:53', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(305, '2012-12-16 20:13:09', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(306, '2012-12-16 20:13:14', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(307, '2012-12-16 20:13:20', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(308, '2012-12-16 20:13:24', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(309, '2012-12-16 20:21:07', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(310, '2012-12-16 20:22:48', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(311, '2012-12-16 20:23:57', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(312, '2012-12-16 20:24:02', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(313, '2012-12-16 20:25:35', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(314, '2012-12-16 20:25:39', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(315, '2012-12-16 20:48:25', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(316, '2012-12-16 20:49:59', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(317, '2012-12-16 20:50:04', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(318, '2012-12-17 14:23:00', '127.0.0.1', 'admin', 'Logado no sistema'),
(319, '2012-12-17 14:23:04', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(320, '2012-12-17 14:23:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(321, '2012-12-17 14:24:02', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(322, '2012-12-17 14:24:07', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(323, '2012-12-17 14:24:11', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(324, '2012-12-17 14:24:20', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(325, '2012-12-17 14:58:31', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(326, '2012-12-17 14:58:32', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(327, '2012-12-17 14:58:35', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(328, '2012-12-17 14:58:38', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(329, '2012-12-17 15:56:26', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(330, '2012-12-17 15:57:04', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(331, '2012-12-17 15:58:47', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(332, '2012-12-17 15:59:33', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(333, '2012-12-17 16:00:15', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(334, '2012-12-17 16:00:20', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(335, '2012-12-17 16:00:31', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(336, '2012-12-17 16:00:53', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(337, '2012-12-17 16:01:00', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(338, '2012-12-17 16:01:10', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(339, '2012-12-17 16:01:11', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(340, '2012-12-17 16:01:47', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(341, '2012-12-17 16:01:55', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(342, '2012-12-17 16:02:03', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(343, '2012-12-17 16:02:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(344, '2012-12-17 16:07:26', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(345, '2012-12-17 16:07:31', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(346, '2012-12-17 16:07:34', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(347, '2012-12-17 16:08:13', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(348, '2012-12-17 16:08:20', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(349, '2012-12-17 16:26:09', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(350, '2012-12-17 16:26:11', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(351, '2012-12-17 16:27:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(352, '2012-12-17 16:34:14', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(353, '2012-12-17 16:34:18', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(354, '2012-12-17 16:35:39', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(355, '2012-12-17 16:35:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(356, '2012-12-17 16:35:50', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(357, '2012-12-17 16:36:06', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(358, '2012-12-17 16:36:11', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(359, '2012-12-17 16:36:17', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(360, '2012-12-17 16:36:37', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(361, '2012-12-17 16:37:25', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(362, '2012-12-17 16:40:36', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(363, '2012-12-17 16:41:30', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(364, '2012-12-17 16:41:33', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(365, '2012-12-17 16:41:39', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(366, '2012-12-17 16:41:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(367, '2012-12-17 16:41:47', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(368, '2012-12-17 16:41:50', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(369, '2012-12-17 16:41:53', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(370, '2012-12-17 16:52:16', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(371, '2012-12-17 16:52:28', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(372, '2012-12-17 16:52:30', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(373, '2012-12-17 16:52:44', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(374, '2012-12-17 16:52:46', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(375, '2012-12-17 17:45:05', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(376, '2012-12-17 17:45:06', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(377, '2012-12-17 17:45:08', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(378, '2012-12-17 17:46:46', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(379, '2012-12-17 17:56:56', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(380, '2012-12-17 17:56:57', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(381, '2012-12-17 17:56:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(382, '2012-12-17 17:57:12', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(383, '2012-12-17 17:57:14', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(384, '2012-12-17 17:57:16', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(385, '2012-12-17 17:58:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(386, '2012-12-17 17:58:59', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(387, '2012-12-17 17:59:00', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(388, '2012-12-17 17:59:58', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(389, '2012-12-17 18:29:51', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(390, '2012-12-17 18:30:00', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(391, '2012-12-17 18:30:02', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(392, '2012-12-17 18:49:52', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(393, '2012-12-17 18:52:34', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(394, '2012-12-18 09:53:43', '127.0.0.1', 'admin', 'Logado no sistema'),
(395, '2012-12-18 13:19:52', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(396, '2012-12-18 14:15:41', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(397, '2012-12-18 14:15:42', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(398, '2012-12-18 14:15:45', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(399, '2012-12-18 14:16:28', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(400, '2012-12-18 19:08:28', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(401, '2012-12-18 19:08:29', '127.0.0.1', 'admin', 'Tela de Pesquisa de Processo'),
(402, '2012-12-18 19:08:31', '127.0.0.1', 'admin', 'Tela de Edição de Processo'),
(403, '2012-12-19 12:42:13', '127.0.0.1', 'admin', 'Logado no sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg_processo`
--

CREATE TABLE IF NOT EXISTS `msg_processo` (
  `id_msg_processo` int(9) NOT NULL AUTO_INCREMENT,
  `id_processo` int(9) NOT NULL,
  `msg_processo` text NOT NULL,
  `exibe` varchar(3) NOT NULL,
  PRIMARY KEY (`id_msg_processo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `msg_processo`
--

INSERT INTO `msg_processo` (`id_msg_processo`, `id_processo`, `msg_processo`, `exibe`) VALUES
(2, 10, 'Teste de gravação', '1');

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
-- Estrutura da tabela `parcela`
--

CREATE TABLE IF NOT EXISTS `parcela` (
  `id_parcela` int(9) NOT NULL AUTO_INCREMENT,
  `parcela_atual` varchar(3) NOT NULL,
  `parcela_total` varchar(4) NOT NULL,
  `numref` varchar(15) NOT NULL,
  `vlparcela` varchar(15) NOT NULL,
  `dtvenc` varchar(10) NOT NULL,
  `vlpago` varchar(15) NOT NULL,
  `dtpago` varchar(10) NOT NULL,
  `id_tipo_pagamento` varchar(1) NOT NULL,
  `id_processo` int(9) NOT NULL,
  `referencia` text NOT NULL,
  `status_parcela` int(2) NOT NULL,
  `stpa_cd_codigo` varchar(1) NOT NULL,
  `id_dev_devedor` int(9) NOT NULL,
  `identificacao` varchar(15) NOT NULL,
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id_parcela`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `parcela`
--

INSERT INTO `parcela` (`id_parcela`, `parcela_atual`, `parcela_total`, `numref`, `vlparcela`, `dtvenc`, `vlpago`, `dtpago`, `id_tipo_pagamento`, `id_processo`, `referencia`, `status_parcela`, `stpa_cd_codigo`, `id_dev_devedor`, `identificacao`, `datacadastro`) VALUES
(1, '1', '10', '175/00000001', '183,08', '05/09/2012', '250,00', '15/12/2012', '2', 1, 'Teste de gravação', 3, '2', 25, '175/00000001', '2012-11-16'),
(2, '2', '10', '', '183,08', '05/10/2012', '', '', '', 2, '', 4, '', 25, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE IF NOT EXISTS `processo` (
  `id_processo` int(9) NOT NULL AUTO_INCREMENT,
  `processo` varchar(70) NOT NULL,
  `vara` varchar(100) NOT NULL,
  `objetoacao` varchar(100) NOT NULL,
  `valorescausa` varchar(17) NOT NULL,
  `escolas` varchar(100) NOT NULL,
  `devedor` varchar(70) NOT NULL,
  `aluno_devedor` varchar(70) NOT NULL,
  `tipoacordo` varchar(13) NOT NULL,
  `acordo` varchar(70) NOT NULL,
  `acordoref` text NOT NULL,
  `vlacordo` varchar(17) NOT NULL,
  `vloriginal` varchar(17) NOT NULL,
  `parcelas` varchar(2) NOT NULL,
  `status` varchar(1) NOT NULL,
  `observacao` text NOT NULL,
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id_processo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`id_processo`, `processo`, `vara`, `objetoacao`, `valorescausa`, `escolas`, `devedor`, `aluno_devedor`, `tipoacordo`, `acordo`, `acordoref`, `vlacordo`, `vloriginal`, `parcelas`, `status`, `observacao`, `datacadastro`) VALUES
(1, '123456789012345', '01ª V.C Reg. Ilha do Governador', 'Teste de gravação', '100,00', '3', '25', 'Priscila Ribeiro da Costa', 'Judicial', 'Judicial Ilha do Governador', 'Mensalidade de Janeiro', '100,00', '120,00', '1', '1', 'Teste de gravação', '2012-12-12'),
(2, '123456789099999', '01ª V.C Reg. Ilha do Governador', 'Teste de gravação', '100,00', '3', '25', 'Priscila Ribeiro da Costa', 'Judicial', 'Judicial Ilha do Governador', 'Mensalidade de Janeiro', '100,00', '120,00', '1', '1', 'Teste de gravação', '2012-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(1) NOT NULL,
  `nome_st_processo` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `nome_st_processo`) VALUES
(1, 'Não Iniciado'),
(2, 'Em Aberto'),
(3, 'Acordo Realizado'),
(4, 'Encerrado e Quitado'),
(6, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_parcela`
--

CREATE TABLE IF NOT EXISTS `status_parcela` (
  `id_status` int(9) NOT NULL AUTO_INCREMENT,
  `nome_st_parcela` varchar(10) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status_parcela`
--

INSERT INTO `status_parcela` (`id_status`, `nome_st_parcela`) VALUES
(1, 'Em aberto'),
(2, 'Em atraso'),
(3, 'Quitada'),
(4, 'Cancelada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_cliente`
--

CREATE TABLE IF NOT EXISTS `telefone_cliente` (
  `id_tel_cliente` int(9) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(9) NOT NULL,
  `ddd` varchar(2) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `tipo_tel` varchar(11) NOT NULL,
  PRIMARY KEY (`id_tel_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `telefone_cliente`
--

INSERT INTO `telefone_cliente` (`id_tel_cliente`, `id_cliente`, `ddd`, `telefone`, `tipo_tel`) VALUES
(1, 3, '21', '25686829', 'Residencial'),
(2, 3, '21', '25672235', 'Residencial'),
(3, 3, '21', '22622235', 'Recado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_devedor`
--

CREATE TABLE IF NOT EXISTS `telefone_devedor` (
  `id_tel_devedor` int(9) NOT NULL AUTO_INCREMENT,
  `id_devedor` int(9) NOT NULL,
  `ddd` varchar(2) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `tipo_tel` varchar(11) NOT NULL,
  PRIMARY KEY (`id_tel_devedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `telefone_devedor`
--

INSERT INTO `telefone_devedor` (`id_tel_devedor`, `id_devedor`, `ddd`, `telefone`, `tipo_tel`) VALUES
(24, 25, '21', '82254051', 'Celular'),
(25, 26, '21', '96369243', 'Celular'),
(26, 27, '21', '96369243', 'Celular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamento`
--

CREATE TABLE IF NOT EXISTS `tipo_pagamento` (
  `id_pagamento` int(9) NOT NULL AUTO_INCREMENT,
  `nome_pag` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pagamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tipo_pagamento`
--

INSERT INTO `tipo_pagamento` (`id_pagamento`, `nome_pag`) VALUES
(1, 'CHEQUE'),
(2, 'BOLETO'),
(3, 'DINHEIRO'),
(4, 'DEPÓSITO'),
(5, 'COLÉGIO'),
(6, 'ESCRITÓRIO'),
(7, 'INDEFINIDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `datacadastro`) VALUES
(1, 'Usuário Teste', 'demo', '9765785eb77fdd508031141b84cb6bc4', 'pricosta@gmail.com', 1, 2, '2012-10-03'),
(2, 'Administrador Teste', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'priscila@blushweb.com.br', 2, 1, '2012-10-03'),
(3, 'Advogado', 'adv', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'pricosta@gmail.com', 3, 2, '0000-00-00'),
(4, 'DILSON DIAS CARRIJO', 'dilson', 'dilson', 'dilson@candidomendes.edu.br', 4, 1, '2012-11-12'),
(8, 'Xuxu Teste', 'xuxuteste', '30c8382a2efdb8cd854f6504a1036658', 'pricosta@gmail.com', 4, 1, '2012-11-21'),
(7, 'Xuxu Ribeiro da Costa', 'xuxu', 'b96b03c3d38dac7ad0a0a0df2ddd8c7d', 'pricosta@gmail.com', 4, 1, '2012-11-21'),
(9, 'Teste', 'teste', '81dc9bdb52d04dc20036dbd8313ed055', 'pricosta@gmail.com', 1, 1, '2012-11-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vara`
--

CREATE TABLE IF NOT EXISTS `vara` (
  `id_vara` int(9) NOT NULL AUTO_INCREMENT,
  `nome` varchar(130) NOT NULL,
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id_vara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=272 ;

--
-- Extraindo dados da tabela `vara`
--

INSERT INTO `vara` (`id_vara`, `nome`, `datacadastro`) VALUES
(1, 'INDEFINIDA', '0000-00-00'),
(2, '22ª Vara Civel', '0000-00-00'),
(3, '10ª Vara Cível', '0000-00-00'),
(4, '34ª Vara Cível', '0000-00-00'),
(5, '13ª Vara Cível', '0000-00-00'),
(6, '06ª V.R.C Méier', '0000-00-00'),
(7, '04ª Vara Cível', '0000-00-00'),
(8, '07ª Vara Cível', '0000-00-00'),
(9, '25ª Vara Cível', '0000-00-00'),
(10, '49ª Vara Cível', '0000-00-00'),
(11, '46ª Vara Cível', '0000-00-00'),
(12, '11ª Vara Cível', '0000-00-00'),
(13, '01ª Vara Cível', '0000-00-00'),
(14, '02ª V. C. (Barra)', '0000-00-00'),
(15, '03ª V.C (Alcântara)', '0000-00-00'),
(16, '06ª V.C (Barra)', '0000-00-00'),
(17, '6ª V.R.C (Madureira)', '0000-00-00'),
(18, '3ª V.R.C (Madureira)', '0000-00-00'),
(19, '04ª V.R.C Barra', '0000-00-00'),
(20, '20ª Vara Cível', '0000-00-00'),
(21, '32ª Vara Cível', '0000-00-00'),
(22, '01ª V.R.C Leopoldina', '0000-00-00'),
(23, '1ª V.C Belford Roxo', '0000-00-00'),
(24, '2ª V.C Belford Roxo', '0000-00-00'),
(25, '2ª Vara Cível', '0000-00-00'),
(26, '2 ª V.R.C (Caxias)', '0000-00-00'),
(27, '1 ª V.C  (Caxias)', '0000-00-00'),
(28, '3 ª V.R.C (Caxias)', '0000-00-00'),
(29, '5 ª V.R.C (Caxias)', '0000-00-00'),
(30, '6ª V.R.C Caxias', '0000-00-00'),
(31, '7ª V.R.C Caxias', '0000-00-00'),
(32, '12ª Vara Cível', '0000-00-00'),
(33, '41ª Vara Cível ', '0000-00-00'),
(34, '3ª V.C (São Gonçalo)', '0000-00-00'),
(35, '45ª Vara Cível ', '0000-00-00'),
(36, '16ª Vara Cível ', '0000-00-00'),
(37, '08ª Vara Cível ', '0000-00-00'),
(38, '03ª Vara Cível ', '0000-00-00'),
(39, '02ª Vara Cível ', '0000-00-00'),
(40, '47ª Vara Cível ', '0000-00-00'),
(41, '2ª V.C. São Gonçalo', '0000-00-00'),
(42, '40ª Vara Cível ', '0000-00-00'),
(43, '18ª Vara Cível ', '0000-00-00'),
(44, '31ª Vara Cível ', '0000-00-00'),
(45, '50ª Vara Cível ', '0000-00-00'),
(46, 'XI J. Especial Cível', '0000-00-00'),
(47, '17ª Vara Cível', '0000-00-00'),
(48, '38ª Vara Cível ', '0000-00-00'),
(49, '36ª Vara Cível ', '0000-00-00'),
(50, '21ª Vara Cível', '0000-00-00'),
(51, '06ª V.C. São Gonçalo', '0000-00-00'),
(52, '26ª Vara Cível ', '0000-00-00'),
(53, '23ª Vara Cível', '0000-00-00'),
(54, '5ª V.R.C (Caxias)', '0000-00-00'),
(55, '05ªV.C.(São Gonçalo)', '0000-00-00'),
(56, '30ª Vara Cível ', '0000-00-00'),
(57, '04ª V.C.R. Méier ', '0000-00-00'),
(58, '02ª V.C.R. Alcântara', '0000-00-00'),
(59, '27ª Vara Cível', '0000-00-00'),
(60, '05ª V. C. (Barra)', '0000-00-00'),
(61, '05ª V.C. (Barra)', '0000-00-00'),
(62, '19ª Vara Cível', '0000-00-00'),
(63, '39ª Vara Cível', '0000-00-00'),
(64, '05ª Vara Cível', '0000-00-00'),
(65, '48ª Vara Cível', '0000-00-00'),
(66, '42ª Vara Cível', '0000-00-00'),
(67, '03ª V. C. (Méier)', '0000-00-00'),
(68, '09ª Vara Cível', '0000-00-00'),
(69, '44ª Vara Cível', '0000-00-00'),
(70, '14ª Vara Cível', '0000-00-00'),
(71, '29ª Vara Cível', '0000-00-00'),
(72, '33ª Vara Cível', '0000-00-00'),
(73, '43ª Vara Cível', '0000-00-00'),
(74, '06ª Vara Cível', '0000-00-00'),
(75, '4ª V.R.C (Madureira)', '0000-00-00'),
(76, '4ª V.R.C Leopoldina', '0000-00-00'),
(77, '35ª Vara Cível', '0000-00-00'),
(78, '05ª V.C. (Madureira)', '0000-00-00'),
(80, '01ª V.C. (Madureira)', '0000-00-00'),
(81, '46ª e 47ª V.C.', '0000-00-00'),
(82, '24ª Vara Cível', '0000-00-00'),
(83, '37ª Vara Cível', '0000-00-00'),
(84, 'X JUIZADO CÍVEL', '0000-00-00'),
(85, '03ª V.R.C Leopoldina', '0000-00-00'),
(86, '2ªV.R.C Belford Roxo', '0000-00-00'),
(87, '15ª Vara Cível', '0000-00-00'),
(88, '04ª Vara Regional Cível Leopoldina', '0000-00-00'),
(89, '1ª Vara Regional Cível Méier', '0000-00-00'),
(90, '05ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(91, '2ª V.R (regional Bangú)', '0000-00-00'),
(92, '07ª Vara Regional Cível Barra da Tijuca', '0000-00-00'),
(93, '02ª V.R.C Leopoldina', '0000-00-00'),
(94, '03ª Vara Cível (Barra da Tijuca)', '0000-00-00'),
(95, '3ª V.R.C Madureira', '0000-00-00'),
(96, '01ª Vara Cível (Regional Méier)', '0000-00-00'),
(97, 'IX JEC (Maracanã)', '0000-00-00'),
(98, '02ª V.C Belford Roxo', '0000-00-00'),
(99, '01ª V.C Belford Roxo', '0000-00-00'),
(100, '01ª VC Campo Grande', '0000-00-00'),
(101, 'IV JEC (Catete)', '0000-00-00'),
(102, '03ª Vara Cível (Méier)', '0000-00-00'),
(103, '02ª Vara Cível (Regional Campo Grande)', '0000-00-00'),
(104, '05ª V.R.C Méier', '0000-00-00'),
(105, '7ª Vara Regional Cível Méier', '0000-00-00'),
(106, '2ª Vara Regional cível Méier', '0000-00-00'),
(107, '4 V.R.C Méier', '0000-00-00'),
(108, '05ª Vara Cível (Méier)', '0000-00-00'),
(109, '03ª Vara Cível (Regional Campo Grande)', '0000-00-00'),
(110, '04ª Vara Cível (Campo Grande)', '0000-00-00'),
(111, '1ª V.R.C (Bangu)', '0000-00-00'),
(112, '01ª Vara Cível (Regional Santa Cruz)', '0000-00-00'),
(113, '28ª Vara Cível', '0000-00-00'),
(114, '3ª Vara Cível Regional Madureira', '0000-00-00'),
(115, '1ª V.R.C Bangu', '0000-00-00'),
(116, '2ª Vara Cível Regional Bangu', '0000-00-00'),
(117, '01ª V.R. (Bangu)', '0000-00-00'),
(118, '3ª V.C (Bangu)', '0000-00-00'),
(119, '4ª V.R.C. (Bangu)', '0000-00-00'),
(120, '01ª V.R. (Itaguaí)', '0000-00-00'),
(121, '2ª V.C. (Itaguai)', '0000-00-00'),
(122, '02ª V.R.C. (Santa Cruz)', '0000-00-00'),
(123, '02ª VC (Bangu)', '0000-00-00'),
(124, 'VII JEC', '0000-00-00'),
(125, '07ª Vara Regional Cível do Méier', '0000-00-00'),
(126, '02ª Vara Regional Cível do Méier', '0000-00-00'),
(127, '04ª Vara Cível (Bangu)', '0000-00-00'),
(128, '6ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(129, '03ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(130, '02ª Vara Cível (Regional Madureira)', '0000-00-00'),
(131, '51ª Vara Cível ', '0000-00-00'),
(132, '52ª Vara Cível', '0000-00-00'),
(133, '03ª V.R.C São Gonçalo', '0000-00-00'),
(134, '01ª V.C São Gonçalo', '0000-00-00'),
(135, '13º Júizado Especial Cível', '0000-00-00'),
(136, '04º Juizado Especial Cível', '0000-00-00'),
(137, '09º Juizado Especial Cível', '0000-00-00'),
(138, '23º Juizado Especial Cível ', '0000-00-00'),
(139, '02 º Juízado Especial Cível', '0000-00-00'),
(140, '2 Juizado Especial Cível', '0000-00-00'),
(141, '4ª V C ( São Gonçalo)', '0000-00-00'),
(142, '15º Júizado Especial Cível', '0000-00-00'),
(143, '17º JEC', '0000-00-00'),
(144, '02ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(145, '07ª Vara Cível (Comarca de Duque de Caxias)', '0000-00-00'),
(146, '06ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(147, '01ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(148, '10º Juízado Especial Cível', '0000-00-00'),
(149, '27º Juizado Especia Cívell ', '0000-00-00'),
(150, '01º Juizado Espevil Civel', '0000-00-00'),
(151, '09º Juizado Especil Cível', '0000-00-00'),
(152, '04ª Vara Cível (Niterói)', '0000-00-00'),
(153, '05ª JEC (Copacabana)', '0000-00-00'),
(154, '06ª V.R.C Barra', '0000-00-00'),
(155, '06º JEC Lagoa', '0000-00-00'),
(156, '13ª Juizado Especial Cível', '0000-00-00'),
(157, '18º JEC', '0000-00-00'),
(158, '26º JEC', '0000-00-00'),
(159, '05° Juizado Especial Cível', '0000-00-00'),
(160, '25° Juizado Especial Cível', '0000-00-00'),
(161, '24ª Juizado Especial Cível', '0000-00-00'),
(162, '21º JEC', '0000-00-00'),
(163, 'adriana cristine', '0000-00-00'),
(164, '03ª V.R.C Bangu', '0000-00-00'),
(165, '03ª Juizado Especial Cível', '0000-00-00'),
(166, 'duarte rizzo', '0000-00-00'),
(167, '02ª Vara Cível (São Gonçalo)', '0000-00-00'),
(168, '1º Juizado Especial Cível', '0000-00-00'),
(169, 'dumar', '0000-00-00'),
(170, '01ª Vara Cível ( Barra )', '0000-00-00'),
(171, '07ª vara cível ( São Gonçalo)', '0000-00-00'),
(172, 'márcia regina de oliveira', '0000-00-00'),
(173, '06ª Vara Cível (Madureira)', '0000-00-00'),
(174, '06º JEC', '0000-00-00'),
(175, '11° Juizado Especial Cível', '0000-00-00'),
(176, 'Geisa Carvalho', '0000-00-00'),
(177, '02ª Vara Cível (Itaguaí)', '0000-00-00'),
(178, '04ª V.R.C (Barra da Tijuca)', '0000-00-00'),
(179, '01 Vara Cível (Bangu)', '0000-00-00'),
(180, '01ª Vara Regional Cível Pavuna', '0000-00-00'),
(181, '01ª Vara Cível (Campo Grande)', '0000-00-00'),
(182, '14º JEC', '0000-00-00'),
(183, '3ª Vara Cível (Jacarepaguá)', '0000-00-00'),
(184, '5ª VC (Jacarepaguá)', '0000-00-00'),
(185, '02ª Vara Cível Regional Méier', '0000-00-00'),
(186, '3ª Vara Cível (Madureira)', '0000-00-00'),
(187, 'Calvat', '0000-00-00'),
(188, '1º Juizado Especial Cível (Belford Roxo)', '0000-00-00'),
(189, 'Dantas C.', '0000-00-00'),
(190, '03ª V.C. Madureira', '0000-00-00'),
(191, '01ª V.C Reg. Ilha do Governador', '0000-00-00'),
(192, 'Silvana da silva ', '0000-00-00'),
(193, '05ª Vara Cível (São Gonçalo)', '0000-00-00'),
(194, 'VIII JEC', '0000-00-00'),
(195, '08º Juizado Especial Cível', '0000-00-00'),
(196, 'goldschimidt', '0000-00-00'),
(197, 'Cristiane de Menezes', '0000-00-00'),
(198, 'Ivânia Mathias Gomes', '0000-00-00'),
(199, '01° Juizado Especial Cível (Sâo Gonçalo)', '0000-00-00'),
(200, '02° Juizado Especial Cível (São Gonçalo)', '0000-00-00'),
(201, '07ª Vara Civel  (Méier)', '0000-00-00'),
(202, 'márcia mateus da silva', '0000-00-00'),
(203, 'Extrajudicial', '0000-00-00'),
(204, '03ª Vara Cível da Comarca de Duque de Caxias', '0000-00-00'),
(205, 'IX JEC (Vila Isabel)', '0000-00-00'),
(206, 'Liane', '0000-00-00'),
(207, 'Marc Alexandre Marie', '0000-00-00'),
(208, 'Andréa Machado Correa', '0000-00-00'),
(209, 'Fernando José de Oliveira', '0000-00-00'),
(210, '02º JEC (Capital)', '0000-00-00'),
(211, 'Maria Pinto', '0000-00-00'),
(212, 'jusé henriqur', '0000-00-00'),
(213, '01º JEC (Alcântara)', '0000-00-00'),
(214, 'Loureiro Saldanha', '0000-00-00'),
(215, '02ª Vara Cível (Méier)', '0000-00-00'),
(216, 'Ana Paula', '0000-00-00'),
(217, '02º JEC (Alcântara)', '0000-00-00'),
(218, '07º JEC', '0000-00-00'),
(219, '06ª Vara Cível (Méier)', '0000-00-00'),
(220, '02[ Vara Cível de São João de Meriti', '0000-00-00'),
(221, '15º JEC (Madureira)', '0000-00-00'),
(222, '13º JEC (Méier)', '0000-00-00'),
(223, '01º JEC (São Gonçalo)', '0000-00-00'),
(224, '09º JEC (Vila Isabel)', '0000-00-00'),
(225, '18º JEC (Campo Grande)', '0000-00-00'),
(226, '05º JEC (Copacabana)', '0000-00-00'),
(227, '01º JEC (Belford Roxo)', '0000-00-00'),
(228, '03ª Vara Cível (Madureira)', '0000-00-00'),
(229, '8ªVara Cível São Gonçalo', '0000-00-00'),
(230, '01ª Vara Cível (Belford Roxo)', '0000-00-00'),
(231, 'Crystal Felipe Souza', '0000-00-00'),
(232, '22 JEC', '0000-00-00'),
(233, 'Tatiana Barbosa', '0000-00-00'),
(234, '2ª Vara Cível (Pavuna)', '0000-00-00'),
(235, '03ª Vara Cível (Campo Grande)', '0000-00-00'),
(236, '03ª Vara Cível (Bangu)', '0000-00-00'),
(237, 'Guedes da Silva', '0000-00-00'),
(238, '12ª JEC', '0000-00-00'),
(239, '2ª Vara Civel (Regional da Pavuna)', '0000-00-00'),
(240, '11º JEC (Leopoldina)', '0000-00-00'),
(241, '10º JEC (Leopoldina)', '0000-00-00'),
(242, '04ª Vara Cível (Comarca de São João de Meriti)', '0000-00-00'),
(243, 'Vara Única', '0000-00-00'),
(244, '04ª Vara Cível (Barra da Tijuca)', '0000-00-00'),
(245, '01ª Vara Cível (Barra da Tijuca)', '0000-00-00'),
(246, '02ª Vara Cível (Bangu)', '0000-00-00'),
(247, 'Tavares', '0000-00-00'),
(248, '01ª Vara Cível (São João de Meriti)', '0000-00-00'),
(249, 'Rita de Cássia Rocha', '0000-00-00'),
(250, '02ª Vara Campo (Campo Grande)', '0000-00-00'),
(251, '02ª Vara Cível (Campo Grande)', '0000-00-00'),
(252, '01ª Vara Cível (Leopoldina)', '0000-00-00'),
(253, '04º JEC (Catete)', '0000-00-00'),
(254, '08º JEC (Tijuca)', '0000-00-00'),
(255, '02ª Vara Cível (Santa Cruz)', '0000-00-00'),
(256, '06º JEC (Lagoa)', '0000-00-00'),
(257, '01ª Vara Cível (Santa Cruz)', '0000-00-00'),
(258, 'Ivar Silva de Carvalho', '0000-00-00'),
(259, 'Vera Lúcia Pavão', '0000-00-00'),
(260, '01ª Vara Cível (Bangu)', '0000-00-00'),
(261, '01ª Vara Cível (Méier)', '0000-00-00'),
(262, '12º JEC (Inhaúma)', '0000-00-00'),
(263, 'Sandra Cardoso dos Santos', '0000-00-00'),
(264, 'Carlos Magarinos Bustelo', '0000-00-00'),
(265, '04ª Vara Cível (Leopoldina)', '0000-00-00'),
(266, '01º JEC (Barra da Tijuca)', '0000-00-00'),
(267, '04ª Vara Cível (Duque de Caxias)', '0000-00-00'),
(268, '26º Juizado Especial Cível', '0000-00-00'),
(269, 'Mauricio Marques Ignácio', '0000-00-00'),
(270, '02ª Vara Cível (Barra da Tijuca)', '0000-00-00'),
(271, '03ª Vara Cível (Leopoldina)', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
