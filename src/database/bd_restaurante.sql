-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2025 às 19:19
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
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Entrada'),
(2, 'Sobremesa'),
(3, 'Bebida'),
(4, 'Prato Principal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pratos`
--

CREATE TABLE `pratos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(6,2) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `descricao`, `preco`, `id_categoria`, `imagem`) VALUES
(1, 'Macarrao Gostoso', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.', 99.00, NULL, '684c29be2bec4_imagem.png'),
(2, 'Macarrao Gostoso', 'Macarrão artesanal feito com molho de tomate fresco e manjericão, finalizado com queijo parmesão ralado na hora.', 55.00, NULL, '684c2c489d914_imagem.png'),
(3, 'Macarrao Gostoso', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.\r\n\r\n', 55.00, NULL, '684c2cebad919_imagem.png'),
(4, 'Nicolas', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.\r\n\r\n', 55.00, NULL, '684c2cf3e9ba1_imagem.png'),
(5, 'Nicolas', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.\r\n\r\n', 55.00, NULL, '684c2f3dee3e7_imagem.png'),
(6, 'Nicolas', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.\r\n\r\n', 55.00, NULL, '684c37411b217_imagem.png'),
(7, 'Nicolas', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.\r\n\r\n', 55.00, NULL, '684c3c0adc2fa_imagem.png'),
(8, 'Macarrao Gostoso', 'Macarrão cozido al dente, servido com um molho de tomate caseiro preparado com tomates frescos, alho, cebola e ervas aromáticas. Finalizado com um toque de azeite extra virgem e queijo parmesão ralado na hora, oferecendo uma combinação clássica e irresistível de sabores.\r\n\r\n', 55.00, NULL, '684c3d579ebd4_imagem.png'),
(10, 'Arroz com cordeiro', 'Arroz cozido com pedaços de cordeiro, temperado com especiarias como canela, cardamomo e cravo.\r\n\r\n', 45.00, 4, '684c418ccd92a_arroz-cordeiro.webp'),
(11, 'Falafel com de molho tahine', 'Bolinhos fritos de grão-de-bico, geralmente servidos como prato principal em algumas versões.', 35.00, 4, '684c41ca771a4_Falafel-Molho.jpg'),
(12, 'Kafta', 'Carne moída temperada com especiarias, moldada em espetos ou bolinhos, pode ser grelhada ou assada.\r\n\r\n', 37.00, 4, '684c41f147c54_kafta.webp'),
(13, 'Kebab', 'Espetos de carne (bovino, cordeiro, frango) temperada e grelhada.\r\n\r\n', 32.00, 4, '684c421fdec21_kebab.jpg'),
(14, 'Lasagna', 'Camadas de massa, molho bolonhesa (carne e tomate), molho bechamel e queijo gratinado.\r\n\r\n', 35.00, 4, '684c424c7e2f1_lasanha.jpg'),
(15, 'Musakhan ', 'Prato palestino com frango assado temperado com sumac e cebolas, servido sobre pão taboon.\r\n\r\n', 55.00, 4, '684c42b9ef2d7_musakhan.webp'),
(16, 'Osso Buco', 'Tornozelo de vitela cozido lentamente em molho de tomate, vinho e ervas, geralmente servido com risotto ou polenta.\r\n\r\n', 67.00, 4, '684c42e69d66f_Osso Buco.jpg'),
(17, 'Parmigiana di Melanzane', 'Berinjela à parmegiana com camadas de molho de tomate, queijo e manjericão, gratinada no forno.\r\n\r\n', 55.00, 4, '684c430948176_Parmigiana di Melanzane.avif'),
(18, 'Risoto de Lagosta', 'Risoto de lagosta é um prato sofisticado da culinária italiana que combina o arroz arbóreo cremoso, cozido lentamente em caldo de frutos do mar, com pedaços suculentos de lagosta fresca. Geralmente é temperado com alho, cebola, vinho branco, manteiga e queijo parmesão, resultando em uma textura cremosa e sabor delicado, com o toque especial do sabor marcante da lagosta.', 115.00, 4, '684c43943e213_risoto-lagosta.jpg'),
(19, 'Shawarma ', 'Carne assada em fatias finas (geralmente frango ou carne bovina), servida com arroz, pão pita e acompanhamentos.\r\n\r\n', 42.00, 4, '684c43d68eaa5_shawarma.webp'),
(20, 'Spaghetti alla Carbonara', 'Massa spaghetti com molho feito de ovos, queijo pecorino, pancetta (bacon italiano) e pimenta-do-reino.', 50.00, 4, '684c43fa37749_Spaghetti alla Carbonara.webp'),
(21, 'Tagliatelle al Ragù (Bolognese)', 'Massa fresca tipo tagliatelle servida com molho de carne moída, tomate, vinho e temperos.\r\n\r\n', 55.00, 4, '684c44f468118_Tagliatelle al Ragù (Bolognese).webp'),
(22, 'Tagliatelle al Ragù (Bolognese)', 'Massa fresca tipo tagliatelle servida com molho de carne moída, tomate, vinho e temperos.\r\n\r\n', 55.00, 4, '684c66630be89_Tagliatelle al Ragù (Bolognese).webp'),
(23, 'Atay', 'Chá verde com folhas frescas de hortelã, servido quente, muito refrescante e digestivo, tradicional no Magrebe e Oriente Médio.', 15.00, 3, '684c68b42fa56_atay.jpg'),
(24, 'Belinni', 'Um clássico elegante de Veneza. Feito com prosecco (espumante italiano) e purê de pêssego branco fresco. De cor rosada ou alaranjada suave, textura levemente espumante e sabor doce e frutado. É servido em taça flute, com visual delicado e refinado — ótimo para brunch, jantares leves ou ocasiões especiais.', 32.00, 3, '684c68da927d6_bellini.jpg'),
(25, 'Jallab', 'Bebida fria feita com xarope de tâmaras, água de rosas e melaço de uva, servida com gelo e pinoli. Doce, aromática e refrescante.', 16.00, 3, '684c68f77b5b8_jallab.jpg'),
(26, 'Limonada com água de flor de laranjeira', 'Limonada fresca com um toque perfumado de água de flor de laranjeira, que dá um sabor delicado e aromático.', 17.00, 3, '684c696a520d3_Limonada com água de flor de laranjeira.webp'),
(27, 'Negroni', 'Drink clássico com gin, Campari e vermute rosso. Forte, amargo e aromático, servido com gelo.', 39.00, 3, '684c6994bed9d_negroni.jpg'),
(28, 'Aperol Spritz', 'Coquetel refrescante feito com Aperol, prosecco e água com gás. Levemente amargo e cítrico, muito popular no verão italiano.', 31.00, 3, '684c69b75f282_Spritz.jpg'),
(29, 'Baklava', 'Camadas finas de massa filo recheadas com nozes (normalmente pistache ou noz), regadas com calda de mel ou água de flor de laranjeira. Doce, crocante e aromática.', 18.00, 2, '684c6aa4d4bec_baklava.jpeg'),
(30, 'Mamoul', 'Biscoitinhos macios recheados com tâmaras, nozes ou pistache. Comumente polvilhados com açúcar de confeiteiro. Textura amanteigada e sabor delicado.', 15.00, 2, '684c6ac0865d7_mamoul.webp'),
(31, 'Mahalabia', 'Pudim de leite com toque de água de rosas ou flor de laranjeira, finalizado com pistaches picados ou calda leve. Cremoso, suave e floral.', 12.00, 2, '684c6ad308776_Mahalabia.jpg'),
(32, 'Tiramisù', 'Camadas de biscoito embebido em café, creme de mascarpone e cacau em pó. Sobremesa gelada, cremosa e equilibrada entre doce e amargo.', 21.00, 2, '684c6ae96ef80_Tiramisù.jpg'),
(33, 'Panna Cotta', 'Creme cozido à base de leite, creme de leite e baunilha, servido com calda de frutas vermelhas ou caramelo. Leve, gelada e delicada.', 19.99, 2, '684c6b47f04a9_Panna Cotta.webp'),
(34, 'Cannoli Siciliani', 'Casquinha crocante frita recheada com creme de ricota doce, muitas vezes com gotas de chocolate ou frutas cristalizadas.', 17.00, 2, '684c6b1d8deb2_Cannoli Siciliani.webp'),
(35, 'Homus com pão sírio', 'Pasta cremosa de grão-de-bico com tahine (pasta de gergelim), alho, limão e azeite de oliva. Servida com pão sírio levemente tostado.', 18.00, 1, '684c6c2739c5d_homus com pão.avif'),
(36, ' Babaganuche', 'Pasta feita com berinjela assada, tahine, limão e alho. Defumada, suave e servida com pão sírio ou torradas árabes.', 20.00, 1, '684c6c3e9dc80_Babaganuche.jpg'),
(37, 'Quibe cru', 'Mistura de carne bovina moída fresca com trigo para quibe, temperada com hortelã, cebola, azeite e especiarias. Servido frio.', 22.00, 1, '684c6c536d159_Quibe cru.avif'),
(38, 'Bruschetta al Pomodoro', 'Fatias de pão rústico tostado, cobertas com tomate fresco picado, alho, manjericão e azeite de oliva extravirgem. Leve e aromática.', 23.00, 1, '684c6c6bd8674_Bruschetta al Pomodoro.jpg'),
(39, 'Carpaccio de carne', 'Finas fatias de carne bovina crua, temperadas com azeite, limão, parmesão ralado e alcaparras. Entrada fria e sofisticada.', 32.00, 1, '684c6c84731b8_Carpaccio de carne.jpeg'),
(40, 'Arancini', 'Bolinhos fritos de risoto recheados (geralmente com queijo, carne ou molho de tomate), empanados em farinha de rosca. Crocantes por fora, cremosos por dentro.', 25.00, 1, '684c6c9a3209c_Arancini.webp');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` enum('admin','cliente') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(30, 'Nicolas', 'nicolasdoneda231@gmail.com', '$2y$10$Wrp5Oo.Af0DFjkd3Z2nNxumyuHEzzYt0dac12tAbhPgC540Z0Iuby', 'admin'),
(32, 'Carolina Nagibe', 'nicolasdoneda@gmail.com', '$2y$10$r44pF7BIg7C1sevGNk3GaOqk9HUNSpQxJlmta/lnLfolsvrKRlTrm', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `pratos`
--
ALTER TABLE `pratos`
  ADD CONSTRAINT `pratos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
