-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/10/2023 às 20:15
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `monitoramento_reparos`
--

CREATE DATABASE `monitoramento_reparos`

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `ID` int(11) NOT NULL,
  `ID_Reparo` int(11) NOT NULL,
  `Path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `direcao`
--

CREATE TABLE `direcao` (
  `Login` varchar(30) NOT NULL,
  `Senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `direcao`
--

INSERT INTO `direcao` (`Login`, `Senha`) VALUES
('direcao', 'direcao');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dispositivo`
--

CREATE TABLE `dispositivo` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Problema` varchar(50) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dispositivo`
--

INSERT INTO `dispositivo` (`ID`, `Nome`, `Problema`, `Quantidade`) VALUES
(664, 'Apps', '', 0),
(665, 'Fonte', '', 0),
(666, 'HD', '', 0),
(667, 'Monitor', '', 0),
(668, 'Mouse', '', 0),
(669, 'Teclado', '', 0),
(670, 'Windows', '', 0),
(671, 'Apps', 'Desatualizado', 1),
(672, 'Fonte', '', 0),
(673, 'HD', '', 0),
(674, 'Monitor', '', 0),
(675, 'Mouse', '', 0),
(676, 'Teclado', '', 0),
(677, 'Windows', '', 0),
(678, 'Apps', 'Desatualizado', 1),
(679, 'Fonte', '', 0),
(680, 'HD', '', 0),
(681, 'Monitor', '', 0),
(682, 'Mouse', '', 0),
(683, 'Teclado', '', 0),
(684, 'Windows', '', 0),
(685, 'Apps', 'Desatualizado', 1),
(686, 'Fonte', '', 0),
(687, 'HD', '', 0),
(688, 'Monitor', '', 0),
(689, 'Mouse', '', 0),
(690, 'Teclado', '', 0),
(691, 'Windows', '', 0),
(692, 'Apps', 'Desatualizado', 1),
(693, 'Fonte', '', 0),
(694, 'HD', '', 0),
(695, 'Monitor', '', 0),
(696, 'Mouse', '', 0),
(697, 'Teclado', '', 0),
(698, 'Windows', '', 0),
(699, 'Apps', 'Desatualizado', 1),
(700, 'Fonte', '', 0),
(701, 'HD', '', 0),
(702, 'Monitor', '', 0),
(703, 'Mouse', '', 0),
(704, 'Teclado', '', 0),
(705, 'Windows', '', 0),
(706, 'Apps', 'Desatualizado', 1),
(707, 'Fonte', '', 0),
(708, 'HD', '', 0),
(709, 'Monitor', '', 0),
(710, 'Mouse', '', 0),
(711, 'Teclado', '', 0),
(712, 'Windows', '', 0),
(713, 'Apps', 'Desatualizado', 1),
(714, 'Fonte', '', 0),
(715, 'HD', '', 0),
(716, 'Monitor', '', 0),
(717, 'Mouse', '', 0),
(718, 'Teclado', '', 0),
(719, 'Windows', '', 0),
(720, 'Apps', 'Desatualizado', 1),
(721, 'Fonte', '', 0),
(722, 'HD', '', 0),
(723, 'Monitor', '', 0),
(724, 'Mouse', '', 0),
(725, 'Teclado', '', 0),
(726, 'Windows', '', 0),
(727, 'Apps', 'Desatualizado', 1),
(728, 'Fonte', '', 0),
(729, 'HD', '', 0),
(730, 'Monitor', '', 0),
(731, 'Mouse', '', 0),
(732, 'Teclado', '', 0),
(733, 'Windows', '', 0),
(734, 'Apps', 'Desatualizado', 1),
(735, 'Fonte', '', 0),
(736, 'HD', '', 0),
(737, 'Monitor', '', 0),
(738, 'Mouse', '', 0),
(739, 'Teclado', '', 0),
(740, 'Windows', '', 0),
(741, 'Apps', 'Desatualizado', 1),
(742, 'Fonte', '', 0),
(743, 'HD', '', 0),
(744, 'Monitor', '', 0),
(745, 'Mouse', '', 0),
(746, 'Teclado', '', 0),
(747, 'Windows', '', 0),
(748, 'Apps', 'Desatualizado', 1),
(749, 'Fonte', '', 0),
(750, 'HD', '', 0),
(751, 'Monitor', '', 0),
(752, 'Mouse', '', 0),
(753, 'Teclado', '', 0),
(754, 'Windows', '', 0),
(755, 'Apps', 'Desatualizado', 1),
(756, 'Fonte', '', 0),
(757, 'HD', '', 0),
(758, 'Monitor', '', 0),
(759, 'Mouse', '', 0),
(760, 'Teclado', '', 0),
(761, 'Windows', '', 0),
(762, 'Apps', '', 0),
(763, 'Fonte', '', 0),
(764, 'HD', '', 0),
(765, 'Monitor', '', 0),
(766, 'Mouse', '', 0),
(767, 'Teclado', '', 0),
(768, 'Windows', '', 0),
(769, 'Apps', '', 0),
(770, 'Fonte', '', 0),
(771, 'HD', '', 0),
(772, 'Monitor', '', 0),
(773, 'Mouse', '', 0),
(774, 'Teclado', '', 0),
(775, 'Windows', '', 0),
(776, 'Apps', '', 0),
(777, 'Fonte', '', 0),
(778, 'HD', '', 0),
(779, 'Monitor', '', 0),
(780, 'Mouse', '', 0),
(781, 'Teclado', '', 0),
(782, 'Windows', '', 0),
(783, 'Apps', 'Quebrado', 2),
(784, 'Fonte', '', 0),
(785, 'HD', '', 0),
(786, 'Monitor', '', 0),
(787, 'Mouse', '', 0),
(788, 'Teclado', '', 0),
(789, 'Windows', '', 0),
(790, 'Apps', 'Corrompido', 2),
(791, 'Fonte', '', 0),
(792, 'HD', '', 0),
(793, 'Monitor', '', 0),
(794, 'Mouse', '', 0),
(795, 'Teclado', '', 0),
(796, 'Windows', '', 0),
(797, 'Apps', 'Desatualizado', 10),
(798, 'Fonte', '', 0),
(799, 'HD', '', 0),
(800, 'Monitor', '', 0),
(801, 'Mouse', '', 0),
(802, 'Teclado', '', 0),
(803, 'Windows', '', 0),
(804, 'Apps', 'Em falta', 3),
(805, 'Fonte', '', 0),
(806, 'HD', '', 0),
(807, 'Monitor', '', 0),
(808, 'Mouse', '', 0),
(809, 'Teclado', '', 0),
(810, 'Windows', '', 0),
(811, 'Apps', 'Desatualizado', 3),
(812, 'Fonte', '', 0),
(813, 'HD', '', 0),
(814, 'Monitor', '', 0),
(815, 'Mouse', '', 0),
(816, 'Teclado', '', 0),
(817, 'Windows', '', 0),
(818, 'Apps', '', 0),
(819, 'Fonte', '', 0),
(820, 'HD', '', 0),
(821, 'Monitor', '', 0),
(822, 'Mouse', '', 0),
(823, 'Teclado', '', 0),
(824, 'Windows', '', 0),
(825, 'Apps', 'Desatualizado', 0),
(826, 'Fonte', '', 0),
(827, 'HD', '', 0),
(828, 'Monitor', '', 0),
(829, 'Mouse', '', 0),
(830, 'Teclado', '', 0),
(831, 'Windows', '', 0),
(832, 'Apps', 'Desatualizado', 12),
(833, 'Fonte', '', 0),
(834, 'HD', '', 0),
(835, 'Monitor', '', 0),
(836, 'Mouse', '', 0),
(837, 'Teclado', '', 0),
(838, 'Windows', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dispositivo_reparo`
--

