-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.21 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para wiki
CREATE DATABASE IF NOT EXISTS `wiki` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wiki`;


-- Volcando estructura para tabla wiki.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL DEFAULT '0',
  `tema` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tema_usuarios` (`usuario_id`),
  CONSTRAINT `FK_tema_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla wiki.temas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` (`id`, `usuario_id`, `tema`, `descripcion`) VALUES
	(2, 1, 'Logistica', '  Movimiento: Transporte En una palabra Puede haber 2 Logística tradicional: de un punto hacia múltiples destino. '),
	(4, 1, 'Calidad', ' Capacidad de satisfacer las necesidades del cliente y eventualmente superar las expectativas. '),
	(5, 2, 'Optimización', 'Generar más con lo mismo o lo mismo con menos. Paralelos de la optimización: |Eficacia-Eficiencia (eficacia optimizada) ||Flexibilidad-Elasticidad (adaptarse y volver) ||Producto-Producción||Competencia-Competitividad.'),
	(28, 1, 'Calidad', 'Capacidad de satisfacer las necesidades del cliente y eventualmente superar las expectativas'),
	(29, 1, 'Calidad interna', 'Lo que la empresa quiere obtener'),
	(30, 1, 'Calidad Externa', 'La percepción del usuario'),
	(32, 1, 'Proceso', 'No implica una transformación física química de la materia si se puede revertir'),
	(33, 1, 'Transformación', 'Si implica una transformación física química de la materia no tiene vuelta atrás Por ej: Tostar un Pan');
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;


-- Volcando estructura para tabla wiki.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla wiki.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`) VALUES
	(1, 'david'),
	(2, 'diego');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
