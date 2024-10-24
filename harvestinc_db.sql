-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2024 às 20:54
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `harvestinc_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_user` varchar(150) NOT NULL,
  `password_user` varchar(64) NOT NULL,
  `type` enum('User','Administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_user`, `password_user`, `type`) VALUES
(1, 'Nicole Cafalloni', '$2y$10$/bJXY6iNGT0Z4V6MhNEh7uCQa9bTOezF7tS70iEBhL8bB.8aD8BvO', 'Administrador'),
(2, 'Luis F', '$2y$10$9z1PI4R71vhHyA2J7LRPT.PNDkP2vZXO5Dw/jx4r7W3lgt1/TD5ja', 'Administrador'),
(3, 'Jacquys Silva', '$2y$10$/Wiv3owDXs/Vrbe3tocsX.8Mx63t31Zvg4/qDnVIGlxnMVll/aOVG', 'User'),
(4, 'Miguel Sales', '$2y$10$AVx3eX1PhgEawLBNkAKYMeMtZcxNr2QCrnvnqx/8ME/wCbA0EL7d.', 'User'),
(5, 'Victor Koba', '$2y$10$6KjhrsY9lIP0yO3qOGk38e5DuOijEoR79Y/wINnnlUqaIQCpeSJvS', 'User');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
