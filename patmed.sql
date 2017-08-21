-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.18-log - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour patrimoire&media
CREATE DATABASE IF NOT EXISTS `patrimoire&media` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `patrimoire&media`;

-- Export de la structure de la table patrimoire&media. administrateur
CREATE TABLE IF NOT EXISTS `administrateur` (
  `pseudo` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table patrimoire&media.administrateur : ~1 rows (environ)
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` (`pseudo`, `pass`) VALUES
	('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;

-- Export de la structure de la table patrimoire&media. books
CREATE TABLE IF NOT EXISTS `books` (
  `ISBN10` varchar(50) NOT NULL,
  `Titre` varchar(200) NOT NULL,
  `Idcollection` int(3) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Dateparution` varchar(10) NOT NULL,
  `Auteurs` varchar(200) NOT NULL,
  `Photographes` varchar(200) NOT NULL,
  `Iconographes` varchar(200) NOT NULL,
  `Formatlivre` varchar(200) NOT NULL,
  `Nbpage` varchar(10) NOT NULL,
  `Reliure` varchar(10) NOT NULL,
  `Diffuseur` varchar(200) NOT NULL,
  `Prix` varchar(10) NOT NULL,
  `Format` varchar(10) NOT NULL,
  `Format2` varchar(10) NOT NULL,
  `News` varchar(3) DEFAULT NULL,
  KEY `bookscollection` (`Idcollection`),
  CONSTRAINT `bookscollection` FOREIGN KEY (`Idcollection`) REFERENCES `collection` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table patrimoire&media.books : ~2 rows (environ)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`ISBN10`, `Titre`, `Idcollection`, `Description`, `Dateparution`, `Auteurs`, `Photographes`, `Iconographes`, `Formatlivre`, `Nbpage`, `Reliure`, `Diffuseur`, `Prix`, `Format`, `Format2`, `News`) VALUES
	('1111111111', 'Titre 1 ', 2, 'Sed fruatur sane hoc solacio atque hanc insignem ignominiam, quoniam uni praeter se inusta sit, putet esse leviorem, dum modo, cuius exemplo se consolatur, eius exitum expectet, praesertim cum in Albucio nec Pisonis libidines nec audacia Gabini fuerit ac tamen hac una plaga conciderit, ignominia senatus.', '10/10/10', 'Me', 'Me', 'Me', '200x200x200', '200', 'Me', 'Me', '12.00', 'jpg', 'jpg', 'oui'),
	('2222222222', 'Titre 2', 3, 'Sed fruatur sane hoc solacio atque hanc insignem ignominiam, quoniam uni praeter se inusta sit, putet esse leviorem, dum modo, cuius exemplo se consolatur, eius exitum expectet, praesertim cum in Albucio nec Pisonis libidines nec audacia Gabini fuerit ac tamen hac una plaga conciderit, ignominia senatus.', '10/10/10', 'Me', 'Me', 'Me', '200x200x200', '200', 'Me', 'Me', '15.00', 'jpg', 'jpg', 'oui'),
	('3333333333', 'Titre 3', 2, 'Sed fruatur sane hoc solacio atque hanc insignem ignominiam, quoniam uni praeter se inusta sit, putet esse leviorem, dum modo, cuius exemplo se consolatur, eius exitum expectet, praesertim cum in Albucio nec Pisonis libidines nec audacia Gabini fuerit ac tamen hac una plaga conciderit, ignominia senatus.', '10/10/10', 'Me', 'Me', 'Me', '200x200x200', '200', 'Me', 'Me', '200', 'png', 'jpg', 'oui');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Export de la structure de la table patrimoire&media. collection
CREATE TABLE IF NOT EXISTS `collection` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nomcollection` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Export de données de la table patrimoire&media.collection : ~2 rows (environ)
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
INSERT INTO `collection` (`Id`, `Nomcollection`) VALUES
	(2, '100 ans'),
	(3, '200 ans');
/*!40000 ALTER TABLE `collection` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
