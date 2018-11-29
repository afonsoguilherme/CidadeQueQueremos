-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2018 às 15:39
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cidade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `boaspraticas`
--

CREATE TABLE `boaspraticas` (
  `IdBoasPraticas` int(6) NOT NULL,
  `Titulo` varchar(150) NOT NULL,
  `Descricao` text NOT NULL,
  `Texto` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `boaspraticas`
--

INSERT INTO `boaspraticas` (`IdBoasPraticas`, `Titulo`, `Descricao`, `Texto`, `imagem`) VALUES
(1, 'Gentileza Contagia', 'Dizem que â€œGentileza gera Gentilezaâ€. Pensando nisso, desenvolvemos o Programa Gentileza Contagia, dentro da proposta do Patos 2050: A Cidade que Temos â€“ A Cidade que Queremos.  A ideia Ã© despertar no cidadÃ£o a consciÃªncia sobre suas responsabilidades e a necessidade de substituir o conformismo e a omissÃ£o por aÃ§Ãµes consequentes e responsÃ¡veis.', '<p>O programa tem por objetivos:</p>\r\n<p>&ndash; Estimular o exerc&iacute;cio da cidadania pelas pessoas que o comp&otilde;em;</p>\r\n<p>&ndash; Estimular o trabalho volunt&aacute;rio para o desenvolvimento de projetos voltados &agrave; responsabilidade social; &agrave; educa&ccedil;&atilde;o ambiental e fiscal; ao esporte, lazer e cultura; &agrave; educa&ccedil;&atilde;o para o tr&acirc;nsito e ao civismo, dentre outros;</p>\r\n<p>&ndash; Elaborar projetos e atividades que estimulem o comportamento &eacute;tico da sociedade Patense.</p>\r\n<p>Para construirmos uma sociedade mais justa, cidad&atilde; e gentil &eacute; preciso ter bons h&aacute;bitos e pol&iacute;ticas p&uacute;blicas que correspondam aos direitos do cidad&atilde;o.</p>\r\n<p>Infelizmente em nosso cotidiano, esta atitude parece estar cada vez mais rara. &Eacute; comum nos depararmos com pessoas que n&atilde;o respeitam o pr&oacute;ximo.</p>\r\n<p>Atitudes simples s&atilde;o fundamentais para o conv&iacute;vio social saud&aacute;vel. Trata-se de um h&aacute;bito que necessita ser praticado, diariamente, por todos os cidad&atilde;os, para manter-se o bem-estar e a qualidade de vida.</p>\r\n<p>Ser gentil &eacute; extremamente ben&eacute;fico, muda o rumo dos conflitos, facilita negocia&ccedil;&otilde;es, melhora as rela&ccedil;&otilde;es, enfim, propicia in&uacute;meras vantagens tanto na vida de quem &eacute; gentil quanto na de quem se permite receber gentilezas.</p>\r\n<p>Por favor, obrigado, desculpe-me, s&atilde;o palavras que marcam o relacionamento agrad&aacute;vel entre as pessoas. Os gestos de respeito ganham destaque no&nbsp;<strong>Programa Gentileza Contagia,</strong><strong>&nbsp;</strong>que incentiva um melhor conv&iacute;vio entre os cidad&atilde;os, em diversas situa&ccedil;&otilde;es do dia-a-dia.</p>\r\n<p>A mensagem da gentileza ser&aacute; abordada diante de temas como viol&ecirc;ncia, sa&uacute;de, qualidade de vida, trabalho, meio ambiente, educa&ccedil;&atilde;o e desafios no tr&acirc;nsito. Por meio do estimulo a a&ccedil;&otilde;es de cidadania, contribui-se para a melhoria do bem-estar.</p>\r\n<p>Traz ao debate assuntos que, embora sejam fundamentais, muitas vezes se perdem na correria da vida moderna.</p>\r\n<p>O desafio e resgatar os valores da gentileza, mostrando que eles podem se incorporar ao nosso cotidiano.</p>\r\n<p>N&atilde;o espere mais pelos outros. Comece analisando seus pr&oacute;prios valores e a&ccedil;&otilde;es. Tome atitude &eacute;tica e de cidadania que far&atilde;o de Patos de Minas uma comunidade cada vez melhor.</p>\r\n<p>Passe essa ideia pra frente!</p>', '62955d22fd38f169f896c16ea1bf9f6c.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boaspraticas_fotos`
--

CREATE TABLE `boaspraticas_fotos` (
  `id` int(11) NOT NULL,
  `IdBoasPraticas` int(11) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `boaspraticas_fotos`
--

INSERT INTO `boaspraticas_fotos` (`id`, `IdBoasPraticas`, `imagem`) VALUES
(16, 1, '8d2ce184ace1c367041e8783984f61e5.jpg'),
(17, 1, '51d431f94e207b52df2e518d576ec9d2.jpg'),
(18, 1, 'd7253002da4864a386b2fe7ef0a14db5.jpg'),
(19, 1, 'd398a26090a2c529ff9e4fb262169942.jpg'),
(20, 1, '628ece7c91cea3430a29d509f7861737.jpg'),
(21, 1, '63477b3d4bda4301ad5233758badc835.jpg'),
(22, 1, '396d5fb1deee5aaa852c0c3ea9ba5a35.jpg'),
(23, 1, '2f6880e2371c9cf10b6aca45569f28d6.jpg'),
(24, 1, 'd359c32ec33d6d70fc62f62dd6aee834.jpg'),
(25, 1, '62955d22fd38f169f896c16ea1bf9f6c.jpg'),
(26, 1, 'c48a90426939d01f236f317034ec5591.jpg'),
(27, 1, '548ce71a11b52bfee4881fff311f60b8.jpg'),
(28, 1, 'd370d83c99d17b0c4e2d30981fb3838e.jpg'),
(29, 1, '9268bcb40d50cb92002fc9aa5f051063.jpg'),
(30, 1, '8649f80d0697cbe707c15d9839e6e3fb.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `descricao`) VALUES
(1, 'NotÃ­cias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaspropostas`
--

CREATE TABLE `categoriaspropostas` (
  `categoriaProposta_id` tinyint(4) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoriaspropostas`
--

INSERT INTO `categoriaspropostas` (`categoriaProposta_id`, `descricao`) VALUES
(1, 'GovernanÃ§a e GestÃ£o Participativa'),
(2, 'EducaÃ§Ã£o'),
(3, 'SaÃºde e Bem Estar'),
(4, 'Planejamento Urbano; Mobilidade e Urbanismo'),
(5, ' Economia Local e Desenvolvimento EconÃ´mico'),
(6, 'InovaÃ§Ã£o e Tecnologia'),
(7, 'Meio Ambiente e Sustentabilidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `contato_id` int(11) NOT NULL,
  `nomeContato` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `emailContato` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `siteContato` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `comentarioContato` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `debatepolitico`
--

CREATE TABLE `debatepolitico` (
  `IdDebate` smallint(6) NOT NULL,
  `LinkVideo` varchar(350) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `debatepolitico`
--

INSERT INTO `debatepolitico` (`IdDebate`, `LinkVideo`) VALUES
(1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-tQdT5c99sM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(2, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nY9f_I_tyuQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `cor` varchar(150) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  `local` bigint(20) NOT NULL,
  `descricao` text NOT NULL,
  `aprovar` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `titulo`, `cor`, `inicio`, `fim`, `local`, `descricao`, `aprovar`) VALUES
(14, 'FDF', '#40E0D0', '2018-11-29 00:00:00', '2018-11-29 00:00:00', 2542525, 'GFGD', 1),
(13, 'Teste 1', '#8B0000', '2018-11-22 00:00:00', '2018-11-23 00:00:00', 0, 'DescriÃ§Ã£o Teste 1', 1),
(15, 'Teste 5', '#FFD700', '2018-11-19 00:00:00', '2018-11-23 00:00:00', 333333333, '...OSJSJI', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `homepage`
--

CREATE TABLE `homepage` (
  `homepage_id` tinyint(4) NOT NULL,
  `forum` text CHARACTER SET utf8 NOT NULL,
  `debate` text CHARACTER SET utf8 NOT NULL,
  `indicadores` text CHARACTER SET utf8 NOT NULL,
  `imagem` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `homepage`
--

INSERT INTO `homepage` (`homepage_id`, `forum`, `debate`, `indicadores`, `imagem`) VALUES
(1, '<div class=\"forumPermanenteDesc\">\r\n<p>J&aacute; parou para pensar na &ldquo;Cidade que Temos, a Cidade que Queremos&rdquo;?</p>\r\n<p>Este &eacute; um projeto de Patos de Minas e que h&aacute; muito &eacute; debatido por lideran&ccedil;as e moradores interessados em conquistar melhor qualidade de vida para toda a popula&ccedil;&atilde;o. Ele integra o Patos 2050 e ganhou for&ccedil;a com a realiza&ccedil;&atilde;o do F&oacute;rum de Planejamento Urbano e do Programa Oficina do Futuro.</p>\r\n</div>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Indicadores s&atilde;o importantes instrumentos para o planeamento de cidades mais sustent&aacute;veis e para o desenvolvimento, execu&ccedil;&atilde;o e avalia&ccedil;&atilde;o de politicas p&uacute;blicas. Neste processo, &eacute; fundamental fixar metas de resultados e promover a participa&ccedil;&atilde;o da sociedade civil como correspons&aacute;veis pelas decis&otilde;es tomadas.</p>\r\n<p>O conjunto de indicadores apresentados aqui, &eacute; apenas um ponto de partida para um processo de constru&ccedil;&atilde;o coletiva proposto pelo projeto Cidade que Queremos.</p>', '00493b3f5af40f5e614214702e49cd8f.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `indicadores`
--

CREATE TABLE `indicadores` (
  `Idindicadores` smallint(6) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mine` varchar(255) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `noticia_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `texto` text,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`noticia_id`, `categoria_id`, `titulo`, `data`, `texto`, `imagem`) VALUES
(10, 0, 'teste 1', '2018-11-21', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>', '2dacffc0b88fe1fb8ebea80da77724cb.png'),
(12, 1, 'Teste notÃ­cia 1', '2018-11-27', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>', '2dacffc0b88fe1fb8ebea80da77724cb.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_fotos`
--

CREATE TABLE `noticias_fotos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `noticia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `noticias_fotos`
--

INSERT INTO `noticias_fotos` (`id`, `imagem`, `noticia_id`) VALUES
(1, '79af96dbe3e84935cefde8c7f4a2de57.jpg', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinio`
--

CREATE TABLE `patrocinio` (
  `IdPatrocinio` smallint(6) NOT NULL,
  `NomePatrocinador` varchar(200) NOT NULL,
  `Imagem` varchar(255) NOT NULL,
  `Descricao` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `patrocinio`
--

INSERT INTO `patrocinio` (`IdPatrocinio`, `NomePatrocinador`, `Imagem`, `Descricao`) VALUES
(1, 'Adesp', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', 'http://www.adesppatos.org.br/adesp.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `propostacoletiva`
--

CREATE TABLE `propostacoletiva` (
  `IdPropostaColetiva` smallint(6) NOT NULL,
  `categoriaProposta_id` tinyint(4) NOT NULL,
  `NomeIdealizador` varchar(40) NOT NULL,
  `EmailIdealizador` varchar(80) NOT NULL,
  `TelefoneIdealizador` bigint(20) NOT NULL,
  `TituloProposta` varchar(150) NOT NULL,
  `DescricaoProposta` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `propostacoletiva`
--

INSERT INTO `propostacoletiva` (`IdPropostaColetiva`, `categoriaProposta_id`, `NomeIdealizador`, `EmailIdealizador`, `TelefoneIdealizador`, `TituloProposta`, `DescricaoProposta`) VALUES
(1, 5, 'Guilherme', 'email@email.com', 999988888, 'Teste Titulo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nWhere does it come from?\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `email`, `senha`, `imagem`) VALUES
(1, 'Administrador', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boaspraticas`
--
ALTER TABLE `boaspraticas`
  ADD PRIMARY KEY (`IdBoasPraticas`);

--
-- Indexes for table `boaspraticas_fotos`
--
ALTER TABLE `boaspraticas_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_IdBoasPraticas` (`IdBoasPraticas`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `categoriaspropostas`
--
ALTER TABLE `categoriaspropostas`
  ADD PRIMARY KEY (`categoriaProposta_id`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`contato_id`);

--
-- Indexes for table `debatepolitico`
--
ALTER TABLE `debatepolitico`
  ADD PRIMARY KEY (`IdDebate`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`homepage_id`);

--
-- Indexes for table `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`Idindicadores`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `fk_noticia_categoria` (`categoria_id`);

--
-- Indexes for table `noticias_fotos`
--
ALTER TABLE `noticias_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticia_id` (`noticia_id`);

--
-- Indexes for table `patrocinio`
--
ALTER TABLE `patrocinio`
  ADD PRIMARY KEY (`IdPatrocinio`);

--
-- Indexes for table `propostacoletiva`
--
ALTER TABLE `propostacoletiva`
  ADD PRIMARY KEY (`IdPropostaColetiva`),
  ADD KEY `fk_propostacoletiva_categoriaspropostas` (`categoriaProposta_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boaspraticas`
--
ALTER TABLE `boaspraticas`
  MODIFY `IdBoasPraticas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `boaspraticas_fotos`
--
ALTER TABLE `boaspraticas_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categoriaspropostas`
--
ALTER TABLE `categoriaspropostas`
  MODIFY `categoriaProposta_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `contato_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debatepolitico`
--
ALTER TABLE `debatepolitico`
  MODIFY `IdDebate` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `homepage_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `Idindicadores` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noticia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `noticias_fotos`
--
ALTER TABLE `noticias_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patrocinio`
--
ALTER TABLE `patrocinio`
  MODIFY `IdPatrocinio` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `propostacoletiva`
--
ALTER TABLE `propostacoletiva`
  MODIFY `IdPropostaColetiva` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `noticias_fotos`
--
ALTER TABLE `noticias_fotos`
  ADD CONSTRAINT `noticias_fotos_ibfk_1` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`noticia_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
