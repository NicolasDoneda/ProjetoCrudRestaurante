-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2025 às 19:27
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
-- Banco de dados: `bd_restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pratos`
--

CREATE TABLE `pratos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `descricao`, `preco`, `imagem`) VALUES
(6, 'bebe', 'bebe do bem', 4555.00, '6841cd8ce3f7d_imagem.png'),
(7, 'Macarrao Gostoso', 'Massa al dente envolvida em um molho pesto fresco feito com manjericão, pinhões e azeite extra virgem. Finalizado com queijo parmesão ralado na hora para um toque cremoso e saboroso.', 20.00, '6844f0c4cb657_comida.webp'),
(8, 'Comida gostosa', 'Peito de frango suculento grelhado na brasa, acompanhado de legumes frescos salteados no alho e azeite, temperados com ervas finas para um sabor leve e nutritivo.', 50.00, '6844f3a97cb52_comidagostosa.webp'),
(9, 'Nicolas', 'Massa al dente envolvida em um molho pesto fresco feito com manjericão, pinhões e azeite extra virgem. Finalizado com queijo parmesão ralado na hora para um toque cremoso e saboroso.', 50.00, '6844f3f88647f_comidagostosa.webp'),
(10, 'Nicolas Doneda', 'Massa al dente envolvida em um molho pesto fresco feito com manjericão, pinhões e azeite extra virgem. Finalizado com queijo parmesão ralado na hora para um toque cremoso e saboroso.', 50.00, '6844f40266748_comidagostosa.webp');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` enum('cliente','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(7, 'Nicolas', 'nicolasdoneda231@gmail.com', 'Nagibe123', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
