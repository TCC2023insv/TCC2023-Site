-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12-Ago-2023 às 15:35
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: monitoramento_reparos
--

-- --------------------------------------------------------

--
-- Estrutura da tabela arquivos
--

CREATE DATABASE monitoramento_reparos;
USE monitoramento_reparos;

CREATE TABLE arquivos (
  ID int(11) NOT NULL,
  ID_Reparo int(11) NOT NULL,
  Path varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela direcao
--

CREATE TABLE direcao (
  Login varchar(30) NOT NULL,
  Senha varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela direcao
--

INSERT INTO direcao (Login, Senha) VALUES
('direcao', 'direcao');

-- --------------------------------------------------------

--
-- Estrutura da tabela dispositivo
--

CREATE TABLE dispositivo (
  ID int(11) NOT NULL,
  Nome varchar(30) NOT NULL,
  Problema varchar(50) NOT NULL,
  Quantidade int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela dispositivo_reparo
--

CREATE TABLE dispositivo_reparo (
  ID_Dispositivo int(11) NOT NULL,
  ID_Reparo int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela monitor
--

CREATE TABLE monitor (
  Login varchar(30) NOT NULL,
  Nome varchar(30) NOT NULL,
  Senha varchar(30) NOT NULL,
  Login_Professor varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela monitor
--

INSERT INTO monitor (Login, Nome, Senha, Login_Professor) VALUES
('isa_belle', 'isabelle', 'belleisa', 'j_amaral'),
('monitor_victor', 'victor', 'victormonitor', 'j_amaral');

-- --------------------------------------------------------

--
-- Estrutura da tabela professor
--

CREATE TABLE professor (
  Login varchar(30) NOT NULL,
  Nome varchar(30) NOT NULL,
  Senha varchar(30) NOT NULL,
  Login_Direcao varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela professor
--

INSERT INTO professor (Login, Nome, Senha, Login_Direcao) VALUES
('j_amaral', 'amaral', 'senha123', 'direcao');

-- --------------------------------------------------------

--
-- Estrutura da tabela reparo
--

CREATE TABLE reparo (
  ID int(11) NOT NULL,
  Data date NOT NULL,
  Acao varchar(300) NOT NULL,
  Problemas_Solucionados varchar(300) NOT NULL,
  Responsavel varchar(30) NOT NULL,
  Login_Monitor varchar(30) NOT NULL,
  Laboratorio varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela arquivos
--
ALTER TABLE arquivos
  ADD PRIMARY KEY (ID),
  ADD KEY FK_ID_Reparo (ID_Reparo);

--
-- Índices para tabela direcao
--
ALTER TABLE direcao
  ADD PRIMARY KEY (Login);

--
-- Índices para tabela dispositivo
--
ALTER TABLE dispositivo
  ADD PRIMARY KEY (ID);

--
-- Índices para tabela dispositivo_reparo
--
ALTER TABLE dispositivo_reparo
  ADD PRIMARY KEY (ID_Dispositivo) USING BTREE,
  ADD KEY FK_dispositivo (ID_Dispositivo) USING BTREE,
  ADD KEY FK_reparo (ID_Reparo);

--
-- Índices para tabela monitor
--
ALTER TABLE monitor
  ADD PRIMARY KEY (Login),
  ADD KEY FK_professor (Login_Professor);

--
-- Índices para tabela professor
--
ALTER TABLE professor
  ADD PRIMARY KEY (Login),
  ADD KEY FK_direcao (Login_Direcao);

--
-- Índices para tabela reparo
--
ALTER TABLE reparo
  ADD PRIMARY KEY (ID),
  ADD KEY FK_Monitor (Login_Monitor);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela arquivos
--
ALTER TABLE arquivos
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela dispositivo
--
ALTER TABLE dispositivo
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT de tabela reparo
--
ALTER TABLE reparo
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela arquivos
--
ALTER TABLE arquivos
  ADD CONSTRAINT FK_ID_Reparo FOREIGN KEY (ID_Reparo) REFERENCES reparo (ID);

--
-- Limitadores para a tabela dispositivo_reparo
--
ALTER TABLE dispositivo_reparo
  ADD CONSTRAINT FK_dispositivo FOREIGN KEY (ID_Dispositivo) REFERENCES dispositivo (ID),
  ADD CONSTRAINT FK_reparo FOREIGN KEY (ID_Reparo) REFERENCES reparo (ID);

--
-- Limitadores para a tabela monitor
--
ALTER TABLE monitor
  ADD CONSTRAINT FK_professor FOREIGN KEY (Login_Professor) REFERENCES professor (Login);

--
-- Limitadores para a tabela professor
--
ALTER TABLE professor
  ADD CONSTRAINT FK_direcao FOREIGN KEY (Login_Direcao) REFERENCES direcao (Login);

--
-- Limitadores para a tabela reparo
--
ALTER TABLE reparo
  ADD CONSTRAINT FK_Monitor FOREIGN KEY (Login_Monitor) REFERENCES monitor (Login);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
