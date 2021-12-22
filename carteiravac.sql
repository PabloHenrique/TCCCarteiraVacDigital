-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.33 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para carteiravac
CREATE DATABASE IF NOT EXISTS `id17845726_carteiravac` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `id17845726_carteiravac`;

-- Copiando estrutura para tabela carteiravac.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `CPF_usuario` varchar(11) NOT NULL,
  `nome_completo` varchar(128) NOT NULL,
  `cod_SUS` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `permissao` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`CPF_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela carteiravac.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`CPF_usuario`, `nome_completo`, `cod_SUS`, `email`, `senha`, `permissao`) VALUES
	('44444444444', 'Teste teste', '444444444444444', 'teste@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 2),
	('88888888888', 'Pablo Henrique', '888888888888888', 'pablohenriquenadai@gmail.com', 'cf79ae6addba60ad018347359bd144d2', 2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela carteiravac.vacinas
CREATE TABLE IF NOT EXISTS `vacinas` (
  `ID_vacina` int(11) NOT NULL AUTO_INCREMENT,
  `nome_vacina` varchar(64) NOT NULL,
  `fabricante` varchar(128) DEFAULT NULL,
  `vacinador` varchar(128) DEFAULT NULL,
  `regProfVacinador` varchar(10) DEFAULT NULL,
  `dose` varchar(15) NOT NULL,
  `data_vac` date NOT NULL,
  `CPF_usuario` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID_vacina`),
  KEY `FK_vacinas_usuarios` (`CPF_usuario`),
  CONSTRAINT `FK_vacinas_usuarios` FOREIGN KEY (`CPF_usuario`) REFERENCES `usuarios` (`CPF_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela carteiravac.vacinas: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `vacinas` DISABLE KEYS */;
INSERT INTO `vacinas` (`ID_vacina`, `nome_vacina`, `fabricante`, `vacinador`, `regProfVacinador`, `dose`, `data_vac`, `CPF_usuario`) VALUES
	(1, 'Influenza', 'Instituto Butantan', 'Rebeca Vitória Porto', '124234', '1', '2021-11-03', '88888888888'),
	(2, 'Covid19', 'Pfizer', 'Henrique Victor Eduardo Sales', '3414213', '2', '2021-11-03', '88888888888'),
	(3, 'Triplice viral', 'Fiocruz', 'Ester Emilly Cavalcanti', '4123123', '1', '2021-11-03', '88888888888'),
	(4, 'Hepatite B', 'Instituto Butantan ', 'Larissa Malu Vera Almeida', '52342', '1', '2021-10-25', '88888888888');
/*!40000 ALTER TABLE `vacinas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
