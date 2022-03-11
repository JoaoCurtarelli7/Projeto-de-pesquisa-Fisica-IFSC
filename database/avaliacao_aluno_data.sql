/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `avaliacao_aluno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `data` date NOT NULL,
  `habilidade1` double(8,2) DEFAULT NULL,
  `habilidade2` double(8,2) DEFAULT NULL,
  `habilidade3` double(8,2) DEFAULT NULL,
  `habilidade4` double(8,2) DEFAULT NULL,
  `habilidade5` double(8,2) DEFAULT NULL,
  `habilidade6` double(8,2) DEFAULT NULL,
  `habilidade7` double(8,2) DEFAULT NULL,
  `habilidade8` double(8,2) DEFAULT NULL,
  `habilidade9` double(8,2) DEFAULT NULL,
  `habilidade10` double(8,2) DEFAULT NULL,
  `habilidade11` double(8,2) DEFAULT NULL,
  `habilidade12` double(8,2) DEFAULT NULL,
  `competencia1` double(8,2) NOT NULL,
  `competencia2` double(8,2) NOT NULL,
  `competencia3` double(8,2) NOT NULL,
  `nota_final` double(8,2) NOT NULL,
  `tipo_resolucao` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avaliacao_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avaliacao_aluno_id_foreign` (`aluno_id`),
  KEY `avaliacao_aluno_avaliacao_id_foreign` (`avaliacao_id`),
  CONSTRAINT `avaliacao_aluno_avaliacao_id_foreign` FOREIGN KEY (`avaliacao_id`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40000 ALTER TABLE `avaliacao_aluno` DISABLE KEYS */;
INSERT INTO `avaliacao_aluno` (`id`, `aluno_id`, `data`, `habilidade1`, `habilidade2`, `habilidade3`, `habilidade4`, `habilidade5`, `habilidade6`, `habilidade7`, `habilidade8`, `habilidade9`, `habilidade10`, `habilidade11`, `habilidade12`, `competencia1`, `competencia2`, `competencia3`, `nota_final`, `tipo_resolucao`, `created_at`, `updated_at`, `avaliacao_id`) VALUES
	(1, 1, '2021-12-13', 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 7.00, 77.50, 100.00, 100.00, 92.50, 'VIDEO', '2020-11-02 17:27:54', '2021-12-13 19:41:47', 1),
	(2, 1, '2020-11-03', 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 54.00, 66.67, 66.67, 62.44, 'VIDEO', '2020-11-02 17:28:37', '2020-11-02 17:28:37', 1),
	(6, 2, '2021-08-16', 0.00, 10.00, 7.00, 3.00, 7.00, 10.00, 0.00, 10.00, 3.00, 10.00, 7.00, 3.00, 54.00, 57.50, 66.67, 59.39, 'PAPEL', '2021-08-16 16:03:06', '2021-08-16 16:03:06', 2),
	(22, 1, '2021-12-08', 7.00, 7.00, 10.00, 10.00, 10.00, 10.00, 7.00, 10.00, 7.00, 7.00, 10.00, NULL, 88.00, 85.00, 85.00, 86.00, 'VIDEO', '2021-12-08 11:22:32', '2021-12-08 11:22:32', 1),
	(35, 3, '2021-12-14', 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, NULL, 100.00, 100.00, 100.00, 100.00, 'VIDEO', '2021-12-14 11:35:05', '2021-12-14 11:35:05', 1),
	(36, 2, '2021-12-14', 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, NULL, 70.00, 70.00, 70.00, 70.00, 'VIDEO', '2021-12-14 12:06:06', '2021-12-14 12:25:04', 1),
	(37, 5, '2021-12-14', 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, NULL, 70.00, 70.00, 70.00, 70.00, 'VIDEO', '2021-12-14 12:22:29', '2021-12-14 12:23:06', 2),
	(38, 3, '2021-12-14', 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, NULL, 100.00, 100.00, 100.00, 100.00, 'VIDEO', '2021-12-14 14:51:09', '2021-12-14 14:51:09', 1),
	(39, 2, '2021-12-14', 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, NULL, 70.00, 70.00, 70.00, 70.00, 'VIDEO', '2021-12-14 14:53:11', '2021-12-14 14:53:11', 2),
	(40, 3, '2021-12-14', 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, NULL, 100.00, 100.00, 100.00, 100.00, 'VIDEO', '2021-12-14 16:12:43', '2021-12-14 16:12:43', 2),
	(43, 3, '2021-12-15', 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, NULL, 100.00, 100.00, 100.00, 100.00, 'VIDEO', '2021-12-15 14:26:12', '2021-12-15 14:26:12', 4);
/*!40000 ALTER TABLE `avaliacao_aluno` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
