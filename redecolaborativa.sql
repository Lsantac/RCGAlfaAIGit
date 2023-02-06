-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2023 às 21:43
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `redecolaborativa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `id_part_cat` int(11) DEFAULT NULL,
  `id_rede_cat` int(11) DEFAULT NULL,
  `dt_criacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`, `status`, `id_part_cat`, `id_rede_cat`, `dt_criacao`) VALUES
(1, 'Alimentos', 0, NULL, NULL, NULL),
(2, 'Vestuario', 0, NULL, NULL, NULL),
(3, 'Serviços', 0, NULL, NULL, NULL),
(4, 'Educação', 0, NULL, NULL, NULL),
(5, 'Saúde', 0, NULL, NULL, NULL),
(6, 'Permacultura', 0, NULL, NULL, NULL),
(7, 'Artes Cênicas', 0, NULL, NULL, NULL),
(8, 'Social', 0, NULL, NULL, NULL),
(10, 'Radioamadorismo', 0, NULL, NULL, NULL),
(12, 'Ayahuasqueiros', 0, 26, NULL, '2022-02-06'),
(13, 'Fauna', 0, 26, NULL, '2022-05-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `local` text NOT NULL,
  `id_rede` int(11) NOT NULL,
  `data` date NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `id_st_eve` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos_part`
--

