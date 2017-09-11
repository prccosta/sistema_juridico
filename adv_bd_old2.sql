--
-- Estrutura da tabela `devedor`
--

CREATE TABLE IF NOT EXISTS `devedor` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `devedor` varchar(70) NOT NULL,
  `aluno` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=48 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `cadastro`) VALUES
(1, 'Usuário Teste', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'pricosta@gmail.com', 1, 1, '2012-10-03 14:50:40'),
(2, 'Administrador Teste', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'priscila@blushweb.com.br', 2, 1, '2012-10-03 14:50:40');

