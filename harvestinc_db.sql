-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/12/2024 às 10:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `title`, `description`, `date`, `rating`) VALUES
(1, 'Site intuitivo!', 'O site é muito bom! Layout intuitivo, rápido e funcional. Só faltam pequenos ajustes para melhorar.', '2024-12-02', 4),
(2, 'Precisa de melhoras!', 'O site possui uma boa estrutura, mas ainda apresenta alguns problemas de navegação e carregamento. Poderia melhorar em termos de desempenho e design.', '2024-11-21', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `dinheiro_disponivel` decimal(10,2) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `planos`
--

INSERT INTO `planos` (`id`, `nome_usuario`, `dinheiro_disponivel`, `plano_id`, `preco`, `ativo`) VALUES
(1, 'adm', 200.00, 3, 99.90, 1),
(2, 'Luis F', 50.00, 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_user` varchar(150) NOT NULL,
  `password_user` varchar(64) NOT NULL,
  `type` enum('User','Administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_user`, `password_user`, `type`) VALUES
(1, 'Nicole Cafalloni', '$2y$10$/bJXY6iNGT0Z4V6MhNEh7uCQa9bTOezF7tS70iEBhL8bB.8aD8BvO', 'Administrador'),
(2, 'Luis F', '$2y$10$9z1PI4R71vhHyA2J7LRPT.PNDkP2vZXO5Dw/jx4r7W3lgt1/TD5ja', 'Administrador'),
(3, 'Jacquys Silva', '$2y$10$/Wiv3owDXs/Vrbe3tocsX.8Mx63t31Zvg4/qDnVIGlxnMVll/aOVG', 'User'),
(4, 'Miguel Sales', '$2y$10$AVx3eX1PhgEawLBNkAKYMeMtZcxNr2QCrnvnqx/8ME/wCbA0EL7d.', 'User'),
(5, 'Victor Koba', '$2y$10$6KjhrsY9lIP0yO3qOGk38e5DuOijEoR79Y/wINnnlUqaIQCpeSJvS', 'User'),
(6, 'adm', '$2y$10$KUnsW.9GLKUMnR3XVBqsD.GjVuI7hyDlOBBl7QPhyURjAyP5ikDje', 'Administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