CREATE TABLE `eventos_part` (
  `id` int(11) NOT NULL,
  `id_eve` int(11) NOT NULL,
  `id_part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `identidade`
--

CREATE TABLE `identidade` (
  `id` int(11) NOT NULL,
  `nome_ident` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `identidade`
--

INSERT INTO `identidade` (`id`, `nome_ident`, `logo`) VALUES
(1, 'Rede Colaborativa Global', 'logo.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `identidade_imgs`
--

CREATE TABLE `identidade_imgs` (
  `id` int(11) NOT NULL,
  `imagem` text NOT NULL,
  `descr_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `nome_part` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` float(10,7) NOT NULL,
  `longitude` float(10,7) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `markers`
--

INSERT INTO `markers` (`id`, `nome_part`, `endereco`, `latitude`, `longitude`, `type`) VALUES
(1830, 'Luiz Eduardo Castro', 'Rua Luiz Menezes , 111 , Vila Paraiba', -22.8105164, -45.1904182, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers_nec`
--

CREATE TABLE `markers_nec` (
  `id` int(11) NOT NULL,
  `nome_part` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` float(10,7) NOT NULL,
  `longitude` float(10,7) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `markers_nec`
--

INSERT INTO `markers_nec` (`id`, `nome_part`, `endereco`, `latitude`, `longitude`, `type`, `status`) VALUES
(1470, 'Ricardo Geraldo', 'R. Corumbá, 224 - Carlos Prates', -19.9150295, -43.9596977, NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers_of`
--

CREATE TABLE `markers_of` (
  `id` int(11) NOT NULL,
  `nome_part` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` float(10,7) NOT NULL,
  `longitude` float(10,7) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `markers_of`
--

INSERT INTO `markers_of` (`id`, `nome_part`, `endereco`, `latitude`, `longitude`, `type`, `status`) VALUES
(10755, 'Marcelo Shama', 'Rua Luiz Silveira Soares, 108 - Encantada', -28.0606689, -48.6789703, NULL, 4),
(10756, 'Amanda Pereira', 'Rua Irlanda, 20', -16.7167072, -49.3069305, NULL, 3),
(10754, 'Ricardo Geraldo', 'R. Corumbá, 224 - Carlos Prates', -19.9150295, -43.9596977, NULL, 4),
(10753, 'Joao Batista', 'Rua Brasil 104', -22.7455845, -45.1327324, NULL, 3),
(10752, 'Ana Claudia ', 'Rua do Catete, 200', -22.9254646, -43.1766167, NULL, 2),
(10751, 'Amanda Pereira', 'Rua Irlanda, 20', -16.7167072, -49.3069305, NULL, 2),
(10750, 'Marcos da Silva', 'Rua Santa Clara , 100 , Copacabana', -22.9703426, -43.1876640, NULL, 4),
(10749, 'Ana Claudia ', 'Rua do Catete, 200', -22.9254646, -43.1766167, NULL, 3),
(10748, 'Marcelo Shama', 'Rua Luiz Silveira Soares, 108 - Encantada', -28.0606689, -48.6789703, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens_trans`
--

CREATE TABLE `mensagens_trans` (
  `id` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_part_dest` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `of_nec_tr` varchar(3) NOT NULL,
  `canc_conf` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagens_trans`
--

INSERT INTO `mensagens_trans` (`id`, `id_trans`, `id_part`, `id_part_dest`, `mensagem`, `data`, `of_nec_tr`, `canc_conf`) VALUES
(168, 58, 33, 26, 'olá Luiz', '2021-12-08 18:41:00', 'nec', 0),
(169, 59, 24, 26, 'Olá Luiz , é a Amanda, tudo bem?', '2021-12-08 21:08:24', 'nec', 0),
(171, 60, 26, 27, 'Oi Ana', '2021-12-09 15:52:27', 'of', 0),
(172, 58, 26, 33, 'oi', '2021-12-09 15:54:19', 'of', 0),
(173, 61, 26, 5, 'oi João', '2021-12-09 15:55:06', 'of', 0),
(174, 62, 26, 14, 'oi Ricardo', '2021-12-09 16:15:07', 'of', 0),
(175, 63, 26, 14, 'oi Ricardo, ta precisando de ator?', '2021-12-09 16:15:48', 'nec', 0),
(176, 58, 26, 33, 'vamos fechar então.', '2021-12-10 17:59:48', 'of', 0),
(177, 63, 26, 14, 'blz', '2021-12-10 18:05:05', 'nec', 0),
(178, 62, 26, 14, 'está por ai?', '2022-01-11 21:56:16', 'of', 0),
(179, 62, 14, 26, 'vamos finalizar então ok?', '2022-01-22 21:50:21', 'nec', 0),
(180, 64, 26, 38, 'oi Shama vamos trocar feijão por terapia quantica ?', '2022-01-28 21:29:50', 'tr', 0),
(181, 64, 26, 38, 'oi Shama tudo bem?', '2022-02-14 14:31:48', 'tr', 0),
(182, 60, 26, 27, 'oi Ana desculpe, já fechei com um outro amigo. até a proxima.', '2022-02-10 16:25:25', 'of', 0),
(183, 65, 26, 27, 'preciso de um professor bem bacana ! Tem que ser bonzinho!', '2022-02-17 18:25:48', 'of', 0),
(185, 59, 26, 24, 'Tudo bem Amanda! Estou bem!', '2022-02-14 18:59:27', 'of', 0),
(199, 64, 26, 38, 'Cancelamento da confirmação. agora sim!!', '2022-02-18 21:57:04', 'tr', 1),
(200, 64, 26, 38, 'Cancelamento da confirmação. de novo', '2022-02-18 21:59:56', 'tr', 1),
(202, 67, 26, 38, 'vamos trocar feijão por reiki ??', '2022-03-05 23:35:15', 'tr', 0),
(203, 68, 26, 27, 'oi Ana, vamos trocar aulas? heim?', '2022-03-22 13:39:31', 'tr', 0),
(204, 62, 26, 14, 'Ola', '2022-03-22 00:18:53', 'of', 0),
(205, 69, 26, 24, 'olá!', '2022-03-23 18:57:07', 'of', 0),
(206, 66, 26, 38, 'olá Shama', '2022-04-21 16:27:55', 'of', 0),
(207, 66, 26, 38, 'ola de novo meu amigo', '2022-05-30 18:12:14', 'of', 0),
(208, 66, 26, 38, 'Cancelamento da confirmação. por que sim', '2022-05-30 20:33:20', 'of', 1),
(209, 67, 26, 38, 'Cancelamento da confirmação. teste', '2022-05-30 21:46:48', 'tr', 1),
(210, 64, 26, 38, 'Cancelamento da confirmação. sim', '2022-08-09 17:26:35', 'tr', 1),
(211, 69, 26, 24, 'Cancelamento da confirmação. ', '2023-01-31 22:00:16', 'of', 1),
(212, 69, 26, 24, 'Cancelamento da confirmação. ', '2023-01-31 22:35:38', 'of', 1),
(213, 69, 26, 24, 'Mas essa Babá é Permacultora também? Maravilha!! rss', '2023-02-01 21:29:04', 'of', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2023_01_31_124335_create_ratings_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `moedas`
--

CREATE TABLE `moedas` (
  `id` int(11) NOT NULL,
  `desc_moeda` varchar(255) NOT NULL,
  `obs` text NOT NULL,
  `id_part_moeda` int(11) DEFAULT NULL,
  `id_rede_moeda` int(11) DEFAULT NULL,
  `dt_criacao` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `moedas`
--

INSERT INTO `moedas` (`id`, `desc_moeda`, `obs`, `id_part_moeda`, `id_rede_moeda`, `dt_criacao`, `status`) VALUES
(1, 'Troca', '', NULL, NULL, NULL, 0),
(2, 'Doação', '', NULL, NULL, NULL, 0),
(3, 'Moeda A', '', NULL, NULL, NULL, 0),
(4, 'Moeda B', '', NULL, NULL, NULL, 0),
(7, 'Moeda legal', 'essa moeda vai revolucionar o mundo em pouco tempo.', 26, NULL, '2022-02-08', 0),
(8, 'Moeda fantastica', 'incrivel!!', 26, NULL, '2022-03-02', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `moedas_part`
--

CREATE TABLE `moedas_part` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_moeda` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `quant_moeda` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `moedas_part`
--

INSERT INTO `moedas_part` (`id`, `id_part`, `id_moeda`, `id_trans`, `quant_moeda`, `data`) VALUES
(5, 26, 3, 40, 50, '2021-12-03'),
(6, 14, 3, 40, -50, '2021-11-22'),
(7, 26, 3, 58, 100, '2022-01-20'),
(8, 14, 3, 63, 1, '2022-01-24'),
(9, 26, 2, 62, 1, '2022-01-22'),
(10, 14, 2, 62, -1, '2022-01-22'),
(11, 26, 3, 63, -1, '2022-01-24'),
(12, 14, 4, 63, 1, '2022-01-24'),
(13, 26, 4, 63, -1, '2022-01-24'),
(14, 26, 3, 66, 100, '2023-02-03'),
(15, 38, 3, 66, -100, '2023-02-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `necessidades`
--

CREATE TABLE `necessidades` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_unid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `necessidades`
--

INSERT INTO `necessidades` (`id`, `descricao`, `status`, `id_cat`, `id_unid`) VALUES
(1, 'Profissional de Cozinha', 1, 1, 4),
(2, 'Arquiteto', 1, 3, 4),
(3, 'Programador de Software', 1, 3, 4),
(4, 'Permacultor', 1, 3, 4),
(5, 'Professora Waldorf', 1, 4, 4),
(6, 'Ator', 1, 7, 4),
(7, 'Musico', 1, 7, 4),
(8, 'Comida solidaria', 1, 1, 1),
(9, 'Terapia quantica', 1, 5, 3),
(10, 'Animais Fantásticos', 1, 13, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `necessidades_part`
--

CREATE TABLE `necessidades_part` (
  `id` int(11) NOT NULL,
  `id_nec` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_rede` int(11) NOT NULL DEFAULT 0,
  `data` date NOT NULL,
  `quant` float NOT NULL,
  `obs` text NOT NULL,
  `ranking` int(11) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `necessidades_part`
--

INSERT INTO `necessidades_part` (`id`, `id_nec`, `id_part`, `id_rede`, `data`, `quant`, `obs`, `ranking`, `imagem`, `status`) VALUES
(1, 1, 33, 0, '2021-08-05', 5, 'Necessito de pessoas com aptidões em culinaria, chefes de cozinha, doceiras, pizzaiolos,comida árabe.', NULL, NULL, 2),
(2, 2, 26, 0, '2021-08-16', 1, 'Bioconstrutor para fazer casas de adobe.', NULL, '2_1646333534.jpg', 1),
(3, 3, 14, 0, '2021-08-19', 1, 'Desenvolvedor de sistemas de banco de dados.', NULL, NULL, 2),
(4, 1, 27, 0, '2021-08-23', 1, 'Preciso de cozinheiro vegano com urgencia.', NULL, NULL, 2),
(5, 4, 24, 0, '2021-08-23', 1, 'Preciso de um profissional de permacultura para criar um sitio ecologico para futuramente virar uma ecovila.', NULL, NULL, 3),
(6, 5, 27, 0, '2021-09-07', 1, 'Jardineira Waldorf trabalho de manhã na escola Jardim Michaelis, Rio de Janeiro.', NULL, NULL, 2),
(7, 6, 26, 0, '2021-09-15', 1, 'Preciso de um ator para um filme que estou fazendo sobre ecovilas.', NULL, '6_1646332030.jpg', 4),
(8, 7, 5, 0, '2021-11-24', 5, 'Preciso de musicos para montar uma banda. Guitarrista, baterista, vocalista, tecladista e arranjador.', NULL, NULL, 3),
(9, 8, 26, 0, '2022-03-03', 10, 'comida organica, vegetariana. muito gostosa.', NULL, '8_1646332608.jpg', 0),
(10, 9, 38, 0, '2022-03-05', 10, 'grupo para desenvolver curso', NULL, '9.jpg', 3),
(11, 10, 26, 11, '2022-05-18', 1, 'Precisa-se de um Pegasus para completar 12 trabalhos de Hercules. Pode ser femea também.', NULL, '10_26_1652900629.jpg', 0),
(12, 9, 26, 10, '2022-09-10', 1, 'tecnica com bolha de cura com luz azul', NULL, '9_26_1662842139.jpg', 0),
(13, 3, 26, 0, '2022-09-13', 2, 'preciso de programadores de PHP/Laravel/HTML/CSS/JavaScript', NULL, '3_26_1663077714.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id_cat` int(11) NOT NULL,
  `id_unid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ofertas`
--

INSERT INTO `ofertas` (`id`, `descricao`, `status`, `id_cat`, `id_unid`) VALUES
(1, 'Cozinheiro', 1, 1, 4),
(2, 'Professor', 1, 4, 4),
(3, 'Artesão', 1, 2, 4),
(4, 'Programador', 1, 3, 4),
(5, 'Reiki', 1, 5, 3),
(6, 'Advogada', 1, 3, 4),
(7, 'Arquiteto', 1, 3, 4),
(8, 'Babá', 1, 3, 4),
(9, 'Feijão', 1, 1, 1),
(10, 'Instrutora de Shantala', 1, 3, 3),
(11, 'Ator', 1, 7, 4),
(12, 'Companhia', 1, 8, 3),
(13, 'Terapia quantica', 1, 5, 3),
(15, 'Casa de bioconstrução', 1, 6, 4),
(16, 'Terras para ecovilas', 1, 6, 11),
(17, 'Medicinas da Floresta', 1, 12, 10),
(18, 'Musico', 1, 7, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ofertas_part`
--

CREATE TABLE `ofertas_part` (
  `id` int(11) NOT NULL,
  `id_of` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_rede` int(11) NOT NULL DEFAULT 0,
  `data` date NOT NULL,
  `quant` float NOT NULL,
  `obs` text NOT NULL,
  `ranking` int(11) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ofertas_part`
--

INSERT INTO `ofertas_part` (`id`, `id_of`, `id_part`, `id_rede`, `data`, `quant`, `obs`, `ranking`, `imagem`, `status`) VALUES
(3, 4, 26, 0, '2021-07-29', 1, 'Analista de Sistemas php', 1, '', 0),
(5, 5, 26, 0, '2021-07-29', 1, 'Aplicação de Reiki a distancia.', 1, '', 0),
(6, 3, 26, 0, '2021-07-27', 5, 'sapateiro', 0, '3_26_1652899973.jpg', 1),
(7, 2, 26, 0, '2021-08-04', 2, 'Aulas de Pintura e artes em geral.', 0, NULL, 3),
(8, 6, 24, 0, '2021-08-04', 1, 'Psicologia infantil', 0, NULL, 1),
(9, 7, 33, 0, '2021-08-13', 1, 'Bioconstrutor capacitado em inumeras tecnicas como : Adobe, Pau-a-pique , Super-Adobe, Bambu, entre outros.', NULL, NULL, 0),
(10, 1, 26, 0, '2021-08-23', 1, 'Cozinha vegetariana e vegana. Sou bom mesmo. :-)', NULL, NULL, 0),
(11, 10, 27, 0, '2021-09-07', 1, 'Aulas de Shantala para gestantes. Horario a combinar.', NULL, NULL, 3),
(12, 11, 14, 0, '2021-09-15', 1, 'Sou ator de Hollywood famoso e bem requisitado. Ofereço meus talentos para filmes sobre regeneração global.', NULL, '11_1647973638.jpg', 4),
(13, 12, 26, 0, '2021-09-15', 2, 'ofereço companhia para bate papos e passeios, para quem se sentir solitário e quiser compartilhar suas experiencias de vida. Horario a combinar.\r\nGosto de ir ao teatro e criar peças.', NULL, '12_26_1663015464.jpg', 3),
(14, 9, 26, 11, '2021-10-01', 2, 'tenho dois kilos de feijão para doar.', NULL, '9_1647635444.jpg', 3),
(15, 7, 26, 0, '2021-10-01', 1, 'faço casas bem legais', NULL, '7_1646403021.jpg', 2),
(16, 13, 38, 0, '2021-10-27', 1, 'é muito bom', NULL, '13_1646511808.jpg', 3),
(17, 7, 38, 0, '2021-10-27', 1, 'permacultor quantico', NULL, '7_1647636775.jpg', 3),
(20, 13, 26, 0, '2022-03-02', 1, 'terapia permacultural', NULL, '13_1646315419.jpg', 4),
(21, 8, 26, 0, '2022-03-02', 2, 'gosto de bebês e de cães e gatos.', NULL, '8_1648141614.jpg', 3),
(22, 15, 26, 0, '2022-03-03', 1, 'Casa em otimo estado num lugar maravilhoso na mata atlantica e totalmente sustentável.', NULL, '15_1646333417.jpg', 1),
(23, 12, 26, 0, '2022-04-12', 1, 'Companhia para conversar sobre espiritualidade.', NULL, '12.jpg', 0),
(24, 3, 26, 0, '2022-04-21', 1, 'Faço sapatos de couro.', NULL, '3_26_1653418481.jpg', 0),
(25, 16, 26, 0, '2022-05-17', 1000, 'Terras com florestas, rios e cachoeiras maravilhosas.', NULL, '16.jpg', 0),
(26, 16, 26, 10, '2022-05-17', 500, 'ecovilas em Matchu Picchu', NULL, '16_26_1652899916.jpg', 0),
(27, 17, 26, 8, '2022-05-18', 1, 'Um litro de ayahuasca Estrela 7x1.', NULL, '17_26_1652900169.jpg', 0),
(28, 10, 40, 10, '2022-05-31', 1, 'Aulas para gestantes', NULL, '10_40_1663268671.jpeg', 0),
(29, 13, 26, 10, '2022-09-09', 2, 'simbolos quanticos para cura de outra galaxia. Ahow', NULL, '13_26_1672856467.jpg', 0),
(30, 18, 26, 0, '2022-09-13', 1, 'sou violonista reconhecido mundialmente!!', NULL, '18_26_1672856446.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `nome_part` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `latitude` float(10,7) DEFAULT NULL,
  `longitude` float(10,7) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `ranking` bigint(20) NOT NULL,
  `id_tipo_acesso` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`id`, `nome_part`, `endereco`, `cidade`, `cep`, `estado`, `pais`, `email`, `senha`, `imagem`, `latitude`, `longitude`, `timezone`, `ranking`, `id_tipo_acesso`, `created_at`, `updated_at`) VALUES
(2, 'Ana Aparecida', 'Rua Vonluntario da Patria, 40', 'Rio de Janeiro', '22270-900', 'RJ', 'Narnia', 'ana_aparecida@gmail.com', '54321', '', -22.9499607, -43.1834526, NULL, 0, NULL, '2021-05-01 21:53:54', '2021-05-10 19:13:21'),
(3, 'Laura Abissamara', 'Praia do Flamengo 12', 'Rio de Janeiro', '22210-030', 'RJ', 'Brasil', 'laura@gmail.com', '$2y$10$ET5a6oxCnYNu0NHLV7O05uxD1lcDnBLNpsht6543Qg2l81KS9lhFq', '', -22.9248714, -43.1730957, NULL, 0, NULL, '2021-05-02 00:21:27', '2021-05-21 01:56:38'),
(5, 'Joao Batista', 'Rua Brasil 104', 'Lorena', '12608-400', 'SP', 'Brasil', 'fulano@gmail.com', '$2y$10$qr.4BFbpP.6Y8EQUSj30ruKfApb1Rog0P9KmCqOEwf478mCpM2nX2', 'Joao Batista_1637759842.jpg', -22.7455845, -45.1327324, NULL, 0, NULL, '2021-05-08 21:29:30', '2021-11-24 16:17:22'),
(6, 'Manoel Audaz', 'R. Antônio José Filho, 136 - Vila Isabel', 'Três Rios', '25811-180', 'RJ', 'Brasil', 'manoel@gmail.com', '', '', -22.1055679, -43.1898193, NULL, 0, NULL, '2021-05-15 23:14:11', '2021-05-16 00:03:15'),
(7, 'Marcelo ', 'Rua Santo Dumont, 305', 'Resende', '12500', 'RJ', 'Brasil', 'marcelo@gmail.com', '123457890', '', -22.4755020, -44.4638138, NULL, 0, NULL, '2021-05-16 00:01:56', '2021-05-25 22:16:02'),
(12, 'Joaquim Visconde', 'R. Oliveira Rocha, 28 - Jardim Botânico', 'Rio de Janeiro', '22461-070', 'RJ', 'Brasil', 'joaquim@gmail.com', '', '', -22.9616661, -43.2162437, NULL, 0, NULL, '2021-05-17 20:56:32', '2021-05-17 21:24:53'),
(14, 'Ricardo Geraldo', 'R. Corumbá, 224 - Carlos Prates', 'Belo Horizonte', '30710-280', 'MG', 'Brasil', 'Ricardo@gmail.com', '$2y$10$zHe1uQDUzY7ccT.QcWx12e0QG0GRTt/VN72Iv3IwmdgkXwk.h2Ljm', 'John Cool_1631045109.jpg', -19.9150295, -43.9596977, NULL, 0, NULL, '2021-05-26 17:24:06', '2021-09-15 17:09:50'),
(16, 'Tatiana Silva', 'Rua Almeida Godinho, Lagoa, 1000 ', 'Rio de Janeiro', '22471-140', 'RJ', 'Brasil', 'tatiana@gmail.com', '$2y$10$V.xOOrc/.AHNsNs1urUK1eJeK3gZchsWOtch/D2Q1IxS8Sur6/nta', '', -22.9663811, -43.2026558, NULL, 0, NULL, '2021-05-26 17:34:13', '2021-05-26 17:34:13'),
(22, 'Gustavo Alfredo', 'Rua Coronel Moreira Cesar 30,Icarai', 'Niteroi', '24230-060', 'RJ', 'Brasil', 'gustavo@gmail.com', '$2y$10$BLjpzKmMfZbU24VD.sRVxOV.KSDqXOKUxVD6MfkATv.uMO7o6GUSK', '', -22.9104176, -43.1069756, NULL, 0, NULL, '2021-05-28 21:50:25', '2021-05-28 21:50:25'),
(24, 'Amanda Pereira', 'Rua Irlanda, 20', 'Goiania', '68552', 'GO', 'Brasil', 'amandinha@gmail.com', '$2y$10$rOMseaROi3kuX1UQ2E1RXunH4dCls1piOvN7Cw2Y80izyjB12Rzg2', 'Amanda Pereira_1638986834.jpg', -16.7167072, -49.3069305, NULL, 0, NULL, '2021-05-29 21:54:05', '2021-12-08 21:07:14'),
(25, 'Bianca', 'Rua Pouso Alto', 'Itamonte', '37466-000', 'MG', 'Brasil', 'bianca@gmail.com', '$2y$10$i8FOjrwGkofaysz0OhBdPeOhZeX.CJjHmISuiiWzTRE6aTb2Yq6Ui', NULL, -22.2761383, -44.8721161, NULL, 0, NULL, '2021-05-29 22:01:41', '2021-05-29 22:01:41'),
(26, 'Luiz Eduardo Castro', 'Rua Luiz Menezes , 111 , Vila Paraiba', 'Guaratinguetá - Vila Paraiba', '12500', 'SP', 'Brasil', 'Lsantac@gmail.com', '$2y$10$sgwS6n/oR0wEp1gh/sUxPe9ntudguDyHgi/fnQEjqT8V5igsWMZ6e', 'Luiz Eduardo Castro_1648060370.jpg', -22.8105164, -45.1904182, NULL, 0, 1, '2021-06-01 01:29:36', '2022-03-23 21:32:50'),
(27, 'Ana Claudia ', 'Rua do Catete, 200', 'Rio de Janeiro', '22220-000', 'RJ', 'Brasil', 'anaclaudia@gmail.com', '$2y$10$u2.FJ0y3LRAImEWGSc7xQe1a32Ac.VA1Mj4cEOKZMnd4hDdZA904a', 'Ana Claudia_1623160847.JPG', -22.9254646, -43.1766167, NULL, 0, NULL, '2021-06-02 01:11:04', '2021-06-08 17:00:47'),
(28, 'Pedro Augusto', 'Rua Augusta, 129', 'São Paulo', '01305-900', 'AM', 'Brasil', 'pedro@gmail.com', '$2y$10$Q9u6J7oANAT3BD3jBsxzWOubBNbikXvNHK4VKZ8t3eINNxMpdlP.W', '', -23.5505238, -46.6473541, NULL, 0, NULL, '2021-06-04 21:48:47', '2021-06-04 21:48:47'),
(29, 'Luiz Augusto', 'R. Maj. Carvalho, 115 - Várzea', 'Teresopolis', '25953-460', 'RJ', 'Brasil', 'augusto@gmail.com', '$2y$10$uGE7QIDlRgsk1IjlDO7iyO9U55JMUJMHrKmp3Ai2cPvsxxFVMhmmq', '', -22.4152031, -42.9689827, NULL, 0, NULL, '2021-06-04 22:46:33', '2021-06-06 01:18:19'),
(32, 'Patricia Aline', 'Av. do Canal, 14 - Centro', 'Marica', '24900-970', 'SP', 'Brasil', 'jukikuki@gmail.com', '$2y$10$ZaODjV9k8DgOLv4tGgvwHuhy1c8X0KfVgGAwxDLjA7aFZ6csE7c0K', 'Juki Kuki da floresta_1624053736.jpg', -22.9096279, -42.8179398, NULL, 0, NULL, '2021-06-19 00:59:48', '2021-06-19 01:02:16'),
(33, 'Marcos da Silva', 'Rua Santa Clara , 100 , Copacabana', 'Rio de Janeiro', '12500', 'AM', 'Brasil', 'marcos@gmail.com', '$2y$10$fyRanOdcvcJQLvTz6v8/5.pGEPRU.Q8uop92X.3L7JYDOmCQNjB7O', 'Marcos da Silva_1628865127.jpg', -22.9703426, -43.1876640, NULL, 0, NULL, '2021-08-05 16:57:21', '2021-09-01 22:28:00'),
(34, 'Paulo Lima', 'Av Cleo Bernardes', 'Santarém', '68005-970', 'PA', 'Brasil', 'paulolima@gmail.com', '$2y$10$byvBcMp6okSBzqwhLqmCeOqbW4jKgPIQrzY1DM9rqAiyt8u2jyTqm', NULL, -2.4424975, -54.7033043, NULL, 0, NULL, '2021-09-07 23:14:18', '2021-09-07 23:39:34'),
(35, 'João da Silva', 'Av Nossa Senhora de Copacabana, 1000 , Copacabana', 'Rio de Janeiro', '21000', 'RJ', 'Brasil', 'joaodasilva@gmail.com', '$2y$10$W/EMGsDS8ZFgMVaKbDH93u17qS.mngZkKWWw3V7lR.xsQYh35P89S', 'João da Silva_1635273324.jpg', -22.9770336, -43.1906853, NULL, 0, NULL, '2021-10-26 21:27:55', '2021-10-26 21:35:24'),
(38, 'Marcelo Shama', 'Rua Luiz Silveira Soares, 108 - Encantada', 'Garopaba', '88495-000', 'SC', 'Brasil', 'marceloshama@gmail.com', '$2y$10$vicG.yStiLkiMf97gCdV.OEuaq9a2AlnPjCvB0rollBVaUupfh6lW', 'Marcelo Shama_1635348782.jpg', -28.0606689, -48.6789703, NULL, 0, NULL, '2021-10-27 18:32:34', '2021-10-27 18:33:02'),
(39, 'Pedro de Alcantara', 'Quinta da Boa Vista, São Cristovão', 'Rio de Janeiro', '22210-999', 'RJ', 'Brasil', 'pedrodealcantara@gmail.com', '$2y$10$xzgRxhiroVg6QIV650X4TeKRNh4MWMF9aNlCB7yfxltQki2TFsWSC', 'Pedro de Alcantara_1644872371.png', -22.9051933, -43.2217865, NULL, 0, NULL, '2022-02-14 23:59:31', '2022-02-14 23:59:31'),
(40, 'Clarice da Silva', 'Botafogo', 'Rio de Janeiro', '22210180', 'RJ', 'Brasil', 'clarice@gmail.com', '$2y$10$UCV.pU1KNJZVRJHmc7ZxL.wMlF/StOwQyPrLEGS8668/iXys8zcD2', 'Clarice da Silva_1663268536.jpg', -22.9511929, -43.1807823, NULL, 0, NULL, '2022-03-22 02:58:19', '2022-09-15 22:02:16'),
(41, 'Amigo das Estrelas', 'Rua principal', 'Alto Paraiso', '88495-000', 'GO', 'Brasil', 'starfriend@gmail.com', '$2y$10$RUolVJi0NXxOk/Q2xnd.v.WSehd6ATR/7TZbg3iUZDqJ/62c7NsLu', 'Amigo das Estrelas_1649251273.jpg', -14.1340199, -47.5139809, NULL, 0, NULL, '2022-04-06 16:21:13', '2022-04-06 16:22:59'),
(42, 'João das Estrelas', 'Rua das Flores.', 'Ipatinga', '35160', 'MG', 'Brasil', 'joao_estrela@gmail.com', '$2y$10$/SP0qVUh6WqTnl4BCDCxOOQloBTVLllnyZZRFn8N6y2K7SmW72pYS', 'João das Estrelas_1650642594.jpg', -19.4631901, -42.5592804, NULL, 0, NULL, '2022-04-22 18:49:11', '2022-04-22 18:49:54'),
(43, 'Maga da Floresta', 'Rua da Floresta', 'Ibitipoca', '36140-000', 'MG', 'Brasil', 'maga@gmail.com', '$2y$10$WuFQVxi85IlP9XcIBYsdTOklowb.HfUXYBu/10G5mOmpo/jPDcY06', 'Maga da Floresta_1653052545.jpg', -21.7189445, -43.9252167, NULL, 0, NULL, '2022-05-20 16:06:59', '2022-05-20 16:15:45'),
(44, 'Michael Arcanjo', 'Rua dos anjos 999', 'Alto Paraiso', '76862-000', 'GO', 'Brasil', 'michael@gmail.com', '$2y$10$zmY6WRAOSVHvOUFhUrsNZeqp/fhLfUKmP.FRgSoHBHGCZl2ASN4c6', NULL, -14.2350044, -51.9252815, NULL, 0, NULL, '2022-05-20 16:46:48', '2022-05-20 16:46:48'),
(45, 'Pedro Segundo', 'Quinta da Boa Vista', 'Rio de Janeiro', '20940-040', 'RJ', 'Brasil', 'pedro_2@gmail.com', '$2y$10$t3CKyMZpGGZ7Yd1kNLReCurFtCYBzi/uCLYVI8kGV8I7XXJ.ViiSO', 'Pedro Segundo_1653056312.png', -22.9051933, -43.2217865, NULL, 0, 1, '2022-05-20 17:18:32', '2022-05-20 17:18:32'),
(46, 'Lara Kraft', 'Rua Augusta 456', 'São Paulo', '01305-000', 'SP', 'Brasil', 'lara@gmail.com', '$2y$10$tJD2SbUNKktLiOMM9HCjne6fVBKrQQR29byIzGqwVZ9Gb5BvlxtU2', 'Lara Kraft_1653056520.jpg', -23.5511971, -46.6504517, NULL, 0, 1, '2022-05-20 17:22:00', '2022-05-20 17:22:00'),
(47, 'Mackena Dantaz', 'Estrada Dr. Casemiro 8', 'Embu Gauçu', '06925680', 'SP', 'Brasil', 'collab.redecolaborativa@gmail.com', '$2y$10$FYZt2go9UEML627oNjBiueZQMhPh7bLqiyn9whOzeQ.OPwnrteSzG', 'Mackena Dantaz_1673526190.jpg', -23.6498089, -46.8532791, NULL, 0, 1, '2023-01-12 14:55:35', '2023-01-12 15:23:10'),
(48, 'Allamo Farias de Oliveira', 'Rua Erico Verissimo, 3397', 'Natal', '59065460', 'RN', 'Brasil', 'allamofarias@hotmail.com', '$2y$10$4HeMCnIzDuGGJLEnUKC3IOo/sxW/GBwNj6qeKAv7gRA/0l.3FTvI.', NULL, -5.8353839, -35.2209625, NULL, 0, 1, '2023-01-12 17:58:14', '2023-01-12 17:58:14'),
(49, 'adriano assante', 'ramos ferreira 1117', 'manaus', '69010120', 'AM', 'brasil', 'adriano50assante@gmail.com', '$2y$10$tMRF6M2OIijuX.pOLpZ65.osjMk/abaIRvw9vaFio.umrANs4/BM2', 'adriano assante_1674496799.png', -3.1278131, -60.0218468, NULL, 0, 1, '2023-01-23 21:00:00', '2023-01-23 21:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `descricao` int(11) NOT NULL,
  `id_rede` int(11) NOT NULL,
  `id_st_proj` int(11) NOT NULL,
  `dt_inic` date NOT NULL,
  `dt_fim` date NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos_part`
--

CREATE TABLE `projetos_part` (
  `id` int(11) NOT NULL,
  `id_proj` int(11) NOT NULL,
  `id_part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ratings`
--

INSERT INTO `ratings` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pessimo', NULL, NULL),
(2, 'Ruim', NULL, NULL),
(3, 'Regular', NULL, NULL),
(4, 'Bom', NULL, NULL),
(5, 'Otimo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes`
--

CREATE TABLE `redes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `id_part_inic` int(11) NOT NULL,
  `data_inic` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `redes`
--

INSERT INTO `redes` (`id`, `nome`, `descricao`, `imagem`, `id_part_inic`, `data_inic`) VALUES
(2, 'PermaEco', 'Assuntos ligados a Permacultura e Ecovilas.', '', 26, '2021-08-02'),
(5, 'AstroUfo', 'Pesquisadores sobre o tema ufologia e astronomia.', '', 26, '2021-01-26'),
(6, 'Professores', 'Pessoas com interesse em ensinar outras pessoas sobre os misterios da vida e do universo. ', '', 26, '2021-06-15'),
(7, 'Ufonet', 'grupo ufologico', '', 24, '2021-06-15'),
(8, 'Xamanicos', 'Pessoas com interesse em xamanismo e medicinas da floresta.', '', 27, '2021-08-11'),
(9, 'Antroposoficos', 'Pessoas com interesse em estudar antroposofia e assuntos ligados a Rudolf Steiner.', '', 25, '2021-08-01'),
(10, 'Alternativos', 'Turma do Arco-Iris.', NULL, 26, '2021-08-15'),
(11, 'Daimistas', 'Turma do Santo Daime', NULL, 26, '2021-07-19'),
(14, 'Novos Organicos', 'Rede de novos produtores organicos.', NULL, 26, '2022-09-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `redesparts`
--

CREATE TABLE `redesparts` (
  `id` int(11) NOT NULL,
  `id_rede` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `redesparts`
--

INSERT INTO `redesparts` (`id`, `id_rede`, `id_part`, `admin`) VALUES
(1, 2, 2, 0),
(2, 2, 3, 0),
(3, 2, 29, 0),
(4, 5, 29, 0),
(5, 6, 29, 0),
(8, 2, 26, 0),
(10, 6, 3, 0),
(13, 7, 29, 0),
(14, 8, 26, 0),
(15, 5, 32, 0),
(17, 10, 27, 0),
(18, 6, 27, 0),
(19, 9, 27, 0),
(20, 2, 27, 0),
(21, 10, 26, 0),
(22, 8, 24, 0),
(23, 5, 33, 0),
(24, 11, 26, 0),
(25, 10, 40, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_eve`
--

CREATE TABLE `status_eve` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_proj`
--

CREATE TABLE `status_proj` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_trans`
--

CREATE TABLE `status_trans` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status_trans`
--

INSERT INTO `status_trans` (`id`, `descricao`) VALUES
(5, 'Cancelada'),
(2, 'Em andamento'),
(3, 'Finalizada parcialmente'),
(4, 'Finalizada totalmente'),
(1, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_acessos`
--

CREATE TABLE `tipos_acessos` (
  `id` int(11) NOT NULL,
  `desc_tipo_acesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_acessos`
--

INSERT INTO `tipos_acessos` (`id`, `desc_tipo_acesso`) VALUES
(1, 'admin'),
(2, 'participante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `id` int(11) NOT NULL,
  `id_nec_part` int(11) NOT NULL DEFAULT 0,
  `id_of_part` int(11) NOT NULL DEFAULT 0,
  `id_of_tr_part` int(11) NOT NULL DEFAULT 0,
  `id_st_trans` int(11) NOT NULL DEFAULT 0,
  `quant_moeda` float DEFAULT 0,
  `id_moeda` int(11) DEFAULT NULL,
  `quant_of` float DEFAULT NULL,
  `quant_of_tr` float DEFAULT NULL,
  `quant_nec` float DEFAULT NULL,
  `data_inic` datetime NOT NULL,
  `data_final_nec_part` datetime DEFAULT NULL,
  `data_final_of_part` datetime DEFAULT NULL,
  `data_final_of_tr_part` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`id`, `id_nec_part`, `id_of_part`, `id_of_tr_part`, `id_st_trans`, `quant_moeda`, `id_moeda`, `quant_of`, `quant_of_tr`, `quant_nec`, `data_inic`, `data_final_nec_part`, `data_final_of_part`, `data_final_of_tr_part`) VALUES
(58, 1, 14, 0, 4, 100, 3, 2, 0, 2, '2021-12-08 15:41:00', '2022-01-20 18:19:12', '2022-01-20 18:21:25', NULL),
(59, 5, 15, 0, 2, 0, NULL, 0, 0, 0, '2021-12-08 18:08:24', NULL, NULL, NULL),
(60, 4, 14, 0, 2, 0, NULL, 0, 0, 0, '2021-12-09 12:52:27', NULL, NULL, NULL),
(61, 8, 13, 0, 3, 1, 2, 2, 0, 0, '2021-12-09 12:55:06', NULL, '2022-02-12 21:31:52', NULL),
(62, 3, 15, 0, 4, 1, 2, 1, 0, 1, '2021-12-09 13:15:07', '2022-01-22 18:49:46', '2022-01-22 18:48:13', NULL),
(63, 7, 12, 0, 4, 1, 4, 1, 0, 1, '2021-12-09 13:15:48', '2022-01-24 22:50:40', '2022-01-22 18:57:11', NULL),
(64, 0, 16, 14, 2, 1, 1, 1, 1, 0, '2022-01-28 18:29:50', NULL, NULL, NULL),
(65, 6, 7, 0, 2, 0, NULL, 0, 0, 0, '2022-02-11 20:49:43', NULL, NULL, NULL),
(66, 10, 20, 0, 4, 100, 3, 1, 0, 1, '2022-03-05 18:57:28', '2023-02-03 14:14:50', '2023-02-03 13:56:48', NULL),
(67, 0, 17, 14, 2, 1, 1, 0, 1, 0, '2022-03-05 20:35:15', NULL, NULL, NULL),
(68, 0, 11, 7, 3, 1, 1, 0, 1, 0, '2022-03-05 20:50:13', NULL, NULL, '2023-02-03 19:36:33'),
(69, 5, 21, 0, 3, 1, 2, 1, 0, 0, '2022-03-23 15:57:07', NULL, '2023-02-02 20:36:49', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transaction_ratings`
--

CREATE TABLE `transaction_ratings` (
  `id` int(10) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL,
  `obs_rating` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transaction_ratings`
--

INSERT INTO `transaction_ratings` (`id`, `id_part`, `id_trans`, `id_rating`, `obs_rating`, `created_at`, `updated_at`) VALUES
(3, 26, 69, 4, 'Foi tudo feito com transparencia e rapidez. Esse sistema é muito bom. Que todos usem cada vez mais!!', '2023-02-02 21:33:07', '2023-02-02 23:36:49'),
(7, 26, 66, 5, 'gostei muito do espaço e clientes. Parabens!!', '2023-02-03 16:56:17', '2023-02-03 16:56:48'),
(8, 38, 66, 4, 'gostei muito do terapeuta!!', '2023-02-03 17:04:56', '2023-02-03 17:14:50'),
(9, 26, 68, 5, 'muito boa instrutora!! Eu recomeindu!!', '2023-02-03 22:36:33', '2023-02-03 22:36:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE `unidades` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `dt_criacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `unidades`
--

INSERT INTO `unidades` (`id`, `descricao`, `dt_criacao`) VALUES
(1, 'kilo', NULL),
(3, 'hora', NULL),
(4, 'un', NULL),
(10, 'litro', '2022-02-08'),
(11, 'acres', '2022-05-17'),
(12, 'km2', '2022-05-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(663, 'joao_estrela@gmail.com', '$2y$10$5Q/vo6dgYxWfmPfI2pJYT.cPeENe37Zevnvv2ZaQCFRzj6tnTT0Yi', NULL, NULL),
(816, 'collab.redecolaborativa@gmail.com', '$2y$10$H4BrhFSS5G8xTsM6yKv8FubMBfLkrE9ssRgXsvWzlvyfyLep/SNJ.', NULL, NULL),
(818, 'allamofarias@hotmail.com', '$2y$10$cXTdCIGFtnF2SiKg3MQSiO0LDKiE0KYfY0616IL60PpZSAklsmyuS', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descricao` (`descricao`),
  ADD KEY `status` (`status`),
  ADD KEY `id_part` (`id_part_cat`),
  ADD KEY `id_rede` (`id_rede_cat`),
  ADD KEY `dt_inclusao` (`dt_criacao`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`local`(768)),
  ADD KEY `id_rede` (`id_rede`),
  ADD KEY `data` (`data`),
  ADD KEY `id_st_eve` (`id_st_eve`),
  ADD KEY `descricao` (`descricao`(768));

--
-- Índices para tabela `eventos_part`
--
ALTER TABLE `eventos_part`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_eve_id_part` (`id_eve`,`id_part`) USING BTREE,
  ADD KEY `id_part` (`id_part`);

--
-- Índices para tabela `identidade`
--
ALTER TABLE `identidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `identidade_imgs`
--
ALTER TABLE `identidade_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `markers_nec`
--
ALTER TABLE `markers_nec`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `markers_of`
--
ALTER TABLE `markers_of`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensagens_trans`
--
ALTER TABLE `mensagens_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `data` (`data`),
  ADD KEY `id_part` (`id_part`),
  ADD KEY `of_nec_tr` (`of_nec_tr`),
  ADD KEY `id_part_dest` (`id_part_dest`) USING BTREE,
  ADD KEY `canc_conf` (`canc_conf`) USING BTREE;

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `moedas`
--
ALTER TABLE `moedas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `desc_moeda` (`desc_moeda`),
  ADD KEY `id_part` (`id_part_moeda`),
  ADD KEY `id_rede` (`id_rede_moeda`),
  ADD KEY `dt_inclusao` (`dt_criacao`),
  ADD KEY `status` (`status`);

--
-- Índices para tabela `moedas_part`
--
ALTER TABLE `moedas_part`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_part_2` (`id_part`,`id_moeda`,`id_trans`),
  ADD KEY `id_part` (`id_part`),
  ADD KEY `id_moeda` (`id_moeda`),
  ADD KEY `quant_moeda` (`quant_moeda`),
  ADD KEY `data` (`data`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Índices para tabela `necessidades`
--
ALTER TABLE `necessidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descricao` (`descricao`) USING BTREE,
  ADD KEY `status` (`status`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_unid` (`id_unid`);

--
-- Índices para tabela `necessidades_part`
--
ALTER TABLE `necessidades_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data` (`data`),
  ADD KEY `ranking` (`ranking`),
  ADD KEY `id_nec` (`id_nec`) USING BTREE,
  ADD KEY `id_part` (`id_part`) USING BTREE,
  ADD KEY `finalizada` (`status`),
  ADD KEY `id_rede` (`id_rede`);

--
-- Índices para tabela `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descricao` (`descricao`) USING BTREE,
  ADD KEY `status` (`status`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_unidade` (`id_unid`);

--
-- Índices para tabela `ofertas_part`
--
ALTER TABLE `ofertas_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data` (`data`),
  ADD KEY `ranking` (`ranking`),
  ADD KEY `id_nec` (`id_of`) USING BTREE,
  ADD KEY `id_part` (`id_part`) USING BTREE,
  ADD KEY `finalizada` (`status`),
  ADD KEY `id_rede` (`id_rede`);

--
-- Índices para tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `nome_part` (`nome_part`),
  ADD KEY `endereco` (`endereco`),
  ADD KEY `cidade` (`cidade`),
  ADD KEY `pais` (`pais`),
  ADD KEY `ranking` (`ranking`),
  ADD KEY `cep` (`cep`),
  ADD KEY `senha` (`senha`),
  ADD KEY `id_tipo_acesso` (`id_tipo_acesso`),
  ADD KEY `timezone` (`timezone`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rede` (`id_rede`),
  ADD KEY `id_st_proj` (`id_st_proj`),
  ADD KEY `dt_inic` (`dt_inic`),
  ADD KEY `dt_fim` (`dt_fim`),
  ADD KEY `descricao` (`descricao`);

--
-- Índices para tabela `projetos_part`
--
ALTER TABLE `projetos_part`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_proj_id_part` (`id_proj`,`id_part`) USING BTREE,
  ADD KEY `id_part` (`id_part`);

--
-- Índices para tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_rede` (`nome`),
  ADD KEY `id_part_inic` (`id_part_inic`),
  ADD KEY `data_inic` (`data_inic`);

--
-- Índices para tabela `redesparts`
--
ALTER TABLE `redesparts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_rede_part` (`id_rede`,`id_part`) USING BTREE,
  ADD KEY `id_part` (`id_part`),
  ADD KEY `admin` (`admin`);

--
-- Índices para tabela `status_eve`
--
ALTER TABLE `status_eve`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descricao` (`descricao`);

--
-- Índices para tabela `status_proj`
--
ALTER TABLE `status_proj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descricao` (`descricao`);

--
-- Índices para tabela `status_trans`
--
ALTER TABLE `status_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descricao` (`descricao`);

--
-- Índices para tabela `tipos_acessos`
--
ALTER TABLE `tipos_acessos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `desc_tipo_acesso` (`desc_tipo_acesso`);

--
-- Índices para tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nec_of_part` (`id_nec_part`,`id_of_part`,`id_of_tr_part`) USING BTREE,
  ADD KEY `id_st_trans` (`id_st_trans`) USING BTREE,
  ADD KEY `id_nec_part` (`id_nec_part`) USING BTREE,
  ADD KEY `id_of_part` (`id_of_part`) USING BTREE,
  ADD KEY `id_moeda` (`id_moeda`),
  ADD KEY `data_inic` (`data_inic`),
  ADD KEY `data_final_of_part` (`data_final_of_part`),
  ADD KEY `data_final_nec_part` (`data_final_nec_part`),
  ADD KEY `data_final_of_tr_part` (`data_final_of_tr_part`);

--
-- Índices para tabela `transaction_ratings`
--
ALTER TABLE `transaction_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id` (`id_rating`),
  ADD KEY `id_part` (`id_part`),
  ADD KEY `transaction_id` (`id_trans`) USING BTREE;

--
-- Índices para tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descricao` (`descricao`(768)),
  ADD KEY `dt_criacao` (`dt_criacao`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventos_part`
--
ALTER TABLE `eventos_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `identidade`
--
ALTER TABLE `identidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `identidade_imgs`
--
ALTER TABLE `identidade_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1831;

--
-- AUTO_INCREMENT de tabela `markers_nec`
--
ALTER TABLE `markers_nec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1471;

--
-- AUTO_INCREMENT de tabela `markers_of`
--
ALTER TABLE `markers_of`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10757;

--
-- AUTO_INCREMENT de tabela `mensagens_trans`
--
ALTER TABLE `mensagens_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `moedas`
--
ALTER TABLE `moedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `moedas_part`
--
ALTER TABLE `moedas_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `necessidades`
--
ALTER TABLE `necessidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `necessidades_part`
--
ALTER TABLE `necessidades_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `ofertas_part`
--
ALTER TABLE `ofertas_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `projetos_part`
--
ALTER TABLE `projetos_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `redes`
--
ALTER TABLE `redes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `redesparts`
--
ALTER TABLE `redesparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `status_eve`
--
ALTER TABLE `status_eve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status_proj`
--
ALTER TABLE `status_proj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status_trans`
--
ALTER TABLE `status_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipos_acessos`
--
ALTER TABLE `tipos_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `transaction_ratings`
--
ALTER TABLE `transaction_ratings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_rede`) REFERENCES `redes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_st_eve`) REFERENCES `status_eve` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `eventos_part`
--
ALTER TABLE `eventos_part`
  ADD CONSTRAINT `eventos_part_ibfk_1` FOREIGN KEY (`id_eve`) REFERENCES `eventos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eventos_part_ibfk_2` FOREIGN KEY (`id_part`) REFERENCES `participantes` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mensagens_trans`
--
ALTER TABLE `mensagens_trans`
  ADD CONSTRAINT `mensagens_trans_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transacoes` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `moedas_part`
--
ALTER TABLE `moedas_part`
  ADD CONSTRAINT `moedas_part_ibfk_1` FOREIGN KEY (`id_moeda`) REFERENCES `moedas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moedas_part_ibfk_2` FOREIGN KEY (`id_part`) REFERENCES `participantes` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `necessidades`
--
ALTER TABLE `necessidades`
  ADD CONSTRAINT `necessidades_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `necessidades_ibfk_2` FOREIGN KEY (`id_unid`) REFERENCES `unidades` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `necessidades_part`
--
ALTER TABLE `necessidades_part`
  ADD CONSTRAINT `necessidades_part_ibfk_1` FOREIGN KEY (`id_part`) REFERENCES `participantes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `necessidades_part_ibfk_2` FOREIGN KEY (`id_nec`) REFERENCES `necessidades` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ofertas_ibfk_2` FOREIGN KEY (`id_unid`) REFERENCES `unidades` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ofertas_part`
--
ALTER TABLE `ofertas_part`
  ADD CONSTRAINT `ofertas_part_ibfk_1` FOREIGN KEY (`id_part`) REFERENCES `participantes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ofertas_part_ibfk_2` FOREIGN KEY (`id_of`) REFERENCES `ofertas` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`id_tipo_acesso`) REFERENCES `tipos_acessos` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`id_rede`) REFERENCES `redes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `projetos_ibfk_2` FOREIGN KEY (`id_st_proj`) REFERENCES `status_proj` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `projetos_part`
--
ALTER TABLE `projetos_part`
  ADD CONSTRAINT `projetos_part_ibfk_1` FOREIGN KEY (`id_part`) REFERENCES `participantes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `projetos_part_ibfk_2` FOREIGN KEY (`id_proj`) REFERENCES `projetos` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `redesparts`
--
ALTER TABLE `redesparts`
  ADD CONSTRAINT `redesparts_ibfk_1` FOREIGN KEY (`id_rede`) REFERENCES `redes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `redesparts_ibfk_2` FOREIGN KEY (`id_part`) REFERENCES `participantes` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `transacoes_ibfk_1` FOREIGN KEY (`id_st_trans`) REFERENCES `status_trans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transacoes_ibfk_4` FOREIGN KEY (`id_moeda`) REFERENCES `moedas` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `transaction_ratings`
--
ALTER TABLE `transaction_ratings`
  ADD CONSTRAINT `transaction_ratings_ibfk_1` FOREIGN KEY (`id_rating`) REFERENCES `ratings` (`id`),
  ADD CONSTRAINT `transaction_ratings_ibfk_2` FOREIGN KEY (`id_trans`) REFERENCES `transacoes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
