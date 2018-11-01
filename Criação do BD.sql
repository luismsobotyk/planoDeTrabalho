-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.36-MariaDB - MariaDB Server
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para planotrabalho
CREATE DATABASE IF NOT EXISTS `planotrabalho` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `planotrabalho`;

-- Copiando estrutura para tabela planotrabalho.ativadmin
CREATE TABLE IF NOT EXISTS `ativadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `portaria` varchar(12) DEFAULT NULL,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '6',
  `CH` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativadmin_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.ativensino
CREATE TABLE IF NOT EXISTS `ativensino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '3',
  `CH` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativensino_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.ativext
CREATE TABLE IF NOT EXISTS `ativext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '5',
  `CH` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativext_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.ativpesq
CREATE TABLE IF NOT EXISTS `ativpesq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '4',
  `CH` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativpesq_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.aulas
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(100) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `CH` int(11) DEFAULT NULL,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.identificacao
CREATE TABLE IF NOT EXISTS `identificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `regime` varchar(30) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '1',
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `identificacao_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.permissoes
CREATE TABLE IF NOT EXISTS `permissoes` (
  `nome` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela planotrabalho.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '0',
  `entregue` tinyint(1) DEFAULT '0',
  `entregaAceita` tinyint(1) DEFAULT '0',
  `aceitoPor` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `dataEntrega` date DEFAULT NULL,
  `ultimoLogin` date DEFAULT NULL,
  `isProfessor` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `permissao` (`permissao`),
  KEY `referencia` (`aceitoPor`),
  CONSTRAINT `referencia` FOREIGN KEY (`aceitoPor`) REFERENCES `usuario` (`id`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`permissao`) REFERENCES `permissoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
