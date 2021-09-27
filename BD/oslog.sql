-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Set-2021 às 00:24
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oslog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Masculino', '2021-04-26 00:00:00', NULL),
(2, 'Feminino', '2021-04-26 00:00:00', NULL),
(3, 'Prefiro não dizer', '2021-04-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grau_esc`
--

DROP TABLE IF EXISTS `grau_esc`;
CREATE TABLE IF NOT EXISTS `grau_esc` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grau_esc`
--

INSERT INTO `grau_esc` (`id`, `nome`) VALUES
(1, 'Até 5º Ano Incompleto'),
(2, '5º Ano Completo'),
(3, '6º ao 9º Ano do Fundamental\r\n'),
(4, 'Fundamental Completo'),
(5, 'Médio Incompleto'),
(6, 'Médio Completo'),
(7, 'Superior Incompleto'),
(8, 'Superior Completo'),
(9, 'Mestrado'),
(10, 'Doutorado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

DROP TABLE IF EXISTS `niveis_acessos`;
CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(0, 'Cliente', '2021-04-07 00:00:00', NULL),
(1, 'Administrativo', '2021-04-07 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recover_solicitation`
--

DROP TABLE IF EXISTS `recover_solicitation`;
CREATE TABLE IF NOT EXISTS `recover_solicitation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `rash` varchar(200) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recover_solicitation`
--

INSERT INTO `recover_solicitation` (`id`, `email`, `rash`, `status`) VALUES
(1, 'roninls@sempreceub.com', 'd95a119633c0d2a5e23ad56bada7d305', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL DEFAULT '0',
  `genero_id` int(11) NOT NULL,
  `grau_esc_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `niveis_acesso_id`, `genero_id`, `grau_esc_id`, `created`) VALUES
(1, 'Ronin', 'roninls@sempreceub.com', '$2y$10$LHNDbYoB.SUCJ4YvvlyU8eLDwRqDBu0.cY.EpcATvwXEFLRufRRKe', '(61) 9 8565-2243', 1, 1, 7, '2021-04-27 05:50:38'),
(2, 'Teste2', 'teste2@teste.com', '$2y$10$PkseJ4qGZi2MfWlLK7Q6/.im.3JBR/h.tw0QoXpS5v9ZF2ESgH9P2', '(61) 9 9999-9999', 0, 1, 8, '2021-06-12 19:55:15'),
(3, 'Teste3', 'teste3@teste.com', '$2y$10$NTCLhYpUCX6difeBTcJyauXiwx7eRChhnmrXVZSfakvXYhZaAgIem', '(61) 9 1234-5678', 0, 1, 5, '2021-06-20 01:22:54'),
(4, 'Santana', 'santana@gmail.com', '$2y$10$DIOmqOcNsulJTuwhAv.vMOxsD4Ub5d1bOIBpO8ILvJbzW4WSUe9bS', '(61) 2 2222-2222', 0, 1, 8, '2021-06-28 22:32:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