CREATE TABLE `dispositivo_reparo` (
  `ID_Dispositivo` int(11) NOT NULL,
  `ID_Reparo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `monitor`
--

CREATE TABLE `monitor` (
  `Login` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Senha` varchar(30) NOT NULL,
  `Login_Professor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `monitor`
--

INSERT INTO `monitor` (`Login`, `Nome`, `Senha`, `Login_Professor`) VALUES
('nico_li', 'nicoli kassa', 'senha123', NULL),
('ste_phanie', 'stephanie', 'senha123', NULL),
('vic_tor', 'victor bello', 'senha123', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `ID` int(11) NOT NULL,
  `data` date NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `laboratorio` varchar(15) NOT NULL,
  `problema` varchar(30) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `responsavel` varchar(30) NOT NULL,
  `login_prof` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `Login` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Senha` varchar(30) NOT NULL,
  `Login_Direcao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`Login`, `Nome`, `Senha`, `Login_Direcao`) VALUES
('professor_1', 'professor 1', 'senha123', 'direcao');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reparo`
--

CREATE TABLE `reparo` (
  `ID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Acao` varchar(300) NOT NULL,
  `Problemas_Nao_Solucionados` varchar(300) NOT NULL,
  `Responsavel` varchar(30) NOT NULL,
  `Login_Monitor` varchar(30) DEFAULT NULL,
  `Laboratorio` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_Reparo` (`ID_Reparo`);

--
-- Índices de tabela `direcao`
--
ALTER TABLE `direcao`
  ADD PRIMARY KEY (`Login`);

--
-- Índices de tabela `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `dispositivo_reparo`
--
ALTER TABLE `dispositivo_reparo`
  ADD PRIMARY KEY (`ID_Dispositivo`) USING BTREE,
  ADD KEY `FK_dispositivo` (`ID_Dispositivo`) USING BTREE,
  ADD KEY `FK_reparo` (`ID_Reparo`);

--
-- Índices de tabela `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`Login`),
  ADD KEY `FK_professor` (`Login_Professor`);

--
-- Índices de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `prof_ocorrencias` (`login_prof`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`Login`),
  ADD KEY `FK_direcao` (`Login_Direcao`);

--
-- Índices de tabela `reparo`
--
ALTER TABLE `reparo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Monitor` (`Login_Monitor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=839;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `reparo`
--
ALTER TABLE `reparo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `FK_ID_Reparo` FOREIGN KEY (`ID_Reparo`) REFERENCES `reparo` (`ID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `dispositivo_reparo`
--
ALTER TABLE `dispositivo_reparo`
  ADD CONSTRAINT `FK_dispositivo` FOREIGN KEY (`ID_Dispositivo`) REFERENCES `dispositivo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reparo` FOREIGN KEY (`ID_Reparo`) REFERENCES `reparo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `FK_professor` FOREIGN KEY (`Login_Professor`) REFERENCES `professor` (`Login`) ON DELETE SET NULL;

--
-- Restrições para tabelas `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `prof_ocorrencias` FOREIGN KEY (`login_prof`) REFERENCES `professor` (`Login`) ON DELETE SET NULL;

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `FK_direcao` FOREIGN KEY (`Login_Direcao`) REFERENCES `direcao` (`Login`);

--
-- Restrições para tabelas `reparo`
--
ALTER TABLE `reparo`
  ADD CONSTRAINT `FK_Monitor` FOREIGN KEY (`Login_Monitor`) REFERENCES `monitor` (`Login`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
