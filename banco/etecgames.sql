-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Ago-2021 às 01:58
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `etecgames`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriasjogos_tb`
--

CREATE TABLE `categoriasjogos_tb` (
  `codcatjogo` int(4) NOT NULL,
  `nomeCatjogo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_tb`
--

CREATE TABLE `cliente_tb` (
  `CpfCli` int(11) NOT NULL,
  `codusu_FK` int(4) NOT NULL,
  `nomeCli` varchar(100) NOT NULL,
  `foneCli` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor_tb`
--

CREATE TABLE `fornecedor_tb` (
  `codForn` int(4) NOT NULL,
  `nomeForn` varchar(100) NOT NULL,
  `emailForn` varchar(100) NOT NULL,
  `foneForn` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_tb`
--

CREATE TABLE `funcionario_tb` (
  `codFun` int(4) NOT NULL,
  `codusu_FK` int(4) NOT NULL,
  `nomeFun` varchar(100) NOT NULL,
  `foneFun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos_tb`
--

CREATE TABLE `jogos_tb` (
  `codJogo` int(4) NOT NULL,
  `nomeJogo` varchar(100) NOT NULL,
  `codcatjogo_Fk` int(4) NOT NULL,
  `codFonecedor_FK` int(4) NOT NULL,
  `valorJogo` float NOT NULL,
  `classificacaoJogo` int(2) NOT NULL,
  `avaliacaoJogo` int(1) NOT NULL,
  `dataLancamentoJogo` date NOT NULL,
  `imgJogo1` varchar(250) NOT NULL,
  `imgJogo2` varchar(250) NOT NULL,
  `imgJogo3` varchar(250) NOT NULL,
  `tamanhoJogo` int(11) NOT NULL,
  `descricaoJogo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_tb`
--

CREATE TABLE `usuario_tb` (
  `codusu` int(4) NOT NULL,
  `emailUsu` varchar(100) NOT NULL,
  `SenhaUsu` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_tb`
--

CREATE TABLE `venda_tb` (
  `codVenda` int(4) NOT NULL,
  `codjogo_FK` int(4) NOT NULL,
  `codFun_FK` int(4) NOT NULL,
  `CpfCli_FK` int(11) NOT NULL,
  `qtdVenda` int(3) NOT NULL,
  `dataVenda` int(11) NOT NULL,
  `vlVenda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoriasjogos_tb`
--
ALTER TABLE `categoriasjogos_tb`
  ADD PRIMARY KEY (`codcatjogo`);

--
-- Índices para tabela `cliente_tb`
--
ALTER TABLE `cliente_tb`
  ADD PRIMARY KEY (`CpfCli`);

--
-- Índices para tabela `fornecedor_tb`
--
ALTER TABLE `fornecedor_tb`
  ADD PRIMARY KEY (`codForn`);

--
-- Índices para tabela `funcionario_tb`
--
ALTER TABLE `funcionario_tb`
  ADD PRIMARY KEY (`codFun`);

--
-- Índices para tabela `jogos_tb`
--
ALTER TABLE `jogos_tb`
  ADD PRIMARY KEY (`codJogo`);

--
-- Índices para tabela `usuario_tb`
--
ALTER TABLE `usuario_tb`
  ADD PRIMARY KEY (`codusu`);

--
-- Índices para tabela `venda_tb`
--
ALTER TABLE `venda_tb`
  ADD PRIMARY KEY (`codVenda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoriasjogos_tb`
--
ALTER TABLE `categoriasjogos_tb`
  MODIFY `codcatjogo` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor_tb`
--
ALTER TABLE `fornecedor_tb`
  MODIFY `codForn` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario_tb`
--
ALTER TABLE `funcionario_tb`
  MODIFY `codFun` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogos_tb`
--
ALTER TABLE `jogos_tb`
  MODIFY `codJogo` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario_tb`
--
ALTER TABLE `usuario_tb`
  MODIFY `codusu` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `venda_tb`
--
ALTER TABLE `venda_tb`
  MODIFY `codVenda` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
