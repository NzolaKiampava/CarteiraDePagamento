-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2022 às 22:27
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carteira_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pensioner`
--

CREATE TABLE `pensioner` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `id_operador` int(100) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `full_name` varchar(20) DEFAULT NULL,
  `father_name` varchar(20) DEFAULT NULL,
  `mother_name` varchar(20) DEFAULT NULL,
  `bi_number` varchar(50) DEFAULT NULL,
  `residence` text DEFAULT NULL,
  `naturalness` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `bi_emission_date` varchar(100) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `bank_count_number` varchar(100) DEFAULT NULL,
  `bank_iban` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `online` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pensioner`
--

INSERT INTO `pensioner` (`id`, `userid`, `id_operador`, `username`, `email`, `password`, `telefone`, `gender`, `full_name`, `father_name`, `mother_name`, `bi_number`, `residence`, `naturalness`, `province`, `country`, `birthdate`, `civil_status`, `bi_emission_date`, `bank`, `bank_count_number`, `bank_iban`, `date`, `online`) VALUES
(1, 24103, 31202, 'nzola', 'nzolakiampava@gmail.', 'c7pdrtbd', '902 189 903 ', 'Masculino', 'nzola', 'testando', 'Developer Mother', 'asd1233333313131231', 'kilamba kiaxi', 'Luanda', 'luanda', 'Albania', '2021-10-13', 'Casado(a)', '2021-10-04', 'BIC', '343646834665', '42342342342342342342342323232', '2021-10-31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` int(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `gender`, `password`, `date`, `image`, `online`) VALUES
(1, 31202, 'Nzola', 'nzolakiampava@gmail.com', 'Female', 'nzoladeveloper', '2021-07-28 09:22:09', 'uploads/PSSP-243 - user2.jpg', 1),
(2, 41154, 'Kiampava', 'kiampavacompany@gmail.com', 'Female', 'nzoladeveloper', '2021-07-30 11:42:02', 'uploads/PSSP-194 - an.png', NULL),
(3, 31433044, 'Nzola Kiampava', 'everyday@gmail.com', 'Male', '234egf5a', '2021-10-31 10:02:45', '', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pensioner`
--
ALTER TABLE `pensioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`),
  ADD KEY `password` (`password`),
  ADD KEY `gender` (`gender`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `full_name` (`full_name`),
  ADD KEY `father_name` (`father_name`),
  ADD KEY `bi_number` (`bi_number`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pensioner`
--
ALTER TABLE `pensioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
