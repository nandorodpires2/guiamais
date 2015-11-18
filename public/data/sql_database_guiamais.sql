-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4992
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela guiamais.empresa
DROP TABLE IF EXISTS `empresa`;
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
  `empresa_ativo` tinyint(1) DEFAULT '1',
  `empresa_datacadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`empresa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela guiamais.empresa: ~0 rows (aproximadamente)
DELETE FROM `empresa`;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


-- Copiando estrutura para tabela guiamais.empresa_servico
DROP TABLE IF EXISTS `empresa_servico`;
CREATE TABLE IF NOT EXISTS `empresa_servico` (
  `empresa_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  PRIMARY KEY (`empresa_id`,`servico_id`),
  KEY `fk_empresa_has_servico_servico1_idx` (`servico_id`),
  KEY `fk_empresa_has_servico_empresa_idx` (`empresa_id`),
  CONSTRAINT `fk_empresa_has_servico_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`empresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_servico_servico1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`servico_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela guiamais.empresa_servico: ~0 rows (aproximadamente)
DELETE FROM `empresa_servico`;
/*!40000 ALTER TABLE `empresa_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa_servico` ENABLE KEYS */;


-- Copiando estrutura para tabela guiamais.servico
DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_slug` varchar(50) DEFAULT NULL,
  `servico_tag` varchar(50) DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela guiamais.servico: ~0 rows (aproximadamente)
DELETE FROM `servico`;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
