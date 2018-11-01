-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para planotrabalho
drop database planotrabalho;
CREATE DATABASE IF NOT EXISTS `planotrabalho` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `planotrabalho`;

-- Copiando estrutura para tabela planotrabalho.ativadmin
CREATE TABLE IF NOT EXISTS `ativadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `portaria` varchar(12) DEFAULT NULL,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '6',
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativadmin_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.ativadmin: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ativadmin` DISABLE KEYS */;
/*!40000 ALTER TABLE `ativadmin` ENABLE KEYS */;

-- Copiando estrutura para tabela planotrabalho.ativensino
CREATE TABLE IF NOT EXISTS `ativensino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativensino_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.ativensino: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ativensino` DISABLE KEYS */;
/*!40000 ALTER TABLE `ativensino` ENABLE KEYS */;

-- Copiando estrutura para tabela planotrabalho.ativext
CREATE TABLE IF NOT EXISTS `ativext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativext_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.ativext: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ativext` DISABLE KEYS */;
/*!40000 ALTER TABLE `ativext` ENABLE KEYS */;

-- Copiando estrutura para tabela planotrabalho.ativpesq
CREATE TABLE IF NOT EXISTS `ativpesq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` text,
  `professorId` int(11) DEFAULT NULL,
  `idTable` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  KEY `professorId` (`professorId`),
  CONSTRAINT `ativpesq_ibfk_1` FOREIGN KEY (`professorId`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.ativpesq: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ativpesq` DISABLE KEYS */;
/*!40000 ALTER TABLE `ativpesq` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.aulas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.identificacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `identificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `identificacao` ENABLE KEYS */;

-- Copiando estrutura para tabela planotrabalho.permissoes
CREATE TABLE IF NOT EXISTS `permissoes` (
  `nome` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.permissoes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `permissoes` DISABLE KEYS */;
INSERT INTO `permissoes` (`nome`, `id`) VALUES
	('Professor', 1),
	('Avaliador', 2),
	('Administrador', 3);
/*!40000 ALTER TABLE `permissoes` ENABLE KEYS */;

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
  PRIMARY KEY (`id`),
  KEY `permissao` (`permissao`),
  KEY `referencia` (`aceitoPor`),
  CONSTRAINT `referencia` FOREIGN KEY (`aceitoPor`) REFERENCES `usuario` (`id`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`permissao`) REFERENCES `permissoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela planotrabalho.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `email`, `permissao`, `idTable`, `entregue`, `entregaAceita`, `aceitoPor`, `nome`) VALUES
	(3, 'teste@rolante.ifrs.edu.br', 2, 0, 0, 0, NULL, 'Teste');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
