/*
SQLyog Ultimate v9.02 
MySQL - 5.5.32 : Database - veterinaria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `alerta` */

CREATE TABLE `alerta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mascota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Mascota` (`id_mascota`),
  CONSTRAINT `FK_Mascota` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `alerta` */

/*Table structure for table `cliente` */

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDoc` enum('DNI','LC','LE','Pasaporte') NOT NULL,
  `nroDoc` int(11) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`id`,`tipoDoc`,`nroDoc`,`apellido`,`nombre`,`direccion`,`telefono`,`email`,`eliminado`) values (1,'DNI',31116431,'Lopez','Esteban','Cerrito 127','123456','estebanlopeza@gmail.com',1),(2,'DNI',34213423,'Pappini','Francisco','Zeballos 1341		','987654','francisco@pappini.com',0);

/*Table structure for table `consulta` */

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mascota` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `pesoMascota` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Mascota_Consulta` (`id_mascota`),
  KEY `FK_Veterinario` (`id_veterinario`),
  CONSTRAINT `FK_Mascota_Consulta` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  CONSTRAINT `FK_Veterinario` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consulta` */

/*Table structure for table `especie` */

CREATE TABLE `especie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `especie` */

insert  into `especie`(`id`,`nombre`) values (1,'perro'),(2,'gato');

/*Table structure for table `gavet` */

CREATE TABLE `gavet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaDesde` date NOT NULL,
  `precioGAVET` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gavet` */

/*Table structure for table `itemconsulta` */

CREATE TABLE `itemconsulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gavet` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `observacion` text,
  PRIMARY KEY (`id`),
  KEY `FK_Gavet` (`id_gavet`),
  KEY `FK_Servicio` (`id_servicio`),
  KEY `FK_Consulta` (`id_consulta`),
  CONSTRAINT `FK_Consulta` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id`),
  CONSTRAINT `FK_Gavet` FOREIGN KEY (`id_gavet`) REFERENCES `gavet` (`id`),
  CONSTRAINT `FK_Servicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `itemconsulta` */

/*Table structure for table `mascota` */

CREATE TABLE `mascota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaNac` date NOT NULL,
  `sexo` enum('macho','hembra') NOT NULL,
  `pelaje` varchar(255) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`eliminado`),
  KEY `FK_Raza` (`id_raza`),
  KEY `FK_Cliente` (`id_cliente`),
  CONSTRAINT `FK_Cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK_Raza` FOREIGN KEY (`id_raza`) REFERENCES `raza` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `mascota` */

insert  into `mascota`(`id`,`id_cliente`,`id_raza`,`nombre`,`fechaNac`,`sexo`,`pelaje`,`eliminado`) values (1,1,1,'Bobby modif','2012-06-12','macho','negro',1),(2,1,3,'robertito','2014-10-23','hembra','naranja',1),(3,1,1,'Perro nuevo','1234-12-12','hembra','lila',0),(4,1,1,'Perro nuevo 2','1234-12-12','hembra','lila',1),(5,1,2,'ljkjlkjl','1233-12-12','macho','hkjhkj',0);

/*Table structure for table `raza` */

CREATE TABLE `raza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_especie` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Especie` (`id_especie`),
  CONSTRAINT `FK_Especie` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `raza` */

insert  into `raza`(`id`,`id_especie`,`nombre`) values (1,1,'doberman'),(2,1,'caniche'),(3,2,'siames');

/*Table structure for table `servicio` */

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `nroGAVET` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `servicio` */

insert  into `servicio`(`id`,`nombre`,`descripcion`,`nroGAVET`,`eliminado`) values (1,'Sarasa','adsa d asd asdas ',8,0);

/*Table structure for table `veterinario` */

CREATE TABLE `veterinario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `veterinario` */

insert  into `veterinario`(`id`,`matricula`,`apellido`,`nombre`,`usuario`,`password`,`email`) values (1,1,'Carpineta','Sebastian','scarpineta','4d186321c1a7f0f354b297e8914ab240','estebanlopeza@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
