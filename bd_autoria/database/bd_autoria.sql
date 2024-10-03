-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/05/2024 às 18:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_autor` int(11) NOT NULL,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`Cod_autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Marco', 'Kinkcher', 'KingKinkcher@autor.com', '1947-09-10'),
(2, 'Alex ', 'Michaelides', 'Michaelides@gmail.com', '1977-12-09'),
(3, 'Matt ', 'Haig', 'Haigmatt@gmail.com', '1975-07-30'),
(4, 'Sally', 'Rooney', 'RooneyS.A@gmail.com', '1991-03-28'),
(5, 'Isabel', 'Allende', 'AllendeI@gmail.com', '1985-10-12'),
(6, 'Clarice ', 'Lima', 'C.Lima@gmail.com', '1920-12-10'),
(7, 'Mora', 'Lopez', 'MoraLopez@gmail.com', '1882-04-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_autor` int(11) NOT NULL,
  `Cod_livro` int(11) NOT NULL,
  `dataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autoria`
--

INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `dataLancamento`, `Editora`) VALUES
(1, 4, '2014-05-08', 'Editora Blues Books'),
(5, 2, '2017-02-16', 'Editora Rock&B.L'),
(2, 2, '2017-02-16', 'Editora Rock&B.L'),
(4, 5, '2015-03-03', 'Editora C.A.P'),
(3, 5, '2015-03-03', 'Editora C.A.P'),
(6, 5, '2015-03-03', 'Editora C.A.P'),
(1, 3, '2019-08-14', 'Editora Vival'),
(7, 3, '2019-08-14', 'Editora Vival');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_livro` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`Cod_livro`, `titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'Uma alma sozinha', 'thriller psicológico', '978-8501116437', 'Português', 364),
(2, 'Meia-Noite', 'Romance', '978-6558380542', 'Português', 308),
(3, 'Menina Bonita', 'Romance, Terror', '978-8581050485', 'Português', 464),
(4, 'Horror History', 'Horror', '978-8581050454', 'Português', 464),
(5, 'Violeta', 'Romance', '978-6558380771', 'Português', 322);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_autor`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_livro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
