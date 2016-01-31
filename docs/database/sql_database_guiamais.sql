-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.5037
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela guiamais.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `administrador_id` int(11) NOT NULL AUTO_INCREMENT,
  `administrador_email` varchar(200) DEFAULT NULL,
  `administrador_senha` varchar(32) DEFAULT NULL,
  `administrador_nome` varchar(200) DEFAULT NULL,
  `administrador_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`administrador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela guiamais.administrador: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`administrador_id`, `administrador_email`, `administrador_senha`, `administrador_nome`, `administrador_ativo`) VALUES
	(1, 'nandorodpires@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernando Rodrigues', 1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;


-- Copiando estrutura para tabela guiamais.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_tipo` varchar(45) DEFAULT NULL,
  `empresa_cpf_cnpj` varchar(50) DEFAULT NULL,
  `empresa_nome` varchar(200) DEFAULT NULL,
  `empresa_responsavel` varchar(200) DEFAULT NULL,
  `empresa_email` varchar(200) DEFAULT NULL,
  `empresa_telefone` varchar(200) DEFAULT NULL,
  `empresa_celular` varchar(200) DEFAULT NULL,
  `empresa_endereco` varchar(200) DEFAULT NULL,
  `empresa_numero` varchar(200) DEFAULT NULL,
  `empresa_complemento` varchar(200) DEFAULT NULL,
  `empresa_bairro` varchar(200) DEFAULT NULL,
  `empresa_cidade` varchar(200) DEFAULT NULL,
  `empresa_estado` varchar(200) DEFAULT NULL,
  `empresa_servico` varchar(500) DEFAULT NULL,
  `empresa_ativo` tinyint(1) DEFAULT '1',
  `empresa_datacadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela guiamais.empresa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`empresa_id`, `empresa_tipo`, `empresa_cpf_cnpj`, `empresa_nome`, `empresa_responsavel`, `empresa_email`, `empresa_telefone`, `empresa_celular`, `empresa_endereco`, `empresa_numero`, `empresa_complemento`, `empresa_bairro`, `empresa_cidade`, `empresa_estado`, `empresa_servico`, `empresa_ativo`, `empresa_datacadastro`) VALUES
	(1, '1', '06238520639', 'Olyva Digital', 'Fernando Rodrigues', 'nandorodpires@gmail.com', '(31) 3261-6792', '(31)98201-0904', 'Rua Mauritânia', '110', 'Bloco 5 - Apto 78', 'Canaã', NULL, NULL, '["PHP","Programador","Analista de Sistemas"]', 1, '2016-01-17 10:41:15'),
	(2, '1', '111111', 'Samir Developer', 'Samir', 'samir@gmail.com', '', '', 'Rua A', '1', '', 'Jaqueline', NULL, NULL, '["PHP","DBA","Designer"]', 1, '2016-01-17 10:42:23');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


-- Copiando estrutura para tabela guiamais.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_slug` varchar(50) DEFAULT NULL,
  `servico_tag` varchar(50) DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`servico_id`),
  UNIQUE KEY `servico_tag` (`servico_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela guiamais.servico: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`servico_id`, `servico_slug`, `servico_tag`, `servico_ativo`) VALUES
	(1, NULL, 'PHP', 1),
	(2, NULL, 'Programador', 1),
	(3, NULL, 'Analista de Sistemas', 1),
	(4, NULL, 'DBA', 1),
	(5, NULL, 'Designer', 1),
	(6, NULL, 'Pedreiro', 1),
	(7, NULL, 'Teste', 1);
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
